<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblentdncTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblentdnc', function (Blueprint $table) {
            $table->bigIncrements('identdnc');
            $table->unsignedBigInteger('idnentemp')->nullable()->comment('Internal');
            $table->foreign('idnentemp')->references('idnentemp')->on('tblentemp');
            $table->uuid('uuid')->unique()->comment('Uuid');

            $table->string('dscentdnc')->comment('Descripcion');
            $table->string('tipentdnc')->comment('TipoAlimento');
            $table->double('kgsentdnc')->comment('Kilogramos');
            $table->integer('cntcjsdnc')->comment('CantCajas');
            $table->timestampTz('tmprstdnc')->comment('TiempoRestante');

            $table->unsignedBigInteger('idnentorg')->nullable()->comment('Internal');
            $table->foreign('idnentorg')->references('idnentorg')->on('tblentorg');

            $table->boolean('ntrentdnc')->default(false)->comment('BanderaInteresado');
            $table->boolean('rqsentdnc')->default(false)->comment('BanderaPedido');
            $table->boolean('clnentdnc')->default(false)->comment('BanderaCalendarizado');
            $table->boolean('fnsentdnc')->default(false)->comment('BanderaTerminado');

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
        Schema::dropIfExists('tblentdnc');
    }
}
