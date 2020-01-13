<?php

namespace Tests\Unit\Models;

use App\TransactionHandler;
use Faker;
use Tests\TestCase;
use Illuminate\Support\Facades\Log;
use Propel\Runtime\Exception\PropelException;

class TblentorgUnitTest extends TestCase
{
    /** @test */
    public function it_can_crud_Tblentorg()
    {
//CREATE
        $faker = Faker\Factory::create();
        $trncnn = TransactionHandler::begin();

        $data = [
			'uuid' => $faker->text(36),
			'idnentprs' => null,
			'idngirorg' => null,
			'sgmentorg' => $faker->text(255),
			'bnfentorg' => $faker->text(255),
			'nmbentorg' => $faker->text(255),
			'logentorg' => $faker->text(255),
			'rfcentorg' => $faker->text(255),
			'dmcentorg' => $faker->text(255),
			'lclentorg' => $faker->text(255),
			'mncentorg' => $faker->text(255),
			'etdentorg' => $faker->text(255),
			'pasentorg' => $faker->text(255),
			'cdgpstorg' => $faker->text(255),
			'tlffcnorg' => $faker->text(255),
			'emlfcnorg' => $faker->text(255),
			'plntrborg' => $faker->text(255),
			'actcnsorg' => $faker->text(255),
			'cnsdntorg' => $faker->text(255),
			'created_at' => $faker->iso8601(),
			'updated_at' => $faker->iso8601(),
		];
        $result = \Tblentorg::crtentorg($data, $trncnn);
        self::assertInstanceOf(\Tblentorg::class, $result);
		self::assertEquals($data['uuid'], $result->getUuid(), 'Valor inserción no concuerda en uuid');
		self::assertEquals($data['idnentprs'], $result->getIdnentprs(), 'Valor inserción no concuerda en idnentprs');
		self::assertEquals($data['idngirorg'], $result->getIdngirorg(), 'Valor inserción no concuerda en idngirorg');
		self::assertEquals($data['sgmentorg'], $result->getSgmentorg(), 'Valor inserción no concuerda en sgmentorg');
		self::assertEquals($data['bnfentorg'], $result->getBnfentorg(), 'Valor inserción no concuerda en bnfentorg');
		self::assertEquals($data['nmbentorg'], $result->getNmbentorg(), 'Valor inserción no concuerda en nmbentorg');
		self::assertEquals($data['logentorg'], $result->getLogentorg(), 'Valor inserción no concuerda en logentorg');
		self::assertEquals($data['rfcentorg'], $result->getRfcentorg(), 'Valor inserción no concuerda en rfcentorg');
		self::assertEquals($data['dmcentorg'], $result->getDmcentorg(), 'Valor inserción no concuerda en dmcentorg');
		self::assertEquals($data['lclentorg'], $result->getLclentorg(), 'Valor inserción no concuerda en lclentorg');
		self::assertEquals($data['mncentorg'], $result->getMncentorg(), 'Valor inserción no concuerda en mncentorg');
		self::assertEquals($data['etdentorg'], $result->getEtdentorg(), 'Valor inserción no concuerda en etdentorg');
		self::assertEquals($data['pasentorg'], $result->getPasentorg(), 'Valor inserción no concuerda en pasentorg');
		self::assertEquals($data['cdgpstorg'], $result->getCdgpstorg(), 'Valor inserción no concuerda en cdgpstorg');
		self::assertEquals($data['tlffcnorg'], $result->getTlffcnorg(), 'Valor inserción no concuerda en tlffcnorg');
		self::assertEquals($data['emlfcnorg'], $result->getEmlfcnorg(), 'Valor inserción no concuerda en emlfcnorg');
		self::assertEquals($data['plntrborg'], $result->getPlntrborg(), 'Valor inserción no concuerda en plntrborg');
		self::assertEquals($data['actcnsorg'], $result->getActcnsorg(), 'Valor inserción no concuerda en actcnsorg');
		self::assertEquals($data['cnsdntorg'], $result->getCnsdntorg(), 'Valor inserción no concuerda en cnsdntorg');
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
			'idnentorg' => $result->getIdnentorg(),
			'uuid' => $faker->text(36),
			'idnentprs' => null,
			'idngirorg' => null,
			'sgmentorg' => $faker->text(255),
			'bnfentorg' => $faker->text(255),
			'nmbentorg' => $faker->text(255),
			'logentorg' => $faker->text(255),
			'rfcentorg' => $faker->text(255),
			'dmcentorg' => $faker->text(255),
			'lclentorg' => $faker->text(255),
			'mncentorg' => $faker->text(255),
			'etdentorg' => $faker->text(255),
			'pasentorg' => $faker->text(255),
			'cdgpstorg' => $faker->text(255),
			'tlffcnorg' => $faker->text(255),
			'emlfcnorg' => $faker->text(255),
			'plntrborg' => $faker->text(255),
			'actcnsorg' => $faker->text(255),
			'cnsdntorg' => $faker->text(255),
			'created_at' => null,
			'updated_at' => null,
		];
        $updated = \Tblentorg::updentorg($update, $trncnn);
        self::assertInstanceOf(\Tblentorg::class, $updated);
		self::assertEquals($result->getIdnentorg(),$updated->getIdnentorg(), 'Llaves actualización no concuerdan');
		self::assertEquals($update['uuid'], $updated->getUuid(), 'Valor actualización no concuerda en uuid');
		self::assertEquals(null, $updated->getIdnentprs(), 'Valor actualización no concuerda en idnentprs');
		self::assertEquals(null, $updated->getIdngirorg(), 'Valor actualización no concuerda en idngirorg');
		self::assertEquals($update['sgmentorg'], $updated->getSgmentorg(), 'Valor actualización no concuerda en sgmentorg');
		self::assertEquals($update['bnfentorg'], $updated->getBnfentorg(), 'Valor actualización no concuerda en bnfentorg');
		self::assertEquals($update['nmbentorg'], $updated->getNmbentorg(), 'Valor actualización no concuerda en nmbentorg');
		self::assertEquals($update['logentorg'], $updated->getLogentorg(), 'Valor actualización no concuerda en logentorg');
		self::assertEquals($update['rfcentorg'], $updated->getRfcentorg(), 'Valor actualización no concuerda en rfcentorg');
		self::assertEquals($update['dmcentorg'], $updated->getDmcentorg(), 'Valor actualización no concuerda en dmcentorg');
		self::assertEquals($update['lclentorg'], $updated->getLclentorg(), 'Valor actualización no concuerda en lclentorg');
		self::assertEquals($update['mncentorg'], $updated->getMncentorg(), 'Valor actualización no concuerda en mncentorg');
		self::assertEquals($update['etdentorg'], $updated->getEtdentorg(), 'Valor actualización no concuerda en etdentorg');
		self::assertEquals($update['pasentorg'], $updated->getPasentorg(), 'Valor actualización no concuerda en pasentorg');
		self::assertEquals($update['cdgpstorg'], $updated->getCdgpstorg(), 'Valor actualización no concuerda en cdgpstorg');
		self::assertEquals($update['tlffcnorg'], $updated->getTlffcnorg(), 'Valor actualización no concuerda en tlffcnorg');
		self::assertEquals($update['emlfcnorg'], $updated->getEmlfcnorg(), 'Valor actualización no concuerda en emlfcnorg');
		self::assertEquals($update['plntrborg'], $updated->getPlntrborg(), 'Valor actualización no concuerda en plntrborg');
		self::assertEquals($update['actcnsorg'], $updated->getActcnsorg(), 'Valor actualización no concuerda en actcnsorg');
		self::assertEquals($update['cnsdntorg'], $updated->getCnsdntorg(), 'Valor actualización no concuerda en cnsdntorg');
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
		$found = \Tblentorg::fnoentorg($updated->getIdnentorg(),$trncnn);
		self::assertInstanceOf(\Tblentorg::class, $found);
		self::assertEquals($result->getIdnentorg(),$found->getIdnentorg(), 'Llaves búsqueda no concuerdan');
		self::assertEquals($update['uuid'], $found->getUuid(), 'Valor búsqueda no concuerda en uuid');
		self::assertEquals($update['idnentprs'], $found->getIdnentprs(), 'Valor búsqueda no concuerda en idnentprs');
		self::assertEquals($update['idngirorg'], $found->getIdngirorg(), 'Valor búsqueda no concuerda en idngirorg');
		self::assertEquals($update['sgmentorg'], $found->getSgmentorg(), 'Valor búsqueda no concuerda en sgmentorg');
		self::assertEquals($update['bnfentorg'], $found->getBnfentorg(), 'Valor búsqueda no concuerda en bnfentorg');
		self::assertEquals($update['nmbentorg'], $found->getNmbentorg(), 'Valor búsqueda no concuerda en nmbentorg');
		self::assertEquals($update['logentorg'], $found->getLogentorg(), 'Valor búsqueda no concuerda en logentorg');
		self::assertEquals($update['rfcentorg'], $found->getRfcentorg(), 'Valor búsqueda no concuerda en rfcentorg');
		self::assertEquals($update['dmcentorg'], $found->getDmcentorg(), 'Valor búsqueda no concuerda en dmcentorg');
		self::assertEquals($update['lclentorg'], $found->getLclentorg(), 'Valor búsqueda no concuerda en lclentorg');
		self::assertEquals($update['mncentorg'], $found->getMncentorg(), 'Valor búsqueda no concuerda en mncentorg');
		self::assertEquals($update['etdentorg'], $found->getEtdentorg(), 'Valor búsqueda no concuerda en etdentorg');
		self::assertEquals($update['pasentorg'], $found->getPasentorg(), 'Valor búsqueda no concuerda en pasentorg');
		self::assertEquals($update['cdgpstorg'], $found->getCdgpstorg(), 'Valor búsqueda no concuerda en cdgpstorg');
		self::assertEquals($update['tlffcnorg'], $found->getTlffcnorg(), 'Valor búsqueda no concuerda en tlffcnorg');
		self::assertEquals($update['emlfcnorg'], $found->getEmlfcnorg(), 'Valor búsqueda no concuerda en emlfcnorg');
		self::assertEquals($update['plntrborg'], $found->getPlntrborg(), 'Valor búsqueda no concuerda en plntrborg');
		self::assertEquals($update['actcnsorg'], $found->getActcnsorg(), 'Valor búsqueda no concuerda en actcnsorg');
		self::assertEquals($update['cnsdntorg'], $found->getCnsdntorg(), 'Valor búsqueda no concuerda en cnsdntorg');
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
		$foundU = \Tblentorg::fnuentorg($updated->getUuid(),$trncnn);
		self::assertInstanceOf(\Tblentorg::class, $foundU);
		self::assertEquals($result->getIdnentorg(),$foundU->getIdnentorg(), 'Llaves búsqueda uuid no concuerdan');
		self::assertEquals($update['uuid'], $foundU->getUuid(), 'Valor búsqueda uuid no concuerda en uuid');
		self::assertEquals($update['idnentprs'], $foundU->getIdnentprs(), 'Valor búsqueda uuid no concuerda en idnentprs');
		self::assertEquals($update['idngirorg'], $foundU->getIdngirorg(), 'Valor búsqueda uuid no concuerda en idngirorg');
		self::assertEquals($update['sgmentorg'], $foundU->getSgmentorg(), 'Valor búsqueda uuid no concuerda en sgmentorg');
		self::assertEquals($update['bnfentorg'], $foundU->getBnfentorg(), 'Valor búsqueda uuid no concuerda en bnfentorg');
		self::assertEquals($update['nmbentorg'], $foundU->getNmbentorg(), 'Valor búsqueda uuid no concuerda en nmbentorg');
		self::assertEquals($update['logentorg'], $foundU->getLogentorg(), 'Valor búsqueda uuid no concuerda en logentorg');
		self::assertEquals($update['rfcentorg'], $foundU->getRfcentorg(), 'Valor búsqueda uuid no concuerda en rfcentorg');
		self::assertEquals($update['dmcentorg'], $foundU->getDmcentorg(), 'Valor búsqueda uuid no concuerda en dmcentorg');
		self::assertEquals($update['lclentorg'], $foundU->getLclentorg(), 'Valor búsqueda uuid no concuerda en lclentorg');
		self::assertEquals($update['mncentorg'], $foundU->getMncentorg(), 'Valor búsqueda uuid no concuerda en mncentorg');
		self::assertEquals($update['etdentorg'], $foundU->getEtdentorg(), 'Valor búsqueda uuid no concuerda en etdentorg');
		self::assertEquals($update['pasentorg'], $foundU->getPasentorg(), 'Valor búsqueda uuid no concuerda en pasentorg');
		self::assertEquals($update['cdgpstorg'], $foundU->getCdgpstorg(), 'Valor búsqueda uuid no concuerda en cdgpstorg');
		self::assertEquals($update['tlffcnorg'], $foundU->getTlffcnorg(), 'Valor búsqueda uuid no concuerda en tlffcnorg');
		self::assertEquals($update['emlfcnorg'], $foundU->getEmlfcnorg(), 'Valor búsqueda uuid no concuerda en emlfcnorg');
		self::assertEquals($update['plntrborg'], $foundU->getPlntrborg(), 'Valor búsqueda uuid no concuerda en plntrborg');
		self::assertEquals($update['actcnsorg'], $foundU->getActcnsorg(), 'Valor búsqueda uuid no concuerda en actcnsorg');
		self::assertEquals($update['cnsdntorg'], $foundU->getCnsdntorg(), 'Valor búsqueda uuid no concuerda en cnsdntorg');
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
		$all = \Tblentorg::dspentorg(0,0,$trncnn);
		self::assertInstanceOf(\Propel\Runtime\Collection\Collection::class, $all);
		self::assertTrue($all->count() > 0);

//REMOVE ONE
		$destroyed = \Tblentorg::rmventorg($result->getidnentorg(),$trncnn);
		self::assertTrue($destroyed);
        TransactionHandler::rollback($trncnn);
    }
}