<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ToWhomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('to_whom')->insert([
            'name' => 'Работающие',
        ]);
        DB::table('to_whom')->insert([
            'name' => 'Прием',
        ]);
        DB::table('to_whom')->insert([
            'name' => 'Увольняющиеся',
        ]);
    }
}