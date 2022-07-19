<?php

namespace Database\Seeders;

use App\Models\Stats;
use Illuminate\Database\Seeder;

class StatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tableau = ["2012", "2013", "2014", "2015", "2016", "2017", "2018", "2019", "2020", "2021", "2022"];
        for ($i = 1; $i <= 3; $i++) {


            foreach ($tableau as $item) {

                Stats::create([
                    'nbre' => rand(10000, 1000000),
                    'annee' => $item,
                    'id_filiere' => $i,
                ]);
            }
        }
    }
}
