<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKontaktesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kontaktes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('vorname');
            $table->string('position')->nullable($value = true);
            $table->string('strasse')->nullable($value = true);
            $table->string('plz')->nullable($value = true);
            $table->string('ort')->nullable($value = true);
            $table->string('tel')->nullable($value = true);
            $table->string('fax')->nullable($value = true);
            $table->string('handy')->nullable($value = true);
            $table->string('email')->nullable($value = true);
            $table->string('tel_privat')->nullable($value = true);
            $table->string('geb')->nullable($value = true);
            $table->timestamps();
            $table->unsignedBigInteger('anrede_id');
            $table->unsignedBigInteger('land_id')->nullable($value = true);
            $table->unsignedBigInteger('user_id');

            $table->string('random')->nullable($value = true);
            $table->foreign('anrede_id')
            ->references('id')->on('anredes')
            ->onDelete('cascade');
            $table->foreign('land_id')
            ->references('id')->on('lands')
            ->onDelete('cascade');


        });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kontaktes');
    }
}
