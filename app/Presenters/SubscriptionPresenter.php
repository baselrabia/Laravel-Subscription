<?php

namespace App\Presenters;

use App\User;
use Carbon\Carbon;
use Laravel\Cashier\Subscription;
use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Formatter\IntlMoneyFormatter;
use Money\Money;
use NumberFormatter;

class SubscriptionPresenter
{
    protected $model;

    public function __construct($model)
    {
        $this->model=$model;

    }

    public function cancelAt()
    {
       return (new Carbon($this->model->cancel_at))->toDateString();
    }

    public function amount()
    {
        $formatter = new IntlMoneyFormatter(
            new NumberFormatter(config('cashier.currency_locale'), NumberFormatter::CURRENCY),
            new ISOCurrencies()
        );

        $money = new Money(
            $this->model->plan->amount,
            new Currency(strtoupper(config('cashier.currency')))
        );

        return $formatter->format($money);
    }

    public function interval()
    {
        return $this->model->plan->interval;
    }
}

