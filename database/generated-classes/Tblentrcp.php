<?php

use Base\Tblentrcp as BaseTblentrcp;
use Illuminate\Support\Facades\Log;

/**
 * Skeleton subclass for representing a row from the 'tblentrcp' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Tblentrcp extends BaseTblentrcp
{
    public static function crtentrcp(array $data , \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entcln = new \Tblentrcp();
        try{
            if(array_key_exists('idnentemp', $data)){
                if(!is_null($data['idnentemp'])){
                    $entcln->setIdnentemp($data['idnentemp']);
                }
            }
            if(array_key_exists('idnentorg', $data)){
                if(!is_null($data['idnentorg'])){
                    $entcln->setIdnentorg($data['idnentorg']);
                }
            }
            if(array_key_exists('idnentcln', $data)){
                if(!is_null($data['idnentcln'])){
                    $entcln->setIdnentcln($data['idnentcln']);
                }
            }
            if(array_key_exists('uuid', $data)){
                if(!is_null($data['uuid'])){
                    $entcln->setUuid($data['uuid']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('uuid cannot be null');
                }
            }
            if(array_key_exists('fchinccln', $data)){
                if(!is_null($data['fchinccln'])){
                    $entcln->setFchinccln($data['fchinccln']);
                }
            }
            if(array_key_exists('created_at', $data)){
                if(!is_null($data['created_at'])){
                    $entcln->setCreatedAt($data['created_at']);
                }
            }
            if(array_key_exists('updated_at', $data)){
                if(!is_null($data['updated_at'])){
                    $entcln->setUpdatedAt($data['updated_at']);
                }
            }
            $entcln->save($connection);
        } catch (\Propel\Runtime\Exception\PropelException $e) {
            Illuminate\Support\Facades\Log::debug($e);
            return false;
        }
        return $entcln;
    }

    public static function updentcln(array $data , \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entcln = \TblentrcpQuery::create()
            ->filterByIdnentcln($data['idnentcln'])
            ->findOne($connection);

        if(!$entcln) return false;

        try{
            if(array_key_exists('uuid', $data)){
                if(!is_null($data['uuid'])){
                    $entcln->setUuid($data['uuid']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('uuid cannot be null');
                }
            }
            if(array_key_exists('fchinccln', $data)){
                if(!is_null($data['fchinccln'])){
                    $entcln->setFchinccln($data['fchinccln']);
                }
            }
            if(array_key_exists('tipentrcp', $data)){
                if(!is_null($data['tipentrcp'])){
                    $entcln->setTipentrcp($data['tipentrcp']);
                }
            }
            if(array_key_exists('kgsentrcp', $data)){
                if(!is_null($data['kgsentrcp'])){
                    $entcln->setKgsentrcp($data['kgsentrcp']);
                }
            }
            if(array_key_exists('cntcjsrcp', $data)){
                if(!is_null($data['cntcjsrcp'])){
                    $entcln->setCntcjsrcp($data['cntcjsrcp']);
                }
            }
            if(array_key_exists('rtnentcln', $data)){
                if(!is_null($data['rtnentcln'])){
                    $entcln->setRtnentcln($data['rtnentcln']);
                }
            }
            if(array_key_exists('vldentcln', $data)){
                if(!is_null($data['vldentcln'])){
                    $entcln->setVldentcln($data['vldentcln']);
                }
            }
            if(array_key_exists('fnsentcln', $data)){
                if(!is_null($data['fnsentcln'])){
                    $entcln->setFnsentcln($data['fnsentcln']);
                }
            }
            $entcln->setUpdatedAt(array_key_exists('updated_at', $data) ? $data['updated_at'] : null);
            $entcln->save($connection);
        } catch (\Propel\Runtime\Exception\PropelException $e) {
            Illuminate\Support\Facades\Log::debug($e);
            return false;
        }
        return $entcln;
    }

    public static function dltupdcln(int $idnentcln , String $today,  \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entcln = \TblentrcpQuery::create()
            ->filterByIdnentcln($idnentcln)
            ->where("fchinccln > '" . $today ."'")
            ->find($connection);

        try {
            $entcln->delete($connection);
        } catch (\Propel\Runtime\Exception\PropelException $e) {
            Illuminate\Support\Facades\Log::debug($e);
            return false;
        }

        return true;
    }

    public static function fndentorg($idnentorg, \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $today = date("Y-m-d 00:00:00");
        $tomorrow = date("Y-m-d 23:59:00");

        $entcln = \TblentrcpQuery::create()
            ->useTblentempQuery()
                ->withColumn("Namentemp")
                ->withColumn("Drcentemp")
                ->withColumn("Lclentemp")
                ->withColumn("Tlfofiemp")
                ->withColumn("Emlofiemp")
            ->endUse()
            ->filterByIdnentorg($idnentorg)
            ->where("vldentcln != true && fnsentcln != true &&  fchinccln > '" . $today . "' && fchinccln < '" . $tomorrow . "'")
            ->find($connection);

        if(!$entcln) return false;

        return $entcln;
    }

    public static function fndentemp($idnentemp, \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $today = date("Y-m-d 00:00:00");
        $tomorrow = date("Y-m-d 23:59:00");

        $entcln = \TblentrcpQuery::create()
            ->useTblentempQuery()
                ->withColumn("Namentemp")
                ->withColumn("Drcentemp")
                ->withColumn("Lclentemp")
                ->withColumn("Tlfofiemp")
                ->withColumn("Emlofiemp")
            ->endUse()
            ->filterByIdnentemp($idnentemp)
            ->where("vldentcln != true && fnsentcln != true &&  fchinccln > '" . $today . "' && fchinccln < '" . $tomorrow . "'")
            ->find($connection);

        if(!$entcln) return false;

        return $entcln;
    }

    public static function fnuentrcp($uuid, \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entcln = \TblentrcpQuery::create()
            ->filterByUuid($uuid)
            ->findOne($connection);

        if(!$entcln) return false;

        return $entcln;
    }

}
