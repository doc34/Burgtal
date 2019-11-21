<?php

use Illuminate\Database\Seeder;

class ArtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comment = App\Art::updateOrCreate(['art' => 'poliert']);
        $comment = App\Art::updateOrCreate(['art' => 'geflammt']);
        $comment = App\Art::updateOrCreate(['art' => 'geschliffen']);
        $comment = App\Art::updateOrCreate(['art' => 'waterjet']);


    }
}
