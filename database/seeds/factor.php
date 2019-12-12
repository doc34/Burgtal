<?php

use Illuminate\Database\Seeder;

class factor extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comment = App\Factor::updateOrCreate(['factor' => '2.4', 'info'=>'Unmaßtafel']);
        $comment = App\Factor::updateOrCreate(['factor' => '1.5','info'=>'Fliesen']);
        $comment = App\Factor::updateOrCreate(['factor' => '2','info'=>'Sockel']);
    }
}
