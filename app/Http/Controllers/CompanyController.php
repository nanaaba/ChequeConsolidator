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

class CompanyController extends Controller {

    public function showcompanies() {
        return view('companies');
    }

    public function getCompanies() {
        return Company::where('active', 0)
                        ->get();
    }

    public function getCompanyBanks($companyid) {
        return Bank::where('company_id', $companyid)
                        ->get();
    }

    public function saveCompany(Request $request) {

        $data = $request->all();
        $new = new Company();

        $new->name = $data['name'];
        $new->location = $data['location'];
        $new->contact = $data['contact'];
        $new->description = $data['description'];
        $new->created_by = '1';
        $new->active = '0';



        try {

            $new->save();

            return '0';
        } catch (\Illuminate\Database\QueryException $e) {
            return 'Duplicate entry  for company name. ' . $data['name'] . ' already exist';
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function updateCompany(Request $request) {

        $data = $request->all();
        $id = $data['companyid'];
        $new = Company::find($id);
        $new->name = $data['name'];
        $new->location = $data['location'];
        $new->contact = $data['contact'];
        $new->description = $data['description'];
        $saved = $new->save();
        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
    }

    public function deleteCompany($id) {


        $update = Company::find($id);
        $update->active = '1';
        $saved = $update->save();
        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
    }
    
     public function getCompanyDetail($id) {
        
        
        return Company::where('id', $id)
                        ->get();
    }

}
