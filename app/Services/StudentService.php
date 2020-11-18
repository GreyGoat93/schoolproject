<?php

namespace App\Services;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentService 
{
    private $request;

    public function __construct(Request $request = null){
         $this->request = $request;
    }

    public function update(int $id){
        $student = Student::find($id);
        $student->classroom_id = $this->request->classroom;
        $student->save();
    }
}

