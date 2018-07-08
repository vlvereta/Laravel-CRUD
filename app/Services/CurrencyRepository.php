<?php

namespace App\Services;

class CurrencyRepository implements CurrencyRepositoryInterface
{
    private $currencies;

    public function __construct(array $currencies)
    {
        $this->currencies = $currencies;
    }

    public function findAll(): array
    {
        return $this->currencies;
    }

    public function findActive(): array
    {
        $activeCurrencies = array();
        foreach ($this->currencies as $currency) {
            if ($currency->isActive()) {
                $activeCurrencies[] = $currency;
            }
        }
        return ($activeCurrencies);
    }

    public function findById(int $id): ?Currency
    {
        foreach ($this->currencies as $currency) {
            if ($currency->getId() === $id) {
                return $currency;
            }
        }
        return null;
    }

    public function save(Currency $currency): void
    {
        $this->currencies[] = $currency;
    }

    public function delete(Currency $currency): void
    {
        for ($i = 0, $n = count($this->currencies); $i < $n; $i++) {
            if ($this->currencies[$i] == $currency) {
                unset($this->currencies[$i]);
                array_values($this->currencies);
                break;
            }
        }
    }
}
