<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuss', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status');
            $table->string('sort')->nullable($value = true);
            $table->string('css')->nullable($value = true);
            $table->timestamps();
        });

        Schema::table('projekts', function (Blueprint $table) {
            $table->unsignedBigInteger('status_id')->nullable();
            $table->foreign('status_id')->references('id')->on('statuss');

        });

        Schema::table('aufgabenlistes', function (Blueprint $table) {
            $table->unsignedBigInteger('status_id')->nullable();

            $table->foreign('status_id')->references('id')->on('statuss');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()

    {
        Schema::table('aufgabenlistes', function (Blueprint $table) {
$table->dropForeign('aufgabenlistes_status_id_foreign');
$table->dropColumn('status_id',);
});
Schema::table('projekts', function (Blueprint $table) {
   $table->dropForeign('projekts_status_id_foreign');
    $table->dropColumn('status_id',);
    });


        Schema::enableForeignKeyConstraints();

        Schema::dropIfExists('statuss');
    }
}
