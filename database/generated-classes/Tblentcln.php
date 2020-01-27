<?php

use Base\Tblentcln as BaseTblentcln;

class Tblentcln extends BaseTblentcln
{
    public static function crtentcln(array $data , \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entcln = new \Tblentcln();
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
            if(array_key_exists('uuid', $data)){
                if(!is_null($data['uuid'])){
                    $entcln->setUuid($data['uuid']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('uuid cannot be null');
                }
            }
            if(array_key_exists('prdentcln', $data)){
                if(!is_null($data['prdentcln'])){
                    $entcln->setPrdentcln($data['prdentcln']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('prdentcln cannot be null');
                }
            }
            if(array_key_exists('fchinccln', $data)){
                if(!is_null($data['fchinccln'])){
                    $entcln->setFchinccln($data['fchinccln']);
                }
            }
            if(array_key_exists('fchfnlcln', $data)){
                if(!is_null($data['fchfnlcln'])){
                    $entcln->setFchfnlcln($data['fchfnlcln']);
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

    public static function rmventcln($idnentcln, \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entcln = \TblentclnQuery::create()
            ->filterByIdnentcln($idnentcln)
            ->findOne($connection);

        if(!$entcln) return false;

        try {
            $entcln->setFnsentcln(true)
                ->save($connection);
        } catch (\Propel\Runtime\Exception\PropelException $e) {
            Illuminate\Support\Facades\Log::debug($e);
            return false;
        }
        return true;
    }

    public static function updentcln(array $data , \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entcln = \TblentclnQuery::create()
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
            if(array_key_exists('prdentcln', $data)){
                if(!is_null($data['prdentcln'])){
                    $entcln->setPrdentcln($data['prdentcln']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('prdentcln cannot be null');
                }
            }
            $entcln->setFchinccln(array_key_exists('fchinccln', $data) ? $data['fchinccln'] : null);
            $entcln->setFchfnlcln(array_key_exists('fchfnlcln', $data) ? $data['fchfnlcln'] : null);
            $entcln->setUpdatedAt(array_key_exists('updated_at', $data) ? $data['updated_at'] : null);
            $entcln->save($connection);
        } catch (\Propel\Runtime\Exception\PropelException $e) {
            Illuminate\Support\Facades\Log::debug($e);
            return false;
        }
            return $entcln;
    }

    public static function dspentcln($filidnentemp, $filidnentorg, \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $allentcln = \TblentclnQuery::create();
if($filidnentemp != 0){
            $allentcln = $allentcln->filterByIdnentemp($filidnentemp);
        }
if($filidnentorg != 0){
            $allentcln = $allentcln->filterByIdnentorg($filidnentorg);
        }

        $allentcln = $allentcln->find();

        if(!$allentcln) return false;

        return $allentcln;
    }

    public static function fnoentcln($idnentcln, \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entcln = \TblentclnQuery::create()
            ->filterByIdnentcln($idnentcln)
            ->where("fnsentcln != true")
            ->findOne($connection);

        if(!$entcln) return false;

        return $entcln;
    }

    public static function fndentemp($idnentemp, \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entcln = \TblentclnQuery::create()
            ->useTblentorgQuery()
                ->withColumn("Nmbentorg")
            ->endUse()
            ->filterByIdnentemp($idnentemp)
            ->where("fnsentcln != true")
            ->find($connection);

        if(!$entcln) return false;

        return $entcln;
    }

    public static function fndentorg($idnentorg, \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entcln = \TblentclnQuery::create()
            ->useTblentempQuery()
                ->withColumn("Namentemp")
                ->withColumn("Drcentemp")
                ->withColumn("Lclentemp")
                ->withColumn("Tlfofiemp")
                ->withColumn("Emlofiemp")
            ->endUse()
            ->filterByIdnentemp($idnentorg)
            ->where("fnsentcln != true")
            ->find($connection);

        if(!$entcln) return false;

        return $entcln;
    }

    public static function fnuentcln($uuid,\Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entcln = \TblentclnQuery::create()
            ->filterByUuid($uuid)
            ->findOne($connection);

        if(!$entcln) return false;

        return $entcln;
    }

    //TODO *CRUD Generator control separator line* (Don't remove this line!)
}
