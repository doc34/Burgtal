<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Aufgabeteile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aufgabeteiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('teilenum')->nullable($value = true);
            $table->integer('random');
            $table->unsignedBigInteger('aufgabenum_id')->nullable($value = true);
            $table->unsignedBigInteger('user_id')->nullable($value = true);
            $table->timestamps();
            $table->foreign('aufgabenum_id')
            ->references('id')->on('aufgabenummers');
            $table->foreign('user_id')
            ->references('id')->on('users');

        });

        Schema::table('aufgabenlistes', function (Blueprint $table) {

            $table->unsignedBigInteger('aufgabeteile_id')->nullable($value = true);
            $table->foreign('aufgabeteile_id')
                ->references('id')->on('aufgabeteiles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

         Schema::table('aufgabenlistes', function (Blueprint $table) {
             $table->dropForeign('aufgabenlistes_aufgabeteile_id_foreign');
              $table->dropColumn('aufgabeteile_id',);
         });
        Schema::dropIfExists('aufgabeteiles');
    }
}

