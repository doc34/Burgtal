<?php

use Illuminate\Database\Seeder;

class PartnertypSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $partner = App\Partnertyp::updateOrCreate(['partnertyp' => 'Andere']);
        $partner = App\Partnertyp::updateOrCreate(['partnertyp' => 'Großunternehmen']);
        $partner = App\Partnertyp::updateOrCreate(['partnertyp' => 'Kleinunternehmen']);
        $partner = App\Partnertyp::updateOrCreate(['partnertyp' => 'Mittleres- Untenehmen']);
        $partner = App\Partnertyp::updateOrCreate(['partnertyp' => 'Privatperson']);
        $partner = App\Partnertyp::updateOrCreate(['partnertyp' => 'Staatlichtes Unternehmen']);

    }
}

