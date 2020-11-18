<?php

namespace App\Services;

use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomService {

    private $request;

    public function __construct(Request $request = null){
         $this->request = $request;
    }

    public function getAll(int $grade){
        return Classroom::where('grade', $grade)
        ->orderBy('branch', 'asc')
        ->get();
    }

    public function makeOptions(int $grade){
        $html = '';
        $classrooms = $this->getAll($grade);

        foreach($classrooms as $classroom){
            $html .= "<option value='" . $classroom->id . "'>" . $classroom->branch . "</option>";
        }

        return $html;
    }

    public function check(){
        return Classroom::where('grade', $this->request->grade)
        ->where('branch', $this->request->branch)->first();
    }

    public function store(){
        $cs = new Classroom();
        $cs->grade = $this->request->grade;
        $cs->branch = $this->request->branch;
        $cs->quota = $this->request->quota;
        $cs->save();
    }
}