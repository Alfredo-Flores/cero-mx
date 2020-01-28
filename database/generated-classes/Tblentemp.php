<?php

use Base\Tblentemp as BaseTblentemp;

class Tblentemp extends BaseTblentemp
{
    public static function crtentemp(array $data , \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entemp = new \Tblentemp();
        try{
            if(array_key_exists('uuid', $data)){
                if(!is_null($data['uuid'])){
                    $entemp->setUuid($data['uuid']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('uuid cannot be null');
                }
            }
            if(array_key_exists('idnentprs', $data)){
                if(!is_null($data['idnentprs'])){
                    $entemp->setIdnentprs($data['idnentprs']);
                }
            }
            if(array_key_exists('namentemp', $data)){
                if(!is_null($data['namentemp'])){
                    $entemp->setNamentemp($data['namentemp']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('namentemp cannot be null');
                }
            }
            if(array_key_exists('logentemp', $data)){
                if(!is_null($data['logentemp'])){
                    $entemp->setLogentemp($data['logentemp']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('logentemp cannot be null');
                }
            }
            if(array_key_exists('drcentemp', $data)){
                if(!is_null($data['drcentemp'])){
                    $entemp->setDrcentemp($data['drcentemp']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('drcentemp cannot be null');
                }
            }
            if(array_key_exists('lclentemp', $data)){
                if(!is_null($data['lclentemp'])){
                    $entemp->setLclentemp($data['lclentemp']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('lclentemp cannot be null');
                }
            }
            if(array_key_exists('mncentemp', $data)){
                if(!is_null($data['mncentemp'])){
                    $entemp->setMncentemp($data['mncentemp']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('mncentemp cannot be null');
                }
            }
            if(array_key_exists('ententemp', $data)){
                if(!is_null($data['ententemp'])){
                    $entemp->setEntentemp($data['ententemp']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('ententemp cannot be null');
                }
            }
            if(array_key_exists('pasentorg', $data)){
                if(!is_null($data['pasentorg'])){
                    $entemp->setPasentorg($data['pasentorg']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('pasentorg cannot be null');
                }
            }
            if(array_key_exists('cdgpstemp', $data)){
                if(!is_null($data['cdgpstemp'])){
                    $entemp->setCdgpstemp($data['cdgpstemp']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('cdgpstemp cannot be null');
                }
            }
            if(array_key_exists('cdgtrbemp', $data)){
                if(!is_null($data['cdgtrbemp'])){
                    $entemp->setCdgtrbemp($data['cdgtrbemp']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('cdgtrbemp cannot be null');
                }
            }
            if(array_key_exists('girentemp', $data)){
                if(!is_null($data['girentemp'])){
                    $entemp->setGirentemp($data['girentemp']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('girentemp cannot be null');
                }
            }
            if(array_key_exists('tlfofiemp', $data)){
                if(!is_null($data['tlfofiemp'])){
                    $entemp->setTlfofiemp($data['tlfofiemp']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('tlfofiemp cannot be null');
                }
            }
            if(array_key_exists('emlofiemp', $data)){
                if(!is_null($data['emlofiemp'])){
                    $entemp->setEmlofiemp($data['emlofiemp']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('emlofiemp cannot be null');
                }
            }
            if(array_key_exists('desaliemp', $data)){
                if(!is_null($data['desaliemp'])){
                    $entemp->setDesaliemp($data['desaliemp']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('desaliemp cannot be null');
                }
            }
            if(array_key_exists('candonemp', $data)){
                if(!is_null($data['candonemp'])){
                    $entemp->setCandonemp($data['candonemp']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('candonemp cannot be null');
                }
            }
            if(array_key_exists('temconemp', $data)){
                if(!is_null($data['temconemp'])){
                    $entemp->setTemconemp($data['temconemp']);
                }
            }
            if(array_key_exists('horentemp', $data)){
                if(!is_null($data['horentemp'])){
                    $entemp->setHorentemp($data['horentemp']);
                }
            }
            if(array_key_exists('detentemo', $data)){
                if(!is_null($data['detentemo'])){
                    $entemp->setDetentemo($data['detentemo']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('detentemo cannot be null');
                }
            }
            if(array_key_exists('created_at', $data)){
                if(!is_null($data['created_at'])){
                    $entemp->setCreatedAt($data['created_at']);
                }
            }
            if(array_key_exists('updated_at', $data)){
                if(!is_null($data['updated_at'])){
                    $entemp->setUpdatedAt($data['updated_at']);
                }
            }
            $entemp->save($connection);
        } catch (\Propel\Runtime\Exception\PropelException $e) {
            Illuminate\Support\Facades\Log::debug($e);
            return false;
        }
        return $entemp;
    }

    public static function rmventemp($idnentemp, \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entemp = \TblentempQuery::create()
            ->filterByIdnentemp($idnentemp)
            ->findOne($connection);

        if(!$entemp) return false;

        try {
            $entemp->delete($connection);
        } catch (\Propel\Runtime\Exception\PropelException $e) {
            Illuminate\Support\Facades\Log::debug($e);
            return false;
        }

        return true;
    }

    public static function updentemp(array $data , \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entemp = \TblentempQuery::create()
            ->filterByIdnentemp($data['idnentemp'])
            ->findOne($connection);

        if(!$entemp) return false;

        try{
            if(array_key_exists('uuid', $data)){
                if(!is_null($data['uuid'])){
                    $entemp->setUuid($data['uuid']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('uuid cannot be null');
                }
            }
            $entemp->setIdnentprs(array_key_exists('idnentprs', $data) ? $data['idnentprs'] : null);
            $entemp->setIdngirorg(array_key_exists('idngirorg', $data) ? $data['idngirorg'] : null);
            if(array_key_exists('namentemp', $data)){
                if(!is_null($data['namentemp'])){
                    $entemp->setNamentemp($data['namentemp']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('namentemp cannot be null');
                }
            }
            if(array_key_exists('logentemp', $data)){
                if(!is_null($data['logentemp'])){
                    $entemp->setLogentemp($data['logentemp']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('logentemp cannot be null');
                }
            }
            if(array_key_exists('drcentemp', $data)){
                if(!is_null($data['drcentemp'])){
                    $entemp->setDrcentemp($data['drcentemp']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('drcentemp cannot be null');
                }
            }
            if(array_key_exists('lclentemp', $data)){
                if(!is_null($data['lclentemp'])){
                    $entemp->setLclentemp($data['lclentemp']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('lclentemp cannot be null');
                }
            }
            if(array_key_exists('mncentemp', $data)){
                if(!is_null($data['mncentemp'])){
                    $entemp->setMncentemp($data['mncentemp']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('mncentemp cannot be null');
                }
            }
            if(array_key_exists('ententemp', $data)){
                if(!is_null($data['ententemp'])){
                    $entemp->setEntentemp($data['ententemp']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('ententemp cannot be null');
                }
            }
            if(array_key_exists('pasentorg', $data)){
                if(!is_null($data['pasentorg'])){
                    $entemp->setPasentorg($data['pasentorg']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('pasentorg cannot be null');
                }
            }
            if(array_key_exists('cdgpstemp', $data)){
                if(!is_null($data['cdgpstemp'])){
                    $entemp->setCdgpstemp($data['cdgpstemp']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('cdgpstemp cannot be null');
                }
            }
            if(array_key_exists('cdgtrbemp', $data)){
                if(!is_null($data['cdgtrbemp'])){
                    $entemp->setCdgtrbemp($data['cdgtrbemp']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('cdgtrbemp cannot be null');
                }
            }
            if(array_key_exists('girentemp', $data)){
                if(!is_null($data['girentemp'])){
                    $entemp->setGirentemp($data['girentemp']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('girentemp cannot be null');
                }
            }
            if(array_key_exists('tlfofiemp', $data)){
                if(!is_null($data['tlfofiemp'])){
                    $entemp->setTlfofiemp($data['tlfofiemp']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('tlfofiemp cannot be null');
                }
            }
            if(array_key_exists('emlofiemp', $data)){
                if(!is_null($data['emlofiemp'])){
                    $entemp->setEmlofiemp($data['emlofiemp']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('emlofiemp cannot be null');
                }
            }
            if(array_key_exists('desaliemp', $data)){
                if(!is_null($data['desaliemp'])){
                    $entemp->setDesaliemp($data['desaliemp']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('desaliemp cannot be null');
                }
            }
            if(array_key_exists('candonemp', $data)){
                if(!is_null($data['candonemp'])){
                    $entemp->setCandonemp($data['candonemp']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('candonemp cannot be null');
                }
            }
            $entemp->setTemconemp(array_key_exists('temconemp', $data) ? $data['temconemp'] : null);
            $entemp->setHorentemp(array_key_exists('horentemp', $data) ? $data['horentemp'] : null);
            if(array_key_exists('detentemo', $data)){
                if(!is_null($data['detentemo'])){
                    $entemp->setDetentemo($data['detentemo']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('detentemo cannot be null');
                }
            }
            $entemp->setCreatedAt(array_key_exists('created_at', $data) ? $data['created_at'] : null);
            $entemp->setUpdatedAt(array_key_exists('updated_at', $data) ? $data['updated_at'] : null);
            $entemp->save($connection);
        } catch (\Propel\Runtime\Exception\PropelException $e) {
            Illuminate\Support\Facades\Log::debug($e);
            return false;
        }
            return $entemp;
    }

    public static function dspentemp($filidnentprs, $filidngirorg, \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $allentemp = \TblentempQuery::create();
if($filidnentprs != 0){
            $allentemp = $allentemp->filterByIdnentprs($filidnentprs);
        }
if($filidngirorg != 0){
            $allentemp = $allentemp->filterByIdngirorg($filidngirorg);
        }

        $allentemp = $allentemp->find();

        if(!$allentemp) return false;

        return $allentemp;
    }

    public static function fnoentemp($idnentemp, \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entemp = \TblentempQuery::create()
            ->filterByIdnentemp($idnentemp)
            ->findOne($connection);

        if(!$entemp) return false;

        return $entemp;
    }

    public static function fnoentprs($idnentprs, \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entprs = \TblentempQuery::create()
            ->filterByIdnentprs($idnentprs)
            ->findOne($connection);

        if(!$entprs) return false;

        return $entprs;
    }

    public static function fnuentemp($uuid,\Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $entemp = \TblentempQuery::create()
            ->filterByUuid($uuid)
            ->findOne($connection);

        if(!$entemp) return false;

        return $entemp;
    }

    //TODO *CRUD Generator control separator line* (Don't remove this line!)
}
