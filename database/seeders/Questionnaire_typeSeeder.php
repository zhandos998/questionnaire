<?php

namespace Database\Seeders;


use App\Models\Questionnaire_type;
use Illuminate\Database\Seeder;

class Questionnaire_typeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $questionnaire_type1 = new Questionnaire_type();
        $questionnaire_type1->name = 'Обычный';
        $questionnaire_type1->save();
        $questionnaire_type2 = new Questionnaire_type();
        $questionnaire_type2->name = 'Майерс — Бриггс';
        $questionnaire_type2->save();

    }
}