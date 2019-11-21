<?php

use Illuminate\Database\Seeder;

class RechtsformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $recht = App\Rechtsform::updateOrCreate(['rechtform' => 'Geselschaft des bürrgerlichen Rechts', 'recht_cod'=>'GbR']);
        $recht = App\Rechtsform::updateOrCreate(['rechtform' => 'Personengeselschaft', 'recht_cod'=>'Gewerbe']);
        $recht = App\Rechtsform::updateOrCreate(['rechtform' => 'Geselschaft mit beschränkter Haftung', 'recht_cod'=>'GmbH']);
        $recht = App\Rechtsform::updateOrCreate(['rechtform' => 'Geselschaft mit beschränkter Haftung Compagnie Kommanditgesellschaft', 'recht_cod'=>'GmbH&Co.KG']);
        $recht = App\Rechtsform::updateOrCreate(['rechtform' => 'Offene Handelsgesellschaft', 'recht_cod'=>'OHG']);
        $recht = App\Rechtsform::updateOrCreate(['rechtform' => 'Kommanditgesellschaft', 'recht_cod'=>'KG']);
        $recht = App\Rechtsform::updateOrCreate(['rechtform' => 'Limited Company', 'recht_cod'=>'Ltd']);
        $recht = App\Rechtsform::updateOrCreate(['rechtform' => 'Unternehmergeselschaft - haftungsbeschränkt', 'recht_cod'=>'UG']);



    }
}

