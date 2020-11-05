<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $users = User::all();

        return view('management.getUsers', ['users' => $users]);
    }

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
        return view('management.createUser', ['roleid' => $roleid ?? 1, 'title' => $title ?? 'Create Manager']);
    }
}
