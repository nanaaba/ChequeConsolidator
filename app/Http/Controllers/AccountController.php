<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\UsersView;
use App\UserGroups;
use App\Users;
use App\PermissionsRoles;
use App\Permissions;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller {

    public function showusergroups() {

        $permissions = Session::get('permissions');


        if (!in_array("VIEW_USERGROUP", $permissions)) {
            return redirect('logout');
        }
        return view('usergroups');
    }

    public function showchangepassword() {
        return view('changepassword');
    }

    public function showrolesandpermissions() {

        $permissions = Session::get('permissions');


        if (!in_array("ASSIGN_ROLES", $permissions)) {
            return redirect('logout');
        }
        return view('assignroles');
    }

    public function showusers() {
        $permissions = Session::get('permissions');



        if (!in_array("VIEW_USERS", $permissions)) {
            return redirect('logout');
        }


        return view('users');
    }

    public function getUserGroups() {

        return UserGroups::where('active', 0)
                        ->get();
    }

    public function getUsers() {
        return UsersView::where('deleted', 0)
                        ->get();
    }

    public function deleteUserGroup($id) {


        $update = UserGroups::find($id);
        $update->active = "1";
        $saved = $update->save();
        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
    }

    public function updateUserGroup(Request $request) {

        $data = $request->all();
        $id = $data['usergroupid'];
        $update = UserGroups::find($id);
        $update->name = $data['name'];
        $saved = $update->save();
        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
    }

    public function saveUserGroup(Request $request) {

        $data = $request->all();
        $new = new UserGroups();

        $new->name = $data['name'];
        $new->createdby = Session::get('id');
        $saved = $new->save();
        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
    }

    public function updateUserInfo(Request $request) {

        $data = $request->all();
        $id = $data['userid'];
        $update = Users::find($id);
        $update->name = $data['name'];
        $update->username = $data['username'];
        $update->phoneno = $data['phoneno'];
        $update->usergroup = $data['userGroup'];
        $update->email = $data['email'];
        $saved = $update->save();
        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
    }

    public function updatepassword(Request $request) {
        $id = Session::get('id');

        $update = Users::find($id);
        $update->password = md5($request['password']);
        $update->save();
    }

    public function getPermissions() {
        return Permissions::all();
    }

    public function getGroupPermissions($id) {
        return PermissionsRoles::where('user_group_id', $id)
                        ->get();
    }

    public function assignGroupRoles(Request $request) {
        $data = $request->all();
        $permissions = $data['permissions'];
        $usergoup = $data['usergroups'];
        $dataset = [];
        //delete
        $delete = PermissionsRoles::where('user_group_id', $usergoup);
        $delete->delete();

        foreach ($permissions as $item) {
            $dataset[] = array(
                'user_group_id' => $usergoup,
                'perm_keyword' => $item
            );
        }

        $saved = PermissionsRoles::insert($dataset); // Eloquent
        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
    }

    public function getUserInfo($id) {
        return Users::where('id', $id)
                        ->get();
    }

    public function saveUserInfo(Request $request) {
        $data = $request->all();
        $response = array();
        $new = new Users();
        $existence = $this->checkEmailExistence($data['email']);
        if ($existence == 0) {
            $new->name = $data['name'];
            $new->username = $data['username'];
            $new->phoneno = $data['phoneno'];
            $new->usergroup = $data['userGroup'];
            $new->password = md5('123456');

            $new->email = $data['email'];
            $new->createdby = Session::get('id');
            $saved = $new->save();
            if (!$saved) {
                $response['success'] = 1;
                $response['message'] = 'Could not save';
                return $response;
            } else {
                $response['success'] = 0;
                $response['message'] = 'User Information Saved Successfully';
                return $response;
            }
        }
        if ($existence == 1) {
            $response['success'] = 1;
            $response['message'] = 'Email already exist';
            return $response;
        }
    }

    public function checkEmailExistence($email) {

        $check = Users::where('email', '=', $email)->count();
        if ($check == 0) {
            //it doesnt exist 
            return '0';
        } else {
            //its exists
            return '1';
        }
    }

    public function deleteUser($id) {


        $update = Users::find($id);
        $update->deleted = '1';
        $saved = $update->save();
        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
    }

}
