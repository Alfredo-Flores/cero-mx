<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCattipsrvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cattipsrv', function (Blueprint $table) {
            $table->bigIncrements('idntipsrv');
            $table->uuid('uuid')->unique()->comment('Uuid');
            $table->string('dsctipsrv')->default('')->comment('Tipo');

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
        Schema::dropIfExists('cattipsrv');
    }
}
