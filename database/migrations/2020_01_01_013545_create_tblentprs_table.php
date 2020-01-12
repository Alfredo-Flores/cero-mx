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
            $table->Bigincrements('id')->comment('Id');
            $table->uuid('uuid')->unique()->comment('Uuid');
            $table->unsignedInteger('idnentusr')->comment('IdUsuario');
            $table->foreign('idnentusr')->references('id')->on('users');
            $table->unsignedInteger('uidentusr')->comment('UuidUsuario');
            $table->foreign('uidentusr')->references('uuid')->on('users');

            $table->string('crpdtsprs', 18)->default('')->comment('Curp');
            $table->string('rfcdtsprs', 13)->default('')->comment('Rfc');
            $table->string('emllbrprs')->default('')->comment('CorreoLaboral');
            $table->string('emlprsprs')->default('')->comment('CorreoPersonal');
            $table->string('estcvlprs', 1)->default('')->comment('EstadoCivil');
            $table->string('rgmcnyprs', 1)->default('')->comment('EstadoCivil');
            $table->string('ncndtsprs')->default('')->comment('Nacionalidad');
            $table->string('pasnacprs')->default('')->comment('PaisNacio');
            $table->string('estnacprs')->default('')->comment('EstadoNacio');
            $table->string('lgrubcprs',1)->default('')->comment('LugarUbica');
            $table->string('entdtsprs')->default('')->comment('EntidadFed');
            $table->string('mncdtsprs')->default('')->comment('Municipio');
            $table->string('lcldtsprs')->default('')->comment('Localidad');
            $table->string('dmcdtsprs')->default('')->comment('Domicilio');
            $table->string('cdgpstprs', 5)->default('')->comment('Codigo');
            $table->string('tlffijprs', 12)->default('')->comment('TelFijo');
            $table->string('tlfmvlprs',12)->default('')->comment('TelMovil');
            $table->timestampTz('created_at')->nullable()->comment('Creado');
            $table->timestampTz('updated_at')->nullable()->comment('Actualizado');
            $table->timestampTz('finished_at')->nullable()->comment('Terminado');
            $table->string('phoentprs')->nullable()->comment('Foto');
            $table->integer('typentprs')->default(0)->comment('TipoDeInstitución');
        });

        $table = "tblentrep";
        $comment = "Representantes";

        DB::statement("ALTER TABLE " . $table . " COMMENT = '" . $comment . "'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblentrep');
    }
}
