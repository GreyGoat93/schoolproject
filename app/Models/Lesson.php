<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $table = "lesson";
    protected $primaryKey = "id";

    public function score(){
        return $this->hasMany('App\Models\Score');
    }

    public function teacherHaveLesson(){
        return $this->hasMany('App\Models\TeacherHaveLesson');
    }

    public function classroom(){
        return $this->belongsToMany('App\Models\Classroom', 'lessons_classrooms', 'id', 'id');
    }

    public function student(){
        return $this->belongsToMany('App\Models\Classroom', 'students_lessons', 'id', 'id');
    }
}
