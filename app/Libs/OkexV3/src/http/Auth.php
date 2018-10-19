<?php

namespace OkexV3\src\http;


trait Auth
{
    public  $api_key;

    public  $secret_key;

    public  $passphrase;

    /**
     * 签名
     */
    public function signature($timestamp,$method,$requestPath,$secretKey,$body = '')
    {
        $signStr = $timestamp.strtoupper($method).$requestPath.$body;
        $hash = hash_hmac('SHA256',$signStr,$secretKey,true);
        return base64_encode($hash);
    }

}