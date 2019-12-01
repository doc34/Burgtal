<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('block');

            $table->double('s_qm', 8, 2)->nullable($value = true);
            $table->double('r_qm', 8, 2)->nullable($value = true);
            $table->double('v_qm', 8, 2)->nullable($value = true);
            $table->string('del')->nullable($value = true);
           
            $table->timestamps();
            $table->unsignedBigInteger('lieferant_id');
            $table->unsignedBigInteger('art_id');
            $table->unsignedBigInteger('stark_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('material_id');
            $table->unsignedBigInteger('materiallist_id');

            $table->foreign('art_id')
                ->references('id')->on('arts');

            $table->foreign('stark_id')
                ->references('id')->on('starcks');

            $table->foreign('user_id')
                ->references('id')->on('users');

            $table->foreign('lieferant_id')
                ->references('id')->on('kundens');


            $table->foreign('material_id')
                ->references('id')->on('materials');

                $table->foreign('materiallist_id')
                ->references('id')->on('materiallists');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blocks');
    }
}
