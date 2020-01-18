<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('Id');
            $table->uuid('uuid')->unique()->comment('Uuid');
            $table->string('email')->comment('Correo');
            $table->timestamp('email_verified_at')->nullable()->comment('Internal');
            $table->string('password')->comment('Contraseña');
            $table->timestampTz('created_at')->nullable()->comment('Creado');
            $table->timestampTz('updated_at')->nullable()->comment('Actualizado');
            $table->rememberToken()->comment('Internal');
            $table->boolean('isinstitution')->default(0)->comment('CondicionalInstitucion');
        });

        $table = "users";
        $comment = "Usuarios";

        DB::statement("ALTER TABLE " . $table . " COMMENT = '" . $comment . "'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
