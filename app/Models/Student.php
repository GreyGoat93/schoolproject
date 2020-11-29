<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = "students";
    protected $primaryKey = "id";
    protected $fillable = ["grade", "user_id", "classroom_id"];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function classroom(){
        return $this->belongsTo('App\Models\Classroom');
    }

    public function score(){
        return $this->hasMany('App\Models\Score');
    }

    public function lesson(){
        return $this->belongsToMany('App\Models\Lesson', 'students_lessons', 'student_id', 'lesson_id')
        ->withPivot('is_active', 'has_project')
        ->withTimestamps();
    }
}
