<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblentintTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblentint', function (Blueprint $table) {
            $table->increments('idnentint');
            $table->unsignedInteger('idnusers');
            $table->foreign('idnusers')->references('id')->on('users')->onDelete('cascade');
            $table->string('namentint');
            $table->string('direntint');
            $table->string('telentint');
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
        Schema::dropIfExists('tblentint');
    }
}
