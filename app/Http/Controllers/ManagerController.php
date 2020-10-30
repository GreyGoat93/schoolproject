<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function home(){
        return view('management.home');
    }

    public function createUser(Request $request){
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
