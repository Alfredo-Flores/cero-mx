<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblentorgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblentorg', function (Blueprint $table) {
            $table->Bigincrements('idnentorg')->comment('Id');
            $table->uuid('uuid')->unique()->comment('Uuid');
            $table->unsignedBigInteger('idnentprs')->nullable()->comment('Representante');
            $table->foreign('idnentprs')->references('idnentprs')->on('tblentprs');
            $table->string('srventorg')->default('')->comment('Servicios');
            $table->string('sgmentorg')->default('')->comment('SegmentoMercado');
            $table->string('bnfentorg')->default('')->comment('Beneficiarios');
            $table->string('nmbentorg')->default('')->comment('Nombre');
            $table->string('logentorg')->default('')->comment('Logo');
            $table->string('dmcentorg')->default('')->comment('Domicilio');
            $table->string('lclentorg')->default('')->comment('Localidad');
            $table->string('mncentorg')->default('')->comment('Municipio');
            $table->string('etdentorg')->default('')->comment('Entidad');
            $table->string('pasentorg')->default('')->comment('Pais');
            $table->string('cdgpstorg')->default('')->comment('CodigoPostal');
            $table->string('girentorg')->default('')->comment('Giro');
            $table->string('tlffcnorg')->default('')->comment('TelOficina');
            $table->string('emlfcnorg')->default('')->comment('CorreoOficina');
            $table->string('plntrborg')->default('')->comment('PlanAnual');
            $table->string('actcnsorg')->default('')->comment('ActaConstitutiva');
            $table->string('cnsdntorg')->default('')->comment('ConstanciaDonataria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblentorg');
    }
}
