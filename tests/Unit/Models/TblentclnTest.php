<?php

namespace Tests\Unit\Models;

use App\TransactionHandler;
use Faker;
use Tests\TestCase;
use Illuminate\Support\Facades\Log;
use Propel\Runtime\Exception\PropelException;

class TblentclnUnitTest extends TestCase
{
    /** @test */
    public function it_can_crud_Tblentcln()
    {
//CREATE
        $faker = Faker\Factory::create();
        $trncnn = TransactionHandler::begin();

        $data = [
			'idnentemp' => null,
			'idnentorg' => null,
			'uuid' => $faker->text(36),
			'prdentcln' => $faker->numberBetween(0, 9),
			'fchinccln' => $faker->iso8601(),
			'fchfnlcln' => $faker->iso8601(),
			'created_at' => $faker->iso8601(),
			'updated_at' => $faker->iso8601(),
		];
        $result = \Tblentcln::crtentcln($data, $trncnn);
        self::assertInstanceOf(\Tblentcln::class, $result);
		self::assertEquals($data['idnentemp'], $result->getIdnentemp(), 'Valor inserción no concuerda en idnentemp');
		self::assertEquals($data['idnentorg'], $result->getIdnentorg(), 'Valor inserción no concuerda en idnentorg');
		self::assertEquals($data['uuid'], $result->getUuid(), 'Valor inserción no concuerda en uuid');
		self::assertEquals($data['prdentcln'], $result->getPrdentcln(), 'Valor inserción no concuerda en prdentcln');
       try {
			self::assertEquals($data['fchinccln'], $result->getFchinccln(DATE_ISO8601), 'Valor inserción no concuerda en fchinccln');
       } catch(PropelException $e) {
            Log::debug($e);
            self::assertTrue(false, 'Formato inserción no concuerda: fchinccln');
       }
       try {
			self::assertEquals($data['fchfnlcln'], $result->getFchfnlcln(DATE_ISO8601), 'Valor inserción no concuerda en fchfnlcln');
       } catch(PropelException $e) {
            Log::debug($e);
            self::assertTrue(false, 'Formato inserción no concuerda: fchfnlcln');
       }
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
			'idnentcln' => $result->getIdnentcln(),
			'idnentemp' => null,
			'idnentorg' => null,
			'uuid' => $faker->text(36),
			'prdentcln' => $faker->numberBetween(0, 9),
			'fchinccln' => null,
			'fchfnlcln' => null,
			'created_at' => null,
			'updated_at' => null,
		];
        $updated = \Tblentcln::updentcln($update, $trncnn);
        self::assertInstanceOf(\Tblentcln::class, $updated);
		self::assertEquals($result->getIdnentcln(),$updated->getIdnentcln(), 'Llaves actualización no concuerdan');
		self::assertEquals(null, $updated->getIdnentemp(), 'Valor actualización no concuerda en idnentemp');
		self::assertEquals(null, $updated->getIdnentorg(), 'Valor actualización no concuerda en idnentorg');
		self::assertEquals($update['uuid'], $updated->getUuid(), 'Valor actualización no concuerda en uuid');
		self::assertEquals($update['prdentcln'], $updated->getPrdentcln(), 'Valor actualización no concuerda en prdentcln');
		try {
			self::assertEquals(null, $updated->getFchinccln(DATE_ISO8601), 'Valor actualización no concuerda en fchinccln');
		} catch(PropelException $e) {
            Log::debug($e);
            self::assertTrue(false, 'Formato actualización no concuerda: fchinccln');
        }
		try {
			self::assertEquals(null, $updated->getFchfnlcln(DATE_ISO8601), 'Valor actualización no concuerda en fchfnlcln');
		} catch(PropelException $e) {
            Log::debug($e);
            self::assertTrue(false, 'Formato actualización no concuerda: fchfnlcln');
        }
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
		$found = \Tblentcln::fnoentcln($updated->getIdnentcln(),$trncnn);
		self::assertInstanceOf(\Tblentcln::class, $found);
		self::assertEquals($result->getIdnentcln(),$found->getIdnentcln(), 'Llaves búsqueda no concuerdan');
		self::assertEquals($update['idnentemp'], $found->getIdnentemp(), 'Valor búsqueda no concuerda en idnentemp');
		self::assertEquals($update['idnentorg'], $found->getIdnentorg(), 'Valor búsqueda no concuerda en idnentorg');
		self::assertEquals($update['uuid'], $found->getUuid(), 'Valor búsqueda no concuerda en uuid');
		self::assertEquals($update['prdentcln'], $found->getPrdentcln(), 'Valor búsqueda no concuerda en prdentcln');
		try {
			self::assertEquals($update['fchinccln'], $found->getFchinccln(DATE_ISO8601), 'Valor búsqueda no concuerda en fchinccln');
		} catch(PropelException $e) {
            Log::debug($e);
            self::assertTrue(false, 'Formato búsqueda no concuerda: fchinccln');
        }
		try {
			self::assertEquals($update['fchfnlcln'], $found->getFchfnlcln(DATE_ISO8601), 'Valor búsqueda no concuerda en fchfnlcln');
		} catch(PropelException $e) {
            Log::debug($e);
            self::assertTrue(false, 'Formato búsqueda no concuerda: fchfnlcln');
        }
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
		$foundU = \Tblentcln::fnuentcln($updated->getUuid(),$trncnn);
		self::assertInstanceOf(\Tblentcln::class, $foundU);
		self::assertEquals($result->getIdnentcln(),$foundU->getIdnentcln(), 'Llaves búsqueda uuid no concuerdan');
		self::assertEquals($update['idnentemp'], $foundU->getIdnentemp(), 'Valor búsqueda uuid no concuerda en idnentemp');
		self::assertEquals($update['idnentorg'], $foundU->getIdnentorg(), 'Valor búsqueda uuid no concuerda en idnentorg');
		self::assertEquals($update['uuid'], $foundU->getUuid(), 'Valor búsqueda uuid no concuerda en uuid');
		self::assertEquals($update['prdentcln'], $foundU->getPrdentcln(), 'Valor búsqueda uuid no concuerda en prdentcln');
		try {
			self::assertEquals($update['fchinccln'], $foundU->getFchinccln(DATE_ISO8601), 'Valor búsqueda uuid no concuerda en fchinccln');
		} catch(PropelException $e) {
            Log::debug($e);
            self::assertTrue(false, 'Formato búsqueda no concuerda: fchinccln');
        }
		try {
			self::assertEquals($update['fchfnlcln'], $foundU->getFchfnlcln(DATE_ISO8601), 'Valor búsqueda uuid no concuerda en fchfnlcln');
		} catch(PropelException $e) {
            Log::debug($e);
            self::assertTrue(false, 'Formato búsqueda no concuerda: fchfnlcln');
        }
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
		$all = \Tblentcln::dspentcln(0,0,$trncnn);
		self::assertInstanceOf(\Propel\Runtime\Collection\Collection::class, $all);
		self::assertTrue($all->count() > 0);

//REMOVE ONE
		$destroyed = \Tblentcln::rmventcln($result->getidnentcln(),$trncnn);
		self::assertTrue($destroyed);
        TransactionHandler::rollback($trncnn);
    }
}