<?php

/*
 * AccountController.php
 * Copyright (c) 2022 james@firefly-iii.org
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

namespace FireflyIII\Api\V2\Controllers\Autocomplete;

use FireflyIII\Api\V2\Controllers\Controller;
use FireflyIII\Api\V2\Request\Autocomplete\AutocompleteRequest;
use FireflyIII\Exceptions\FireflyException;
use FireflyIII\Models\Account;
use FireflyIII\Models\AccountType;
use FireflyIII\Repositories\Account\AccountRepositoryInterface;
use FireflyIII\Repositories\Administration\Account\AccountRepositoryInterface as AdminAccountRepositoryInterface;
use FireflyIII\Support\Http\Api\AccountFilter;
use Illuminate\Http\JsonResponse;

/**
 * Class AccountController
 */
class AccountController extends Controller
{
    use AccountFilter;

    private AdminAccountRepositoryInterface $adminRepository;
    private array                           $balanceTypes;
    private AccountRepositoryInterface      $repository;

    /**
     * AccountController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware(
            function ($request, $next) {
                $this->repository      = app(AccountRepositoryInterface::class);
                $this->adminRepository = app(AdminAccountRepositoryInterface::class);

                return $next($request);
            }
        );
        $this->balanceTypes = [AccountType::ASSET, AccountType::LOAN, AccountType::DEBT, AccountType::MORTGAGE,];
    }

    /**
     * Documentation for this endpoint:
     * TODO list of checks
     * 1. use dates from ParameterBag
     * 2. Request validates dates
     * 3. Request includes user_group_id as administration_id
     * 4. Endpoint is documented.
     * 5. Collector uses administration_id
     *
     * @param AutocompleteRequest $request
     *
     * @return JsonResponse
     * @throws FireflyException
     * @throws FireflyException
     */
    public function accounts(AutocompleteRequest $request): JsonResponse
    {
        $data  = $request->getData();
        $types = $data['types'];
        $query = $data['query'];
        $date  = $this->parameters->get('date') ?? today(config('app.timezone'));
        $this->adminRepository->setAdministrationId($data['administration_id']);

        $return          = [];
        $result          = $this->adminRepository->searchAccount((string)$query, $types, $data['limit']);
        $defaultCurrency = app('amount')->getDefaultCurrency();

        /** @var Account $account */
        foreach ($result as $account) {
            $nameWithBalance = $account->name;
            $currency        = $this->repository->getAccountCurrency($account) ?? $defaultCurrency;

            if (in_array($account->accountType->type, $this->balanceTypes, true)) {
                $balance         = app('steam')->balance($account, $date);
                $nameWithBalance = sprintf('%s (%s)', $account->name, app('amount')->formatAnything($currency, $balance, false));
            }

            $return[] = [
                'id'                      => (string)$account->id,
                'name'                    => $account->name,
                'name_with_balance'       => $nameWithBalance,
                'type'                    => $account->accountType->type,
                'currency_id'             => (string)$currency->id,
                'currency_name'           => $currency->name,
                'currency_code'           => $currency->code,
                'currency_symbol'         => $currency->symbol,
                'currency_decimal_places' => $currency->decimal_places,
            ];
        }

        // custom order.
        usort(
            $return,
            function ($a, $b) {
                $order = [AccountType::ASSET, AccountType::REVENUE, AccountType::EXPENSE];
                $pos_a = array_search($a['type'], $order, true);
                $pos_b = array_search($b['type'], $order, true);

                return $pos_a - $pos_b;
            }
        );

        return response()->json($return);
    }
}
