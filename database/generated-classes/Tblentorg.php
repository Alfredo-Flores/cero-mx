<?php

use Base\Tblentorg as BaseTblentorg;

class Tblentorg extends BaseTblentorg
{
    public static function crtentorg(array $data , \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entorg = new \Tblentorg();
        try{
            if(array_key_exists('uuid', $data)){
                if(!is_null($data['uuid'])){
                    $entorg->setUuid($data['uuid']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('uuid cannot be null');
                }
            }
            if(array_key_exists('idnentprs', $data)){
                if(!is_null($data['idnentprs'])){
                    $entorg->setIdnentprs($data['idnentprs']);
                }
            }
            if(array_key_exists('srventorg', $data)){
                if(!is_null($data['srventorg'])){
                    $entorg->setSrventorg($data['srventorg']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('srventorg cannot be null');
                }
            }
            if(array_key_exists('sgmentorg', $data)){
                if(!is_null($data['sgmentorg'])){
                    $entorg->setSgmentorg($data['sgmentorg']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('sgmentorg cannot be null');
                }
            }
            if(array_key_exists('bnfentorg', $data)){
                if(!is_null($data['bnfentorg'])){
                    $entorg->setBnfentorg($data['bnfentorg']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('bnfentorg cannot be null');
                }
            }
            if(array_key_exists('nmbentorg', $data)){
                if(!is_null($data['nmbentorg'])){
                    $entorg->setNmbentorg($data['nmbentorg']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('nmbentorg cannot be null');
                }
            }
            if(array_key_exists('logentorg', $data)){
                if(!is_null($data['logentorg'])){
                    $entorg->setLogentorg($data['logentorg']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('logentorg cannot be null');
                }
            }
            if(array_key_exists('dmcentorg', $data)){
                if(!is_null($data['dmcentorg'])){
                    $entorg->setDmcentorg($data['dmcentorg']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('dmcentorg cannot be null');
                }
            }
            if(array_key_exists('lclentorg', $data)){
                if(!is_null($data['lclentorg'])){
                    $entorg->setLclentorg($data['lclentorg']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('lclentorg cannot be null');
                }
            }
            if(array_key_exists('mncentorg', $data)){
                if(!is_null($data['mncentorg'])){
                    $entorg->setMncentorg($data['mncentorg']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('mncentorg cannot be null');
                }
            }
            if(array_key_exists('etdentorg', $data)){
                if(!is_null($data['etdentorg'])){
                    $entorg->setEtdentorg($data['etdentorg']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('etdentorg cannot be null');
                }
            }
            if(array_key_exists('pasentorg', $data)){
                if(!is_null($data['pasentorg'])){
                    $entorg->setPasentorg($data['pasentorg']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('pasentorg cannot be null');
                }
            }
            if(array_key_exists('cdgpstorg', $data)){
                if(!is_null($data['cdgpstorg'])){
                    $entorg->setCdgpstorg($data['cdgpstorg']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('cdgpstorg cannot be null');
                }
            }
            if(array_key_exists('girentorg', $data)){
                if(!is_null($data['girentorg'])){
                    $entorg->setGirentorg($data['girentorg']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('girentorg cannot be null');
                }
            }
            if(array_key_exists('tlffcnorg', $data)){
                if(!is_null($data['tlffcnorg'])){
                    $entorg->setTlffcnorg($data['tlffcnorg']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('tlffcnorg cannot be null');
                }
            }
            if(array_key_exists('emlfcnorg', $data)){
                if(!is_null($data['emlfcnorg'])){
                    $entorg->setEmlfcnorg($data['emlfcnorg']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('emlfcnorg cannot be null');
                }
            }
            if(array_key_exists('plntrborg', $data)){
                if(!is_null($data['plntrborg'])){
                    $entorg->setPlntrborg($data['plntrborg']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('plntrborg cannot be null');
                }
            }
            if(array_key_exists('actcnsorg', $data)){
                if(!is_null($data['actcnsorg'])){
                    $entorg->setActcnsorg($data['actcnsorg']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('actcnsorg cannot be null');
                }
            }
            if(array_key_exists('cnsdntorg', $data)){
                if(!is_null($data['cnsdntorg'])){
                    $entorg->setCnsdntorg($data['cnsdntorg']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('cnsdntorg cannot be null');
                }
            }
            $entorg->save($connection);
        } catch (\Propel\Runtime\Exception\PropelException $e) {
            Illuminate\Support\Facades\Log::debug($e);
            return false;
        }
        return $entorg;
    }

    public static function rmventorg($idnentorg, \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entorg = \TblentorgQuery::create()
            ->filterByIdnentorg($idnentorg)
            ->findOne($connection);

        if(!$entorg) return false;

        try {
            $entorg->delete($connection);
        } catch (\Propel\Runtime\Exception\PropelException $e) {
            Illuminate\Support\Facades\Log::debug($e);
            return false;
        }

        return true;
    }

    public static function updentorg(array $data , \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entorg = \TblentorgQuery::create()
            ->filterByIdnentorg($data['idnentorg'])
            ->findOne($connection);

        if(!$entorg) return false;

        try{
            if(array_key_exists('uuid', $data)){
                if(!is_null($data['uuid'])){
                    $entorg->setUuid($data['uuid']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('uuid cannot be null');
                }
            }
            $entorg->setIdnentprs(array_key_exists('idnentprs', $data) ? $data['idnentprs'] : null);
            if(array_key_exists('srventorg', $data)){
                if(!is_null($data['srventorg'])){
                    $entorg->setSrventorg($data['srventorg']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('srventorg cannot be null');
                }
            }
            if(array_key_exists('sgmentorg', $data)){
                if(!is_null($data['sgmentorg'])){
                    $entorg->setSgmentorg($data['sgmentorg']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('sgmentorg cannot be null');
                }
            }
            if(array_key_exists('bnfentorg', $data)){
                if(!is_null($data['bnfentorg'])){
                    $entorg->setBnfentorg($data['bnfentorg']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('bnfentorg cannot be null');
                }
            }
            if(array_key_exists('nmbentorg', $data)){
                if(!is_null($data['nmbentorg'])){
                    $entorg->setNmbentorg($data['nmbentorg']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('nmbentorg cannot be null');
                }
            }
            if(array_key_exists('logentorg', $data)){
                if(!is_null($data['logentorg'])){
                    $entorg->setLogentorg($data['logentorg']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('logentorg cannot be null');
                }
            }
            if(array_key_exists('dmcentorg', $data)){
                if(!is_null($data['dmcentorg'])){
                    $entorg->setDmcentorg($data['dmcentorg']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('dmcentorg cannot be null');
                }
            }
            if(array_key_exists('lclentorg', $data)){
                if(!is_null($data['lclentorg'])){
                    $entorg->setLclentorg($data['lclentorg']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('lclentorg cannot be null');
                }
            }
            if(array_key_exists('mncentorg', $data)){
                if(!is_null($data['mncentorg'])){
                    $entorg->setMncentorg($data['mncentorg']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('mncentorg cannot be null');
                }
            }
            if(array_key_exists('etdentorg', $data)){
                if(!is_null($data['etdentorg'])){
                    $entorg->setEtdentorg($data['etdentorg']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('etdentorg cannot be null');
                }
            }
            if(array_key_exists('pasentorg', $data)){
                if(!is_null($data['pasentorg'])){
                    $entorg->setPasentorg($data['pasentorg']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('pasentorg cannot be null');
                }
            }
            if(array_key_exists('cdgpstorg', $data)){
                if(!is_null($data['cdgpstorg'])){
                    $entorg->setCdgpstorg($data['cdgpstorg']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('cdgpstorg cannot be null');
                }
            }
            if(array_key_exists('girentorg', $data)){
                if(!is_null($data['girentorg'])){
                    $entorg->setGirentorg($data['girentorg']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('girentorg cannot be null');
                }
            }
            if(array_key_exists('tlffcnorg', $data)){
                if(!is_null($data['tlffcnorg'])){
                    $entorg->setTlffcnorg($data['tlffcnorg']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('tlffcnorg cannot be null');
                }
            }
            if(array_key_exists('emlfcnorg', $data)){
                if(!is_null($data['emlfcnorg'])){
                    $entorg->setEmlfcnorg($data['emlfcnorg']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('emlfcnorg cannot be null');
                }
            }
            if(array_key_exists('plntrborg', $data)){
                if(!is_null($data['plntrborg'])){
                    $entorg->setPlntrborg($data['plntrborg']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('plntrborg cannot be null');
                }
            }
            if(array_key_exists('actcnsorg', $data)){
                if(!is_null($data['actcnsorg'])){
                    $entorg->setActcnsorg($data['actcnsorg']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('actcnsorg cannot be null');
                }
            }
            if(array_key_exists('cnsdntorg', $data)){
                if(!is_null($data['cnsdntorg'])){
                    $entorg->setCnsdntorg($data['cnsdntorg']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('cnsdntorg cannot be null');
                }
            }
            $entorg->save($connection);
        } catch (\Propel\Runtime\Exception\PropelException $e) {
            Illuminate\Support\Facades\Log::debug($e);
            return false;
        }
            return $entorg;
    }

    public static function dspentorg($filidnentprs, \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $allentorg = \TblentorgQuery::create();
if($filidnentprs != 0){
            $allentorg = $allentorg->filterByIdnentprs($filidnentprs);
        }

        $allentorg = $allentorg->find();

        if(!$allentorg) return false;

        return $allentorg;
    }

    public static function fnoentorg($idnentorg, \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entorg = \TblentorgQuery::create()
            ->filterByIdnentorg($idnentorg)
            ->findOne($connection);

        if(!$entorg) return false;

        return $entorg;
    }

    public static function fnuentorg($uuid,\Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entorg = \TblentorgQuery::create()
            ->filterByUuid($uuid)
            ->findOne($connection);

        if(!$entorg) return false;

        return $entorg;
    }

    //TODO *CRUD Generator control separator line* (Don't remove this line!)
}
