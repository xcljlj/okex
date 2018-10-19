<?php

namespace OkexV3\src;


use OkexV3\src\api\Account;
use OkexV3\src\api\Ett;
use OkexV3\src\api\Futures;
use OkexV3\src\api\Margin;
use OkexV3\src\api\Spot;
class Okex
{
    const WEB_URL = 'https://www.okex.com/';

    const NAMESPACE_PATH = 'OkexV3\\src\\api\\';


    private static $objArray = [];

    /**
     * @param $className
     * @param  $authConf
     * @return Ett|Futures|Margin|Spot|Account
     */

    public static function __callStatic($className,$authConf) :object
    {
        $class = self::NAMESPACE_PATH . $className;
        if (!isset(self::$objArray[$class]) || !self::$objArray[$class]) {
            self::$objArray[$class] = new $class(self::WEB_URL,$authConf[0]);
        }
        return self::$objArray[$class];
    }
}