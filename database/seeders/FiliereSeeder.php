<?php

namespace Database\Seeders;

use App\Models\Filiere;
use Illuminate\Database\Seeder;

class FiliereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Filiere::insert(
            [
                [
                    "name" => "FSA"
                ],
                [
                    "name" => "IFRI"
                ], [
                "name" => "EPAC"
            ]

            ]
        );
    }
}
