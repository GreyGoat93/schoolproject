<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    use HasFactory;

    protected $table = "managers";
    protected $primaryKey = "id";

    public function user(){
        return $this->hasOne('App\Models\User');
    }
}
