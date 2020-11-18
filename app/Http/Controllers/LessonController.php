<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Http\Requests\LessonRequest;
use App\Services\LessonService;

class LessonController extends Controller
{
    public function create(){
        return view('management.createLesson');
    }

    public function store(LessonRequest $request){
        (new LessonService($request))->store();
        return response()->json(['success' => 'That\'s successfull']);
    }

    public function lessonOptions(){
        $html = (new LessonService())->makeOptions();
        return response()->json($html);
    }
}
