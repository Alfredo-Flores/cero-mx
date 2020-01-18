<?php

use Base\Tblentdnc as BaseTblentdnc;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\Propel;

class Tblentdnc extends BaseTblentdnc
{
    public static function crtentdnc(array $data , \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entdnc = new \Tblentdnc();
        try{
            if(array_key_exists('idnentemp', $data)){
                if(!is_null($data['idnentemp'])){
                    $entdnc->setIdnentemp($data['idnentemp']);
                }
            }
            if(array_key_exists('uuid', $data)){
                if(!is_null($data['uuid'])){
                    $entdnc->setUuid($data['uuid']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('uuid cannot be null');
                }
            }
            if(array_key_exists('dscentdnc', $data)){
                if(!is_null($data['dscentdnc'])){
                    $entdnc->setDscentdnc($data['dscentdnc']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('dscentdnc cannot be null');
                }
            }
            if(array_key_exists('tipentdnc', $data)){
                if(!is_null($data['tipentdnc'])){
                    $entdnc->setTipentdnc($data['tipentdnc']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('tipentdnc cannot be null');
                }
            }
            if(array_key_exists('kgsentdnc', $data)){
                if(!is_null($data['kgsentdnc'])){
                    $entdnc->setKgsentdnc($data['kgsentdnc']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('kgsentdnc cannot be null');
                }
            }
            if(array_key_exists('cntcjsdnc', $data)){
                if(!is_null($data['cntcjsdnc'])){
                    $entdnc->setCntcjsdnc($data['cntcjsdnc']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('cntcjsdnc cannot be null');
                }
            }
            if(array_key_exists('tmprstdnc', $data)){
                if(!is_null($data['tmprstdnc'])){
                    $entdnc->setTmprstdnc($data['tmprstdnc']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('tmprstdnc cannot be null');
                }
            }
            if(array_key_exists('created_at', $data)){
                if(!is_null($data['created_at'])){
                    $entdnc->setCreatedAt($data['created_at']);
                }
            }
            if(array_key_exists('updated_at', $data)){
                if(!is_null($data['updated_at'])){
                    $entdnc->setUpdatedAt($data['updated_at']);
                }
            }
            $entdnc->save($connection);
        } catch (\Propel\Runtime\Exception\PropelException $e) {
            Illuminate\Support\Facades\Log::debug($e);
            return false;
        }
        return $entdnc;
    }

    public static function rmventdnc($identdnc, \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entdnc = \TblentdncQuery::create()
            ->filterByIdentdnc($identdnc)
            ->findOne($connection);

        if(!$entdnc) return false;

        try {
            $entdnc->delete($connection);
        } catch (\Propel\Runtime\Exception\PropelException $e) {
            Illuminate\Support\Facades\Log::debug($e);
            return false;
        }

        return true;
    }

    public static function updentdnc(array $data , \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entdnc = \TblentdncQuery::create()
            ->filterByIdentdnc($data['identdnc'])
            ->findOne($connection);

        if(!$entdnc) return false;

        try{
            $entdnc->setIdnentemp(array_key_exists('idnentemp', $data) ? $data['idnentemp'] : null);
            if(array_key_exists('uuid', $data)){
                if(!is_null($data['uuid'])){
                    $entdnc->setUuid($data['uuid']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('uuid cannot be null');
                }
            }
            if(array_key_exists('dscentdnc', $data)){
                if(!is_null($data['dscentdnc'])){
                    $entdnc->setDscentdnc($data['dscentdnc']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('dscentdnc cannot be null');
                }
            }
            if(array_key_exists('tipentdnc', $data)){
                if(!is_null($data['tipentdnc'])){
                    $entdnc->setTipentdnc($data['tipentdnc']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('tipentdnc cannot be null');
                }
            }
            if(array_key_exists('kgsentdnc', $data)){
                if(!is_null($data['kgsentdnc'])){
                    $entdnc->setKgsentdnc($data['kgsentdnc']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('kgsentdnc cannot be null');
                }
            }
            if(array_key_exists('cntcjsdnc', $data)){
                if(!is_null($data['cntcjsdnc'])){
                    $entdnc->setCntcjsdnc($data['cntcjsdnc']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('cntcjsdnc cannot be null');
                }
            }
            if(array_key_exists('tmprstdnc', $data)){
                if(!is_null($data['tmprstdnc'])){
                    $entdnc->setTmprstdnc($data['tmprstdnc']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('tmprstdnc cannot be null');
                }
            }
            $entdnc->setCreatedAt(array_key_exists('created_at', $data) ? $data['created_at'] : null);
            $entdnc->setUpdatedAt(array_key_exists('updated_at', $data) ? $data['updated_at'] : null);
            $entdnc->save($connection);
        } catch (\Propel\Runtime\Exception\PropelException $e) {
            Illuminate\Support\Facades\Log::debug($e);
            return false;
        }
            return $entdnc;
    }

    public static function rqsentdnc(array $data , \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entdnc = \TblentdncQuery::create()
            ->filterByUuid($data['uuid'])
            ->findOne($connection);

        if(!$entdnc) return false;

        try{

            if(array_key_exists('rqsentdnc', $data)){
                if(!is_null($data['rqsentdnc'])){
                    $entdnc->setRqsentdnc($data['rqsentdnc']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('rqsentdnc cannot be null');
                }
            }
            $entdnc->setUpdatedAt(array_key_exists('updated_at', $data) ? $data['updated_at'] : null);
            $entdnc->save($connection);
        } catch (\Propel\Runtime\Exception\PropelException $e) {
            Illuminate\Support\Facades\Log::debug($e);
            return false;
        }
            return $entdnc;
    }

    public static function dspentdnc($filidnentemp, \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $allentdnc = \TblentdncQuery::create();
if($filidnentemp != 0){
            $allentdnc = $allentdnc->filterByIdnentemp($filidnentemp);
        }

        $allentdnc = $allentdnc->find();

        if(!$allentdnc) return false;

        return $allentdnc;
    }

    public static function fndreqdnc($idnentemp, \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entdnc = \TblentdncQuery::create()
            ->orderByCreatedAt(Criteria::ASC)
            ->where("rqsentdnc = 1")

            ->findByIdnentemp($idnentemp);

        if(!$entdnc) return false;

        return $entdnc;
    }

    public static function fndentdnc(\Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entdnc = \TblentdncQuery::create()
            ->orderByCreatedAt(Criteria::ASC)
            ->find($connection);

        if(!$entdnc) return false;

        return $entdnc;
    }

    public static function fndempdnc(\Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entdnc = \TblentdncQuery::create()
            ->useTblentempQuery()
                ->withColumn("Namentemp")
                ->withColumn("Drcentemp")
                ->withColumn("Lclentemp")
                ->withColumn("Emlofiemp")
                ->withColumn("Tlfofiemp")
            ->endUse()
            ->orderByCreatedAt(Criteria::ASC)
            ->where("rqsentdnc != 1")
            ->find($connection);

        if(!$entdnc) return false;

        return $entdnc;
    }

    public static function fnoentdnc($identdnc, \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entdnc = \TblentdncQuery::create()
            ->filterByIdentdnc($identdnc)
            ->findOne($connection);

        if(!$entdnc) return false;

        return $entdnc;
    }

    public static function fnuentdnc($uuid,\Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entdnc = \TblentdncQuery::create()
            ->filterByUuid($uuid)
            ->findOne($connection);

        if(!$entdnc) return false;

        return $entdnc;
    }

    //TODO *CRUD Generator control separator line* (Don't remove this line!)
}
