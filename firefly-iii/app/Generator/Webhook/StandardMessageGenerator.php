<?php

/*
 * StandardMessageGenerator.php
 * Copyright (c) 2021 james@firefly-iii.org
 *
 * This file is part of Firefly III (https://github.com/firefly-iii).
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

declare(strict_types=1);

namespace FireflyIII\Generator\Webhook;

use FireflyIII\Enums\WebhookResponse;
use FireflyIII\Enums\WebhookTrigger;
use FireflyIII\Exceptions\FireflyException;
use FireflyIII\Models\Transaction;
use FireflyIII\Models\TransactionGroup;
use FireflyIII\Models\TransactionJournal;
use FireflyIII\Models\Webhook;
use FireflyIII\Models\WebhookMessage;
use FireflyIII\Transformers\AccountTransformer;
use FireflyIII\Transformers\TransactionGroupTransformer;
use FireflyIII\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use JsonException;
use Ramsey\Uuid\Uuid;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Class StandardMessageGenerator
 */
class StandardMessageGenerator implements MessageGeneratorInterface
{
    private Collection $objects;
    private int        $trigger;
    private User       $user;
    private int        $version = 0;
    private Collection $webhooks;

    /**
     *
     */
    public function __construct()
    {
        $this->objects  = new Collection();
        $this->webhooks = new Collection();
    }

    /**
     *
     */
    public function generateMessages(): void
    {
        Log::debug(__METHOD__);
        // get the webhooks:
        if (0 === $this->webhooks->count()) {
            $this->webhooks = $this->getWebhooks();
        }

        // do some debugging
        Log::debug(
            sprintf('StandardMessageGenerator will generate messages for %d object(s) and %d webhook(s).', $this->objects->count(), $this->webhooks->count())
        );
        $this->run();
    }

    /**
     * @return Collection
     */
    private function getWebhooks(): Collection
    {
        return $this->user->webhooks()->where('active', true)->where('trigger', $this->trigger)->get(['webhooks.*']);
    }

    /**
     *
     */
    private function run(): void
    {
        Log::debug('Now in StandardMessageGenerator::run');
        /** @var Webhook $webhook */
        foreach ($this->webhooks as $webhook) {
            $this->runWebhook($webhook);
        }
        Log::debug('Done with StandardMessageGenerator::run');
    }

    /**
     * @param Webhook $webhook
     *
     * @throws FireflyException
     * @throws JsonException
     */
    private function runWebhook(Webhook $webhook): void
    {
        Log::debug(sprintf('Now in runWebhook(#%d)', $webhook->id));
        /** @var Model $object */
        foreach ($this->objects as $object) {
            $this->generateMessage($webhook, $object);
        }
    }

    /**
     * @param Webhook $webhook
     * @param Model   $model
     *
     * @throws FireflyException
     * @throws JsonException
     */
    private function generateMessage(Webhook $webhook, Model $model): void
    {
        $class = get_class($model);
        // Line is ignored because all of Firefly III's Models have an id property.
        Log::debug(sprintf('Now in generateMessage(#%d, %s#%d)', $webhook->id, $class, $model->id)); // @phpstan-ignore-line

        $uuid         = Uuid::uuid4();
        $basicMessage = [
            'uuid'     => $uuid->toString(),
            'user_id'  => 0,
            'trigger'  => WebhookTrigger::from($webhook->trigger)->name,
            'response' => WebhookResponse::from($webhook->response)->name,
            'url'      => $webhook->url,
            'version'  => sprintf('v%d', $this->getVersion()),
            'content'  => [],
        ];

        // depends on the model how user_id is set:
        switch ($class) {
            default:
                // Line is ignored because all of Firefly III's Models have an id property.
                Log::error(
                    sprintf('Webhook #%d was given %s#%d to deal with but can\'t extract user ID from it.', $webhook->id, $class, $model->id)
                ); // @phpstan-ignore-line

                return;
            case TransactionGroup::class:
                /** @var TransactionGroup $model */
                $basicMessage['user_id'] = $model->user->id;
                break;
        }

        // then depends on the response what to put in the message:
        switch ($webhook->response) {
            default:
                Log::error(
                    sprintf('The response code for webhook #%d is "%d" and the message generator cant handle it. Soft fail.', $webhook->id, $webhook->response)
                );

                return;
            case WebhookResponse::NONE->value:
                $basicMessage['content'] = [];
                break;
            case WebhookResponse::TRANSACTIONS->value:
                $transformer = new TransactionGroupTransformer();
                try {
                    $basicMessage['content'] = $transformer->transformObject($model);
                } catch (FireflyException $e) {
                    Log::error(
                        sprintf('The transformer could not include the requested transaction group for webhook #%d: %s', $webhook->id, $e->getMessage())
                    );
                    Log::error($e->getTraceAsString());

                    return;
                }
                break;
            case WebhookResponse::ACCOUNTS->value:
                $accounts = $this->collectAccounts($model);
                foreach ($accounts as $account) {
                    $transformer = new AccountTransformer();
                    $transformer->setParameters(new ParameterBag());
                    $basicMessage['content'][] = $transformer->transform($account);
                }
        }
        $this->storeMessage($webhook, $basicMessage);
    }

    /**
     * @inheritDoc
     */
    public function getVersion(): int
    {
        return $this->version;
    }

    /**
     * @param TransactionGroup $transactionGroup
     *
     * @return Collection
     */
    private function collectAccounts(TransactionGroup $transactionGroup): Collection
    {
        $accounts = new Collection();
        /** @var TransactionJournal $journal */
        foreach ($transactionGroup->transactionJournals as $journal) {
            /** @var Transaction $transaction */
            foreach ($journal->transactions as $transaction) {
                $accounts->push($transaction->account);
            }
        }

        return $accounts->unique();
    }

    /**
     * @param Webhook $webhook
     * @param array   $message
     *
     * @return void
     */
    private function storeMessage(Webhook $webhook, array $message): void
    {
        $webhookMessage = new WebhookMessage();
        $webhookMessage->webhook()->associate($webhook);
        $webhookMessage->sent    = false;
        $webhookMessage->errored = false;
        $webhookMessage->uuid    = $message['uuid'];
        $webhookMessage->message = $message;
        $webhookMessage->save();
        Log::debug(sprintf('Stored new webhook message #%d', $webhookMessage->id));
    }

    /**
     * @param Collection $objects
     */
    public function setObjects(Collection $objects): void
    {
        $this->objects = $objects;
    }

    /**
     * @param int $trigger
     */
    public function setTrigger(int $trigger): void
    {
        $this->trigger = $trigger;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    /**
     * @inheritDoc
     */
    public function setWebhooks(Collection $webhooks): void
    {
        $this->webhooks = $webhooks;
    }
}
