<?php

namespace Tests\Unit\Models;

use App\TransactionHandler;
use Faker;
use Tests\TestCase;
use Illuminate\Support\Facades\Log;
use Propel\Runtime\Exception\PropelException;

class TblentempUnitTest extends TestCase
{
    /** @test */
    public function it_can_crud_Tblentemp()
    {
//CREATE
        $faker = Faker\Factory::create();
        $trncnn = TransactionHandler::begin();

        $data = [
			'uuid' => $faker->text(36),
			'idnentprs' => null,
			'idngirorg' => null,
			'namentemp' => $faker->text(255),
			'logentemp' => $faker->text(255),
			'drcentemp' => $faker->text(255),
			'lclentemp' => $faker->text(255),
			'mncentemp' => $faker->text(255),
			'ententemp' => $faker->text(255),
			'pasentorg' => $faker->text(255),
			'cdgpstemp' => $faker->numberBetween(0, 9),
			'cdgtrbemp' => $faker->text(255),
			'girentemp' => $faker->text(255),
			'tlfofiemp' => $faker->text(255),
			'emlofiemp' => $faker->text(255),
			'desaliemp' => $faker->text(255),
			'candonemp' => $faker->text(255),
			'temconemp' => $faker->iso8601(),
			'horentemp' => $faker->iso8601(),
			'detentemo' => $faker->text(255),
			'created_at' => $faker->iso8601(),
			'updated_at' => $faker->iso8601(),
		];
        $result = \Tblentemp::crtentemp($data, $trncnn);
        self::assertInstanceOf(\Tblentemp::class, $result);
		self::assertEquals($data['uuid'], $result->getUuid(), 'Valor inserción no concuerda en uuid');
		self::assertEquals($data['idnentprs'], $result->getIdnentprs(), 'Valor inserción no concuerda en idnentprs');
		self::assertEquals($data['idngirorg'], $result->getIdngirorg(), 'Valor inserción no concuerda en idngirorg');
		self::assertEquals($data['namentemp'], $result->getNamentemp(), 'Valor inserción no concuerda en namentemp');
		self::assertEquals($data['logentemp'], $result->getLogentemp(), 'Valor inserción no concuerda en logentemp');
		self::assertEquals($data['drcentemp'], $result->getDrcentemp(), 'Valor inserción no concuerda en drcentemp');
		self::assertEquals($data['lclentemp'], $result->getLclentemp(), 'Valor inserción no concuerda en lclentemp');
		self::assertEquals($data['mncentemp'], $result->getMncentemp(), 'Valor inserción no concuerda en mncentemp');
		self::assertEquals($data['ententemp'], $result->getEntentemp(), 'Valor inserción no concuerda en ententemp');
		self::assertEquals($data['pasentorg'], $result->getPasentorg(), 'Valor inserción no concuerda en pasentorg');
		self::assertEquals($data['cdgpstemp'], $result->getCdgpstemp(), 'Valor inserción no concuerda en cdgpstemp');
		self::assertEquals($data['cdgtrbemp'], $result->getCdgtrbemp(), 'Valor inserción no concuerda en cdgtrbemp');
		self::assertEquals($data['girentemp'], $result->getGirentemp(), 'Valor inserción no concuerda en girentemp');
		self::assertEquals($data['tlfofiemp'], $result->getTlfofiemp(), 'Valor inserción no concuerda en tlfofiemp');
		self::assertEquals($data['emlofiemp'], $result->getEmlofiemp(), 'Valor inserción no concuerda en emlofiemp');
		self::assertEquals($data['desaliemp'], $result->getDesaliemp(), 'Valor inserción no concuerda en desaliemp');
		self::assertEquals($data['candonemp'], $result->getCandonemp(), 'Valor inserción no concuerda en candonemp');
       try {
			self::assertEquals($data['temconemp'], $result->getTemconemp(DATE_ISO8601), 'Valor inserción no concuerda en temconemp');
       } catch(PropelException $e) {
            Log::debug($e);
            self::assertTrue(false, 'Formato inserción no concuerda: temconemp');
       }
       try {
			self::assertEquals($data['horentemp'], $result->getHorentemp(DATE_ISO8601), 'Valor inserción no concuerda en horentemp');
       } catch(PropelException $e) {
            Log::debug($e);
            self::assertTrue(false, 'Formato inserción no concuerda: horentemp');
       }
		self::assertEquals($data['detentemo'], $result->getDetentemo(), 'Valor inserción no concuerda en detentemo');
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
			'idnentemp' => $result->getIdnentemp(),
			'uuid' => $faker->text(36),
			'idnentprs' => null,
			'idngirorg' => null,
			'namentemp' => $faker->text(255),
			'logentemp' => $faker->text(255),
			'drcentemp' => $faker->text(255),
			'lclentemp' => $faker->text(255),
			'mncentemp' => $faker->text(255),
			'ententemp' => $faker->text(255),
			'pasentorg' => $faker->text(255),
			'cdgpstemp' => $faker->numberBetween(0, 9),
			'cdgtrbemp' => $faker->text(255),
			'girentemp' => $faker->text(255),
			'tlfofiemp' => $faker->text(255),
			'emlofiemp' => $faker->text(255),
			'desaliemp' => $faker->text(255),
			'candonemp' => $faker->text(255),
			'temconemp' => null,
			'horentemp' => null,
			'detentemo' => $faker->text(255),
			'created_at' => null,
			'updated_at' => null,
		];
        $updated = \Tblentemp::updentemp($update, $trncnn);
        self::assertInstanceOf(\Tblentemp::class, $updated);
		self::assertEquals($result->getIdnentemp(),$updated->getIdnentemp(), 'Llaves actualización no concuerdan');
		self::assertEquals($update['uuid'], $updated->getUuid(), 'Valor actualización no concuerda en uuid');
		self::assertEquals(null, $updated->getIdnentprs(), 'Valor actualización no concuerda en idnentprs');
		self::assertEquals(null, $updated->getIdngirorg(), 'Valor actualización no concuerda en idngirorg');
		self::assertEquals($update['namentemp'], $updated->getNamentemp(), 'Valor actualización no concuerda en namentemp');
		self::assertEquals($update['logentemp'], $updated->getLogentemp(), 'Valor actualización no concuerda en logentemp');
		self::assertEquals($update['drcentemp'], $updated->getDrcentemp(), 'Valor actualización no concuerda en drcentemp');
		self::assertEquals($update['lclentemp'], $updated->getLclentemp(), 'Valor actualización no concuerda en lclentemp');
		self::assertEquals($update['mncentemp'], $updated->getMncentemp(), 'Valor actualización no concuerda en mncentemp');
		self::assertEquals($update['ententemp'], $updated->getEntentemp(), 'Valor actualización no concuerda en ententemp');
		self::assertEquals($update['pasentorg'], $updated->getPasentorg(), 'Valor actualización no concuerda en pasentorg');
		self::assertEquals($update['cdgpstemp'], $updated->getCdgpstemp(), 'Valor actualización no concuerda en cdgpstemp');
		self::assertEquals($update['cdgtrbemp'], $updated->getCdgtrbemp(), 'Valor actualización no concuerda en cdgtrbemp');
		self::assertEquals($update['girentemp'], $updated->getGirentemp(), 'Valor actualización no concuerda en girentemp');
		self::assertEquals($update['tlfofiemp'], $updated->getTlfofiemp(), 'Valor actualización no concuerda en tlfofiemp');
		self::assertEquals($update['emlofiemp'], $updated->getEmlofiemp(), 'Valor actualización no concuerda en emlofiemp');
		self::assertEquals($update['desaliemp'], $updated->getDesaliemp(), 'Valor actualización no concuerda en desaliemp');
		self::assertEquals($update['candonemp'], $updated->getCandonemp(), 'Valor actualización no concuerda en candonemp');
		try {
			self::assertEquals(null, $updated->getTemconemp(DATE_ISO8601), 'Valor actualización no concuerda en temconemp');
		} catch(PropelException $e) {
            Log::debug($e);
            self::assertTrue(false, 'Formato actualización no concuerda: temconemp');
        }
		try {
			self::assertEquals(null, $updated->getHorentemp(DATE_ISO8601), 'Valor actualización no concuerda en horentemp');
		} catch(PropelException $e) {
            Log::debug($e);
            self::assertTrue(false, 'Formato actualización no concuerda: horentemp');
        }
		self::assertEquals($update['detentemo'], $updated->getDetentemo(), 'Valor actualización no concuerda en detentemo');
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
		$found = \Tblentemp::fnoentemp($updated->getIdnentemp(),$trncnn);
		self::assertInstanceOf(\Tblentemp::class, $found);
		self::assertEquals($result->getIdnentemp(),$found->getIdnentemp(), 'Llaves búsqueda no concuerdan');
		self::assertEquals($update['uuid'], $found->getUuid(), 'Valor búsqueda no concuerda en uuid');
		self::assertEquals($update['idnentprs'], $found->getIdnentprs(), 'Valor búsqueda no concuerda en idnentprs');
		self::assertEquals($update['idngirorg'], $found->getIdngirorg(), 'Valor búsqueda no concuerda en idngirorg');
		self::assertEquals($update['namentemp'], $found->getNamentemp(), 'Valor búsqueda no concuerda en namentemp');
		self::assertEquals($update['logentemp'], $found->getLogentemp(), 'Valor búsqueda no concuerda en logentemp');
		self::assertEquals($update['drcentemp'], $found->getDrcentemp(), 'Valor búsqueda no concuerda en drcentemp');
		self::assertEquals($update['lclentemp'], $found->getLclentemp(), 'Valor búsqueda no concuerda en lclentemp');
		self::assertEquals($update['mncentemp'], $found->getMncentemp(), 'Valor búsqueda no concuerda en mncentemp');
		self::assertEquals($update['ententemp'], $found->getEntentemp(), 'Valor búsqueda no concuerda en ententemp');
		self::assertEquals($update['pasentorg'], $found->getPasentorg(), 'Valor búsqueda no concuerda en pasentorg');
		self::assertEquals($update['cdgpstemp'], $found->getCdgpstemp(), 'Valor búsqueda no concuerda en cdgpstemp');
		self::assertEquals($update['cdgtrbemp'], $found->getCdgtrbemp(), 'Valor búsqueda no concuerda en cdgtrbemp');
		self::assertEquals($update['girentemp'], $found->getGirentemp(), 'Valor búsqueda no concuerda en girentemp');
		self::assertEquals($update['tlfofiemp'], $found->getTlfofiemp(), 'Valor búsqueda no concuerda en tlfofiemp');
		self::assertEquals($update['emlofiemp'], $found->getEmlofiemp(), 'Valor búsqueda no concuerda en emlofiemp');
		self::assertEquals($update['desaliemp'], $found->getDesaliemp(), 'Valor búsqueda no concuerda en desaliemp');
		self::assertEquals($update['candonemp'], $found->getCandonemp(), 'Valor búsqueda no concuerda en candonemp');
		try {
			self::assertEquals($update['temconemp'], $found->getTemconemp(DATE_ISO8601), 'Valor búsqueda no concuerda en temconemp');
		} catch(PropelException $e) {
            Log::debug($e);
            self::assertTrue(false, 'Formato búsqueda no concuerda: temconemp');
        }
		try {
			self::assertEquals($update['horentemp'], $found->getHorentemp(DATE_ISO8601), 'Valor búsqueda no concuerda en horentemp');
		} catch(PropelException $e) {
            Log::debug($e);
            self::assertTrue(false, 'Formato búsqueda no concuerda: horentemp');
        }
		self::assertEquals($update['detentemo'], $found->getDetentemo(), 'Valor búsqueda no concuerda en detentemo');
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
		$foundU = \Tblentemp::fnuentemp($updated->getUuid(),$trncnn);
		self::assertInstanceOf(\Tblentemp::class, $foundU);
		self::assertEquals($result->getIdnentemp(),$foundU->getIdnentemp(), 'Llaves búsqueda uuid no concuerdan');
		self::assertEquals($update['uuid'], $foundU->getUuid(), 'Valor búsqueda uuid no concuerda en uuid');
		self::assertEquals($update['idnentprs'], $foundU->getIdnentprs(), 'Valor búsqueda uuid no concuerda en idnentprs');
		self::assertEquals($update['idngirorg'], $foundU->getIdngirorg(), 'Valor búsqueda uuid no concuerda en idngirorg');
		self::assertEquals($update['namentemp'], $foundU->getNamentemp(), 'Valor búsqueda uuid no concuerda en namentemp');
		self::assertEquals($update['logentemp'], $foundU->getLogentemp(), 'Valor búsqueda uuid no concuerda en logentemp');
		self::assertEquals($update['drcentemp'], $foundU->getDrcentemp(), 'Valor búsqueda uuid no concuerda en drcentemp');
		self::assertEquals($update['lclentemp'], $foundU->getLclentemp(), 'Valor búsqueda uuid no concuerda en lclentemp');
		self::assertEquals($update['mncentemp'], $foundU->getMncentemp(), 'Valor búsqueda uuid no concuerda en mncentemp');
		self::assertEquals($update['ententemp'], $foundU->getEntentemp(), 'Valor búsqueda uuid no concuerda en ententemp');
		self::assertEquals($update['pasentorg'], $foundU->getPasentorg(), 'Valor búsqueda uuid no concuerda en pasentorg');
		self::assertEquals($update['cdgpstemp'], $foundU->getCdgpstemp(), 'Valor búsqueda uuid no concuerda en cdgpstemp');
		self::assertEquals($update['cdgtrbemp'], $foundU->getCdgtrbemp(), 'Valor búsqueda uuid no concuerda en cdgtrbemp');
		self::assertEquals($update['girentemp'], $foundU->getGirentemp(), 'Valor búsqueda uuid no concuerda en girentemp');
		self::assertEquals($update['tlfofiemp'], $foundU->getTlfofiemp(), 'Valor búsqueda uuid no concuerda en tlfofiemp');
		self::assertEquals($update['emlofiemp'], $foundU->getEmlofiemp(), 'Valor búsqueda uuid no concuerda en emlofiemp');
		self::assertEquals($update['desaliemp'], $foundU->getDesaliemp(), 'Valor búsqueda uuid no concuerda en desaliemp');
		self::assertEquals($update['candonemp'], $foundU->getCandonemp(), 'Valor búsqueda uuid no concuerda en candonemp');
		try {
			self::assertEquals($update['temconemp'], $foundU->getTemconemp(DATE_ISO8601), 'Valor búsqueda uuid no concuerda en temconemp');
		} catch(PropelException $e) {
            Log::debug($e);
            self::assertTrue(false, 'Formato búsqueda no concuerda: temconemp');
        }
		try {
			self::assertEquals($update['horentemp'], $foundU->getHorentemp(DATE_ISO8601), 'Valor búsqueda uuid no concuerda en horentemp');
		} catch(PropelException $e) {
            Log::debug($e);
            self::assertTrue(false, 'Formato búsqueda no concuerda: horentemp');
        }
		self::assertEquals($update['detentemo'], $foundU->getDetentemo(), 'Valor búsqueda uuid no concuerda en detentemo');
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
		$all = \Tblentemp::dspentemp(0,0,$trncnn);
		self::assertInstanceOf(\Propel\Runtime\Collection\Collection::class, $all);
		self::assertTrue($all->count() > 0);

//REMOVE ONE
		$destroyed = \Tblentemp::rmventemp($result->getidnentemp(),$trncnn);
		self::assertTrue($destroyed);
        TransactionHandler::rollback($trncnn);
    }
}