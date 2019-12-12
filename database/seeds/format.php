<?php

use Illuminate\Database\Seeder;

class format extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comment = App\Format::updateOrCreate(['format' => '7/1', 'format_info' => 'Sockel']);
        $comment = App\Format::updateOrCreate(['format' => '30,5 x 30,5', 'format_info' => 'Fliesen']);
        $comment = App\Format::updateOrCreate(['format' => '61 x 30,5', 'format_info' => 'Fliesen']);
        $comment = App\Format::updateOrCreate(['format' => '40 x 40','format_info' => 'Fliesen']);
        $comment = App\Format::updateOrCreate(['format' => '60 x 40','format_info' => 'Fliesen']);
        $comment = App\Format::updateOrCreate(['format' => '40','format_info' => 'Bahnen']);
        $comment = App\Format::updateOrCreate(['format' => '30','format_info' => 'Bahnen']);
        $comment = App\Format::updateOrCreate(['format' => '60','format_info' => 'Bahnen']);

    }
}
