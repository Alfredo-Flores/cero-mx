<?php

namespace Tests\Unit\Models;

use App\TransactionHandler;
use Faker;
use Tests\TestCase;
use Illuminate\Support\Facades\Log;
use Propel\Runtime\Exception\PropelException;

class CatgirorgUnitTest extends TestCase
{
    /** @test */
    public function it_can_crud_Catgirorg()
    {
//CREATE
        $faker = Faker\Factory::create();
        $trncnn = TransactionHandler::begin();

        $data = [
			'uuid' => $faker->text(36),
			'dscgirorg' => $faker->text(255),
			'created_at' => $faker->iso8601(),
			'updated_at' => $faker->iso8601(),
		];
        $result = \Catgirorg::crtgirorg($data, $trncnn);
        self::assertInstanceOf(\Catgirorg::class, $result);
		self::assertEquals($data['uuid'], $result->getUuid(), 'Valor inserción no concuerda en uuid');
		self::assertEquals($data['dscgirorg'], $result->getDscgirorg(), 'Valor inserción no concuerda en dscgirorg');
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
			'idngirorg' => $result->getIdngirorg(),
			'uuid' => $faker->text(36),
			'dscgirorg' => $faker->text(255),
			'created_at' => null,
			'updated_at' => null,
		];
        $updated = \Catgirorg::updgirorg($update, $trncnn);
        self::assertInstanceOf(\Catgirorg::class, $updated);
		self::assertEquals($result->getIdngirorg(),$updated->getIdngirorg(), 'Llaves actualización no concuerdan');
		self::assertEquals($update['uuid'], $updated->getUuid(), 'Valor actualización no concuerda en uuid');
		self::assertEquals($update['dscgirorg'], $updated->getDscgirorg(), 'Valor actualización no concuerda en dscgirorg');
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
		$found = \Catgirorg::fnogirorg($updated->getIdngirorg(),$trncnn);
		self::assertInstanceOf(\Catgirorg::class, $found);
		self::assertEquals($result->getIdngirorg(),$found->getIdngirorg(), 'Llaves búsqueda no concuerdan');
		self::assertEquals($update['uuid'], $found->getUuid(), 'Valor búsqueda no concuerda en uuid');
		self::assertEquals($update['dscgirorg'], $found->getDscgirorg(), 'Valor búsqueda no concuerda en dscgirorg');
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
		$foundU = \Catgirorg::fnugirorg($updated->getUuid(),$trncnn);
		self::assertInstanceOf(\Catgirorg::class, $foundU);
		self::assertEquals($result->getIdngirorg(),$foundU->getIdngirorg(), 'Llaves búsqueda uuid no concuerdan');
		self::assertEquals($update['uuid'], $foundU->getUuid(), 'Valor búsqueda uuid no concuerda en uuid');
		self::assertEquals($update['dscgirorg'], $foundU->getDscgirorg(), 'Valor búsqueda uuid no concuerda en dscgirorg');
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
		$all = \Catgirorg::dspgirorg($trncnn);
		self::assertInstanceOf(\Propel\Runtime\Collection\Collection::class, $all);
		self::assertTrue($all->count() > 0);

//REMOVE ONE
		$destroyed = \Catgirorg::rmvgirorg($result->getidngirorg(),$trncnn);
		self::assertTrue($destroyed);
        TransactionHandler::rollback($trncnn);
    }
}