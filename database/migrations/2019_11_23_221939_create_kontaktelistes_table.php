<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKontaktelistesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kontaktelistes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('kunden_id')->nullable($value = true);
            $table->unsignedBigInteger('projekt_id')->nullable($value = true);
            $table->unsignedBigInteger('kontakte_id')->nullable($value = true);

            
            $table->foreign('kontakte_id')
                ->references('id')->on('kontaktes')
                ->onDelete('cascade');
            $table->foreign('projekt_id')
                ->references('id')->on('projekts')
                ->onDelete('cascade');
            $table->foreign('kunden_id')
                ->references('id')->on('kundens')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kontaktelistes');
    }
}
