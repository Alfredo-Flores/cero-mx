<?php

use Base\Tblentint as BaseTblentint;
use Illuminate\Support\Facades\Log;
use Propel\Runtime\Exception\PropelException;

/**
 * Skeleton subclass for representing a row from the 'tblentint' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Tblentint extends BaseTblentint
{
    public static function insentint(int $idUsers, String $namentint, String $direntint, int $telentint){
        $entint = new \Tblentint();

        try {
            $entint
                ->setIdnusers($idUsers)
                ->setNamentint($namentint)
                ->setDirentint($direntint)
                ->setTelentint($telentint)
                ->setCreatedAt(date("Y-m-d H:i:s"))
                ->setUpdatedAt(date("Y-m-d H:i:s"))
                ->save();
        } catch(PropelException $e) {
            Log::debug($e);
            return false;
        }

        return $entint;
    }

    static public function fndentint(){
        $dcmbin = \TblentintQuery::create()
            ->orderByCreatedAt(Criteria::ASC)
            ->find();

        if ($dcmbin == null) {
            return false;
        }

        return $dcmbin;
    }

    static public function fnoentint($idnentint){
        $dcmbin = \TblentintQuery::create()
            ->findOneByIdnentint($idnentint);

        if ($dcmbin == null) {
            return false;
        }

        return $dcmbin;
    }

    static public function updentint($idnentint, int $idUsers, String $namentint, String $direntint, int $telentint){
        $dcmbin = self::fnoentint($idnentint);

        if ($dcmbin == null) {
            return false;
        }

        try {
            $dcmbin->setIdnusers($idUsers)
                ->setNamentint($namentint)
                ->setDirentint($direntint)
                ->setTelentint($telentint)
                ->setUpdatedAt(date("Y-m-d H:i:s"))
                ->save();
        } catch(PropelException $e) {
            Log::debug($e);
            return false;
        }

        return $dcmbin;
    }

    static public function dltentint($idnentint){
        $dcmbin = self::fnoentint($idnentint);

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
