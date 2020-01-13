<?php

namespace Tests\Unit\Models;

use App\TransactionHandler;
use Faker;
use Tests\TestCase;
use Illuminate\Support\Facades\Log;
use Propel\Runtime\Exception\PropelException;

class TblentprsUnitTest extends TestCase
{
    /** @test */
    public function it_can_crud_Tblentprs()
    {
//CREATE
        $faker = Faker\Factory::create();
        $trncnn = TransactionHandler::begin();

        $data = [
			'uuid' => $faker->text(36),
			'idnentusr' => null,
			'nomentprs' => $faker->text(255),
			'prmaplprs' => $faker->text(255),
			'sgnaplprs' => $faker->text(255),
			'crpentprs' => $faker->text(18),
			'rfcentprs' => $faker->text(13),
			'emllbrprs' => $faker->text(255),
			'emlprsprs' => $faker->text(255),
			'ncnentprs' => $faker->text(255),
			'pasentprs' => $faker->text(255),
			'ententprs' => $faker->text(255),
			'mncentprs' => $faker->text(255),
			'lclentprs' => $faker->text(255),
			'dmcentprs' => $faker->text(255),
			'cdgpstprs' => $faker->text(5),
			'tlffijprs' => $faker->text(12),
			'tlfmvlprs' => $faker->text(12),
			'fotentprs' => $faker->text(255),
			'created_at' => $faker->iso8601(),
			'updated_at' => $faker->iso8601(),
		];
        $result = \Tblentprs::crtentprs($data, $trncnn);
        self::assertInstanceOf(\Tblentprs::class, $result);
		self::assertEquals($data['uuid'], $result->getUuid(), 'Valor inserción no concuerda en uuid');
		self::assertEquals($data['idnentusr'], $result->getIdnentusr(), 'Valor inserción no concuerda en idnentusr');
		self::assertEquals($data['nomentprs'], $result->getNomentprs(), 'Valor inserción no concuerda en nomentprs');
		self::assertEquals($data['prmaplprs'], $result->getPrmaplprs(), 'Valor inserción no concuerda en prmaplprs');
		self::assertEquals($data['sgnaplprs'], $result->getSgnaplprs(), 'Valor inserción no concuerda en sgnaplprs');
		self::assertEquals($data['crpentprs'], $result->getCrpentprs(), 'Valor inserción no concuerda en crpentprs');
		self::assertEquals($data['rfcentprs'], $result->getRfcentprs(), 'Valor inserción no concuerda en rfcentprs');
		self::assertEquals($data['emllbrprs'], $result->getEmllbrprs(), 'Valor inserción no concuerda en emllbrprs');
		self::assertEquals($data['emlprsprs'], $result->getEmlprsprs(), 'Valor inserción no concuerda en emlprsprs');
		self::assertEquals($data['ncnentprs'], $result->getNcnentprs(), 'Valor inserción no concuerda en ncnentprs');
		self::assertEquals($data['pasentprs'], $result->getPasentprs(), 'Valor inserción no concuerda en pasentprs');
		self::assertEquals($data['ententprs'], $result->getEntentprs(), 'Valor inserción no concuerda en ententprs');
		self::assertEquals($data['mncentprs'], $result->getMncentprs(), 'Valor inserción no concuerda en mncentprs');
		self::assertEquals($data['lclentprs'], $result->getLclentprs(), 'Valor inserción no concuerda en lclentprs');
		self::assertEquals($data['dmcentprs'], $result->getDmcentprs(), 'Valor inserción no concuerda en dmcentprs');
		self::assertEquals($data['cdgpstprs'], $result->getCdgpstprs(), 'Valor inserción no concuerda en cdgpstprs');
		self::assertEquals($data['tlffijprs'], $result->getTlffijprs(), 'Valor inserción no concuerda en tlffijprs');
		self::assertEquals($data['tlfmvlprs'], $result->getTlfmvlprs(), 'Valor inserción no concuerda en tlfmvlprs');
		self::assertEquals($data['fotentprs'], $result->getFotentprs(), 'Valor inserción no concuerda en fotentprs');
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
			'idnentprs' => $result->getIdnentprs(),
			'uuid' => $faker->text(36),
			'idnentusr' => null,
			'nomentprs' => $faker->text(255),
			'prmaplprs' => $faker->text(255),
			'sgnaplprs' => $faker->text(255),
			'crpentprs' => $faker->text(18),
			'rfcentprs' => $faker->text(13),
			'emllbrprs' => $faker->text(255),
			'emlprsprs' => $faker->text(255),
			'ncnentprs' => $faker->text(255),
			'pasentprs' => $faker->text(255),
			'ententprs' => $faker->text(255),
			'mncentprs' => $faker->text(255),
			'lclentprs' => $faker->text(255),
			'dmcentprs' => $faker->text(255),
			'cdgpstprs' => $faker->text(5),
			'tlffijprs' => $faker->text(12),
			'tlfmvlprs' => $faker->text(12),
			'fotentprs' => null,
			'created_at' => null,
			'updated_at' => null,
		];
        $updated = \Tblentprs::updentprs($update, $trncnn);
        self::assertInstanceOf(\Tblentprs::class, $updated);
		self::assertEquals($result->getIdnentprs(),$updated->getIdnentprs(), 'Llaves actualización no concuerdan');
		self::assertEquals($update['uuid'], $updated->getUuid(), 'Valor actualización no concuerda en uuid');
		self::assertEquals(null, $updated->getIdnentusr(), 'Valor actualización no concuerda en idnentusr');
		self::assertEquals($update['nomentprs'], $updated->getNomentprs(), 'Valor actualización no concuerda en nomentprs');
		self::assertEquals($update['prmaplprs'], $updated->getPrmaplprs(), 'Valor actualización no concuerda en prmaplprs');
		self::assertEquals($update['sgnaplprs'], $updated->getSgnaplprs(), 'Valor actualización no concuerda en sgnaplprs');
		self::assertEquals($update['crpentprs'], $updated->getCrpentprs(), 'Valor actualización no concuerda en crpentprs');
		self::assertEquals($update['rfcentprs'], $updated->getRfcentprs(), 'Valor actualización no concuerda en rfcentprs');
		self::assertEquals($update['emllbrprs'], $updated->getEmllbrprs(), 'Valor actualización no concuerda en emllbrprs');
		self::assertEquals($update['emlprsprs'], $updated->getEmlprsprs(), 'Valor actualización no concuerda en emlprsprs');
		self::assertEquals($update['ncnentprs'], $updated->getNcnentprs(), 'Valor actualización no concuerda en ncnentprs');
		self::assertEquals($update['pasentprs'], $updated->getPasentprs(), 'Valor actualización no concuerda en pasentprs');
		self::assertEquals($update['ententprs'], $updated->getEntentprs(), 'Valor actualización no concuerda en ententprs');
		self::assertEquals($update['mncentprs'], $updated->getMncentprs(), 'Valor actualización no concuerda en mncentprs');
		self::assertEquals($update['lclentprs'], $updated->getLclentprs(), 'Valor actualización no concuerda en lclentprs');
		self::assertEquals($update['dmcentprs'], $updated->getDmcentprs(), 'Valor actualización no concuerda en dmcentprs');
		self::assertEquals($update['cdgpstprs'], $updated->getCdgpstprs(), 'Valor actualización no concuerda en cdgpstprs');
		self::assertEquals($update['tlffijprs'], $updated->getTlffijprs(), 'Valor actualización no concuerda en tlffijprs');
		self::assertEquals($update['tlfmvlprs'], $updated->getTlfmvlprs(), 'Valor actualización no concuerda en tlfmvlprs');
		self::assertEquals(null, $updated->getFotentprs(), 'Valor actualización no concuerda en fotentprs');
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
		$found = \Tblentprs::fnoentprs($updated->getIdnentprs(),$trncnn);
		self::assertInstanceOf(\Tblentprs::class, $found);
		self::assertEquals($result->getIdnentprs(),$found->getIdnentprs(), 'Llaves búsqueda no concuerdan');
		self::assertEquals($update['uuid'], $found->getUuid(), 'Valor búsqueda no concuerda en uuid');
		self::assertEquals($update['idnentusr'], $found->getIdnentusr(), 'Valor búsqueda no concuerda en idnentusr');
		self::assertEquals($update['nomentprs'], $found->getNomentprs(), 'Valor búsqueda no concuerda en nomentprs');
		self::assertEquals($update['prmaplprs'], $found->getPrmaplprs(), 'Valor búsqueda no concuerda en prmaplprs');
		self::assertEquals($update['sgnaplprs'], $found->getSgnaplprs(), 'Valor búsqueda no concuerda en sgnaplprs');
		self::assertEquals($update['crpentprs'], $found->getCrpentprs(), 'Valor búsqueda no concuerda en crpentprs');
		self::assertEquals($update['rfcentprs'], $found->getRfcentprs(), 'Valor búsqueda no concuerda en rfcentprs');
		self::assertEquals($update['emllbrprs'], $found->getEmllbrprs(), 'Valor búsqueda no concuerda en emllbrprs');
		self::assertEquals($update['emlprsprs'], $found->getEmlprsprs(), 'Valor búsqueda no concuerda en emlprsprs');
		self::assertEquals($update['ncnentprs'], $found->getNcnentprs(), 'Valor búsqueda no concuerda en ncnentprs');
		self::assertEquals($update['pasentprs'], $found->getPasentprs(), 'Valor búsqueda no concuerda en pasentprs');
		self::assertEquals($update['ententprs'], $found->getEntentprs(), 'Valor búsqueda no concuerda en ententprs');
		self::assertEquals($update['mncentprs'], $found->getMncentprs(), 'Valor búsqueda no concuerda en mncentprs');
		self::assertEquals($update['lclentprs'], $found->getLclentprs(), 'Valor búsqueda no concuerda en lclentprs');
		self::assertEquals($update['dmcentprs'], $found->getDmcentprs(), 'Valor búsqueda no concuerda en dmcentprs');
		self::assertEquals($update['cdgpstprs'], $found->getCdgpstprs(), 'Valor búsqueda no concuerda en cdgpstprs');
		self::assertEquals($update['tlffijprs'], $found->getTlffijprs(), 'Valor búsqueda no concuerda en tlffijprs');
		self::assertEquals($update['tlfmvlprs'], $found->getTlfmvlprs(), 'Valor búsqueda no concuerda en tlfmvlprs');
		self::assertEquals($update['fotentprs'], $found->getFotentprs(), 'Valor búsqueda no concuerda en fotentprs');
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
		$foundU = \Tblentprs::fnuentprs($updated->getUuid(),$trncnn);
		self::assertInstanceOf(\Tblentprs::class, $foundU);
		self::assertEquals($result->getIdnentprs(),$foundU->getIdnentprs(), 'Llaves búsqueda uuid no concuerdan');
		self::assertEquals($update['uuid'], $foundU->getUuid(), 'Valor búsqueda uuid no concuerda en uuid');
		self::assertEquals($update['idnentusr'], $foundU->getIdnentusr(), 'Valor búsqueda uuid no concuerda en idnentusr');
		self::assertEquals($update['nomentprs'], $foundU->getNomentprs(), 'Valor búsqueda uuid no concuerda en nomentprs');
		self::assertEquals($update['prmaplprs'], $foundU->getPrmaplprs(), 'Valor búsqueda uuid no concuerda en prmaplprs');
		self::assertEquals($update['sgnaplprs'], $foundU->getSgnaplprs(), 'Valor búsqueda uuid no concuerda en sgnaplprs');
		self::assertEquals($update['crpentprs'], $foundU->getCrpentprs(), 'Valor búsqueda uuid no concuerda en crpentprs');
		self::assertEquals($update['rfcentprs'], $foundU->getRfcentprs(), 'Valor búsqueda uuid no concuerda en rfcentprs');
		self::assertEquals($update['emllbrprs'], $foundU->getEmllbrprs(), 'Valor búsqueda uuid no concuerda en emllbrprs');
		self::assertEquals($update['emlprsprs'], $foundU->getEmlprsprs(), 'Valor búsqueda uuid no concuerda en emlprsprs');
		self::assertEquals($update['ncnentprs'], $foundU->getNcnentprs(), 'Valor búsqueda uuid no concuerda en ncnentprs');
		self::assertEquals($update['pasentprs'], $foundU->getPasentprs(), 'Valor búsqueda uuid no concuerda en pasentprs');
		self::assertEquals($update['ententprs'], $foundU->getEntentprs(), 'Valor búsqueda uuid no concuerda en ententprs');
		self::assertEquals($update['mncentprs'], $foundU->getMncentprs(), 'Valor búsqueda uuid no concuerda en mncentprs');
		self::assertEquals($update['lclentprs'], $foundU->getLclentprs(), 'Valor búsqueda uuid no concuerda en lclentprs');
		self::assertEquals($update['dmcentprs'], $foundU->getDmcentprs(), 'Valor búsqueda uuid no concuerda en dmcentprs');
		self::assertEquals($update['cdgpstprs'], $foundU->getCdgpstprs(), 'Valor búsqueda uuid no concuerda en cdgpstprs');
		self::assertEquals($update['tlffijprs'], $foundU->getTlffijprs(), 'Valor búsqueda uuid no concuerda en tlffijprs');
		self::assertEquals($update['tlfmvlprs'], $foundU->getTlfmvlprs(), 'Valor búsqueda uuid no concuerda en tlfmvlprs');
		self::assertEquals($update['fotentprs'], $foundU->getFotentprs(), 'Valor búsqueda uuid no concuerda en fotentprs');
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
		$all = \Tblentprs::dspentprs(0,$trncnn);
		self::assertInstanceOf(\Propel\Runtime\Collection\Collection::class, $all);
		self::assertTrue($all->count() > 0);

//REMOVE ONE
		$destroyed = \Tblentprs::rmventprs($result->getidnentprs(),$trncnn);
		self::assertTrue($destroyed);
        TransactionHandler::rollback($trncnn);
    }
}