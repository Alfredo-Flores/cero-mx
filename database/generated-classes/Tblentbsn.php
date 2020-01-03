<?php

use Base\Tblentbsn as BaseTblentbsn;
use Illuminate\Support\Facades\Log;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\Exception\PropelException;

/**
 * Skeleton subclass for representing a row from the 'tblentbsn' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Tblentbsn extends BaseTblentbsn
{
    public static function insentbsn(int $idUsers, String $namentbsn, String $direntbsn, int $telentbsn, String $rfcentbsn){
        $entbsn = new \Tblentbsn();

        try {
            $entbsn
                ->setIdnusers($idUsers)
                ->setNamentbsn($namentbsn)
                ->setDirentbsn($direntbsn)
                ->setTelentbsn($telentbsn)
                ->setRfcentbsn($rfcentbsn)
                ->setCreatedAt(date("Y-m-d H:i:s"))
                ->setUpdatedAt(date("Y-m-d H:i:s"))
                ->save();
        } catch(PropelException $e) {
            Log::debug($e);
            return false;
        }

        return $entbsn;
    }

    static public function fndentbsn(){
        $dcmbin = \TblentbsnQuery::create()
            ->orderByCreatedAt(Criteria::ASC)
            ->find();

        if ($dcmbin == null) {
            return false;
        }

        return $dcmbin;
    }

    static public function fnoentbsn($idnentbsn){
        $dcmbin = \TblentbsnQuery::create()
            ->findOneByIdnentbsn($idnentbsn);

        if ($dcmbin == null) {
            return false;
        }

        return $dcmbin;
    }

    static public function updentbsn($idnentbsn, int $idUsers, String $namentbsn, String $direntbsn, int $telentbsn, String $rfcentbsn){
        $dcmbin = self::fnoentbsn($idnentbsn);

        if ($dcmbin == null) {
            return false;
        }

        try {
            $dcmbin->setIdnusers($idUsers)
                ->setNamentbsn($namentbsn)
                ->setDirentbsn($direntbsn)
                ->setTelentbsn($telentbsn)
                ->setRfcentbsn($rfcentbsn)
                ->setUpdatedAt(date("Y-m-d H:i:s"))
                ->save();
        } catch(PropelException $e) {
            Log::debug($e);
            return false;
        }

        return $dcmbin;
    }

    static public function dltentbsn($idnentbsn){
        $dcmbin = self::fnoentbsn($idnentbsn);

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
