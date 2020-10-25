<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    public function student(){
        return $this->belongsTo('App\Models\Student');
    }

    public function lesson(){
        return $this->belongsTo('App\Models\Lesson');
    }
}
