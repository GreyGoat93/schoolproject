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
        \App\Models\User::factory(1)->manager()->create();
        \App\Models\User::factory(10)->teacher()->create();
        \App\Models\User::factory(89)->create();
    }
}
