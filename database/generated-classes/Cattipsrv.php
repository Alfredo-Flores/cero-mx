<?php

use Base\Cattipsrv as BaseCattipsrv;

class Cattipsrv extends BaseCattipsrv
{
    public static function crttipsrv(array $data , \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $tipsrv = new \Cattipsrv();
        try{
            if(array_key_exists('uuid', $data)){
                if(!is_null($data['uuid'])){
                    $tipsrv->setUuid($data['uuid']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('uuid cannot be null');
                }
            }
            if(array_key_exists('dsctipsrv', $data)){
                if(!is_null($data['dsctipsrv'])){
                    $tipsrv->setDsctipsrv($data['dsctipsrv']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('dsctipsrv cannot be null');
                }
            }
            if(array_key_exists('created_at', $data)){
                if(!is_null($data['created_at'])){
                    $tipsrv->setCreatedAt($data['created_at']);
                }
            }
            if(array_key_exists('updated_at', $data)){
                if(!is_null($data['updated_at'])){
                    $tipsrv->setUpdatedAt($data['updated_at']);
                }
            }
            $tipsrv->save($connection);
        } catch (\Propel\Runtime\Exception\PropelException $e) {
            Illuminate\Support\Facades\Log::debug($e);
            return false;
        }
        return $tipsrv;
    }

    public static function rmvtipsrv($idntipsrv, \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $tipsrv = \CattipsrvQuery::create()
            ->filterByIdntipsrv($idntipsrv)
            ->findOne($connection);

        if(!$tipsrv) return false;

        try {
            $tipsrv->delete($connection);
        } catch (\Propel\Runtime\Exception\PropelException $e) {
            Illuminate\Support\Facades\Log::debug($e);
            return false;
        }

        return true;
    }

    public static function updtipsrv(array $data , \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $tipsrv = \CattipsrvQuery::create()
            ->filterByIdntipsrv($data['idntipsrv'])
            ->findOne($connection);

        if(!$tipsrv) return false;

        try{
            if(array_key_exists('uuid', $data)){
                if(!is_null($data['uuid'])){
                    $tipsrv->setUuid($data['uuid']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('uuid cannot be null');
                }
            }
            if(array_key_exists('dsctipsrv', $data)){
                if(!is_null($data['dsctipsrv'])){
                    $tipsrv->setDsctipsrv($data['dsctipsrv']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('dsctipsrv cannot be null');
                }
            }
            $tipsrv->setCreatedAt(array_key_exists('created_at', $data) ? $data['created_at'] : null);
            $tipsrv->setUpdatedAt(array_key_exists('updated_at', $data) ? $data['updated_at'] : null);
            $tipsrv->save($connection);
        } catch (\Propel\Runtime\Exception\PropelException $e) {
            Illuminate\Support\Facades\Log::debug($e);
            return false;
        }
            return $tipsrv;
    }

    public static function dsptipsrv(\Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $alltipsrv = \CattipsrvQuery::create();

        $alltipsrv = $alltipsrv->find();

        if(!$alltipsrv) return false;

        return $alltipsrv;
    }

    public static function fnotipsrv($idntipsrv, \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $tipsrv = \CattipsrvQuery::create()
            ->filterByIdntipsrv($idntipsrv)
            ->findOne($connection);

        if(!$tipsrv) return false;

        return $tipsrv;
    }

    public static function fnutipsrv($uuid,\Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $tipsrv = \CattipsrvQuery::create()
            ->filterByUuid($uuid)
            ->findOne($connection);

        if(!$tipsrv) return false;

        return $tipsrv;
    }

    //TODO *CRUD Generator control separator line* (Don't remove this line!)
}