<?php

namespace OkexV3\src;

class OkexAuthConf
{

    public  $api_key;

    public  $secret_key;

    public  $passphrase;

    public function __construct($api_key,$secret_key,$passphrase)
    {
        $this->api_key = $api_key;
        $this->secret_key = $secret_key;
        $this->passphrase = $passphrase;
    }
}