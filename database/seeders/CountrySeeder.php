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
        $countries = ['country1','country2','country3'];

        foreach ($countries as $country)
            Country::firstOrCreate(['name' => $country]);
    }
}
