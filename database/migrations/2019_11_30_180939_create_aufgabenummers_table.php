<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAufgabenummersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {




        Schema::create('aufgabenummers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('random')->nullable($value = true);
            $table->string('aufgabenum')->nullable($value = true);
            $table->string('titel')->nullable($value = true);
            $table->longText('info')->nullable($value = true);
            $table->longText('beschreibung')->nullable($value = true);
            $table->unsignedBigInteger('projekt_id')->nullable($value = true);
            $table->unsignedBigInteger('status_id')->nullable($value = true);
            $table->unsignedBigInteger('user_id')->nullable($value = true);
            $table->timestamps();
            $table->foreign('status_id')
                ->references('id')->on('statuss');
            $table->foreign('projekt_id')
                ->references('id')->on('projekts');
            $table->foreign('user_id')
                ->references('id')->on('users');
        });

        Schema::table('kontaktelistes', function (Blueprint $table) {

            $table->unsignedBigInteger('aufgabenum_id')->nullable($value = true);
            $table->foreign('aufgabenum_id')
                ->references('id')->on('kontaktelistes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kontaktelistes', function (Blueprint $table) {
            $table->dropForeign('kontaktelistes_aufgabenum_id_foreign');
             $table->dropColumn('aufgabenum_id',);
        });

        Schema::dropIfExists('aufgabenummers');
    }
}
