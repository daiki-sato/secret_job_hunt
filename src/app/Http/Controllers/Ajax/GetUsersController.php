<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;

class GetUsersController extends Controller
{
    public function index($companyKeyword = "", $departmentKeyword = "")
    { 
        $query = User::query();
        $users_info = $query->where('role_id', '=', Role::getSolverId());
        if (!empty($companyKeyword)) {
            $users_info = $query->where('company', 'like', '%' . $companyKeyword . '%');
        }
        if (!empty($departmentKeyword)) {
            $users_info = $query->where('department', 'like', '%' . $departmentKeyword . '%');
        }
        $users_info = $query->get();
        $usersParams = [];
        foreach ($users_info as $key => $user_info) {
            array_push($usersParams, $user_info);
        }
        return $usersParams;
    }
}