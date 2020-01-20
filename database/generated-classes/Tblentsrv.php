<?php

use Base\Tblentsrv as BaseTblentsrv;

class Tblentsrv extends BaseTblentsrv
{
    public static function crtentsrv(array $data , \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entsrv = new \Tblentsrv();
        try{
            if(array_key_exists('idntipsrv', $data)){
                if(!is_null($data['idntipsrv'])){
                    $entsrv->setIdntipsrv($data['idntipsrv']);
                }
            }
            if(array_key_exists('idngirorg', $data)){
                if(!is_null($data['idngirorg'])){
                    $entsrv->setIdngirorg($data['idngirorg']);
                }
            }
            if(array_key_exists('uuid', $data)){
                if(!is_null($data['uuid'])){
                    $entsrv->setUuid($data['uuid']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('uuid cannot be null');
                }
            }
            if(array_key_exists('created_at', $data)){
                if(!is_null($data['created_at'])){
                    $entsrv->setCreatedAt($data['created_at']);
                }
            }
            if(array_key_exists('updated_at', $data)){
                if(!is_null($data['updated_at'])){
                    $entsrv->setUpdatedAt($data['updated_at']);
                }
            }
            $entsrv->save($connection);
        } catch (\Propel\Runtime\Exception\PropelException $e) {
            Illuminate\Support\Facades\Log::debug($e);
            return false;
        }
        return $entsrv;
    }

    public static function rmventsrv($idnentsrv, \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entsrv = \TblentsrvQuery::create()
            ->filterByIdnentsrv($idnentsrv)
            ->findOne($connection);

        if(!$entsrv) return false;

        try {
            $entsrv->delete($connection);
        } catch (\Propel\Runtime\Exception\PropelException $e) {
            Illuminate\Support\Facades\Log::debug($e);
            return false;
        }

        return true;
    }

    public static function updentsrv(array $data , \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entsrv = \TblentsrvQuery::create()
            ->filterByIdnentsrv($data['idnentsrv'])
            ->findOne($connection);

        if(!$entsrv) return false;

        try{
            $entsrv->setIdntipsrv(array_key_exists('idntipsrv', $data) ? $data['idntipsrv'] : null);
            $entsrv->setIdngirorg(array_key_exists('idngirorg', $data) ? $data['idngirorg'] : null);
            if(array_key_exists('uuid', $data)){
                if(!is_null($data['uuid'])){
                    $entsrv->setUuid($data['uuid']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('uuid cannot be null');
                }
            }
            $entsrv->setCreatedAt(array_key_exists('created_at', $data) ? $data['created_at'] : null);
            $entsrv->setUpdatedAt(array_key_exists('updated_at', $data) ? $data['updated_at'] : null);
            $entsrv->save($connection);
        } catch (\Propel\Runtime\Exception\PropelException $e) {
            Illuminate\Support\Facades\Log::debug($e);
            return false;
        }
            return $entsrv;
    }

    public static function dspentsrv($filidngirorg, $filidntipsrv, \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $allentsrv = \TblentsrvQuery::create();
if($filidngirorg != 0){
            $allentsrv = $allentsrv->filterByIdngirorg($filidngirorg);
        }
if($filidntipsrv != 0){
            $allentsrv = $allentsrv->filterByIdntipsrv($filidntipsrv);
        }

        $allentsrv = $allentsrv->find();

        if(!$allentsrv) return false;

        return $allentsrv;
    }

    public static function fnoentsrv($idnentsrv, \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entsrv = \TblentsrvQuery::create()
            ->filterByIdnentsrv($idnentsrv)
            ->findOne($connection);

        if(!$entsrv) return false;

        return $entsrv;
    }

    public static function fnuentsrv($uuid,\Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entsrv = \TblentsrvQuery::create()
            ->filterByUuid($uuid)
            ->findOne($connection);

        if(!$entsrv) return false;

        return $entsrv;
    }

    //TODO *CRUD Generator control separator line* (Don't remove this line!)
}
