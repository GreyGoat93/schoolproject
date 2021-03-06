<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $table = "lessons";
    protected $primaryKey = "id";
    protected $fillable = ['grade', 'name'];

    public function score(){
        return $this->hasMany('App\Models\Score');
    }

    public function teacherHaveLesson(){
        return $this->hasMany('App\Models\TeacherHaveLesson');
    }

    public function student(){
        return $this->belongsToMany('App\Models\Classroom', 'students_lessons', 'lesson_id', 'student_id')
        ->withPivot('is_active', 'has_project')
        ->withTimestamps();
    }
}
