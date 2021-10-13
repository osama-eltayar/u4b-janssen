<?php

namespace Database\Seeders;

use App\Models\Therapy;
use Illuminate\Database\Seeder;

class TherapySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $therapies = ['Oncology', 'Cll','MM','IBD','RUM-DERM','CNS','PAH'];

        foreach ($therapies as $therapy)
            Therapy::firstOrCreate(['name' => $therapy]);
    }
}
