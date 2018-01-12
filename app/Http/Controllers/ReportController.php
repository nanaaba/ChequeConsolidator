<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Bank;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller {

    
    
    public function showreports() {
         $permissions = Session::get('permissions');

        if (!in_array("VIEW_REPORTS", $permissions)) {
            return redirect('logout');
        }
            return view('reports');

    }
    
     public function showmonitoring() {
            return view('chequemonitoring');

    }
    
    public function getAccountStatement(Request $request) {

        $bank = $request['bank'];
        $company = $request['company_id'];
        $start_date = $request['start_date'];
        $end_date = $request['end_date'];

        $account_details = $this->getBankDetails($bank);
        $account_data = json_decode($account_details, true);
        $account_no = $account_data[0]['account_no'];

        $statement = $this->getAccountStmnt($account_no, $start_date, $end_date);

        $result = array(
            "account_data" => $account_data,
            "statement" => $statement
        );

        return json_encode($result);
    }

    public function getBankDetails($bank_code) {
        $banks = DB::table('banks_view')->where('id', $bank_code)->get();

        return $banks;
    }

    public function getAccountStmnt($account_no, $start_date, $end_date) {

        $statement = DB::table('cheque_view')->where('account_no', $account_no)-> whereBetween('transaction_date', [$start_date, $end_date])->get();
        return $statement;
    }

}
