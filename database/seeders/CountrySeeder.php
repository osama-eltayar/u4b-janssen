<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = ['GCC', 'South Africa', 'JENA', 'TURKEY', 'NEMA', 'RUSSIA',];

        foreach ($countries as $country)
            Country::firstOrCreate(['name' => $country]);
    }
}
