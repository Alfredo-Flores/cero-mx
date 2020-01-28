<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTblentempTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblentemp', function (Blueprint $table) {
            $table->Bigincrements('idnentemp')->comment('Id');
            $table->uuid('uuid')->unique()->comment('Uuid');
            $table->unsignedBigInteger('idnentprs')->nullable()->comment('Internal');
            $table->foreign('idnentprs')->references('idnentprs')->on('tblentprs');
            $table->string('namentemp')->default('')->comment('Nombre');
            $table->string('logentemp')->default('')->comment('Logo');
            $table->string('drcentemp')->default('')->comment('Direccion');
            $table->string('lclentemp')->default('')->comment('Localidad');
            $table->string('mncentemp')->default('')->comment('Municipio');
            $table->string('ententemp')->default('')->comment('Entidad');
            $table->string('pasentorg')->default('')->comment('Pais');
            $table->integer('cdgpstemp')->default(0)->comment('Codigo');
            $table->string('cdgtrbemp')->default('')->comment('Tributante');
            $table->string('girentemp')->default('')->comment('Giro');
            $table->string('tlfofiemp')->default('')->comment('TelOficina');
            $table->string('emlofiemp')->default('')->comment('CorreoOficina');
            $table->string('desaliemp')->default('')->comment('DescripAli');
            $table->string('candonemp')->default('')->comment('CantDonacion');
            $table->string('temconemp')->nullable()->comment('TiempoConsumo');
            $table->string('horentemp')->nullable()->comment('HoraEntrega');
            $table->string('detentemo')->default('')->comment('DetallesEntrega');
            $table->timestampTz('created_at')->nullable()->comment('Creado');
            $table->timestampTz('updated_at')->nullable()->comment('Actualizado');

            $table->json('hstentemp')->nullable()->comment('Historial');
        });

        $table = "tblentemp";
        $comment = "Empresas";

        DB::statement("ALTER TABLE " . $table . " COMMENT = '" . $comment . "'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblentemp');
    }
}
