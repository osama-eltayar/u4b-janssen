<?php

namespace Database\Seeders;

use App\Models\Aspiration;
use Illuminate\Database\Seeder;

class AspirationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aspirations = ['EMEA Medical Advisor','EMEA Medical Program Lead',
                  'Regional Role Emerging Markets','Medical Director ','MSL Manager/Medical Manager','HEMAR Manager','EMEA SKM','Commercial Lead/CV'];

        foreach ($aspirations as $aspiration)
            Aspiration::firstOrCreate(['name' => $aspiration]);


    }
}
