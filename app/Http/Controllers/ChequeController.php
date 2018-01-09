<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bank;
use App\Cheque;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ChequeController extends Controller {

    public function showwithdrawalcheques() {
        return view('withdrawalscheques');
    }

    public function showdepositedcheques() {
        return view('depositedcheques');
    }

    public function saveWithdrawalCheque(Request $request) {

        $data = $request->all();
        $new = new Cheque();

        $new->company_id = $data['company_id'];
        $new->beneficiary_name = $data['receiver_name'];
        $new->transaction_date = $data['issue_date'];
        $new->issue_date = $data['issue_date'];
        $new->bank = $data['bank'];
        $new->chequeno = $data['cheque_number'];
        $new->narration = $data['cheque_narrtion'];
        $new->amount = $data['amount'];
        $new->cheque_type_system = 'debit';

        $new->created_by = '1';
        $saved = $new->save();
        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
    }

    public function saveDepositedCheque(Request $request) {

        $data = $request->all();
        $new = new Cheque();

        $new->bank = $data['bank'];
        $new->company_id = $data['company_id'];
        $new->transaction_date = $data['deposited_date'];
        $new->clearing_date = $data['clearing_date'];
        $new->chequeno = $data['cheque_number'];
        $new->narration = $data['cheque_narrtion'];
        $new->amount = $data['amount']; //cheque_type 
        $new->cheque_type = $data['cheque_type']; //

        $new->cheque_type_system = 'credit';
//currency
        $new->created_by = '1';
        $saved = $new->save();
        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
    }

    public function getWithdrawalCheques() {
        $cheques = DB::table('cheque_view')->where('cheque_type_system', 'debit')->get();

        return $cheques;
    }

    public function getDepositCheques() {

        $cheques = DB::table('cheque_view')->where('cheque_type_system', 'credit')->get();

        return $cheques;
    }

    public function getChequeInformation(Request $request) {

        $cheque_type = $request['cheque_type'];
        $cheque_no = $request['cheque_no'];

        $cheques = DB::table('cheque_view')->where(array(
                    'cheque_type_system' => $cheque_type,
                    'chequeno' => $cheque_no
                ))->get();

        return $cheques;
    }

    public function saveChequeStatus(Request $request) {

        $cheque_id = $request['cheque_id'];
        $status = $request['status'];
        $date = $request['date'];

        $status_existence = DB::table('cheques_status')->where(array(
                    'cheque_id' => $cheque_id,
                    'status' => $status
                ))->first();

        if (empty($status_existence->id)) {
            DB::insert('insert into cheques_status (cheque_id, status,date) values (?, ?,?)', [$cheque_id, $status, $date]);
            return 0;
        } else {
            return '1';
        }
    }

    public function getChequeStatuses($chequeid) {
        $statuses = DB::table('cheques_status')->where(
                        'cheque_id', $chequeid)->get();

        return $statuses;
    }

    public function getCompaniesChequesStatistics() {

        $cheques = DB::table('companies_cheques_statistics')->get();

        return $cheques;
    }

    public function updateCompanyDepositedCheque(Request $request) {

        $data = $request->all();
        $id = $data['id'];

         $new = Cheque::find($id);

        $new->bank = $data['bank'];
        $new->transaction_date = $data['deposited_date'];
        $new->clearing_date = $data['clearing_date'];
        $new->chequeno = $data['cheque_number'];
        $new->narration = $data['cheque_narrtion'];
        $new->amount = $data['amount']; //cheque_type 
        $new->cheque_type = $data['cheque_type']; //
        $new->reason = $data['reason']; //

        $saved = $new->save();
        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
    }
    
    
      public function updateCompanyWithdrawalCheque(Request $request) {

        $data = $request->all();
        $id = $data['id'];

         $new = Cheque::find($id);

      $new->beneficiary_name = $data['receiver_name'];
        $new->transaction_date = $data['issue_date'];
        $new->issue_date = $data['issue_date'];
        $new->bank = $data['bank'];
        $new->chequeno = $data['cheque_number'];
        $new->narration = $data['cheque_narrtion'];
        $new->amount = $data['amount'];
        $new->reason = $data['reason']; //

        $saved = $new->save();
        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
    }

    public function deleteCompanyCheque($id) {


        $update = Cheque::find($id);
        $update->active = '1';
        $saved = $update->save();
        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
    }
    
      public function getChequeDetail($id) {
        
        
        return Cheque::where('id', $id)
                        ->get();
    }

}
