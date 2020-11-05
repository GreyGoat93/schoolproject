<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Http\Requests\LessonRequest;

class LessonController extends Controller
{
    public function create(){
        return view('management.createLesson');
    }

    public function store(LessonRequest $request){
        $lesson = new Lesson();
        $lesson->grade = $request->grade;
        $lesson->name = $request->name;
        $lesson->save();
        return 'store';
    }
}
