<?php

namespace Tests\Feature\Controllers;

use App\TransactionHandler;
use Faker;
use Tests\TestCase;
use Illuminate\Support\Facades\Log;
use Propel\Runtime\Exception\PropelException;

class CatgirorgFeatureTest extends TestCase
{
    /** @test */
    public function it_can_crud_Catgirorg() {

    //CREATE
        $faker = Faker\Factory::create();
        $trncnn = TransactionHandler::begin();

        $data = [
			'Uuid' => $faker->uuid,
			'Giro' => $faker->text(255),
			'Creado' => $faker->iso8601(),
			'Actualizado' => $faker->iso8601(),
		];
		$this
			->post(route('Catgirorg.submit'), $data)
			->assertStatus(200)
			->assertSee('"success":true');

// UPDATE
        $update = [
			'Uuid' => $data['Uuid'],
			'Giro' => $faker->text(255),
			'created_at' => null,
			'updated_at' => null,
		];
		$this
			->post(route('Catgirorg.modify'), $update)
			->assertStatus(200)
			->assertSee('"success":true');



//DELETE
		$this
			->post(route('Catgirorg.remove'), $update)
			->assertStatus(200)
			->assertSee('"success":true');
	}
}