<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FestivalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('festivals')->truncate();
        $faker = \Faker\Factory::create();
        DB::table('festivals')->insert([
            'titel' => 'Pukkelpop 2021',
            'begindatum' => '2021-08-19',
            'einddatum' => '2021-08-22',
            'prijs' => 500,
            'CovidInfo' => '2x Gevaccineerd. Negatieve test geldig voor 2 dagen. Bewijs van genezing.',
            'foto' => 'https://www.pukkelpop.be/assets/default/dist/images/pkp21_social_share.6f43663d.jpg',
            'stad' => 'Hasselt',
            'land_id' => 1
        ]);
        DB::table('festivals')->insert([
            'titel' => 'Rock Werchter 2022',
            'begindatum' => '2022-06-30',
            'einddatum' => '2022-07-03',
            'prijs' => 400,
            'CovidInfo' => 'Nog niet bekend...',
            'foto' => 'https://help.ticketmaster.be/hc/article_attachments/4402697792657/RW22-banner-600x300.jpg',
            'stad' => 'Werchter',
            'land_id' => 1
        ]);
        for($i = 0; $i < 18; $i++){
           $year = strval(rand(2021,2023));
           $month = strval(rand(1,12));
           $day = rand(1,24);
           DB::table('festivals')->insert([
            'titel' => $faker->domainWord . ' ' . $year,
            'begindatum' => $year . '-' . $month . '-' . strval($day),
            'einddatum' => $year . '-' . $month . '-' . strval($day+4),
            'prijs' => rand(300,800),
            'CovidInfo' => $faker->sentence,
            'foto' => 'https://media.resources.festicket.com/www/photos/MusicOn2022_A.jpg',
            'stad' => $faker->city,
            'land_id' => rand(1,6)
            ]); 
        }
    }
}
