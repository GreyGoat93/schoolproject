<?php

namespace App\Services;

use App\Models\TeacherHaveLesson;
use App\Models\Classroom;
use App\Models\Lesson;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherHaveLessonService {
    
    private $request;

    public function __construct(Request $request = null){
         $this->request = $request;
    }

    public function store(){
        $thl = new TeacherHaveLesson();
        $thl->lesson_id = $this->request->lesson;
        $thl->teacher_id = $this->request->teacher;
        $thl->classroom_id = $this->request->classroom;
        $thl->minimum_score = $this->request->minimumScore;
        $thl->save();
    }

    public function classroomLessons($classroomId){
        $thl = TeacherHaveLesson::where('classroom_id', $classroomId)
        ->with(['Teacher.User', 'Lesson'])
        ->get();
        
        return $thl;
    }
}