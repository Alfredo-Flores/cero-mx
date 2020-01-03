<?php

use Base\Tblentorg as BaseTblentorg;
use Illuminate\Support\Facades\Log;
use Propel\Runtime\Exception\PropelException;

/**
 * Skeleton subclass for representing a row from the 'tblentorg' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Tblentorg extends BaseTblentorg
{
    public static function insentorg(int $idUsers, String $namentorg, String $direntorg, int $telentorg, String $rfcentorg, String $cluentorg, String $donentorg = null){
        $entorg = new \Tblentorg();

        try {
            $entorg
                ->setIdnusers($idUsers)
                ->setNamentorg($namentorg)
                ->setDirentorg($direntorg)
                ->setTelentorg($telentorg)
                ->setRfcentorg($rfcentorg)
                ->setCluentorg($cluentorg)
                ->setDonentorg($donentorg)
                ->setCreatedAt(date("Y-m-d H:i:s"))
                ->setUpdatedAt(date("Y-m-d H:i:s"))
                ->save();
        } catch(PropelException $e) {
            Log::debug($e);
            return false;
        }

        return $entorg;
    }

    static public function fndentorg(){
        $dcmbin = \TblentorgQuery::create()
            ->orderByCreatedAt(Criteria::ASC)
            ->find();

        if ($dcmbin == null) {
            return false;
        }

        return $dcmbin;
    }

    static public function fnoentorg($idnentorg){
        $dcmbin = \TblentorgQuery::create()
            ->findOneByIdnentorg($idnentorg);

        if ($dcmbin == null) {
            return false;
        }

        return $dcmbin;
    }

    static public function updentorg($idnentorg, int $idUsers, String $namentorg, String $direntorg, int $telentorg, String $rfcentorg, String $cluentorg, String $donentorg = null){
        $dcmbin = self::fnoentorg($idnentorg);

        if ($dcmbin == null) {
            return false;
        }

        try {
            $dcmbin->setIdnusers($idUsers)
                ->setNamentorg($namentorg)
                ->setDirentorg($direntorg)
                ->setTelentorg($telentorg)
                ->setRfcentorg($rfcentorg)
                ->setCluentorg($cluentorg)
                ->setDonentorg($donentorg)
                ->setUpdatedAt(date("Y-m-d H:i:s"))
                ->save();
        } catch(PropelException $e) {
            Log::debug($e);
            return false;
        }

        return $dcmbin;
    }

    static public function dltentorg($idnentorg){
        $dcmbin = self::fnoentorg($idnentorg);

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
