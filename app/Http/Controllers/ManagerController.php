<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Models\User;

class ManagerController extends Controller
{
    public function __construct(){
        $this->middleware('isManager');
    }

    public function home(){
        return view('management.home');
    }
}
