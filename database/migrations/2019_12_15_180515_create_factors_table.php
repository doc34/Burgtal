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
            $table->double('factor', 4, 2);
            $table->boolean('fix')->nullable()->default(false);
            $table->string('info', 100)->nullable()->default(false);
            $table->timestamps();
        });

        Schema::table('materiallists', function (Blueprint $table) {

            $table->unsignedBigInteger('UMfactor_id')->nullable($value = true);
            $table->foreign('UMfactor_id')
                ->references('id')->on('factors');

        });
        Schema::table('produkts', function (Blueprint $table) {
            $table->boolean('check')->nullable($value = true);
            $table->string('infozusatz')->nullable($value = true);

            $table->unsignedBigInteger('factor_id')->nullable($value = true);
            $table->foreign('factor_id')
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
            $table->dropForeign('materiallists_UMfactor_id_foreign');
             $table->dropColumn('UMfactor_id',);

        });
        Schema::table('produkts', function (Blueprint $table) {
            $table->dropForeign('produkts_factor_id_foreign');
             $table->dropColumn('factor_id',);

        });
        Schema::dropIfExists('factors');
    }
}
