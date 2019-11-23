<?php

use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Status::updateOrCreate(['status' => 'Entwurf', 'sort'=>'1']);
        App\Status::updateOrCreate(['status' => 'Geschäftanbanung', 'sort'=>'1']);
        App\Status::updateOrCreate(['status' => 'Angebot', 'sort'=>'2']);
        App\Status::updateOrCreate(['status' => 'Verhandlung', 'sort'=>'3']);
        App\Status::updateOrCreate(['status' => 'Gewonnen', 'sort'=>'4']);
        App\Status::updateOrCreate(['status' => 'Produktion', 'sort'=>'5']);
        App\Status::updateOrCreate(['status' => 'Werkstatt-Säge', 'sort'=>'6']);
        App\Status::updateOrCreate(['status' => 'Werkstatt-Kantenautomat', 'sort'=>'7']);
        App\Status::updateOrCreate(['status' => 'Werkstatt-Kanten', 'sort'=>'8']);
        App\Status::updateOrCreate(['status' => 'Werkstatt-Verpacken', 'sort'=>'9']);
        App\Status::updateOrCreate(['status' => 'Produktion Abgeschlossen', 'sort'=>'10']);
        App\Status::updateOrCreate(['status' => 'Abgeholt', 'sort'=>'11']);
        App\Status::updateOrCreate(['status' => 'Geschlossen', 'sort'=>'12']);


    }
}
