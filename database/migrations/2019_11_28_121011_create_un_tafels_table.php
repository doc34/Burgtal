<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnTafelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('untafels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('leange');
            $table->integer('breite');
            $table->integer('um_nr')->nullable($value = true);
            $table->double('qm',8,2);
            $table->timestamps();
            $table->unsignedBigInteger('block_id');
            $table->foreign('block_id')
                ->references('id')->on('blocks');
                $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('untafels');
    }
}
