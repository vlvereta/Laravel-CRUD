<?php

namespace App\Http\Controllers;

use App\Services\CurrencyPresenter;
use App\Services\CurrencyRepositoryInterface;

class ApiController extends Controller
{
    private $repository;

    public function __construct(CurrencyRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function showActiveCurrencies() {
        $jsonActiveCurrencies = array();
        $activeCurrencies = $this->repository->findActive();
        foreach ($activeCurrencies as $currency) {
            $jsonActiveCurrencies[] = CurrencyPresenter::present($currency);
        }
        return response()->json($jsonActiveCurrencies);
    }

    public function showCurrencyById($id) {
        $currency = $this->repository->findById($id);
        if (!$currency) {
            abort(404);
        }
        return response()->json(CurrencyPresenter::present($currency));
    }
}
