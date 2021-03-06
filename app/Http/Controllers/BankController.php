<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Bank;
use Illuminate\Support\Facades\Session;

class BankController extends Controller {

    public function showbanks() {


        $permissions = Session::get('permissions');

        if (!in_array("VIEW_COMPANY_BANK", $permissions)) {
            return redirect('logout');
        }

        return view('banks');
    }

    public function getBanks() {

        // $banks = DB::table('banks_view')->get();
        return DB::table('banks_view')->where('active', 0)
                        ->get();
        //return $banks;
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
        $new->company_id = $data['company'];
        $new->created_by = Session::get('id');


        try {

            $new->save();
            $bank_id = $new->id;
            $this->saveCompanyBank($data['company'], $bank_id);
            return '0';
        } catch (\Illuminate\Database\QueryException $e) {
            return 'Duplicate entry  for account number. ' . $data['account_number'] . ' already exist';
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function saveCompanyBank($companyid, $bank_id) {

        DB::table('companies_banks')->insert(
                ['company_id' => $companyid, 'bank_id' => $bank_id]
        );
    }

    public function updateCompanyBank(Request $request) {

        $data = $request->all();
        $id = $data['id'];

        $new = Bank::find($id);
        $new->bank_name = $data['bank_name'];
        $new->location = $data['location'];
        $new->branch = $data['branch'];
        $new->relationship_officer = $data['relationship_officer'];
        $new->relationship_contact = $data['relationship_contact'];
        $new->account_type = $data['account_type'];
        $new->currency = $data['currency'];
        $new->account_no = $data['account_number'];
        $new->company_id = $data['company'];
        $new->modified_by = Session::get('id');
        $new->last_modified = date('Y-m-d H:i:s');


        $saved = $new->save();
        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
    }

    public function deleteCompanyBank($id) {


        $update = Bank::find($id);
        $update->active = '1';
        $update->modified_by = Session::get('id');
        $update->last_modified = date('Y-m-d H:i:s');

        $saved = $update->save();
        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
    }

    public function getCompanyBankDetail($id) {


        return Bank::where('id', $id)
                        ->get();
    }

}
