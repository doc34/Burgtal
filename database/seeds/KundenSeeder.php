<?php

use Illuminate\Database\Seeder;

class KundenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $foo = array(
            array(
                'lieferantconf' => '1',
                'anrede_id' => '1',
                'partnertype_id' => '1',
                'alias' => 'def',
                'name' => 'Meyer',
                'vorname' => 'Bernd',
                'adresse' => 'Altedrorfst 21',
                'plz' => '48165',
                'ort' => 'Münster',
                'and_id' => '1',
                'tel' => '025384445541',
            ),
            array (
                'kundenconfconf' => '',
                'lieferantconf' => '',
            'anrede_id' => '1',
            'partnertype_id' => '1',
            'alias' => 'def',
            'name' => 'Meyer',
            'vorname' => 'Bernd',
            'adresse' => 'Altedrorfst 21',
            'plz' => '48165',
            'ort' => 'Münster',
            'and_id' => '1',
            'tel' => '025384445541'),




        );

    }
}
