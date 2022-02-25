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
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(Questionnaire_typeSeeder::class);
        $this->call(QuestionnaireSeeder::class);
        $this->call(QuestionSeeder::class);
        $this->call(Myers_briggsSeeder::class);
        $this->call(ToWhomSeeder::class);
        
        
    }
}