<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblentclnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblentcln', function (Blueprint $table) {
            $table->bigIncrements('idnentcln');
            $table->unsignedBigInteger('idnentemp')->nullable()->comment('Internal');
            $table->foreign('idnentemp')->references('idnentemp')->on('tblentemp');
            $table->unsignedBigInteger('idnentorg')->nullable()->comment('Internal');
            $table->foreign('idnentorg')->references('idnentorg')->on('tblentorg');
            $table->uuid('uuid')->unique()->comment('Uuid');
            $table->integer('prdentcln')->default('0')->comment('Periodicidad');
            $table->timestampTz('fchinccln')->nullable()->comment('FechaInicio');
            $table->timestampTz('fchfnlcln')->nullable()->comment('FechaFinal');

            $table->timestampTz('created_at')->nullable()->comment('Creado');
            $table->timestampTz('updated_at')->nullable()->comment('Actualizado');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblentcln');
    }
}
