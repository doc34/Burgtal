<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLieferantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lieferants', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->text('random');
            $table->string('num')->nullable($value = true);
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
        });

        Schema::table('kundens', function (Blueprint $table) {
            $table->string('lieferantnum')->nullable($value = true);

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('kundens', function (Blueprint $table) {
            $table->dropColumn('lieferantnum');
        });
        Schema::enableForeignKeyConstraints();
        Schema::dropIfExists('lieferantnum');
    }
}
