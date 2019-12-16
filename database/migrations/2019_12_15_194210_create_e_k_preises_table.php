<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEKPreisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ekpreises', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('EKpreis', 8, 2);
            $table->boolean('activ')->nullable($value = true);
            $table->string('material_name')->nullable($value = true);
            $table->date('gültig')->nullable($value = true);
            $table->string('info')->nullable($value = true);
            $table->timestamps();
            $table->unsignedBigInteger('produkt_id');
            $table->foreign('produkt_id')
                ->references('id')->on('produkts');
            $table->unsignedBigInteger('kunde_id');
            $table->foreign('kunde_id')
                ->references('id')->on('kundens');
                $table->unsignedBigInteger('material_id');
            $table->foreign('material_id')
                ->references('id')->on('materials');
        });

        Schema::table('produkts', function (Blueprint $table) {
            $table->unsignedBigInteger('ekpreis_id')->nullable($value = true);
            $table->foreign('ekpreis_id')
                ->references('id')->on('ekpreises');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ekpreises', function (Blueprint $table) {
            $table->dropForeign('ekpreises_kunde_id_foreign');
            $table->dropColumn('kunde_id', );
            $table->dropForeign('ekpreises_produkt_id_foreign');
            $table->dropColumn('produkt_id', );
            $table->dropForeign('ekpreises_material_id_foreign');
            $table->dropColumn('material_id', );
            $table->dropForeign('ekpreises_ekpreis_id_foreign');
            $table->dropColumn('ekpreis_id', );
        });

        Schema::dropIfExists('ekpreises');
    }
}
