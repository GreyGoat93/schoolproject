<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\User;
use App\Services\TeacherService;

class TeacherController extends Controller
{  
    public function indexOptions(){
        $html = (new TeacherService())->makeOptions();
        return response()->json($html);
    }
}
