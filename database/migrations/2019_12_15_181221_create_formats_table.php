<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('format')->nullable($value = true);
            $table->string('tag', 100)->nullable($value = true);
            $table->string('format_info', 100)->nullable($value = true);
            $table->timestamps();
        });
        Schema::table('produkts', function (Blueprint $table) {
            $table->unsignedBigInteger('format_id')->nullable($value = true);
            $table->foreign('format_id')
                ->references('id')->on('formats');

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
            $table->dropForeign('produkts_format_id_foreign');
             $table->dropColumn('format_id',);

        });

        Schema::dropIfExists('formats');
    }
}
