<?php

use Base\Tblentprs as BaseTblentprs;

class Tblentprs extends BaseTblentprs
{
    public static function crtentprs(array $data , \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entprs = new \Tblentprs();
        try{
            if(array_key_exists('uuid', $data)){
                if(!is_null($data['uuid'])){
                    $entprs->setUuid($data['uuid']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('uuid cannot be null');
                }
            }
            if(array_key_exists('idnentusr', $data)){
                if(!is_null($data['idnentusr'])){
                    $usr = \UsersQuery::create()
                        ->findOneById($data['idnentusr']);

                    $usr->setIsinstitution(1)
                    ->save();

                    $entprs->setIdnentusr($data['idnentusr']);
                }
            }
            if(array_key_exists('nomentprs', $data)){
                if(!is_null($data['nomentprs'])){
                    $entprs->setNomentprs($data['nomentprs']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('nomentprs cannot be null');
                }
            }
            if(array_key_exists('prmaplprs', $data)){
                if(!is_null($data['prmaplprs'])){
                    $entprs->setPrmaplprs($data['prmaplprs']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('prmaplprs cannot be null');
                }
            }
            if(array_key_exists('sgnaplprs', $data)){
                if(!is_null($data['sgnaplprs'])){
                    $entprs->setSgnaplprs($data['sgnaplprs']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('sgnaplprs cannot be null');
                }
            }
            if(array_key_exists('crpentprs', $data)){
                if(!is_null($data['crpentprs'])){
                    $entprs->setCrpentprs($data['crpentprs']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('crpentprs cannot be null');
                }
            }
            if(array_key_exists('rfcentprs', $data)){
                if(!is_null($data['rfcentprs'])){
                    $entprs->setRfcentprs($data['rfcentprs']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('rfcentprs cannot be null');
                }
            }
            if(array_key_exists('emllbrprs', $data)){
                if(!is_null($data['emllbrprs'])){
                    $entprs->setEmllbrprs($data['emllbrprs']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('emllbrprs cannot be null');
                }
            }
            if(array_key_exists('emlprsprs', $data)){
                if(!is_null($data['emlprsprs'])){
                    $entprs->setEmlprsprs($data['emlprsprs']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('emlprsprs cannot be null');
                }
            }
            if(array_key_exists('ncnentprs', $data)){
                if(!is_null($data['ncnentprs'])){
                    $entprs->setNcnentprs($data['ncnentprs']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('ncnentprs cannot be null');
                }
            }
            if(array_key_exists('pasentprs', $data)){
                if(!is_null($data['pasentprs'])){
                    $entprs->setPasentprs($data['pasentprs']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('pasentprs cannot be null');
                }
            }
            if(array_key_exists('ententprs', $data)){
                if(!is_null($data['ententprs'])){
                    $entprs->setEntentprs($data['ententprs']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('ententprs cannot be null');
                }
            }
            if(array_key_exists('mncentprs', $data)){
                if(!is_null($data['mncentprs'])){
                    $entprs->setMncentprs($data['mncentprs']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('mncentprs cannot be null');
                }
            }
            if(array_key_exists('lclentprs', $data)){
                if(!is_null($data['lclentprs'])){
                    $entprs->setLclentprs($data['lclentprs']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('lclentprs cannot be null');
                }
            }
            if(array_key_exists('dmcentprs', $data)){
                if(!is_null($data['dmcentprs'])){
                    $entprs->setDmcentprs($data['dmcentprs']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('dmcentprs cannot be null');
                }
            }
            if(array_key_exists('cdgpstprs', $data)){
                if(!is_null($data['cdgpstprs'])){
                    $entprs->setCdgpstprs($data['cdgpstprs']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('cdgpstprs cannot be null');
                }
            }
            if(array_key_exists('tlffijprs', $data)){
                if(!is_null($data['tlffijprs'])){
                    $entprs->setTlffijprs($data['tlffijprs']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('tlffijprs cannot be null');
                }
            }
            if(array_key_exists('tlfmvlprs', $data)){
                if(!is_null($data['tlfmvlprs'])){
                    $entprs->setTlfmvlprs($data['tlfmvlprs']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('tlfmvlprs cannot be null');
                }
            }
            if(array_key_exists('fotentprs', $data)){
                if(!is_null($data['fotentprs'])){
                    $entprs->setFotentprs($data['fotentprs']);
                }
            }
            if(array_key_exists('created_at', $data)){
                if(!is_null($data['created_at'])){
                    $entprs->setCreatedAt($data['created_at']);
                }
            }
            if(array_key_exists('updated_at', $data)){
                if(!is_null($data['updated_at'])){
                    $entprs->setUpdatedAt($data['updated_at']);
                }
            }
            if(array_key_exists('tipentprs', $data)){
                if(!is_null($data['tipentprs'])){
                    $entprs->setTipentprs($data['tipentprs']);
                }
            }
            $entprs->save($connection);
        } catch (\Propel\Runtime\Exception\PropelException $e) {
            Illuminate\Support\Facades\Log::debug($e);
            return false;
        }
        return $entprs;
    }

    public static function rmventprs($idnentprs, \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entprs = \TblentprsQuery::create()
            ->filterByIdnentprs($idnentprs)
            ->findOne($connection);

        if(!$entprs) return false;

        try {
            $entprs->delete($connection);
        } catch (\Propel\Runtime\Exception\PropelException $e) {
            Illuminate\Support\Facades\Log::debug($e);
            return false;
        }

        return true;
    }

    public static function updentprs(array $data , \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entprs = \TblentprsQuery::create()
            ->filterByIdnentprs($data['idnentprs'])
            ->findOne($connection);

        if(!$entprs) return false;

        try{
            if(array_key_exists('uuid', $data)){
                if(!is_null($data['uuid'])){
                    $entprs->setUuid($data['uuid']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('uuid cannot be null');
                }
            }
            $entprs->setIdnentusr(array_key_exists('idnentusr', $data) ? $data['idnentusr'] : null);
            if(array_key_exists('nomentprs', $data)){
                if(!is_null($data['nomentprs'])){
                    $entprs->setNomentprs($data['nomentprs']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('nomentprs cannot be null');
                }
            }
            if(array_key_exists('prmaplprs', $data)){
                if(!is_null($data['prmaplprs'])){
                    $entprs->setPrmaplprs($data['prmaplprs']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('prmaplprs cannot be null');
                }
            }
            if(array_key_exists('sgnaplprs', $data)){
                if(!is_null($data['sgnaplprs'])){
                    $entprs->setSgnaplprs($data['sgnaplprs']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('sgnaplprs cannot be null');
                }
            }
            if(array_key_exists('crpentprs', $data)){
                if(!is_null($data['crpentprs'])){
                    $entprs->setCrpentprs($data['crpentprs']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('crpentprs cannot be null');
                }
            }
            if(array_key_exists('rfcentprs', $data)){
                if(!is_null($data['rfcentprs'])){
                    $entprs->setRfcentprs($data['rfcentprs']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('rfcentprs cannot be null');
                }
            }
            if(array_key_exists('emllbrprs', $data)){
                if(!is_null($data['emllbrprs'])){
                    $entprs->setEmllbrprs($data['emllbrprs']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('emllbrprs cannot be null');
                }
            }
            if(array_key_exists('emlprsprs', $data)){
                if(!is_null($data['emlprsprs'])){
                    $entprs->setEmlprsprs($data['emlprsprs']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('emlprsprs cannot be null');
                }
            }
            if(array_key_exists('ncnentprs', $data)){
                if(!is_null($data['ncnentprs'])){
                    $entprs->setNcnentprs($data['ncnentprs']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('ncnentprs cannot be null');
                }
            }
            if(array_key_exists('pasentprs', $data)){
                if(!is_null($data['pasentprs'])){
                    $entprs->setPasentprs($data['pasentprs']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('pasentprs cannot be null');
                }
            }
            if(array_key_exists('ententprs', $data)){
                if(!is_null($data['ententprs'])){
                    $entprs->setEntentprs($data['ententprs']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('ententprs cannot be null');
                }
            }
            if(array_key_exists('mncentprs', $data)){
                if(!is_null($data['mncentprs'])){
                    $entprs->setMncentprs($data['mncentprs']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('mncentprs cannot be null');
                }
            }
            if(array_key_exists('lclentprs', $data)){
                if(!is_null($data['lclentprs'])){
                    $entprs->setLclentprs($data['lclentprs']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('lclentprs cannot be null');
                }
            }
            if(array_key_exists('dmcentprs', $data)){
                if(!is_null($data['dmcentprs'])){
                    $entprs->setDmcentprs($data['dmcentprs']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('dmcentprs cannot be null');
                }
            }
            if(array_key_exists('cdgpstprs', $data)){
                if(!is_null($data['cdgpstprs'])){
                    $entprs->setCdgpstprs($data['cdgpstprs']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('cdgpstprs cannot be null');
                }
            }
            if(array_key_exists('tlffijprs', $data)){
                if(!is_null($data['tlffijprs'])){
                    $entprs->setTlffijprs($data['tlffijprs']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('tlffijprs cannot be null');
                }
            }
            if(array_key_exists('tlfmvlprs', $data)){
                if(!is_null($data['tlfmvlprs'])){
                    $entprs->setTlfmvlprs($data['tlfmvlprs']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('tlfmvlprs cannot be null');
                }
            }
            $entprs->setFotentprs(array_key_exists('fotentprs', $data) ? $data['fotentprs'] : null);
            $entprs->setCreatedAt(array_key_exists('created_at', $data) ? $data['created_at'] : null);
            $entprs->setUpdatedAt(array_key_exists('updated_at', $data) ? $data['updated_at'] : null);
            $entprs->save($connection);
        } catch (\Propel\Runtime\Exception\PropelException $e) {
            Illuminate\Support\Facades\Log::debug($e);
            return false;
        }
            return $entprs;
    }

    public static function dspentprs($filidnentusr, \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $allentprs = \TblentprsQuery::create();
if($filidnentusr != 0){
            $allentprs = $allentprs->filterByIdnentusr($filidnentusr);
        }

        $allentprs = $allentprs->find();

        if(!$allentprs) return false;

        return $allentprs;
    }

    public static function fnoentprs($idnentprs, \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entprs = \TblentprsQuery::create()
            ->filterByIdnentprs($idnentprs)
            ->findOne($connection);

        if(!$entprs) return false;

        return $entprs;
    }

    public static function fnoentusr($idnentprs, \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entusr = \TblentprsQuery::create()
            ->filterByIdnentusr($idnentprs)
            ->findOne($connection);

        if(!$entusr) return false;

        return $entusr;
    }

    public static function fnuentprs($uuid,\Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entprs = \TblentprsQuery::create()
            ->filterByUuid($uuid)
            ->findOne($connection);

        if(!$entprs) return false;

        return $entprs;
    }

    //TODO *CRUD Generator control separator line* (Don't remove this line!)
}
