<?php
/**
 * Created by PhpStorm.
 * User: Magnimus Software
 * Date: 21/08/2019
 * Time: 12:52 PM
 */

namespace App;


use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Propel;

class TransactionHandler
{
    public static function begin() {
        try {
            $trncnn = Propel::getConnection();
            $trncnn->beginTransaction();

        }catch (\Exception $e) {
            return false;
        }

        return $trncnn;
    }

    public static function commit(ConnectionInterface &$trncnn) {
        try {
            $trncnn->commit();
        }catch (\Exception $e) {
            return false;
        }

        return true;
    }

    public static function rollback(ConnectionInterface &$trncnn) {
        try {
            $trncnn->rollback();
        }catch (\Exception $e) {
            return false;
        }

        return true;
    }
}
