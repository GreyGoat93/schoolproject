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
    protected $hidden = ['created_at', 'updated_at'];

    public function student(){
        return $this->hasMany('App\Models\Student');
    }

    public function teacherHaveLesson(){
        return $this->hasMany('App\Models\TeacherHaveLesson');
    }
}
