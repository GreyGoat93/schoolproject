<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Http\Requests\ClassroomRequest;
use App\Services\ClassroomService;
use App\Services\TeacherHaveLessonService;

class ClassroomController extends Controller
{
    public function create(){
        return view('management.createClassroom');
    }
    
    public function store(ClassroomRequest $request){

        $service = new ClassroomService($request);
        $doesExist = $service->check();

        if($doesExist != null){
            return redirect()->back()->with('error', 'This classroom already exists');
        }
        else{
            $service->store();
            return redirect()->back();
        }
    }

    public function getByGrade($grade){
        $html = (new ClassroomService())->makeOptions($grade);
        return response($html);
    }

    public function show($id){
        $classroom = Classroom::findOrFail($id);
        $lessons = (new TeacherHaveLessonService())->classroomLessons($id);
        return view('management.showClassroom'
        , ['classroom' => $classroom, 'lessons' => $lessons]);
    } 
}
