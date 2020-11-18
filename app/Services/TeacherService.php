<?php

namespace App\Services;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Services\UserService;

class TeacherService {

    private $request;

    public function __construct(Request $request = null){
        $this->request = $request;
    }

    public function makeOptions(){

        $html = '';
        $users = (new UserService())->getByRoleId(2);

        foreach($users as $user){
            $teacher = Teacher::where('user_id', $user->id)->first();

            $html .= "<option value='" . $teacher->id . "'>" . $user->first_name
             . ' ' . $user->last_name . "</option>";
        }

        return $html;
    }
}