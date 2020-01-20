<?php

namespace Tests\Feature\Controllers;

use App\TransactionHandler;
use Faker;
use Tests\TestCase;
use Illuminate\Support\Facades\Log;
use Propel\Runtime\Exception\PropelException;

class TblentclnFeatureTest extends TestCase
{
    /** @test */
    public function it_can_crud_Tblentcln() {

    //CREATE
        $faker = Faker\Factory::create();
        $trncnn = TransactionHandler::begin();

        $data = [
			'Idnentemp' => null,
			'Idnentorg' => null,
			'Uuid' => $faker->uuid,
			'Periodicidad' => $faker->numberBetween(0, 9),
			'FechaInicio' => $faker->iso8601(),
			'FechaFinal' => $faker->iso8601(),
			'Creado' => $faker->iso8601(),
			'Actualizado' => $faker->iso8601(),
		];
		$this
			->post(route('Tblentcln.submit'), $data)
			->assertStatus(200)
			->assertSee('"success":true');

// UPDATE
        $update = [
			'idnentemp' => null,
			'idnentorg' => null,
			'Uuid' => $data['Uuid'],
			'Periodicidad' => $faker->numberBetween(0, 9),
			'fchinccln' => null,
			'fchfnlcln' => null,
			'created_at' => null,
			'updated_at' => null,
		];
		$this
			->post(route('Tblentcln.modify'), $update)
			->assertStatus(200)
			->assertSee('"success":true');



//DELETE
		$this
			->post(route('Tblentcln.remove'), $update)
			->assertStatus(200)
			->assertSee('"success":true');
	}
}