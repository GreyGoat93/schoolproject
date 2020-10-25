<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = "students";
    protected $primaryKey = "id";


    public function user(){
        return $this->hasOne('App\Models\User');
    }

    public function classroom(){
        return $this->belongsTo('App\Models\Classroom');
    }

    public function score(){
        return $this->hasMany('App\Models\Score');
    }

    public function lesson(){
        return $this->belongsToMany('App\Models\Lesson', 'students_lessons', 'id', 'id');
    }
}
