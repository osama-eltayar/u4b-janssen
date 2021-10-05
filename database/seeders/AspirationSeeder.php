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
        $aspirations = ['aspiration1','aspiration2','aspiration3'];

        foreach ($aspirations as $aspiration)
            Aspiration::firstOrCreate(['name' => $aspiration]);


    }
}
