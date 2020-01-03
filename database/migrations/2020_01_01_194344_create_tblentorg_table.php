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
            $table->increments('idnentorg');
            $table->unsignedInteger('idnusers');
            $table->foreign('idnusers')->references('id')->on('users')->onDelete('cascade');
            $table->string('namentorg');
            $table->string('direntorg');
            $table->string('telentorg');
            $table->string('rfcentorg');
            $table->string('cluentorg');
            $table->string('donentorg')->nullable();
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
        Schema::dropIfExists('tblentorg');
    }
}
