<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherHaveLesson extends Model
{
    use HasFactory;

    public function lesson(){
        $this->belongsTo('App\Models\Lesson');
    }

    public function teacher(){
        $this->belongsTo('App\Models\Teacher');
    }

    public function classroom(){
        $this->belongsTo('App\Models\Classroom');
    }
}
