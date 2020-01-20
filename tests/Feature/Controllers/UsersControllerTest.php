<?php

namespace Tests\Feature\Controllers;

use App\TransactionHandler;
use Faker;
use Tests\TestCase;
use Illuminate\Support\Facades\Log;
use Propel\Runtime\Exception\PropelException;

class UsersFeatureTest extends TestCase
{
    /** @test */
    public function it_can_crud_Users() {

    //CREATE
        $faker = Faker\Factory::create();
        $trncnn = TransactionHandler::begin();

        $data = [
			'Uuid' => $faker->uuid,
			'Correo' => $faker->text(255),
			'Internal' => $faker->iso8601(),
			'Contraseña' => $faker->text(255),
			'Creado' => $faker->iso8601(),
			'Actualizado' => $faker->iso8601(),
			'Internal' => $faker->text(100),
		];
		$this
			->post(route('Users.submit'), $data)
			->assertStatus(200)
			->assertSee('"success":true');

// UPDATE
        $update = [
			'Uuid' => $data['Uuid'],
			'Correo' => $faker->text(255),
			'email_verified_at' => null,
			'Contraseña' => $faker->text(255),
			'created_at' => null,
			'updated_at' => null,
			'remember_token' => null,
		];
		$this
			->post(route('Users.modify'), $update)
			->assertStatus(200)
			->assertSee('"success":true');



//DELETE
		$this
			->post(route('Users.remove'), $update)
			->assertStatus(200)
			->assertSee('"success":true');
	}
}