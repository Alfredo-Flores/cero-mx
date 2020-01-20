<?php

namespace Tests\Feature\Controllers;

use App\TransactionHandler;
use Faker;
use Tests\TestCase;
use Illuminate\Support\Facades\Log;
use Propel\Runtime\Exception\PropelException;

class TblentdncFeatureTest extends TestCase
{
    /** @test */
    public function it_can_crud_Tblentdnc() {

    //CREATE
        $faker = Faker\Factory::create();
        $trncnn = TransactionHandler::begin();

        $data = [
			'Idnentemp' => null,
			'Uuid' => $faker->uuid,
			'Descripcion' => $faker->text(255),
			'TipoAlimento' => $faker->text(255),
			'Kilogramos' => 0.1,
			'CantCajas' => $faker->numberBetween(0, 9),
			'TiempoRestante' => $faker->numberBetween(0, 9),
			'Creado' => $faker->iso8601(),
			'Actualizado' => $faker->iso8601(),
		];
		$this
			->post(route('Tblentdnc.submit'), $data)
			->assertStatus(200)
			->assertSee('"success":true');

// UPDATE
        $update = [
			'idnentemp' => null,
			'Uuid' => $data['Uuid'],
			'Descripcion' => $faker->text(255),
			'TipoAlimento' => $faker->text(255),
			'Kilogramos' => $faker->randomFloat(),
			'CantCajas' => $faker->numberBetween(0, 9),
			'TiempoRestante' => $faker->numberBetween(0, 9),
			'created_at' => null,
			'updated_at' => null,
		];
		$this
			->post(route('Tblentdnc.modify'), $update)
			->assertStatus(200)
			->assertSee('"success":true');



//DELETE
		$this
			->post(route('Tblentdnc.remove'), $update)
			->assertStatus(200)
			->assertSee('"success":true');
	}
}
