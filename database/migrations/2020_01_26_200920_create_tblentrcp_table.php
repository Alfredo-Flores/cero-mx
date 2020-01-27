<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblentrcpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblentrcp', function (Blueprint $table) {
            $table->bigIncrements('idnentrcp');
            $table->unsignedBigInteger('idnentemp')->nullable()->comment('Internal');
            $table->foreign('idnentemp')->references('idnentemp')->on('tblentemp');
            $table->unsignedBigInteger('idnentorg')->nullable()->comment('Internal');
            $table->foreign('idnentorg')->references('idnentorg')->on('tblentorg');
            $table->unsignedBigInteger('idnentcln')->nullable()->comment('Internal');
            $table->foreign('idnentcln')->references('idnentcln')->on('tblentcln');
            $table->uuid('uuid')->unique()->comment('Uuid');

            $table->timestampTz('fchinccln')->nullable()->comment('Fecha');

            $table->string('tipentrcp')->comment('TipoAlimento');
            $table->double('kgsentrcp')->comment('Kilogramos');
            $table->integer('cntcjsrcp')->comment('CantCajas');
            $table->float('rtnentcln')->default('0')->comment('Rating');

            $table->boolean('vldentcln')->default(false)->comment('BanderaEvaluado');
            $table->boolean('fnsentcln')->default(false)->comment('BanderaTerminado');

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
        Schema::dropIfExists('tblentrcp');
    }
}
