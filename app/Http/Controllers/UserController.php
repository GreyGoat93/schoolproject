<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(Request $request){
        //dd($request->role);
        if($request->role == 'student'){
            $roleid = 3;
            $title = 'Create New Student';
        }
        else if($request->role == 'teacher'){
            $roleid = 2;
            $title = 'Create New Teacher';
        }
        return view('management.createUser', ['roleid' => $roleid, 'title' => $title]);
    }
}
