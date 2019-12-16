<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*  $this->call( Land::class);
        $this->call( PartnertypSeeder::class);
        $this->call( RechtsformSeeder::class);
        $this->call( AnredeSeeder::class);
        $this->call( ArtSeeder::class);
        $this->call( MaterialSeeder::class);

        $this->call( StarkSeeder::class);

        $this->call( StatusSeeder::class); */

        $this->call(BurgtalconfSeeder::class);
        $this->call(factor::class);
        $this->call(format::class);
        $this->call(MaterialList::class);
    }
}
