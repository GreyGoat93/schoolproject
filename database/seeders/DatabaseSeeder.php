<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $branches = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M');
        $lessons = array('math', 'science', 'physical education', 'english', 'music', 'art');

        \App\Models\Manager::factory(1)->create();
        \App\Models\Teacher::factory(10)->create();
        \App\Models\Student::factory(89)->create();

        for($i = 1; $i <= 12; $i++){
            for($j = 0; $j < 5; $j++ ){
                \App\Models\Classroom::factory(1)->create([
                    'grade' => $i,
                    'branch' => $branches[$j]
                ]);
            }
        }

        for($i = 1; $i <= 12; $i++){
            for($j = 0; $j < count($lessons); $j++){
                \App\Models\Lesson::factory(1)->create([
                    'grade' => $i,
                    'name' => $lessons[$j],
                ]);
            }
        }
    }
}
