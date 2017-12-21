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

Route::get('companies', 'CompanyController@showcompanies');
Route::get('banks', 'BankController@showbanks');
Route::get('cheques/withdrawals','ChequeController@showwithdrawalcheques');
Route::get('cheques/deposited','ChequeController@showdepositedcheques');

Route::get('/reports', function () {

    return view('reports');
});

Route::get('monitoring', function () {

    return view('chequemonitoring');
});



//apis
Route::get('companies/all', 'CompanyController@getCompanies');
Route::post('companies/savecompany', 'CompanyController@saveCompany');
Route::get('companies/banks/{companyid}', 'CompanyController@getCompanyBanks');

Route::get('bank/all', 'BankController@getBanks');
Route::post('banks/savebank', 'BankController@saveBank');
Route::post('cheques/issued', 'ChequeController@saveWithdrawalCheque');
Route::get('cheques/getpayments', 'ChequeController@getWithdrawalCheques');
Route::get('cheques/getdeposits', 'ChequeController@getDepositCheques');
Route::post('cheques/deposited', 'ChequeController@saveDepositedCheque');
Route::post('cheques/information', 'ChequeController@getChequeInformation');
Route::post('cheques/savestatus', 'ChequeController@saveChequeStatus');
Route::get('cheques/statuses/{chequeid}', 'ChequeController@getChequeStatuses');
Route::get('cheques/statistics', 'ChequeController@getCompaniesChequesStatistics');

//cheques/statuses/" + chequeid