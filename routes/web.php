<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/currencies', function () {
    $repository = app()->make(\App\Services\CurrencyRepositoryInterface::class);
    $currencies = $repository->findAll();
   return view('currencies', compact('currencies'));
});

Route::get('/admin', function () {
    //
})->middleware('currencies');