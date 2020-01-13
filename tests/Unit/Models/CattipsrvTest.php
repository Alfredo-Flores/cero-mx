<?php

namespace Tests\Unit\Models;

use App\TransactionHandler;
use Faker;
use Tests\TestCase;
use Illuminate\Support\Facades\Log;
use Propel\Runtime\Exception\PropelException;

class CattipsrvUnitTest extends TestCase
{
    /** @test */
    public function it_can_crud_Cattipsrv()
    {
//CREATE
        $faker = Faker\Factory::create();
        $trncnn = TransactionHandler::begin();

        $data = [
			'uuid' => $faker->text(36),
			'dsctipsrv' => $faker->text(255),
			'created_at' => $faker->iso8601(),
			'updated_at' => $faker->iso8601(),
		];
        $result = \Cattipsrv::crttipsrv($data, $trncnn);
        self::assertInstanceOf(\Cattipsrv::class, $result);
		self::assertEquals($data['uuid'], $result->getUuid(), 'Valor inserción no concuerda en uuid');
		self::assertEquals($data['dsctipsrv'], $result->getDsctipsrv(), 'Valor inserción no concuerda en dsctipsrv');
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

// UPDATE
        $update = [
			'idntipsrv' => $result->getIdntipsrv(),
			'uuid' => $faker->text(36),
			'dsctipsrv' => $faker->text(255),
			'created_at' => null,
			'updated_at' => null,
		];
        $updated = \Cattipsrv::updtipsrv($update, $trncnn);
        self::assertInstanceOf(\Cattipsrv::class, $updated);
		self::assertEquals($result->getIdntipsrv(),$updated->getIdntipsrv(), 'Llaves actualización no concuerdan');
		self::assertEquals($update['uuid'], $updated->getUuid(), 'Valor actualización no concuerda en uuid');
		self::assertEquals($update['dsctipsrv'], $updated->getDsctipsrv(), 'Valor actualización no concuerda en dsctipsrv');
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

//DISPLAY ONE CVE
		$found = \Cattipsrv::fnotipsrv($updated->getIdntipsrv(),$trncnn);
		self::assertInstanceOf(\Cattipsrv::class, $found);
		self::assertEquals($result->getIdntipsrv(),$found->getIdntipsrv(), 'Llaves búsqueda no concuerdan');
		self::assertEquals($update['uuid'], $found->getUuid(), 'Valor búsqueda no concuerda en uuid');
		self::assertEquals($update['dsctipsrv'], $found->getDsctipsrv(), 'Valor búsqueda no concuerda en dsctipsrv');
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

//DISPLAY ONE UUID
		$foundU = \Cattipsrv::fnutipsrv($updated->getUuid(),$trncnn);
		self::assertInstanceOf(\Cattipsrv::class, $foundU);
		self::assertEquals($result->getIdntipsrv(),$foundU->getIdntipsrv(), 'Llaves búsqueda uuid no concuerdan');
		self::assertEquals($update['uuid'], $foundU->getUuid(), 'Valor búsqueda uuid no concuerda en uuid');
		self::assertEquals($update['dsctipsrv'], $foundU->getDsctipsrv(), 'Valor búsqueda uuid no concuerda en dsctipsrv');
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

//DISPLAY ALL
		$all = \Cattipsrv::dsptipsrv($trncnn);
		self::assertInstanceOf(\Propel\Runtime\Collection\Collection::class, $all);
		self::assertTrue($all->count() > 0);

//REMOVE ONE
		$destroyed = \Cattipsrv::rmvtipsrv($result->getidntipsrv(),$trncnn);
		self::assertTrue($destroyed);
        TransactionHandler::rollback($trncnn);
    }
}