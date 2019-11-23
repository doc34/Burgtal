<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProjektTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projekts', function (Blueprint $table) {

            $table->string('random')->nullable($value = true);
            $table->string('statuscss')->nullable($value = true);

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projekts', function (Blueprint $table) {
            $table->dropColumn('random','statuscss');
        });
    }
}
