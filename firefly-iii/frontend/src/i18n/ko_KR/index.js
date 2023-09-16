/*
 * index.js
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

export default {
    "config": {
        "html_language": "ko",
        "month_and_day_fns": "y\ub144 MMMM d\uc77c"
    },
    "form": {
        "name": "\uc774\ub984",
        "amount_min": "\ucd5c\uc18c \uae08\uc561",
        "amount_max": "\ucd5c\ub300 \uae08\uc561",
        "url": "URL",
        "title": "\uc81c\ubaa9",
        "first_date": "\ucd5c\ucd08 \uc77c\uc790",
        "repetitions": "\ubc18\ubcf5",
        "description": "\uc124\uba85",
        "iban": "IBAN",
        "skip": "\uac74\ub108\ub6f0\uae30",
        "date": "\ub0a0\uc9dc"
    },
    "list": {
        "name": "\uc774\ub984",
        "account_number": "\uacc4\uc88c \ubc88\ud638",
        "currentBalance": "\ud604\uc7ac \uc794\uace0",
        "lastActivity": "\ub9c8\uc9c0\ub9c9 \ud65c\ub3d9",
        "active": "\ud65c\uc131 \uc0c1\ud0dc\uc785\ub2c8\uae4c?"
    },
    "breadcrumbs": {
        "placeholder": "[Placeholder]",
        "budgets": "\uc608\uc0b0",
        "subscriptions": "\uad6c\ub3c5",
        "transactions": "\uac70\ub798",
        "title_expenses": "\uc9c0\ucd9c",
        "title_withdrawal": "\uc9c0\ucd9c",
        "title_revenue": "\uc218\uc775 \/ \uc218\uc785",
        "title_deposit": "\uc218\uc775 \/ \uc218\uc785",
        "title_transfer": "\uc774\uccb4",
        "title_transfers": "\uc774\uccb4",
        "asset_accounts": "\uc790\uc0b0 \uacc4\uc815",
        "expense_accounts": "\uc9c0\ucd9c \uacc4\uc815",
        "revenue_accounts": "\uc218\uc775 \uacc4\uc815",
        "liabilities_accounts": "\ubd80\ucc44"
    },
    "firefly": {
        "administration_index": "\uc7ac\uc815 \uad00\ub9ac",
        "actions": "\uc561\uc158",
        "edit": "\uc218\uc815",
        "delete": "\uc0ad\uc81c",
        "reconcile": "\uc870\uc815",
        "create_new_asset": "\uc0c8 \uc790\uc0b0 \uacc4\uc815 \uc0dd\uc131",
        "confirm_action": "\uc561\uc158 \ud655\uc778",
        "new_budget": "\uc0c8 \uc608\uc0b0",
        "new_asset_account": "\uc0c8 \uc790\uc0b0 \uacc4\uc815",
        "newTransfer": "\uc2e0\uaddc \uc774\uccb4",
        "submission_options": "\uc81c\ucd9c \uc635\uc158",
        "apply_rules_checkbox": "\uaddc\uce59 \uc801\uc6a9",
        "fire_webhooks_checkbox": "\uc6f9\ud6c5 \uc2e4\ud589",
        "newDeposit": "\uc2e0\uaddc \uc785\uae08",
        "newWithdrawal": "\uc2e0\uaddc \ube44\uc6a9",
        "bills_paid": "\uccad\uad6c\uc11c \uacb0\uc81c",
        "left_to_spend": "\ub0a8\uc740 \uc9c0\ucd9c",
        "no_budget": "(\uc608\uc0b0 \uc5c6\uc74c)",
        "budgeted": "\uc608\uc0b0",
        "spent": "\uc9c0\ucd9c",
        "no_bill": "(\uccad\uad6c\uc11c \uc5c6\uc74c)",
        "rule_trigger_source_account_starts_choice": "\uc18c\uc2a4 \uacc4\uc815 \uc774\ub984\uc740 ...\ub85c \uc2dc\uc791\ud569\ub2c8\ub2e4.",
        "rule_trigger_source_account_ends_choice": "\uc18c\uc2a4 \uacc4\uc815 \uc774\ub984\uc740 ...\ub85c \ub05d\ub0a9\ub2c8\ub2e4.",
        "rule_trigger_source_account_is_choice": "\uc18c\uc2a4 \uacc4\uc815 \uc774\ub984\uc740...",
        "rule_trigger_source_account_contains_choice": "\uc18c\uc2a4 \uacc4\uc815 \uc774\ub984\uc5d0\ub294 \ub2e4\uc74c\uc774 \ud3ec\ud568\ub429\ub2c8\ub2e4.",
        "rule_trigger_account_id_choice": "\uacc4\uc815\uc911 \ud558\ub098\uc758 ID\ub294 \uc815\ud655\ud788..",
        "rule_trigger_source_account_id_choice": "\uc18c\uc2a4 \uacc4\uc815 ID\ub294 \uc815\ud655\ud788..",
        "rule_trigger_destination_account_id_choice": "\ub300\uc0c1 \uacc4\uc815 ID\ub294 \uc815\ud655\ud788..",
        "rule_trigger_account_is_cash_choice": "\uacc4\uc815\uc911 \ud558\ub098\ub294 \ud604\uae08\uc785\ub2c8\ub2e4",
        "rule_trigger_source_is_cash_choice": "\uc18c\uc2a4 \uacc4\uc815\uc740 (\ud604\uae08) \uacc4\uc815\uc785\ub2c8\ub2e4",
        "rule_trigger_destination_is_cash_choice": "\ub300\uc0c1 \uacc4\uc815\uc740 (\ud604\uae08) \uacc4\uc815\uc785\ub2c8\ub2e4",
        "rule_trigger_source_account_nr_starts_choice": "\uc18c\uc2a4 \uacc4\uc88c \ubc88\ud638\/IBAN\uc740...\ub85c \uc2dc\uc791\ud569\ub2c8\ub2e4.",
        "rule_trigger_source_account_nr_ends_choice": "\uc18c\uc2a4 \uacc4\uc815 \ubc88\ud638 \/ IBAN\uc740 ...\ub85c \ub05d\ub0a9\ub2c8\ub2e4",
        "rule_trigger_source_account_nr_is_choice": "\uc18c\uc2a4 \uacc4\uc815 \ubc88\ud638 \/ IBAN\uc740..",
        "rule_trigger_source_account_nr_contains_choice": "\uc18c\uc2a4 \uacc4\uc815 \ubc88\ud638 \/ IBAN\uc740 ..\ub97c \ud3ec\ud568\ud569\ub2c8\ub2e4",
        "rule_trigger_destination_account_starts_choice": "\ub300\uc0c1 \uacc4\uc815 \uc774\ub984\uc740 ...\ub85c \uc2dc\uc791\ud569\ub2c8\ub2e4.",
        "rule_trigger_destination_account_ends_choice": "\ub300\uc0c1 \uacc4\uc815 \uc774\ub984\uc740 ...\ub85c \ub05d\ub0a9\ub2c8\ub2e4",
        "rule_trigger_destination_account_is_choice": "\ub300\uc0c1 \uacc4\uc815 \uc774\ub984\uc740..",
        "rule_trigger_destination_account_contains_choice": "\ub300\uc0c1 \uacc4\uc815 \uc774\ub984\uc740 ...\ub97c \ud3ec\ud568\ud569\ub2c8\ub2e4",
        "rule_trigger_destination_account_nr_starts_choice": "\ub300\uc0c1 \uacc4\uc88c \ubc88\ud638 \/ IBAN\uc740...\ub85c \uc2dc\uc791\ud569\ub2c8\ub2e4",
        "rule_trigger_destination_account_nr_ends_choice": "\ub300\uc0c1 \uacc4\uc88c \ubc88\ud638 \/ IBAN\uc740...\ub85c \ub05d\ub0a9\ub2c8\ub2e4",
        "rule_trigger_destination_account_nr_is_choice": "\ub300\uc0c1 \uacc4\uc815 \ubc88\ud638 \/ IBAN\uc740..",
        "rule_trigger_destination_account_nr_contains_choice": "\ub300\uc0c1 \uacc4\uc88c \ubc88\ud638 \/ IBAN\uc740...\ub97c \ud3ec\ud568\ud569\ub2c8\ub2e4",
        "rule_trigger_transaction_type_choice": "\uac70\ub798\ub294 .. \uc720\ud615\uc785\ub2c8\ub2e4",
        "rule_trigger_category_is_choice": "\uce74\ud14c\uace0\ub9ac\ub294 ..",
        "rule_trigger_amount_less_choice": "\uae08\uc561\uc774 .. \uc640 \uc791\uac70\ub098 \uac19\uc74c",
        "rule_trigger_amount_is_choice": "\uae08\uc561\uc740..",
        "rule_trigger_amount_more_choice": "\uae08\uc561\uc774 .. \uc640 \ud06c\uac70\ub098 \uac19\uc74c",
        "rule_trigger_description_starts_choice": "\uc124\uba85\uc774 ..\ub85c \uc2dc\uc791\ud569\ub2c8\ub2e4",
        "rule_trigger_description_ends_choice": "\uc124\uba85\uc774 ..\ub85c \ub05d\ub0a9\ub2c8\ub2e4",
        "rule_trigger_description_contains_choice": "\uc124\uba85\uc740 ..\ub97c \ud3ec\ud568\ud569\ub2c8\ub2e4",
        "rule_trigger_description_is_choice": "\uc124\uba85\uc740..",
        "rule_trigger_date_on_choice": "\uac70\ub798 \ub0a0\uc9dc\ub294..",
        "rule_trigger_date_before_choice": "\uac70\ub798 \ub0a0\uc9dc\ub294 .. \uc774\uc804\uc785\ub2c8\ub2e4",
        "rule_trigger_date_after_choice": "\uac70\ub798 \ub0a0\uc9dc\ub294 .. \uc774\ud6c4\uc785\ub2c8\ub2e4",
        "rule_trigger_created_at_on_choice": "\uac70\ub798\uac00 \uc774\ub8e8\uc5b4\uc9c4 \ub0a0\uc9dc\ub294..",
        "rule_trigger_updated_at_on_choice": "\uac70\ub798\uac00 \ub9c8\uc9c0\ub9c9\uc73c\ub85c \uc218\uc815\ub41c \ub0a0\uc9dc\ub294...",
        "rule_trigger_budget_is_choice": "\uc608\uc0b0\uc740..",
        "rule_trigger_tag_is_choice": "\ubaa8\ub4e0 \ud0dc\uadf8\ub294...",
        "rule_trigger_currency_is_choice": "\uac70\ub798 \ud1b5\ud654\ub294..",
        "rule_trigger_foreign_currency_is_choice": "\uac70\ub798 \uc678\ud654 \ud1b5\ud654\ub294..",
        "rule_trigger_has_attachments_choice": "\ucd5c\uc18c\ud55c \uc774 \uc815\ub3c4\uc758 \ucca8\ubd80 \ud30c\uc77c\uc774 \uc788\uc2b5\ub2c8\ub2e4.",
        "rule_trigger_has_no_category_choice": "\uce74\ud14c\uace0\ub9ac\uac00 \uc5c6\uc74c",
        "rule_trigger_has_any_category_choice": "\uce74\ud14c\uace0\ub9ac\uac00 \uc788\uc74c",
        "rule_trigger_has_no_budget_choice": "\uc608\uc0b0\uc774 \uc5c6\uc74c",
        "rule_trigger_has_any_budget_choice": "\uc608\uc0b0\uc774 \uc788\uc74c",
        "rule_trigger_has_no_bill_choice": "\uccad\uad6c\uc11c\uac00 \uc5c6\uc74c",
        "rule_trigger_has_any_bill_choice": "\uccad\uad6c\uc11c\uac00 \uc788\uc74c",
        "rule_trigger_has_no_tag_choice": "\ud0dc\uadf8 \uc5c6\uc74c",
        "rule_trigger_has_any_tag_choice": "\ud558\ub098 \uc774\uc0c1\uc758 \ud0dc\uadf8\uac00 \uc788\uc74c",
        "rule_trigger_any_notes_choice": "\uba54\ubaa8\uac00 \uc788\uc74c",
        "rule_trigger_no_notes_choice": "\uba54\ubaa8\uac00 \uc5c6\uc74c",
        "rule_trigger_notes_is_choice": "\uba54\ubaa8\ub294..",
        "rule_trigger_notes_contains_choice": "\ub178\ud2b8\ub294 \ub2e4\uc74c\uc744 \ud3ec\ud568",
        "rule_trigger_notes_starts_choice": "\ub178\ud2b8\ub294 \ub2e4\uc74c\uc73c\ub85c \uc2dc\uc791",
        "rule_trigger_notes_ends_choice": "\ub178\ud2b8\ub294 \ub2e4\uc74c\uc73c\ub85c \ub05d\ub0a8",
        "rule_trigger_bill_is_choice": "\uccad\uad6c\uc11c\ub294..",
        "rule_trigger_external_id_is_choice": "\uc678\ubd80 ID\ub294..",
        "rule_trigger_internal_reference_is_choice": "\ub0b4\ubd80 \ucc38\uc870\ub294..",
        "rule_trigger_journal_id_choice": "\uac70\ub798 \uc800\ub110 ID\ub294..",
        "rule_trigger_any_external_url_choice": "\uac70\ub798\uc5d0 (\uc5b4\ub5a4) \uc678\ubd80 URL\uc774 \uc788\uc74c",
        "rule_trigger_no_external_url_choice": "\uac70\ub798\uc5d0 \uc678\ubd80 URL\uc774 \uc5c6\uc2b5\ub2c8\ub2e4",
        "rule_trigger_id_choice": "\uac70\ub798 ID\ub294..",
        "rule_action_delete_transaction_choice": "\uac70\ub798 \uc0ad\uc81c(!)",
        "rule_action_set_category_choice": "\uce74\ud14c\uace0\ub9ac\ub97c .. \ub85c \uc124\uc815",
        "rule_action_clear_category_choice": "\uce74\ud14c\uace0\ub9ac \uc9c0\uc6b0\uae30",
        "rule_action_set_budget_choice": "\uc608\uc0b0\uc744 .. \ub85c \uc124\uc815",
        "rule_action_clear_budget_choice": "\uc608\uc0b0 \uc9c0\uc6b0\uae30",
        "rule_action_add_tag_choice": "\ud0dc\uadf8 \ucd94\uac00...",
        "rule_action_remove_tag_choice": "\ud0dc\uadf8 \uc81c\uac70 ..",
        "rule_action_remove_all_tags_choice": "\ubaa8\ub4e0 \ud0dc\uadf8 \uc81c\uac70",
        "rule_action_set_description_choice": "\uc124\uba85\uc744 ..\uc73c\ub85c \uc124\uc815",
        "rule_action_update_piggy_choice": "\uc800\uae08\ud1b5\uc5d0 \uac70\ub798\uae08\uc561 \ucd94\uac00\/\uc81c\uac70 ..",
        "rule_action_append_description_choice": "..\ub85c \uc124\uba85 \ucd94\uac00",
        "rule_action_prepend_description_choice": "..\ub85c \uc124\uba85\uc55e\uc5d0 \ucd94\uac00",
        "rule_action_set_source_account_choice": "\uc18c\uc2a4 \uacc4\uc815\uc744 ..\ub85c \uc124\uc815",
        "rule_action_set_destination_account_choice": "\ub300\uc0c1 \uacc4\uc815\uc744 ..\ub85c \uc124\uc815",
        "rule_action_append_notes_choice": "..\ub85c \uba54\ubaa8 \ucd94\uac00",
        "rule_action_prepend_notes_choice": "\ub178\ud2b8 \uc55e\uc5d0 .. \ucd94\uac00",
        "rule_action_clear_notes_choice": "\ub178\ud2b8 \uc81c\uac70",
        "rule_action_set_notes_choice": "\ub178\ud2b8\ub97c ..\ub85c \uc124\uc815",
        "rule_action_link_to_bill_choice": "\uccad\uad6c\uc11c \ub9c1\ud06c ..",
        "rule_action_convert_deposit_choice": "\uac70\ub798\ub97c \uc785\uae08\uc73c\ub85c \uc804\ud658",
        "rule_action_convert_withdrawal_choice": "\uac70\ub798\ub97c \ucd9c\uae08\uc73c\ub85c \uc804\ud658",
        "rule_action_convert_transfer_choice": "\uac70\ub798\ub97c \uc774\uccb4\ub85c \uc804\ud658",
        "placeholder": "[Placeholder]",
        "recurrences": "\ubc18\ubcf5 \uac70\ub798",
        "title_expenses": "\uc9c0\ucd9c",
        "title_withdrawal": "\uc9c0\ucd9c",
        "title_revenue": "\uc218\uc775 \/ \uc218\uc785",
        "pref_1D": "\ud558\ub8e8",
        "pref_1W": "\uc77c\uc8fc\uc77c",
        "pref_1M": "\ud55c\ub2ec",
        "pref_3M": "3\uac1c\uc6d4 (\ubd84\uae30)",
        "pref_6M": "6\uac1c\uc6d4",
        "pref_1Y": "1\ub144",
        "repeat_freq_yearly": "\uc5f0\uac04",
        "repeat_freq_half-year": "\ubc18\ub144\ub9c8\ub2e4",
        "repeat_freq_quarterly": "\ubd84\uae30\ubcc4",
        "repeat_freq_monthly": "\uc6d4\uac04",
        "repeat_freq_weekly": "\uc8fc\uac04",
        "single_split": "\ub098\ub204\uae30",
        "asset_accounts": "\uc790\uc0b0 \uacc4\uc815",
        "expense_accounts": "\uc9c0\ucd9c \uacc4\uc815",
        "liabilities_accounts": "\ubd80\ucc44",
        "undefined_accounts": "\uacc4\uc815",
        "name": "\uc774\ub984",
        "revenue_accounts": "\uc218\uc775 \uacc4\uc815",
        "description": "\uc124\uba85",
        "category": "\uce74\ud14c\uace0\ub9ac",
        "title_deposit": "\uc218\uc775 \/ \uc218\uc785",
        "title_transfer": "\uc774\uccb4",
        "title_transfers": "\uc774\uccb4",
        "piggyBanks": "\uc800\uae08\ud1b5",
        "rules": "\uaddc\uce59",
        "accounts": "\uacc4\uc815",
        "categories": "\uce74\ud14c\uace0\ub9ac",
        "tags": "\ud0dc\uadf8",
        "object_groups_page_title": "\uadf8\ub8f9",
        "reports": "\ubcf4\uace0\uc11c",
        "webhooks": "\uc6f9\ud6c5",
        "currencies": "\ud1b5\ud654",
        "administration": "\uad00\ub9ac",
        "profile": "\ud504\ub85c\ud544",
        "source_account": "\uc18c\uc2a4 \uacc4\uc815",
        "destination_account": "\ub300\uc0c1 \uacc4\uc815",
        "amount": "\uae08\uc561",
        "date": "\ub0a0\uc9dc",
        "time": "\uc2dc\uac04",
        "preferences": "\ud658\uacbd \uc124\uc815",
        "transactions": "\uac70\ub798",
        "balance": "\uc794\uace0",
        "budgets": "\uc608\uc0b0",
        "subscriptions": "\uad6c\ub3c5",
        "welcome_back": "\ubb34\uc2a8 \uc77c\uc774\uc8e0?",
        "bills_to_pay": "\ub0a9\ubd80\ud560 \uccad\uad6c\uc11c",
        "net_worth": "\uc21c\uc790\uc0b0",
        "pref_last365": "\uc9c0\ub09c \ud574",
        "pref_last90": "\ucd5c\uadfc 90\uc77c",
        "pref_last30": "\ucd5c\uadfc 30\uc77c",
        "pref_last7": "\ucd5c\uadfc 7\uc77c",
        "pref_YTD": "\uc5f0\uac04 \ub204\uacc4",
        "pref_QTD": "\ubd84\uae30 \ub204\uacc4",
        "pref_MTD": "\uc6d4\uac04 \ub204\uacc4"
    }
}
