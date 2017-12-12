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

class BankController extends Controller {

    public function getBanks() {
        return Bank::where('active', 0)
                        ->get();
    }

    public function saveBank(Request $request) {

        $data = $request->all();
        $new = new Bank();

        $new->bank_name = $data['bank_name'];
        $new->location = $data['location'];
        $new->branch = $data['branch'];
        $new->relationship_officer = $data['relationship_officer'];
        $new->relationship_contact = $data['relationship_contact'];
        $new->account_type = $data['account_type'];
        $new->currency = $data['currency'];
        $new->account_no = $data['account_number'];
        $new->created_by = '1';
        $saved = $new->save();
        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
    }

    public function saveIssuedCheque(Request $request) {

        $data = $request->all();
        $new = new Cheque();

        $new->receiver_name = $data['receiver_name'];
        $new->issue_date = $data['issue_date'];
        $new->issuingbank = $data['bank'];
        $new->chequeno = $data['cheque_number'];
        $new->narration = $data['cheque_narrtion'];
        $new->amount = $data['amount'];
        $new->cheque_type_system = 'issuer';

        $new->created_by = '1';
        $saved = $new->save();
        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
    }

    public function getCheques() {
        return Cheque::all();
    }

}
