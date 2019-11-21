<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class Kunden_Art extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comment = App\KundenArt::updateOrCreate(['kunden_art' => 'Kunde']);
        $comment = App\KundenArt::updateOrCreate(['kunden_art' => 'Lieferant']);
        $comment = App\KundenArt::updateOrCreate(['kunden_art' => 'Kunde und Lieferant']);

    }
}
