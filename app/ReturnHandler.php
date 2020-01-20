<?php
/**
 * Created by PhpStorm.
 * User: Magnimus Software
 * Date: 21/08/2019
 * Time: 11:57 AM
 */

namespace App;


class ReturnHandler
{
    public static function rtrsccjsn($strgmsg, $extkys = array()) { //Return Success Json
        $return =  array(
            'success' => true,
            'message' => $strgmsg
        );

        if(!empty($extkys)) {
            $return += $extkys;
        }

        return json_encode($return);
    }

    public static function rtrerrjsn($strgmsg) {
        return json_encode(
            array(
                'success' => false,
                'message' => $strgmsg
            )
        );
    }

    public static function rtrerrviw($errnmb) {
        switch ($errnmb) {
            case 503: view('errors.503'); break;
        }
    }
}
