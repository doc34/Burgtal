<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjektnummersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projektnummers', function (Blueprint $table) {

                $table->bigIncrements('id');
                $table->text('random');
                $table->string('num')->nullable($value = true);
                $table->unsignedBigInteger('user_id');
                $table->timestamps();
                $table->foreign('user_id')
                ->references('id')->on('users')
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
        Schema::dropIfExists('projektnummers');
    }
}
