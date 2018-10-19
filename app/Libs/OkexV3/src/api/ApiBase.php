<?php
namespace OkexV3\src\api;

use OkexV3\src\OkexAuthConf;
use OkexV3\src\http\HttpRequest;

class ApiBase
{
    /**
     * @var null|HttpRequest
     */
    public static $http = null;

    public $_authConf;

    public $iso_time;


    public function __construct($url, OkexAuthConf $authConf)
    {
        $this->_authConf = $authConf;
        if(empty(self::$http))
        {
            self::$http = new HttpRequest($url);
        }
        self::$http->api_key = $this->_authConf->api_key;
        self::$http->passphrase = $this->_authConf->passphrase;
        self::$http->secret_key = $this->_authConf->secret_key;
    }

}