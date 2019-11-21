<?php

use Illuminate\Database\Seeder;

class AnredeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $anrede = App\Anrede::updateOrCreate(['anrede' => 'Frau']);
        $anrede = App\Anrede::updateOrCreate(['anrede' => 'Herr']);
        $anrede = App\Anrede::updateOrCreate(['anrede' => 'Familie']);
        $anrede = App\Anrede::updateOrCreate(['anrede' => 'Firma']);
        $anrede = App\Anrede::updateOrCreate(['anrede' => 'Dr.']);
    }
}
