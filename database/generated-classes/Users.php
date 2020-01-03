<?php

use Base\Users as BaseUsers;
use Illuminate\Support\Facades\Log;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\Exception\PropelException;

/**
 * Skeleton subclass for representing a row from the 'users' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Users extends BaseUsers
{
    public static function insusers(String $name, String $email, String $password, String $rouimg = null, String $tel, int $tipo){
        $user = new \Users();

        try {
            $user
                ->setName($name)
                ->setEmail($email)
                ->setPassword(bcrypt($password))
                ->setImg($rouimg)
                ->setTel($tel)
                ->setTyp($tipo)
                ->setCreatedAt(date("Y-m-d H:i:s"))
                ->setUpdatedAt(date("Y-m-d H:i:s"))
                ->save();
        } catch(PropelException $e) {
            Log::debug($e);
            return false;
        }

        return $user;
    }

    static public function fndusers(){
        $user = \UsersQuery::create()
            ->orderByCreatedAt(Criteria::ASC)
            ->find();

        if ($user == null) {
            return false;
        }

        return $user;
    }

    static public function fnousers($idnusers){
        $user = \UsersQuery::create()
            ->findOneById($idnusers);

        if ($user == null) {
            return false;
        }

        return $user;
    }

    static public function updusers($idnusers, String $name, String $email, int $password, String $rouimg = null, String $tel, int $tipo) {
        $user = self::fnousers($idnusers);

        if ($user == null) {
            return false;
        }

        try {
            $user->setName($name)
                ->setEmail($email)
                ->setPassword(bcrypt($password))
                ->setImg($rouimg)
                ->setTel($tel)
                ->setTyp($tipo)
                ->setCreatedAt(date("Y-m-d H:i:s"))
                ->setUpdatedAt(date("Y-m-d H:i:s"))
                ->save();
        } catch(PropelException $e) {
            Log::debug($e);
            return false;
        }

        return $user;
    }

    static public function dltusers($idnusers){
        $dcmbin = self::fnousers($idnusers);

        if ($dcmbin == null) {
            return false;
        }

        try {
            $dcmbin->delete();
        } catch(PropelException $e) {
            Log::debug($e);
            return false;
        }

        return $dcmbin;
    }
}
