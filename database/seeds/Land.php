<?php

use Illuminate\Database\Seeder;

class Land extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $land = App\Land::updateOrCreate(['land' => 'Nordrhein-Westfalen', 'l_cod'=>'NRW']);
        $land = App\Land::updateOrCreate(['land' => 'Niedersachsen', 'l_cod'=>'NI']);
        $land = App\Land::updateOrCreate(['land' => 'Rheinland-Pfalz', 'l_cod'=>'RP']);
        $land = App\Land::updateOrCreate(['land' => 'Saarland', 'l_cod'=>'SL']);
        $land = App\Land::updateOrCreate(['land' => 'Hessen', 'l_cod'=>'HE']);
        $land = App\Land::updateOrCreate(['land' => 'Hamburg', 'l_cod'=>'HH']);
        $land = App\Land::updateOrCreate(['land' => 'Bremen', 'l_cod'=>'HB']);
        $land = App\Land::updateOrCreate(['land' => 'Brandenburg', 'l_cod'=>'BB']);
        $land = App\Land::updateOrCreate(['land' => 'Berlin', 'l_cod'=>'BE']);
        $land = App\Land::updateOrCreate(['land' => 'Bayern', 'l_cod'=>'BY']);
        $land = App\Land::updateOrCreate(['land' => 'Baden-Württemberg', 'l_cod'=>'BW']);
        $land = App\Land::updateOrCreate(['land' => 'Sachsen', 'l_cod'=>'SN']);
        $land = App\Land::updateOrCreate(['land' => 'Sachsen-Anhalt', 'l_cod'=>'ST']);
        $land = App\Land::updateOrCreate(['land' => 'Schleswig-Holstein', 'l_cod'=>'SH']);
        $land = App\Land::updateOrCreate(['land' => 'Thüringen', 'l_cod'=>'TH']);

    }
}
