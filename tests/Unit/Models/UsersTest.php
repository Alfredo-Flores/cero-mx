<?php

namespace Tests\Unit\Models;

use App\TransactionHandler;
use Faker;
use Tests\TestCase;
use Illuminate\Support\Facades\Log;
use Propel\Runtime\Exception\PropelException;

class UsersUnitTest extends TestCase
{
    /** @test */
    public function it_can_crud_Users()
    {
//CREATE
        $faker = Faker\Factory::create();
        $trncnn = TransactionHandler::begin();

        $data = [
			'uuid' => $faker->text(36),
			'email' => $faker->text(255),
			'email_verified_at' => $faker->iso8601(),
			'password' => $faker->text(255),
			'created_at' => $faker->iso8601(),
			'updated_at' => $faker->iso8601(),
			'remember_token' => $faker->text(100),
		];
        $result = \Users::crtusers($data, $trncnn);
        self::assertInstanceOf(\Users::class, $result);
		self::assertEquals($data['uuid'], $result->getUuid(), 'Valor inserción no concuerda en uuid');
		self::assertEquals($data['email'], $result->getEmail(), 'Valor inserción no concuerda en email');
       try {
			self::assertEquals($data['email_verified_at'], $result->getEmailVerifiedAt(DATE_ISO8601), 'Valor inserción no concuerda en email_verified_at');
       } catch(PropelException $e) {
            Log::debug($e);
            self::assertTrue(false, 'Formato inserción no concuerda: email_verified_at');
       }
		self::assertEquals($data['password'], $result->getPassword(), 'Valor inserción no concuerda en password');
       try {
			self::assertEquals($data['created_at'], $result->getCreatedAt(DATE_ISO8601), 'Valor inserción no concuerda en created_at');
       } catch(PropelException $e) {
            Log::debug($e);
            self::assertTrue(false, 'Formato inserción no concuerda: created_at');
       }
       try {
			self::assertEquals($data['updated_at'], $result->getUpdatedAt(DATE_ISO8601), 'Valor inserción no concuerda en updated_at');
       } catch(PropelException $e) {
            Log::debug($e);
            self::assertTrue(false, 'Formato inserción no concuerda: updated_at');
       }
		self::assertEquals($data['remember_token'], $result->getRememberToken(), 'Valor inserción no concuerda en remember_token');

// UPDATE
        $update = [
			'id' => $result->getId(),
			'uuid' => $faker->text(36),
			'email' => $faker->text(255),
			'email_verified_at' => null,
			'password' => $faker->text(255),
			'created_at' => null,
			'updated_at' => null,
			'remember_token' => null,
		];
        $updated = \Users::updusers($update, $trncnn);
        self::assertInstanceOf(\Users::class, $updated);
		self::assertEquals($result->getId(),$updated->getId(), 'Llaves actualización no concuerdan');
		self::assertEquals($update['uuid'], $updated->getUuid(), 'Valor actualización no concuerda en uuid');
		self::assertEquals($update['email'], $updated->getEmail(), 'Valor actualización no concuerda en email');
		try {
			self::assertEquals(null, $updated->getEmailVerifiedAt(DATE_ISO8601), 'Valor actualización no concuerda en email_verified_at');
		} catch(PropelException $e) {
            Log::debug($e);
            self::assertTrue(false, 'Formato actualización no concuerda: email_verified_at');
        }
		self::assertEquals($update['password'], $updated->getPassword(), 'Valor actualización no concuerda en password');
		try {
			self::assertEquals(null, $updated->getCreatedAt(DATE_ISO8601), 'Valor actualización no concuerda en created_at');
		} catch(PropelException $e) {
            Log::debug($e);
            self::assertTrue(false, 'Formato actualización no concuerda: created_at');
        }
		try {
			self::assertEquals(null, $updated->getUpdatedAt(DATE_ISO8601), 'Valor actualización no concuerda en updated_at');
		} catch(PropelException $e) {
            Log::debug($e);
            self::assertTrue(false, 'Formato actualización no concuerda: updated_at');
        }
		self::assertEquals(null, $updated->getRememberToken(), 'Valor actualización no concuerda en remember_token');

//DISPLAY ONE CVE
		$found = \Users::fnousers($updated->getId(),$trncnn);
		self::assertInstanceOf(\Users::class, $found);
		self::assertEquals($result->getId(),$found->getId(), 'Llaves búsqueda no concuerdan');
		self::assertEquals($update['uuid'], $found->getUuid(), 'Valor búsqueda no concuerda en uuid');
		self::assertEquals($update['email'], $found->getEmail(), 'Valor búsqueda no concuerda en email');
		try {
			self::assertEquals($update['email_verified_at'], $found->getEmailVerifiedAt(DATE_ISO8601), 'Valor búsqueda no concuerda en email_verified_at');
		} catch(PropelException $e) {
            Log::debug($e);
            self::assertTrue(false, 'Formato búsqueda no concuerda: email_verified_at');
        }
		self::assertEquals($update['password'], $found->getPassword(), 'Valor búsqueda no concuerda en password');
		try {
			self::assertEquals($update['created_at'], $found->getCreatedAt(DATE_ISO8601), 'Valor búsqueda no concuerda en created_at');
		} catch(PropelException $e) {
            Log::debug($e);
            self::assertTrue(false, 'Formato búsqueda no concuerda: created_at');
        }
		try {
			self::assertEquals($update['updated_at'], $found->getUpdatedAt(DATE_ISO8601), 'Valor búsqueda no concuerda en updated_at');
		} catch(PropelException $e) {
            Log::debug($e);
            self::assertTrue(false, 'Formato búsqueda no concuerda: updated_at');
        }
		self::assertEquals($update['remember_token'], $found->getRememberToken(), 'Valor búsqueda no concuerda en remember_token');

//DISPLAY ONE UUID
		$foundU = \Users::fnuusers($updated->getUuid(),$trncnn);
		self::assertInstanceOf(\Users::class, $foundU);
		self::assertEquals($result->getId(),$foundU->getId(), 'Llaves búsqueda uuid no concuerdan');
		self::assertEquals($update['uuid'], $foundU->getUuid(), 'Valor búsqueda uuid no concuerda en uuid');
		self::assertEquals($update['email'], $foundU->getEmail(), 'Valor búsqueda uuid no concuerda en email');
		try {
			self::assertEquals($update['email_verified_at'], $foundU->getEmailVerifiedAt(DATE_ISO8601), 'Valor búsqueda uuid no concuerda en email_verified_at');
		} catch(PropelException $e) {
            Log::debug($e);
            self::assertTrue(false, 'Formato búsqueda no concuerda: email_verified_at');
        }
		self::assertEquals($update['password'], $foundU->getPassword(), 'Valor búsqueda uuid no concuerda en password');
		try {
			self::assertEquals($update['created_at'], $foundU->getCreatedAt(DATE_ISO8601), 'Valor búsqueda uuid no concuerda en created_at');
		} catch(PropelException $e) {
            Log::debug($e);
            self::assertTrue(false, 'Formato búsqueda no concuerda: created_at');
        }
		try {
			self::assertEquals($update['updated_at'], $foundU->getUpdatedAt(DATE_ISO8601), 'Valor búsqueda uuid no concuerda en updated_at');
		} catch(PropelException $e) {
            Log::debug($e);
            self::assertTrue(false, 'Formato búsqueda no concuerda: updated_at');
        }
		self::assertEquals($update['remember_token'], $foundU->getRememberToken(), 'Valor búsqueda uuid no concuerda en remember_token');

//DISPLAY ALL
		$all = \Users::dspusers($trncnn);
		self::assertInstanceOf(\Propel\Runtime\Collection\Collection::class, $all);
		self::assertTrue($all->count() > 0);

//REMOVE ONE
		$destroyed = \Users::rmvusers($result->getid(),$trncnn);
		self::assertTrue($destroyed);
        TransactionHandler::rollback($trncnn);
    }
}