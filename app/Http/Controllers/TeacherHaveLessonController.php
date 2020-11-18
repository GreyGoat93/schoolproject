<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TeacherHaveLessonService;

class TeacherHaveLessonController extends Controller
{
    public function create(){
        return view('management.createThl');
    }

    public function store(Request $request){
        (new TeacherHaveLessonService($request))->store();
        return response()->json(['message' => 'successful']);
    }
}
