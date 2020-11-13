<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Manager;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Rules\NumbersBetween;
use App\Rules\Length;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        //dd($input, array_key_exists('role_id', $input), array_key_exists('grade', $input));
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'role_id' => ['required', new NumbersBetween(1,3)],
            'password' => $this->passwordRules(),
        ])->validate();
        
        if($input['role_id'] == 3){
            Validator::make($input,[
                'grade' => ['integer', new NumbersBetween(1, 12)],
                'hasClassroom' => ['required', 'boolean'],
                'classroomGrade' => ['integer', 'same:grade', 'required_if:hasClassroom,true'],
                'classroomBranch' => ['string', new Length(1, 2), 'required_if:hasClassroom,true'],
            ])->validate();
        }

        $user = User::create([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'gender' => $input['gender'],
            'email' => $input['email'],
            'role_id' => $input['role_id'],
            'password' => Hash::make($input['password']),
        ]);

        if($input['role_id'] == 1){
            $manager = new Manager();
            $manager->user_id = $user->id;
            $manager->save();
        }
        else if($input['role_id'] == 2){
            $teacher = new Teacher;
            $teacher->user_id = $user->id;
            $teacher->save();
        }
        else if($input['role_id'] == 3){
            $student = new Student;
            $student->user_id = $user->id;
            $student->grade = 5;
            $student->classroom_id = 1;
            $student->save();
        }
        return $user;
    }
}
