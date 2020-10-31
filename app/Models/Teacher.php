<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $table = "teacher";
    protected $primaryKey = "id";
    protected $fillable = ["user_id"];

    public function user(){
        return $this->hasOne('App\Models\User');
    }

    public function teacherHaveLesson(){
        return $this->hasMany('App\Models\TeacherHaveLesson');
    }
}
