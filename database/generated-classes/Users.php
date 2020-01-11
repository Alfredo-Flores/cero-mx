<?php

use Base\Users as BaseUsers;
use Illuminate\Support\Facades\Log;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\Exception\PropelException;
use Ramsey\Uuid\Uuid;

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
    public static function insusers(String $name, String $firstsurname, String $secondsurname, String $email, String $password){
        $user = new \Users();

        try {
            $uuid = Uuid::uuid3(Uuid::NAMESPACE_DNS, $user->getId());
            $uuid->toString();

            $user
                ->setUuid($uuid)
                ->setNamdtsgnr($name)
                ->setPrmaplgnr($firstsurname)
                ->setSgnaplgnr($secondsurname)
                ->setEmail($email)
                ->setPassword(bcrypt($password))
                ->setCreatedAt(date("Y-m-d H:i:s"))
                ->setUpdatedAt(date("Y-m-d H:i:s"))
                ->save();
        } catch(PropelException $e) {
            Log::debug($e);
            return false;
        } catch (Exception $e) {
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

    static public function fnoemlusr($emlusers){
        $user = \UsersQuery::create()
            ->findOneByEmail($emlusers);

        if ($user == null) {
            return false;
        }

        return $user;
    }

    static public function updusers($idnusers, String $name, String $firstsurname, String $secondsurname, String $email, String $password) {
        $user = self::fnousers($idnusers);

        if ($user == null) {
            return false;
        }

        try {
            $user
                ->setNamdtsgnr($name)
                ->setPrmaplgnr($firstsurname)
                ->setSgnaplgnr($secondsurname)
                ->setEmail($email)
                ->setPassword(bcrypt($password))
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
