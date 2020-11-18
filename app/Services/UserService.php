<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;

class UserService {

    private $request;

    public function __construct(Request $request = null){
        $this->request = $request;
    }

    public function getByRoleId(int $roleId){

        $users = User::where('role_id', $roleId)
        ->orderBy('first_name', 'asc')
        ->orderBy('last_name', 'asc')->get();
        
        return $users;
    }
}