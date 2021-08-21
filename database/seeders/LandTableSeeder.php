<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lands')->truncate();
        DB::table('lands')->insert([
            'naam' => 'België'
        ]);
        DB::table('lands')->insert([
            'naam' => 'Nederland'
        ]);
        DB::table('lands')->insert([
            'naam' => 'Duitsland'
        ]);
        DB::table('lands')->insert([
            'naam' => 'Frankrijk'
        ]);
        DB::table('lands')->insert([
            'naam' => 'Verenigd Koninkrijk'
        ]);
        DB::table('lands')->insert([
            'naam' => 'Verenigde Staten'
        ]);
    }
}
