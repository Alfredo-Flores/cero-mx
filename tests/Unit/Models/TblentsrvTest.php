<?php

namespace Tests\Unit\Models;

use App\TransactionHandler;
use Faker;
use Tests\TestCase;
use Illuminate\Support\Facades\Log;
use Propel\Runtime\Exception\PropelException;

class TblentsrvUnitTest extends TestCase
{
    /** @test */
    public function it_can_crud_Tblentsrv()
    {
//CREATE
        $faker = Faker\Factory::create();
        $trncnn = TransactionHandler::begin();

        $data = [
			'idntipsrv' => null,
			'idngirorg' => null,
			'uuid' => $faker->text(36),
			'created_at' => $faker->iso8601(),
			'updated_at' => $faker->iso8601(),
		];
        $result = \Tblentsrv::crtentsrv($data, $trncnn);
        self::assertInstanceOf(\Tblentsrv::class, $result);
		self::assertEquals($data['idntipsrv'], $result->getIdntipsrv(), 'Valor inserción no concuerda en idntipsrv');
		self::assertEquals($data['idngirorg'], $result->getIdngirorg(), 'Valor inserción no concuerda en idngirorg');
		self::assertEquals($data['uuid'], $result->getUuid(), 'Valor inserción no concuerda en uuid');
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
			'idnentsrv' => $result->getIdnentsrv(),
			'idntipsrv' => null,
			'idngirorg' => null,
			'uuid' => $faker->text(36),
			'created_at' => null,
			'updated_at' => null,
		];
        $updated = \Tblentsrv::updentsrv($update, $trncnn);
        self::assertInstanceOf(\Tblentsrv::class, $updated);
		self::assertEquals($result->getIdnentsrv(),$updated->getIdnentsrv(), 'Llaves actualización no concuerdan');
		self::assertEquals(null, $updated->getIdntipsrv(), 'Valor actualización no concuerda en idntipsrv');
		self::assertEquals(null, $updated->getIdngirorg(), 'Valor actualización no concuerda en idngirorg');
		self::assertEquals($update['uuid'], $updated->getUuid(), 'Valor actualización no concuerda en uuid');
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
		$found = \Tblentsrv::fnoentsrv($updated->getIdnentsrv(),$trncnn);
		self::assertInstanceOf(\Tblentsrv::class, $found);
		self::assertEquals($result->getIdnentsrv(),$found->getIdnentsrv(), 'Llaves búsqueda no concuerdan');
		self::assertEquals($update['idntipsrv'], $found->getIdntipsrv(), 'Valor búsqueda no concuerda en idntipsrv');
		self::assertEquals($update['idngirorg'], $found->getIdngirorg(), 'Valor búsqueda no concuerda en idngirorg');
		self::assertEquals($update['uuid'], $found->getUuid(), 'Valor búsqueda no concuerda en uuid');
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
		$foundU = \Tblentsrv::fnuentsrv($updated->getUuid(),$trncnn);
		self::assertInstanceOf(\Tblentsrv::class, $foundU);
		self::assertEquals($result->getIdnentsrv(),$foundU->getIdnentsrv(), 'Llaves búsqueda uuid no concuerdan');
		self::assertEquals($update['idntipsrv'], $foundU->getIdntipsrv(), 'Valor búsqueda uuid no concuerda en idntipsrv');
		self::assertEquals($update['idngirorg'], $foundU->getIdngirorg(), 'Valor búsqueda uuid no concuerda en idngirorg');
		self::assertEquals($update['uuid'], $foundU->getUuid(), 'Valor búsqueda uuid no concuerda en uuid');
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
		$all = \Tblentsrv::dspentsrv(0,0,$trncnn);
		self::assertInstanceOf(\Propel\Runtime\Collection\Collection::class, $all);
		self::assertTrue($all->count() > 0);

//REMOVE ONE
		$destroyed = \Tblentsrv::rmventsrv($result->getidnentsrv(),$trncnn);
		self::assertTrue($destroyed);
        TransactionHandler::rollback($trncnn);
    }
}