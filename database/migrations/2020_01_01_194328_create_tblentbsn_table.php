<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblentbsnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblentbsn', function (Blueprint $table) {
            $table->increments('idnentbsn');
            $table->unsignedInteger('idnusers');
            $table->foreign('idnusers')->references('id')->on('users');
            $table->string('namentbsn');
            $table->string('direntbsn');
            $table->string('telentbsn');
            $table->string('rfcentbsn');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblentbsn');
    }
}
