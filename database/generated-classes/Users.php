<?php

use Base\Users as BaseUsers;
use Propel\Runtime\Connection\ConnectionInterface;

class Users extends BaseUsers
{
    public static function crtusers(array $data , ConnectionInterface $connection = null)
    {
        $usr = new \Users();

        try{
            if(array_key_exists('uuid', $data)){
                if(!is_null($data['uuid'])){
                    $usr->setUuid($data['uuid']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('uuid cannot be null');
                }
            }
            if(array_key_exists('email', $data)){
                if(!is_null($data['email'])){
                    $usr->setEmail($data['email']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('email cannot be null');
                }
            }
            if(array_key_exists('email_verified_at', $data)){
                if(!is_null($data['email_verified_at'])){
                    $usr->setEmailVerifiedAt($data['email_verified_at']);
                }
            }
            if(array_key_exists('password', $data)){
                if(!is_null($data['password'])){
                    $usr->setPassword($data['password']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('password cannot be null');
                }
            }
            if(array_key_exists('created_at', $data)){
                if(!is_null($data['created_at'])){
                    $usr->setCreatedAt($data['created_at']);
                }
            }
            if(array_key_exists('updated_at', $data)){
                if(!is_null($data['updated_at'])){
                    $usr->setUpdatedAt($data['updated_at']);
                }
            }
            if(array_key_exists('remember_token', $data)){
                if(!is_null($data['remember_token'])){
                    $usr->setRememberToken($data['remember_token']);
                }
            }
            $usr->save($connection);
        } catch (\Propel\Runtime\Exception\PropelException $e) {
            Illuminate\Support\Facades\Log::debug($e);
            return false;
        }

        return $usr;
    }

    public static function rmvusers($id, \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $usr = \UsersQuery::create()
            ->filterById($id)
            ->findOne($connection);

        if(!$usr) return false;

        try {
            $usr->delete($connection);
        } catch (\Propel\Runtime\Exception\PropelException $e) {
            Illuminate\Support\Facades\Log::debug($e);
            return false;
        }

        return true;
    }

    public static function updusers(array $data , \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $usr = \UsersQuery::create()
            ->filterById($data['id'])
            ->findOne($connection);

        if(!$usr) return false;

        try{
            if(array_key_exists('uuid', $data)){
                if(!is_null($data['uuid'])){
                    $usr->setUuid($data['uuid']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('uuid cannot be null');
                }
            }
            if(array_key_exists('email', $data)){
                if(!is_null($data['email'])){
                    $usr->setEmail($data['email']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('email cannot be null');
                }
            }
            $usr->setEmailVerifiedAt(array_key_exists('email_verified_at', $data) ? $data['email_verified_at'] : null);
            if(array_key_exists('password', $data)){
                if(!is_null($data['password'])){
                    $usr->setPassword($data['password']);
                }else{
                    throw new \Propel\Runtime\Exception\PropelException('password cannot be null');
                }
            }
            $usr->setCreatedAt(array_key_exists('created_at', $data) ? $data['created_at'] : null);
            $usr->setUpdatedAt(array_key_exists('updated_at', $data) ? $data['updated_at'] : null);
            $usr->setRememberToken(array_key_exists('remember_token', $data) ? $data['remember_token'] : null);
            $usr->save($connection);
        } catch (\Propel\Runtime\Exception\PropelException $e) {
            Illuminate\Support\Facades\Log::debug($e);
            return false;
        }
            return $usr;
    }

    public static function dspusers(\Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $allusr = \UsersQuery::create();

        $allusr = $allusr->find();

        if(!$allusr) return false;

        return $allusr;
    }

    public static function fnousers($id, \Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $usr = \UsersQuery::create()
            ->filterById($id)
            ->findOne($connection);

        if(!$usr) return false;

        return $usr;
    }

    public static function fnuusers($uuid,\Propel\Runtime\Connection\ConnectionInterface $connection = null)
    {
        $usr = \UsersQuery::create()
            ->filterByUuid($uuid)
            ->findOne($connection);

        if(!$usr) return false;

        return $usr;
    }

    //TODO *CRUD Generator control separator line* (Don't remove this line!)
}
