<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Services\StudentService;

class StudentController extends Controller
{
    public function editClassroom($id, Request $request){
        (new StudentService($request))->update($id);
        $a = (new StudentService())->assignLessons(Student::find($id));
        return response()->json($a);
    }
}
