<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Http\Requests\ClassroomRequest;

class ClassroomController extends Controller
{
    public function create(){
        return view('management.createClassroom');
    }
    
    public function store(ClassroomRequest $request){
        $doesExist = Classroom::where('grade', $request->grade)
        ->where('branch', $request->branch)->first() != null;

        if($doesExist){
            return 'This classroom is already there!';
        }
        else{
            $cs = new Classroom();
            $cs->grade = $request->grade;
            $cs->branch = $request->branch;
            $cs->quota = $request->quota;
            $cs->save();
            return redirect()->back();
        }
    }
}