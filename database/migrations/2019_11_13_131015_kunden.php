<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Kunden extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kundens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('kundeconf')->nullable($value = true);
            $table->boolean('lieferantconf')->nullable($value = true);
            $table->unsignedBigInteger('anrede_id');
            $table->unsignedBigInteger('partnertype_id');
            $table->string('alias')->nullable($value = true);
            $table->string('name');
            $table->string('vorname');
            $table->string('adresse');
            $table->string('plz');
            $table->string('ort');
            $table->string('kundennum')->nullable($value = true);
            
            $table->string('tel')->nullable($value = true);
            $table->string('handy')->nullable($value = true);
            $table->string('email')->nullable($value = true);
            $table->string('steuernumme')->nullable($value = true);
            $table->string('amsgericht')->nullable($value = true);
            $table->string('handelnummer')->nullable($value = true);
            $table->boolean('umsatzsteuerpflichtig')->nullable($value = true);
            $table->string('umsatzsteuer_id')->nullable($value = true);
            $table->unsignedBigInteger('land_id');
            $table->unsignedBigInteger('rechtsform_id')->nullable($value = true);;
            $table->unsignedBigInteger('user_id');

            $table->timestamps();

            $table->foreign('anrede_id')
                ->references('id')->on('anredes')
                ->onDelete('cascade');
            $table->foreign('land_id')
                ->references('id')->on('lands')
                ->onDelete('cascade');
            $table->foreign('rechtsform_id')
                ->references('id')->on('rechtsforms')
                ->onDelete('cascade');
            $table->foreign('partnertype_id')
                ->references('id')->on('partnertyps')
                ->onDelete('cascade');
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
        Schema::dropIfExists('kundens');
    }
}
