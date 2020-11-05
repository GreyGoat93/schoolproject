<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $table = "classrooms";
    protected $primaryKey = "id";
    protected $fillable = ['grade', 'branch', 'quota'];

    public function student(){
        return $this->hasMany('App\Models\Student');
    }

    public function teacherHaveLesson(){
        return $this->hasMany('App\Models\TeacherHaveLesson');
    }

    public function lesson(){
        return $this->belongsToMany('App\Models\Lesson', 'lesson_classrooms', 'id', 'id');
    }
}
