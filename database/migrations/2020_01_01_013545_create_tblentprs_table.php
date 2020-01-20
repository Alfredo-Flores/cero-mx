<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTblentprsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblentprs', function (Blueprint $table) {
            $table->Bigincrements('idnentprs')->comment('Id');
            $table->uuid('uuid')->unique()->comment('Uuid');
            $table->unsignedBigInteger('idnentusr')->nullable()->comment('Internal');
            $table->foreign('idnentusr')->references('id')->on('users');
            $table->string('nomentprs')->default('')->comment('Nombre');
            $table->string('prmaplprs')->default('')->comment('PrimerApellido');
            $table->string('sgnaplprs')->default('')->comment('SegundoApellido');
            $table->string('crpentprs', 18)->default('')->comment('Curp');
            $table->string('rfcentprs', 13)->default('')->comment('Rfc');
            $table->string('emllbrprs')->default('')->comment('CorreoLaboral');
            $table->string('emlprsprs')->default('')->comment('CorreoPersonal');
            $table->string('ncnentprs')->default('')->comment('Nacionalidad');
            $table->string('pasentprs')->default('')->comment('Pais');
            $table->string('ententprs')->default('')->comment('EntidadFed');
            $table->string('mncentprs')->default('')->comment('Municipio');
            $table->string('lclentprs')->default('')->comment('Localidad');
            $table->string('dmcentprs')->default('')->comment('Domicilio');
            $table->string('cdgpstprs', 5)->default('')->comment('Codigo');
            $table->string('tlffijprs', 12)->default('')->comment('TelFijo');
            $table->string('tlfmvlprs',12)->default('')->comment('TelMovil');
            $table->string('fotentprs')->nullable()->comment('Foto');
            $table->timestampTz('created_at')->nullable()->comment('Creado');
            $table->timestampTz('updated_at')->nullable()->comment('Actualizado');
        });

        $table = "tblentprs";
        $comment = "Personas";

        DB::statement("ALTER TABLE " . $table . " COMMENT = '" . $comment . "'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblentprs');
    }
}
