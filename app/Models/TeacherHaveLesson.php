<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherHaveLesson extends Model
{
    use HasFactory;
    protected $table = 'teachers_have_lesson';

    public function lesson(){
        return $this->belongsTo('App\Models\Lesson');
    }

    public function teacher(){
        return $this->belongsTo('App\Models\Teacher');
    }

    public function classroom(){
        return $this->belongsTo('App\Models\Classroom');
    }
}
