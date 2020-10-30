<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $genderArray = array("male", "female", "other");
        $genderRand = rand(0,2);
        return [
            'first_name' => $this->faker->firstName($genderArray[$genderRand]),
            'last_name' => $this->faker->lastName($genderArray[$genderRand]),
            'gender' => $genderArray[$genderRand],
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'role_id' => 3,
        ];
    }

    public function manager(){
        return $this->state(function(array $attributes){
            return [
                'role_id' => 1,
            ];
        });
    }

    public function teacher(){
        return $this->state(function(array $attributes){
            return [
                'role_id' => 2,
            ];
        });
    }

    public function student(){
        return $this->state(function(array $attributes){
            return [
                'role_id' => 3,
            ];
        });
    }
}
