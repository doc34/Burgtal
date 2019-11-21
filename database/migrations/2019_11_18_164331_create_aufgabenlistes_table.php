<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAufgabenlistesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aufgabenlistes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('a_num');
            $table->bigInteger('laenge');
            $table->bigInteger('breite');
            $table->string('VK');
            $table->string('UK');
            $table->string('KL')->nullable($value = true);
            $table->string('KR')->nullable($value = true);
            $table->string('KH')->nullable($value = true);
            $table->string('SK')->nullable($value = true);
            $table->longText('svgpath')->nullable($value = true);
            $table->decimal('qm',8,2)->nullable($value = true);;
            $table->unsignedBigInteger('art_id');
            $table->unsignedBigInteger('stark_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('projekt_id');
            $table->unsignedBigInteger('material_id');
            $table->timestamps();

            $table->foreign('art_id')
            ->references('id')->on('arts')
            ->onDelete('cascade');
            $table->foreign('stark_id')
            ->references('id')->on('starcks')
            ->onDelete('cascade');
            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
            $table->foreign('projekt_id')
            ->references('id')->on('projekts')
            ->onDelete('cascade');
            $table->foreign('material_id')
            ->references('id')->on('materials')
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
        Schema::dropIfExists('aufgabenlistes');
    }
}
