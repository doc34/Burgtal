<?php

use Illuminate\Database\Seeder;

class MaterialList extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //materal_list_name'
        App\Materiallist::updateOrCreate(['materal_list_name' => 'Unmaßtafel', 'materal_list_cod'=>'UM', 'mass'=>'qm' ]);
        App\Materiallist::updateOrCreate(['materal_list_name' => 'Fliesen', 'materal_list_cod'=>'FL','mass'=>'qm'  ]);
        App\Materiallist::updateOrCreate(['materal_list_name' => 'Sockel', 'materal_list_cod'=>'SO', 'mass'=>'m' ]);
        App\Materiallist::updateOrCreate(['materal_list_name' => 'Silicon', 'materal_list_cod'=>'SL', 'mass'=>'ml']);
        App\Materiallist::updateOrCreate(['materal_list_name' => 'Akepox', 'materal_list_cod'=>'AK', 'mass'=>'g']);
    }
}
