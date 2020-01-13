<?php

use Base\Catgirorg as BaseCatgirorg;

class Catgirorg extends BaseCatgirorg
{
    public static function crtgirorg(array $data , \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $girorg = new \Catgirorg();
        try{
            if(array_key_exists('uuid', $data)){
                if(!is_null($data['uuid'])){
                    $girorg->setUuid($data['uuid']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('uuid cannot be null');
                }
            }
            if(array_key_exists('dscgirorg', $data)){
                if(!is_null($data['dscgirorg'])){
                    $girorg->setDscgirorg($data['dscgirorg']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('dscgirorg cannot be null');
                }
            }
            if(array_key_exists('created_at', $data)){
                if(!is_null($data['created_at'])){
                    $girorg->setCreatedAt($data['created_at']);
                }
            }
            if(array_key_exists('updated_at', $data)){
                if(!is_null($data['updated_at'])){
                    $girorg->setUpdatedAt($data['updated_at']);
                }
            }
            $girorg->save($connection);
        } catch (\Propel\Runtime\Exception\PropelException $e) {
            Illuminate\Support\Facades\Log::debug($e);
            return false;
        }
        return $girorg;
    }

    public static function rmvgirorg($idngirorg, \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $girorg = \CatgirorgQuery::create()
            ->filterByIdngirorg($idngirorg)
            ->findOne($connection);

        if(!$girorg) return false;

        try {
            $girorg->delete($connection);
        } catch (\Propel\Runtime\Exception\PropelException $e) {
            Illuminate\Support\Facades\Log::debug($e);
            return false;
        }

        return true;
    }

    public static function updgirorg(array $data , \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $girorg = \CatgirorgQuery::create()
            ->filterByIdngirorg($data['idngirorg'])
            ->findOne($connection);

        if(!$girorg) return false;

        try{
            if(array_key_exists('uuid', $data)){
                if(!is_null($data['uuid'])){
                    $girorg->setUuid($data['uuid']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('uuid cannot be null');
                }
            }
            if(array_key_exists('dscgirorg', $data)){
                if(!is_null($data['dscgirorg'])){
                    $girorg->setDscgirorg($data['dscgirorg']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('dscgirorg cannot be null');
                }
            }
            $girorg->setCreatedAt(array_key_exists('created_at', $data) ? $data['created_at'] : null);
            $girorg->setUpdatedAt(array_key_exists('updated_at', $data) ? $data['updated_at'] : null);
            $girorg->save($connection);
        } catch (\Propel\Runtime\Exception\PropelException $e) {
            Illuminate\Support\Facades\Log::debug($e);
            return false;
        }
            return $girorg;
    }

    public static function dspgirorg(\Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $allgirorg = \CatgirorgQuery::create();

        $allgirorg = $allgirorg->find();

        if(!$allgirorg) return false;

        return $allgirorg;
    }

    public static function fnogirorg($idngirorg, \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $girorg = \CatgirorgQuery::create()
            ->filterByIdngirorg($idngirorg)
            ->findOne($connection);

        if(!$girorg) return false;

        return $girorg;
    }

    public static function fnugirorg($uuid,\Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $girorg = \CatgirorgQuery::create()
            ->filterByUuid($uuid)
            ->findOne($connection);

        if(!$girorg) return false;

        return $girorg;
    }

    //TODO *CRUD Generator control separator line* (Don't remove this line!)
}
