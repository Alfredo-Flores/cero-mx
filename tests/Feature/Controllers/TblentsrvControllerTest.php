<?php

namespace Tests\Feature\Controllers;

use App\TransactionHandler;
use Faker;
use Tests\TestCase;
use Illuminate\Support\Facades\Log;
use Propel\Runtime\Exception\PropelException;

class TblentsrvFeatureTest extends TestCase
{
    /** @test */
    public function it_can_crud_Tblentsrv() {

    //CREATE
        $faker = Faker\Factory::create();
        $trncnn = TransactionHandler::begin();

        $data = [
			'Idntipsrv' => null,
			'Idngirorg' => null,
			'Uuid' => $faker->uuid,
			'Creado' => $faker->iso8601(),
			'Actualizado' => $faker->iso8601(),
		];
		$this
			->post(route('Tblentsrv.submit'), $data)
			->assertStatus(200)
			->assertSee('"success":true');

// UPDATE
        $update = [
			'idntipsrv' => null,
			'idngirorg' => null,
			'Uuid' => $data['Uuid'],
			'created_at' => null,
			'updated_at' => null,
		];
		$this
			->post(route('Tblentsrv.modify'), $update)
			->assertStatus(200)
			->assertSee('"success":true');



//DELETE
		$this
			->post(route('Tblentsrv.remove'), $update)
			->assertStatus(200)
			->assertSee('"success":true');
	}
}