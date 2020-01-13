<?php

namespace Tests\Feature\Controllers;

use App\TransactionHandler;
use Faker;
use Tests\TestCase;
use Illuminate\Support\Facades\Log;
use Propel\Runtime\Exception\PropelException;

class TblentorgFeatureTest extends TestCase
{
    /** @test */
    public function it_can_crud_Tblentorg() {

    //CREATE
        $faker = Faker\Factory::create();
        $trncnn = TransactionHandler::begin();

        $data = [
			'Uuid' => $faker->uuid,
			'Idnentprs' => null,
			'Idngirorg' => null,
			'SegmentoMercado' => $faker->text(255),
			'BenefSemana' => $faker->text(255),
			'Nombre' => $faker->text(255),
			'Logo' => $faker->text(255),
			'Rfc' => $faker->text(255),
			'Domicilio' => $faker->text(255),
			'Localidad' => $faker->text(255),
			'Municipio' => $faker->text(255),
			'Entidad' => $faker->text(255),
			'Pais' => $faker->text(255),
			'CodigoPostal' => $faker->text(255),
			'TelOficina' => $faker->text(255),
			'CorreoOficina' => $faker->text(255),
			'PlanAnual' => $faker->text(255),
			'ActaConstitutiva' => $faker->text(255),
			'ConstanciaDonataria' => $faker->text(255),
			'Creado' => $faker->iso8601(),
			'Actualizado' => $faker->iso8601(),
		];
		$this
			->post(route('Tblentorg.submit'), $data)
			->assertStatus(200)
			->assertSee('"success":true');

// UPDATE
        $update = [
			'Uuid' => $data['Uuid'],
			'idnentprs' => null,
			'idngirorg' => null,
			'SegmentoMercado' => $faker->text(255),
			'BenefSemana' => $faker->text(255),
			'Nombre' => $faker->text(255),
			'Logo' => $faker->text(255),
			'Rfc' => $faker->text(255),
			'Domicilio' => $faker->text(255),
			'Localidad' => $faker->text(255),
			'Municipio' => $faker->text(255),
			'Entidad' => $faker->text(255),
			'Pais' => $faker->text(255),
			'CodigoPostal' => $faker->text(255),
			'TelOficina' => $faker->text(255),
			'CorreoOficina' => $faker->text(255),
			'PlanAnual' => $faker->text(255),
			'ActaConstitutiva' => $faker->text(255),
			'ConstanciaDonataria' => $faker->text(255),
			'created_at' => null,
			'updated_at' => null,
		];
		$this
			->post(route('Tblentorg.modify'), $update)
			->assertStatus(200)
			->assertSee('"success":true');



//DELETE
		$this
			->post(route('Tblentorg.remove'), $update)
			->assertStatus(200)
			->assertSee('"success":true');
	}
}