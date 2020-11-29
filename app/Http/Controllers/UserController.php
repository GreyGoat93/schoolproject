<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('management.getUsers', ['users' => $users]);
    }

    public function create(Request $request){
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

    public function show($id){
        return view('management.showUser', ['user' => User::find($id)]);
    }
}
