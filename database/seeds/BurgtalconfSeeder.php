<?php

use Illuminate\Database\Seeder;

class BurgtalconfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         App\Burtalconf::updateOrCreate(['key' => 'KUNDEN_NUMM', 'var'=>'10000']);
         App\Burtalconf::updateOrCreate(['key' => 'KUNDEN_COD', 'var'=>'KN-']);
         App\Burtalconf::updateOrCreate(['key' => 'PROJEKT_COD', 'var'=>'PJ-']);
         App\Burtalconf::updateOrCreate(['key' => 'AUFGABE_COD', 'var'=>'AF-']);
         App\Burtalconf::updateOrCreate(['key' => 'AUFGABE_NUMM', 'var'=>'100']);

    }
}
