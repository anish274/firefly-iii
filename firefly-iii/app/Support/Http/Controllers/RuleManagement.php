<?php
/**
 * RuleManagement.php
 * Copyright (c) 2019 james@firefly-iii.org
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

namespace FireflyIII\Support\Http\Controllers;

use FireflyIII\Exceptions\FireflyException;
use FireflyIII\Repositories\RuleGroup\RuleGroupRepositoryInterface;
use FireflyIII\Support\Search\OperatorQuerySearch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

/**
 * Trait RuleManagement
 *
 */
trait RuleManagement
{
    /**
     * @param Request $request
     *
     * @return array
     * @throws FireflyException
     */
    protected function getPreviousActions(Request $request): array
    {
        $index    = 0;
        $triggers = [];
        $oldInput = $request->old('actions');
        if (is_array($oldInput)) {
            foreach ($oldInput as $oldAction) {
                try {
                    $triggers[] = view(
                        'rules.partials.action',
                        [
                            'oldAction'  => $oldAction['type'],
                            'oldValue'   => $oldAction['value'],
                            'oldChecked' => 1 === (int)($oldAction['stop_processing'] ?? '0'),
                            'count'      => $index + 1,
                        ]
                    )->render();
                } catch (Throwable $e) {
                    Log::error(sprintf('Throwable was thrown in getPreviousActions(): %s', $e->getMessage()));
                    Log::error($e->getTraceAsString());
                    throw new FireflyException(sprintf('Could not render: %s', $e->getMessage()), 0, $e);
                }
                $index++;
            }
        }

        return $triggers;
    }

    /**
     * @param Request $request
     *
     * @return array
     * @throws FireflyException
     */
    protected function getPreviousTriggers(Request $request): array
    {
        // TODO duplicated code.
        $operators = config('search.operators');
        $triggers  = [];
        foreach ($operators as $key => $operator) {
            if ('user_action' !== $key && false === $operator['alias']) {
                $triggers[$key] = (string)trans(sprintf('firefly.rule_trigger_%s_choice', $key));
            }
        }
        asort($triggers);

        $index           = 0;
        $renderedEntries = [];
        $oldInput        = $request->old('triggers');
        if (is_array($oldInput)) {
            foreach ($oldInput as $oldTrigger) {
                try {
                    $renderedEntries[] = view(
                        'rules.partials.trigger',
                        [
                            'oldTrigger'    => OperatorQuerySearch::getRootOperator($oldTrigger['type']),
                            'oldValue'      => $oldTrigger['value'],
                            'oldChecked'    => 1 === (int)($oldTrigger['stop_processing'] ?? '0'),
                            'oldProhibited' => 1 === (int)($oldTrigger['prohibited'] ?? '0'),
                            'count'         => $index + 1,
                            'triggers'      => $triggers,
                        ]
                    )->render();
                } catch (Throwable $e) {
                    Log::debug(sprintf('Throwable was thrown in getPreviousTriggers(): %s', $e->getMessage()));
                    Log::error($e->getTraceAsString());
                    throw new FireflyException(sprintf('Could not render: %s', $e->getMessage()), 0, $e);
                }
                $index++;
            }
        }

        return $renderedEntries;
    }

    /**
     * @param array $submittedOperators
     *
     * @return array
     * @throws FireflyException
     */
    protected function parseFromOperators(array $submittedOperators): array
    {
        // TODO duplicated code.
        $operators       = config('search.operators');
        $renderedEntries = [];
        $triggers        = [];
        foreach ($operators as $key => $operator) {
            if ('user_action' !== $key && false === $operator['alias']) {
                $triggers[$key] = (string)trans(sprintf('firefly.rule_trigger_%s_choice', $key));
            }
        }
        asort($triggers);

        $index = 0;
        foreach ($submittedOperators as $operator) {
            try {
                $renderedEntries[] = view(
                    'rules.partials.trigger',
                    [
                        'oldTrigger' => OperatorQuerySearch::getRootOperator($operator['type']),
                        'oldValue'   => $operator['value'],
                        'oldChecked' => false,
                        'count'      => $index + 1,
                        'triggers'   => $triggers,
                    ]
                )->render();
            } catch (Throwable $e) {
                Log::debug(sprintf('Throwable was thrown in getPreviousTriggers(): %s', $e->getMessage()));
                Log::error($e->getTraceAsString());
                throw new FireflyException(sprintf('Could not render: %s', $e->getMessage()), 0, $e);
            }
            $index++;
        }

        return $renderedEntries;
    }

    /**
     *
     */
    private function createDefaultRuleGroup(): void
    {
        /** @var RuleGroupRepositoryInterface $repository */
        $repository = app(RuleGroupRepositoryInterface::class);
        if (0 === $repository->count()) {
            $data = [
                'title'       => (string)trans('firefly.default_rule_group_name'),
                'description' => (string)trans('firefly.default_rule_group_description'),
                'active'      => true,
            ];

            $repository->store($data);
        }
    }
}
