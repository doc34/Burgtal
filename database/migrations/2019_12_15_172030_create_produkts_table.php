<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduktsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produkts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('VK_preis',8,2)->nullable($value = true);;
            $table->string('li_material')->nullable($value = true);
            $table->string('info')->nullable($value = true);
            $table->unsignedBigInteger('user_id')->nullable($value = true);
            $table->unsignedBigInteger('art_id')->nullable($value = true);
            $table->unsignedBigInteger('materiallist_id')->nullable($value = true);
            $table->unsignedBigInteger('material_id')->nullable($value = true);
            $table->unsignedBigInteger('stark_id')->nullable($value = true);
            $table->timestamps();
            $table->foreign('user_id')
            ->references('id')->on('users');
            $table->foreign('art_id')
            ->references('id')->on('arts');
            $table->foreign('materiallist_id')
            ->references('id')->on('materiallists');
            $table->foreign('material_id')
            ->references('id')->on('materials');
            $table->foreign('stark_id')
            ->references('id')->on('starcks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produkts', function (Blueprint $table) {
            $table->dropForeign('produkts_user_id_foreign');
           
            $table->dropForeign('produkts_art_id_foreign');
            $table->dropForeign('produkts_materiallist_id_foreign');
            $table->dropForeign('produkts_material_id_foreign');
            $table->dropForeign('produkts_stark_id_foreign');
        });
        Schema::dropIfExists('produkts');
    }
}
