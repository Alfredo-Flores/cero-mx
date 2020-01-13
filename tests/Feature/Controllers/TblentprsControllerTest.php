<?php

namespace Tests\Feature\Controllers;

use App\TransactionHandler;
use Faker;
use Tests\TestCase;
use Illuminate\Support\Facades\Log;
use Propel\Runtime\Exception\PropelException;

class TblentprsFeatureTest extends TestCase
{
    /** @test */
    public function it_can_crud_Tblentprs() {

    //CREATE
        $faker = Faker\Factory::create();
        $trncnn = TransactionHandler::begin();

        $data = [
			'Uuid' => $faker->uuid,
			'Idnentusr' => null,
			'Nombre' => $faker->text(255),
			'PrimerApellido' => $faker->text(255),
			'SegundoApellido' => $faker->text(255),
			'Curp' => $faker->text(18),
			'Rfc' => $faker->text(13),
			'CorreoLaboral' => $faker->text(255),
			'CorreoPersonal' => $faker->text(255),
			'Nacionalidad' => $faker->text(255),
			'Pais' => $faker->text(255),
			'EntidadFed' => $faker->text(255),
			'Municipio' => $faker->text(255),
			'Localidad' => $faker->text(255),
			'Domicilio' => $faker->text(255),
			'Codigo' => $faker->text(5),
			'TelFijo' => $faker->text(12),
			'TelMovil' => $faker->text(12),
			'Foto' => $faker->text(255),
			'Creado' => $faker->iso8601(),
			'Actualizado' => $faker->iso8601(),
		];
		$this
			->post(route('Tblentprs.submit'), $data)
			->assertStatus(200)
			->assertSee('"success":true');

// UPDATE
        $update = [
			'Uuid' => $data['Uuid'],
			'idnentusr' => null,
			'Nombre' => $faker->text(255),
			'PrimerApellido' => $faker->text(255),
			'SegundoApellido' => $faker->text(255),
			'Curp' => $faker->text(18),
			'Rfc' => $faker->text(13),
			'CorreoLaboral' => $faker->text(255),
			'CorreoPersonal' => $faker->text(255),
			'Nacionalidad' => $faker->text(255),
			'Pais' => $faker->text(255),
			'EntidadFed' => $faker->text(255),
			'Municipio' => $faker->text(255),
			'Localidad' => $faker->text(255),
			'Domicilio' => $faker->text(255),
			'Codigo' => $faker->text(5),
			'TelFijo' => $faker->text(12),
			'TelMovil' => $faker->text(12),
			'fotentprs' => null,
			'created_at' => null,
			'updated_at' => null,
		];
		$this
			->post(route('Tblentprs.modify'), $update)
			->assertStatus(200)
			->assertSee('"success":true');



//DELETE
		$this
			->post(route('Tblentprs.remove'), $update)
			->assertStatus(200)
			->assertSee('"success":true');
	}
}