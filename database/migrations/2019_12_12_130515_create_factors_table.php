<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('factors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('factor', 4, 2)->nullable($value = true);
            $table->boolean('fix')->nullable()->default(false);
            $table->string('info', 100)->nullable()->default(false);
            $table->timestamps();
        });

        Schema::table('materiallists', function (Blueprint $table) {

            $table->unsignedBigInteger('1_factor_id')->nullable($value = true);
            $table->foreign('1_factor_id')
                ->references('id')->on('factors');

        });
        Schema::table('preisliestes', function (Blueprint $table) {
            $table->string('tag')->nullable($value = true);
            $table->string('infozusatz')->nullable($value = true);

            $table->unsignedBigInteger('2_factor_id')->nullable($value = true);
            $table->foreign('2_factor_id')
                ->references('id')->on('factors');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('materiallists', function (Blueprint $table) {
            $table->dropForeign('materiallists_1_factor_id_foreign');
             $table->dropColumn('1_factor_id',);

        });
        Schema::table('preisliestes', function (Blueprint $table) {
            $table->dropForeign('preisliestes_2_factor_id_foreign');
             $table->dropColumn('2_factor_id',);

        });
        Schema::dropIfExists('factors');
    }
}
