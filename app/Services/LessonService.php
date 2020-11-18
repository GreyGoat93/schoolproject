<?php

namespace App\Services;

use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonService {

    private $request;

    public function __construct(Request $request = null){
         $this->request = $request;
    }

    public function getAll(){
        return Lesson::orderBy('grade', 'asc')
        ->orderBy('name', 'asc')->get();
    }

    public function makeOptions(){
        $html = '';
        $lessons = $this->getAll();

        foreach($lessons as $lesson){
            $lesson->name = ucfirst($lesson->name);
            $html .= "<option value='" . $lesson->id . "' data-grade='" . $lesson->grade . "'>" . $lesson->grade . " - " . $lesson->name . "</option>";
        }

        return $html;
    }

    public function store(){
        $lesson = new Lesson();
        $lesson->grade = $this->request->grade;
        $lesson->name = $this->request->name;
        $lesson->save();
    }
}