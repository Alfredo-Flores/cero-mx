<?php

namespace Tests\Feature\Controllers;

use App\TransactionHandler;
use Faker;
use Tests\TestCase;
use Illuminate\Support\Facades\Log;
use Propel\Runtime\Exception\PropelException;

class TblentempFeatureTest extends TestCase
{
    /** @test */
    public function it_can_crud_Tblentemp() {

    //CREATE
        $faker = Faker\Factory::create();
        $trncnn = TransactionHandler::begin();

        $data = [
			'Uuid' => $faker->uuid,
			'Idnentprs' => null,
			'Idngirorg' => null,
			'Nombre' => $faker->text(255),
			'Logo' => $faker->text(255),
			'Direccion' => $faker->text(255),
			'Localidad' => $faker->text(255),
			'Municipio' => $faker->text(255),
			'Entidad' => $faker->text(255),
			'Pais' => $faker->text(255),
			'Codigo' => $faker->numberBetween(0, 9),
			'Tributante' => $faker->text(255),
			'Giro' => $faker->text(255),
			'TelOficina' => $faker->text(255),
			'CorreoOficina' => $faker->text(255),
			'DescripAli' => $faker->text(255),
			'CantDonacion' => $faker->text(255),
			'TiempoConsumo' => $faker->iso8601(),
			'HoraEntrega' => $faker->iso8601(),
			'DetallesEntrega' => $faker->text(255),
			'Creado' => $faker->iso8601(),
			'Actualizado' => $faker->iso8601(),
		];
		$this
			->post(route('Tblentemp.submit'), $data)
			->assertStatus(200)
			->assertSee('"success":true');

// UPDATE
        $update = [
			'Uuid' => $data['Uuid'],
			'idnentprs' => null,
			'idngirorg' => null,
			'Nombre' => $faker->text(255),
			'Logo' => $faker->text(255),
			'Direccion' => $faker->text(255),
			'Localidad' => $faker->text(255),
			'Municipio' => $faker->text(255),
			'Entidad' => $faker->text(255),
			'Pais' => $faker->text(255),
			'Codigo' => $faker->numberBetween(0, 9),
			'Tributante' => $faker->text(255),
			'Giro' => $faker->text(255),
			'TelOficina' => $faker->text(255),
			'CorreoOficina' => $faker->text(255),
			'DescripAli' => $faker->text(255),
			'CantDonacion' => $faker->text(255),
			'temconemp' => null,
			'horentemp' => null,
			'DetallesEntrega' => $faker->text(255),
			'created_at' => null,
			'updated_at' => null,
		];
		$this
			->post(route('Tblentemp.modify'), $update)
			->assertStatus(200)
			->assertSee('"success":true');



//DELETE
		$this
			->post(route('Tblentemp.remove'), $update)
			->assertStatus(200)
			->assertSee('"success":true');
	}
}