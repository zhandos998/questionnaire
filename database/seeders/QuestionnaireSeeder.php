<?php

namespace Database\Seeders;


use App\Models\Questionnaire;
use Illuminate\Database\Seeder;

class QuestionnaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $questionnaire = new Questionnaire();
        $questionnaire->name = 'Майерс — Бриггс';
        $questionnaire->type_id = 2;
        $questionnaire->to_whom = 1;
        $questionnaire->questions_count = 4;
        $questionnaire->save();

    }
}