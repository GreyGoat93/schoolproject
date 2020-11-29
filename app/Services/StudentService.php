<?php

namespace App\Services;

use App\Models\Student;
use App\Models\Classroom;
use App\Services\TeacherHaveLessonService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function validateClassroom($branch, $grade){
        $quotaValidation = count(Student::where('classroom_id', $branch)
        ->get()) <= Classroom::where('id', $branch)->first()->quota;
        $classroomValidation = $grade == Classroom::where('id', $branch)->first()->grade;
        
        return $quotaValidation && $classroomValidation;
    }

    public function assignLessons($student){
        
        $thls = (new TeacherHaveLessonService())->classroomLessons($student->classroom_id);
        $studentLessons = collect($student->lesson->all());
        if(count($studentLessons) <= 0){
            foreach($thls as $thl){
                $student->lesson()->attach($thl->lesson->id, ['has_project' => false, 'is_active' => true]);
            }
        }
        else{
            DB::table('students_lessons')->where('student_id', $student->id)->update(['is_active' => false, 'has_project' => false]);

            foreach($thls as $thl){
                if($studentLessons->firstWhere('pivot.lesson_id', $thl->lesson->id) == null){
                    $student->lesson()->attach($thl->lesson->id, ['has_project' => false, 'is_active' => true]);
                }
                else{
                    $sl = $studentLessons->firstWhere('pivot.lesson_id', $thl->lesson->id);
                    $sl->pivot->is_active = true;
                    $sl->pivot->save();
                }
            }
        }   
    }
}

