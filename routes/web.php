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
Route::get('account/usergroups','AccountController@showusergroups');
Route::get('account/assignroles','AccountController@showassignroles');
Route::get('account/users','AccountController@showusers');




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

Route::get('account/getusergroups', 'AccountController@getUserGroups');
Route::delete('account/usergroup/{id}', 'AccountController@deleteUserGroup');
Route::put('account/usergroup', 'AccountController@updateUserGroup');
Route::post('account/usergroup', 'AccountController@saveUserGroup');
Route::get('account/permissions', 'AccountController@getPermissions');
Route::get('account/retreivepermissions/{id}', 'AccountController@getGroupPermissions');
Route::post('account/assigngrouproles', 'AccountController@assignGroupRoles');
Route::get('account/getusers', 'AccountController@getUsers');
Route::get('account/user/{id}', 'AccountController@getUserInfo');
Route::delete('account/deleteuser/{id}', 'AccountController@deleteUser');
Route::put('account/userinfo', 'AccountController@updateUserInfo');
Route::post('account/saveuser', 'AccountController@saveUserInfo');

Route::put('cheques/updatedepositedcheque', 'ChequeController@updateCompanyDepositedCheque');
Route::put('cheques/updatedwithdrawalcheque', 'ChequeController@updateCompanyWithdrawalCheque');
Route::put('companies/updatecompany', 'CompanyController@updateCompany');
Route::put('bank/updatecompanybank', 'BankController@updateCompanyBank');

Route::delete('cheques/{id}', 'ChequeController@deleteCompanyCheque');
Route::delete('companies/{id}', 'CompanyController@deleteCompany');
Route::delete('bank/companybank/{id}', 'BankController@deleteCompanyBank');


Route::get('cheques/{id}', 'ChequeController@getChequeDetail');
Route::get('bank/{id}', 'BankController@getCompanyBankDetail');
Route::get('companies/{id}', 'CompanyController@getCompanyDetail');














//cheques/statuses/" + chequeid
Route::get('/logout', function() {
        //Uncomment to see the logs record
        //\Log::info("Session before: ".print_r($request->session()->all(), true));
         Session::flush();
        //Uncomment to see the logs record
        //\Log::info("Session after: ".print_r($request->session()->all(), true));
        return redirect('/');
    });
