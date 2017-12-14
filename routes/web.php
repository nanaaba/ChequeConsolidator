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

    return view('login');
});

Route::get('/dashboard', function () {

    return view('dashboard');
});
Route::get('/banks', function () {

    return view('banks');
});
Route::get('/cheques/issued', function () {

    return view('paymentcheques');
});
Route::get('/cheques/deposited', function () {

    return view('depositedcheques');
});
Route::get('/reports', function () {

    return view('reports');
});

Route::get('monitoring', function () {

    return view('chequemonitoring');
});
Route::get('bank/all', 'BankController@getBanks');
Route::post('banks/savebank', 'BankController@saveBank');
Route::post('cheques/issued', 'BankController@saveIssuedCheque');
Route::get('cheques/getpayments', 'BankController@getPaymentsCheques');
Route::get('cheques/getdeposits', 'BankController@getDepositCheques');
Route::post('cheques/deposited', 'BankController@saveDepositedCheque');
//monitoring