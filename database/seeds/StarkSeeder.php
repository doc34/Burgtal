<?php

use Illuminate\Database\Seeder;

class StarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comment = App\Starck::updateOrCreate(['stark' => '1']);
        $comment = App\Starck::updateOrCreate(['stark' => '1,3']);
        $comment = App\Starck::updateOrCreate(['stark' => '1,5']);
        $comment = App\Starck::updateOrCreate(['stark' => '2']);
        $comment = App\Starck::updateOrCreate(['stark' => '3']);
        $comment = App\Starck::updateOrCreate(['stark' => '3+3']);
        $comment = App\Starck::updateOrCreate(['stark' => '4']);
        $comment = App\Starck::updateOrCreate(['stark' => '6']);
        $comment = App\Starck::updateOrCreate(['stark' => '8']);

    }
}
