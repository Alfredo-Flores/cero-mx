<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblentsrvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblentsrv', function (Blueprint $table) {
            $table->bigIncrements('idnentsrv');
            $table->unsignedBigInteger('idntipsrv')->nullable()->comment('Internal');
            $table->foreign('idntipsrv')->references('idntipsrv')->on('cattipsrv');
            $table->unsignedBigInteger('idngirorg')->nullable()->comment('Internal');
            $table->foreign('idngirorg')->references('idngirorg')->on('catgirorg');
            $table->uuid('uuid')->unique()->comment('Uuid');

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
        Schema::dropIfExists('tblentsrv');
    }
}
