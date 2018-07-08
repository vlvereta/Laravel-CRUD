<?php

namespace App\Services;

class CurrencyGenerator
{
    public static function generate(): array
    {
        $date = new \DateTime();

        return [
            new Currency(
                1,
                'Bitcoin',
                'BTC',
                6824.93,
                $date,
                true
            ),
            new Currency(
                2,
                'Ethereum',
                'ETH',
                492.91,
                $date,
                true
            ),
            new Currency(
                3,
                'Dash',
                'DASH',
                246.44,
                $date,
                true
            ),
            new Currency(
                4,
                'Litecoin',
                'LTC',
                84.78,
                $date,
                false
            ),
            new Currency(
                5,
                'Zcash',
                'ZEC',
                175.97,
                $date,
                false
            ),
        ];
    }
}
