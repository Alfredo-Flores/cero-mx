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
            $entdnc->setFnsentdnc(true)
                ->save($connection);
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
            $entdnc->setUpdatedAt(array_key_exists('updated_at', $data) ? $data['updated_at'] : null);
            $entdnc->save($connection);
        } catch (\Propel\Runtime\Exception\PropelException $e) {
            Illuminate\Support\Facades\Log::debug($e);
            return false;
        }
            return $entdnc;
    }

    public static function ntrentdnc(array $data , \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entdnc = \TblentdncQuery::create()
            ->filterByUuid($data['uuid'])
            ->findOne($connection);

        if(!$entdnc) return false;

        try{
            if(array_key_exists('ntrentdnc', $data)){
                if(!is_null($data['ntrentdnc'])){
                    $entdnc->setNtrentdnc($data['ntrentdnc']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('ntrentdnc cannot be null');
                }
            }
            if(array_key_exists('idnentorg', $data)){
                if(!is_null($data['idnentorg'])){
                    $entdnc->setIdnentorg($data['idnentorg']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('idnentorg cannot be null');
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
            if(array_key_exists('idnentorg', $data)){
                if(!is_null($data['idnentorg'])){
                    $entdnc->setIdnentorg($data['idnentorg']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('idnentorg cannot be null');
                }
            }
            $entdnc->save($connection);

        } catch (\Propel\Runtime\Exception\PropelException $e) {
            Illuminate\Support\Facades\Log::debug($e);
            return false;
        }
            return $entdnc;
    }

    public static function clnentdnc(array $data , \Propel\Runtime\Connection\ConnectionInterface $connection = null)
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
            if(array_key_exists('clnentdnc', $data)){
                if(!is_null($data['clnentdnc'])){
                    $entdnc->setClnentdnc($data['clnentdnc']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('clnentdnc cannot be null');
                }
            }
            if(array_key_exists('idnentorg', $data)){
                if(!is_null($data['idnentorg'])){
                    $entdnc->setIdnentorg($data['idnentorg']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('idnentorg cannot be null');
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
            ->where("rqsentdnc = 1 && fnsentdnc != true")
            ->findByIdnentemp($idnentemp);

        if(!$entdnc) return false;

        return $entdnc;
    }

    public static function fndentdnc(\Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entdnc = \TblentdncQuery::create()
            ->orderByCreatedAt(Criteria::ASC)
            ->where("fnsentdnc != true")
            ->find($connection);

        if(!$entdnc) return false;

        return $entdnc;
    }

    public static function fnddncemp(\Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entdnc = \TblentdncQuery::create()
            ->useTblentempQuery()
                ->withColumn("Namentemp")
                ->withColumn("Logentemp")
                ->withColumn("Tlfofiemp")
                ->withColumn("Emlofiemp")
                ->withColumn("Detentemo")
            ->endUse()
            ->where("rqsentdnc != 1 && fnsentdnc != true")
            ->orderByCreatedAt(Criteria::ASC)
            ->find($connection);

        if(!$entdnc) return false;

        return $entdnc;
    }

    public static function fndempdnc(int $idnentemp, \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entdnc = \TblentdncQuery::create()
            ->useTblentorgQuery()
                ->withColumn("Nmbentorg")
                ->withColumn("Dmcentorg")
                ->withColumn("Lclentorg")
                ->withColumn("Tlffcnorg")
                ->withColumn("Emlfcnorg")
            ->endUse()
            ->filterByIdnentemp($idnentemp)
            ->where("fnsentdnc != 1")
            ->find($connection);

        if(!$entdnc) return false;

        return $entdnc;
    }


    public static function fndempreq(int $idnentemp, \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entdnc = \TblentdncQuery::create()
            ->useTblentorgQuery()
                ->withColumn("Nmbentorg")
                ->withColumn("Dmcentorg")
                ->withColumn("Lclentorg")
                ->withColumn("Tlffcnorg")
                ->withColumn("Emlfcnorg")
            ->endUse()
            ->filterByIdnentemp($idnentemp)
            ->where("rqsentdnc = 1 && clnentdnc = 0")
            ->find($connection);

        if(!$entdnc) return false;

        return $entdnc;
    }

    public static function fndempcln(int $idnentemp, \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entdnc = \TblentdncQuery::create()
            ->useTblentorgQuery()
            ->withColumn("Nmbentorg")
            ->withColumn("Dmcentorg")
            ->withColumn("Lclentorg")
            ->withColumn("Tlffcnorg")
            ->withColumn("Emlfcnorg")
            ->endUse()
            ->filterByIdnentemp($idnentemp)
            ->where("rqsentdnc = 1 && clnentdnc = 1")
            ->find($connection);

        if(!$entdnc) return false;

        return $entdnc;
    }

    public static function fndempfns(int $idnentemp, \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entdnc = \TblentdncQuery::create()
            ->useTblentorgQuery()
                ->withColumn("Nmbentorg")
                ->withColumn("Dmcentorg")
                ->withColumn("Lclentorg")
                ->withColumn("Tlffcnorg")
                ->withColumn("Emlfcnorg")
            ->endUse()
            ->filterByIdnentemp($idnentemp)
            ->where("clnentdnc = 1 || fnsentdnc = 1")
            ->find($connection);

        if(!$entdnc) return false;

        return $entdnc;
    }

    public static function fndorgcln(int $idnentorg, \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entdnc = \TblentdncQuery::create()
            ->filterByIdnentorg($idnentorg)
            ->useTblentempQuery()
                ->withColumn("Namentemp")
                ->withColumn("Drcentemp")
                ->withColumn("Lclentemp")
                ->withColumn("Tlfofiemp")
                ->withColumn("Emlofiemp")
            ->endUse()
            ->where("rqsentdnc = 1 && clnentdnc = 1 && fnsentdnc = 0")
            ->orderByCreatedAt(Criteria::ASC)
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
