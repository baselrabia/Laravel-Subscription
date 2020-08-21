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

class CouponPresenter
{
    protected $model;

    public function __construct($model)
    {
        $this->model=$model;

    }

    public function name()
    {
        return $this->model->name;
    }

    public function percent()
    {
        return $this->model->percent_off . '%';
    }

    public function amount()
    {
        $formatter = new IntlMoneyFormatter(
            new NumberFormatter(config('cashier.currency_locale'), NumberFormatter::CURRENCY),
            new ISOCurrencies()
        );

        $money = new Money(
            $this->model->amount_off,
            new Currency(strtoupper(config('cashier.currency')))
        );

        return $formatter->format($money);
    }

    public function value()
    {
        return $this->model->amount_off ? $this->amount() : $this->percent();
    }



}

