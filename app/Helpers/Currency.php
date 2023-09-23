<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Session;
use NumberFormatter;
use Illuminate\Support\Facades\Cache;

class Currency
{
    public static function format($amount, $currency = null)
    {
        $baseCurrency = config('app.currency', 'USD');

        $formatter = new NumberFormatter(config('app.local'), NumberFormatter::CURRENCY);
        if ($currency === null) {
            $currency = Session::get('currency_code', $baseCurrency);
        }
        if ($currency != $baseCurrency) {
            $rate = Cache::get('currency_rate_' . $currency, 1);
            $amount = $amount * $rate;
        }
        return $formatter->formatCurrency($amount, $currency);
    }
}
