<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function create(){
        return view('management.createClassroom');
    }
}
