<?php

namespace Tests\Unit\Models;

use App\TransactionHandler;
use Faker;
use Tests\TestCase;
use Illuminate\Support\Facades\Log;
use Propel\Runtime\Exception\PropelException;

class TblentdncUnitTest extends TestCase
{
    /** @test */
    public function it_can_crud_Tblentdnc()
    {
//CREATE
        $faker = Faker\Factory::create();
        $trncnn = TransactionHandler::begin();

        $data = [
			'idnentemp' => null,
			'uuid' => $faker->text(36),
			'dscentdnc' => $faker->text(255),
			'tipentdnc' => $faker->text(255),
			'kgsentdnc' => $faker->randomFloat(),
			'cntcjsdnc' => $faker->numberBetween(0, 9),
			'tmprstdnc' => $faker->numberBetween(0, 9),
			'created_at' => $faker->iso8601(),
			'updated_at' => $faker->iso8601(),
		];
        $result = \Tblentdnc::crtentdnc($data, $trncnn);
        self::assertInstanceOf(\Tblentdnc::class, $result);
		self::assertEquals($data['idnentemp'], $result->getIdnentemp(), 'Valor inserción no concuerda en idnentemp');
		self::assertEquals($data['uuid'], $result->getUuid(), 'Valor inserción no concuerda en uuid');
		self::assertEquals($data['dscentdnc'], $result->getDscentdnc(), 'Valor inserción no concuerda en dscentdnc');
		self::assertEquals($data['tipentdnc'], $result->getTipentdnc(), 'Valor inserción no concuerda en tipentdnc');
		self::assertEquals($data['kgsentdnc'], $result->getKgsentdnc(), 'Valor inserción no concuerda en kgsentdnc');
		self::assertEquals($data['cntcjsdnc'], $result->getCntcjsdnc(), 'Valor inserción no concuerda en cntcjsdnc');
		self::assertEquals($data['tmprstdnc'], $result->getTmprstdnc(), 'Valor inserción no concuerda en tmprstdnc');
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
			'identdnc' => $result->getIdentdnc(),
			'idnentemp' => null,
			'uuid' => $faker->text(36),
			'dscentdnc' => $faker->text(255),
			'tipentdnc' => $faker->text(255),
			'kgsentdnc' => $faker->randomFloat(),
			'cntcjsdnc' => $faker->numberBetween(0, 9),
			'tmprstdnc' => $faker->numberBetween(0, 9),
			'created_at' => null,
			'updated_at' => null,
		];
        $updated = \Tblentdnc::updentdnc($update, $trncnn);
        self::assertInstanceOf(\Tblentdnc::class, $updated);
		self::assertEquals($result->getIdentdnc(),$updated->getIdentdnc(), 'Llaves actualización no concuerdan');
		self::assertEquals(null, $updated->getIdnentemp(), 'Valor actualización no concuerda en idnentemp');
		self::assertEquals($update['uuid'], $updated->getUuid(), 'Valor actualización no concuerda en uuid');
		self::assertEquals($update['dscentdnc'], $updated->getDscentdnc(), 'Valor actualización no concuerda en dscentdnc');
		self::assertEquals($update['tipentdnc'], $updated->getTipentdnc(), 'Valor actualización no concuerda en tipentdnc');
		self::assertEquals($update['kgsentdnc'], $updated->getKgsentdnc(), 'Valor actualización no concuerda en kgsentdnc');
		self::assertEquals($update['cntcjsdnc'], $updated->getCntcjsdnc(), 'Valor actualización no concuerda en cntcjsdnc');
		self::assertEquals($update['tmprstdnc'], $updated->getTmprstdnc(), 'Valor actualización no concuerda en tmprstdnc');
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
		$found = \Tblentdnc::fnoentdnc($updated->getIdentdnc(),$trncnn);
		self::assertInstanceOf(\Tblentdnc::class, $found);
		self::assertEquals($result->getIdentdnc(),$found->getIdentdnc(), 'Llaves búsqueda no concuerdan');
		self::assertEquals($update['idnentemp'], $found->getIdnentemp(), 'Valor búsqueda no concuerda en idnentemp');
		self::assertEquals($update['uuid'], $found->getUuid(), 'Valor búsqueda no concuerda en uuid');
		self::assertEquals($update['dscentdnc'], $found->getDscentdnc(), 'Valor búsqueda no concuerda en dscentdnc');
		self::assertEquals($update['tipentdnc'], $found->getTipentdnc(), 'Valor búsqueda no concuerda en tipentdnc');
		self::assertEquals($update['kgsentdnc'], $found->getKgsentdnc(), 'Valor búsqueda no concuerda en kgsentdnc');
		self::assertEquals($update['cntcjsdnc'], $found->getCntcjsdnc(), 'Valor búsqueda no concuerda en cntcjsdnc');
		self::assertEquals($update['tmprstdnc'], $found->getTmprstdnc(), 'Valor búsqueda no concuerda en tmprstdnc');
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
		$foundU = \Tblentdnc::fnuentdnc($updated->getUuid(),$trncnn);
		self::assertInstanceOf(\Tblentdnc::class, $foundU);
		self::assertEquals($result->getIdentdnc(),$foundU->getIdentdnc(), 'Llaves búsqueda uuid no concuerdan');
		self::assertEquals($update['idnentemp'], $foundU->getIdnentemp(), 'Valor búsqueda uuid no concuerda en idnentemp');
		self::assertEquals($update['uuid'], $foundU->getUuid(), 'Valor búsqueda uuid no concuerda en uuid');
		self::assertEquals($update['dscentdnc'], $foundU->getDscentdnc(), 'Valor búsqueda uuid no concuerda en dscentdnc');
		self::assertEquals($update['tipentdnc'], $foundU->getTipentdnc(), 'Valor búsqueda uuid no concuerda en tipentdnc');
		self::assertEquals($update['kgsentdnc'], $foundU->getKgsentdnc(), 'Valor búsqueda uuid no concuerda en kgsentdnc');
		self::assertEquals($update['cntcjsdnc'], $foundU->getCntcjsdnc(), 'Valor búsqueda uuid no concuerda en cntcjsdnc');
		self::assertEquals($update['tmprstdnc'], $foundU->getTmprstdnc(), 'Valor búsqueda uuid no concuerda en tmprstdnc');
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
		$all = \Tblentdnc::dspentdnc(0,$trncnn);
		self::assertInstanceOf(\Propel\Runtime\Collection\Collection::class, $all);
		self::assertTrue($all->count() > 0);

//REMOVE ONE
		$destroyed = \Tblentdnc::rmventdnc($result->getidentdnc(),$trncnn);
		self::assertTrue($destroyed);
        TransactionHandler::rollback($trncnn);
    }
}