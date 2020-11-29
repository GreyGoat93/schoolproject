<?php

namespace App\Services;

use App\Models\Score;
use Illuminate\Http\Request;

class ScoreService {
    
    private $request;

    public function __construct(Request $request = null){
         $this->request = $request;
    }
}