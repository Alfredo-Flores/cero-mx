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
            $table->unsignedBigInteger('idnentprs')->nullable()->comment('Internal');
            $table->foreign('idnentprs')->references('idnentprs')->on('tblentprs');
            $table->string('sgmentorg')->default('')->comment('SegmentoMercado');
            $table->string('bnfentorg')->default('')->comment('BenefSemana');
            $table->string('nmbentorg')->default('')->comment('Nombre');
            $table->string('logentorg')->default('')->comment('Logo');
            $table->string('rfcentorg')->default('')->comment('Rfc');
            $table->string('dmcentorg')->default('')->comment('Domicilio');
            $table->string('lclentorg')->default('')->comment('Localidad');
            $table->string('mncentorg')->default('')->comment('Municipio');
            $table->string('etdentorg')->default('')->comment('Entidad');
            $table->string('pasentorg')->default('')->comment('Pais');
            $table->string('cdgpstorg')->default('')->comment('CodigoPostal');
            $table->string('tlffcnorg')->default('')->comment('TelOficina');
            $table->string('emlfcnorg')->default('')->comment('CorreoOficina');
            $table->string('plntrborg')->default('')->comment('PlanAnual');
            $table->string('actcnsorg')->default('')->comment('ActaConstitutiva');
            $table->string('cnsdntorg')->default('')->comment('ConstanciaDonataria');
            $table->timestampTz('created_at')->nullable()->comment('Creado');
            $table->timestampTz('updated_at')->nullable()->comment('Actualizado');

            $table->json('hstentorg')->nullable()->comment('Historial');
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
