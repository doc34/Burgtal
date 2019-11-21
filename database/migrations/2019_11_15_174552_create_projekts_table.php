<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjektsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projekts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('projektnummer')->nullable($value = true);
            $table->string('projektname')->nullable($value = true);
            $table->boolean('projektcloss')->nullable($value = true);
            $table->string('projektleiter')->nullable($value = true);
            $table->longText('info')->nullable($value = true);
            $table->date('start')->nullable($value = true);
            $table->date('ende')->nullable($value = true);
            $table->longText('bschreibung')->nullable($value = true);
            $table->unsignedBigInteger('kunden_id');
            $table->timestamps();
            $table->foreign('kunden_id')
                ->references('id')->on('kundens')
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
        Schema::enableForeignKeyConstraints();
        Schema::dropIfExists('projekts');
    }
}
