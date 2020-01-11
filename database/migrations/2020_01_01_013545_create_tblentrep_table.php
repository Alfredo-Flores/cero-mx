<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTblentrepTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblentrep', function (Blueprint $table) {
            $table->Bigincrements('id')->comment('Id');
            $table->uuid('uuid')->unique()->comment('Uuid');
            $table->string('crpdtsgnr', 18)->default('')->comment('Curp');
            $table->string('rfcdtsgnr', 13)->default('')->comment('Rfc');
            $table->string('emllbrgnr')->default('')->comment('CorreoLaboral');
            $table->string('emlprsgnr')->default('')->comment('CorreoPersonal');
            $table->string('estcvlgnr', 1)->default('')->comment('EstadoCivil');
            $table->string('rgmcnygnr', 1)->default('')->comment('EstadoCivil');
            $table->string('ncndtsgnr')->default('')->comment('Nacionalidad');
            $table->string('pasnacgnr')->default('')->comment('PaisNacio');
            $table->string('estnacgnr')->default('')->comment('EstadoNacio');
            $table->string('lgrubcgnr',1)->default('')->comment('LugarUbica');
            $table->string('entdtsgnr')->default('')->comment('EntidadFed');
            $table->string('mncdtsgnr')->default('')->comment('Municipio');
            $table->string('lcldtsgnr')->default('')->comment('Localidad');
            $table->string('dmcdtsgnr')->default('')->comment('Domicilio');
            $table->string('cdgpstgnr', 5)->default('')->comment('Codigo');
            $table->string('tlffijgnr', 12)->default('')->comment('TelFijo');
            $table->string('tlfmvlgnr',12)->default('')->comment('TelMovil');
            $table->timestampTz('created_at')->nullable()->comment('Creado');
            $table->timestampTz('updated_at')->nullable()->comment('Actualizado');
            $table->timestampTz('finished_at')->nullable()->comment('Terminado');
            $table->string('phoentprs')->nullable()->comment('Foto');
            $table->integer('typentprs')->default(0)->comment('TipoDeInstitución');
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
