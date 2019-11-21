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
        App\Materiallist::updateOrCreate(['materal_list_name' => 'Naturstein']);
        App\Materiallist::updateOrCreate(['materal_list_name' => 'Fliesen']);
        App\Materiallist::updateOrCreate(['materal_list_name' => 'Kleber']);
        App\Materiallist::updateOrCreate(['materal_list_name' => 'Silicon']);
    }
}
