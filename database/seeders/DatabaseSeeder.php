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
        $student_count = 300;
        $teacher_count = 30;

        \App\Models\User::factory(1)->manager()->create([
            'manager_id' => 1,
        ]);

        \App\Models\Manager::factory(1)->create([
            'user_id' => 1,
        ]);
        
        for($i = 1; $i <= $teacher_count; $i++){
            \App\Models\User::factory(1)->teacher()->create([
                'teacher_id' => $i, 
            ]);
            \App\Models\Teacher::factory(1)->create([
                'user_id' => 1 + $i,
            ]);
        }
        
        for($i = 1; $i <= $student_count; $i++){
            \App\Models\User::factory(1)->student()->create([
                'student_id' => $i,
            ]);

            \App\Models\Student::factory(1)->create([
                'user_id' => 1 + $teacher_count + $i,
            ]);
        }
        

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
