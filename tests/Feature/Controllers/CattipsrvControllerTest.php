<?php

namespace Tests\Feature\Controllers;

use App\TransactionHandler;
use Faker;
use Tests\TestCase;
use Illuminate\Support\Facades\Log;
use Propel\Runtime\Exception\PropelException;

class CattipsrvFeatureTest extends TestCase
{
    /** @test */
    public function it_can_crud_Cattipsrv() {

    //CREATE
        $faker = Faker\Factory::create();
        $trncnn = TransactionHandler::begin();

        $data = [
			'Uuid' => $faker->uuid,
			'Tipo' => $faker->text(255),
			'Creado' => $faker->iso8601(),
			'Actualizado' => $faker->iso8601(),
		];
		$this
			->post(route('Cattipsrv.submit'), $data)
			->assertStatus(200)
			->assertSee('"success":true');

// UPDATE
        $update = [
			'Uuid' => $data['Uuid'],
			'Tipo' => $faker->text(255),
			'created_at' => null,
			'updated_at' => null,
		];
		$this
			->post(route('Cattipsrv.modify'), $update)
			->assertStatus(200)
			->assertSee('"success":true');



//DELETE
		$this
			->post(route('Cattipsrv.remove'), $update)
			->assertStatus(200)
			->assertSee('"success":true');
	}
}