<?php

namespace App\Http\Controllers\Home;


use OkexV3\src\OkexAuthConf;
use OkexV3\src\Okex;
use GuzzleHttp\Psr7;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use App\Libs\Okex\src\OKCoin;
use App\Libs\Okex\src\ApiKeyAuthentication;

class TestController
{

    const API_KEY = "7411c6e8-aa66-44c9-bbe7-b522ba5c27d7";
    const SECRET_KEY = "E84A2D1114C80E9B68F76F4D69B3C1BF";
    const PASS_PHRASE = "@xcljlj";
    public function index()
    {

        $okexAuthConfObj = new OkexAuthConf(self::API_KEY,self::SECRET_KEY,self::PASS_PHRASE);
        $okClient = Okex::Account($okexAuthConfObj);
        $res = $okClient->getCurrenciesList();
        var_dump($res);
        exit();
        $client = new Client([
            'base_uri'=>'https://www.okex.me',
            'User-Agent'=>'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36'
        ]);
//        $res = $client->request('GET', 'https://www.okex.me/api/v1/ticker.do?symbol=btc_usdt');
        $res = $client->request('GET', '/api/general/v3/time');
//        echo $res->getStatusCode();
//        echo $res->getHeader('content-type')[0];
        echo $res->getBody();
        exit();

        $res = $this->httpRequest('https://www.okex.me/api/general/v3/time','get');
        echo $res;
        exit();

//OKCoin DEMO 入口

        $client = new OKCoin(new ApiKeyAuthentication(self::API_KEY, self::SECRET_KEY));


        //获取OKCoin市场深度
//        $params = array('symbol' => 'btc_usd', 'size' => 5);
//        $result = $client->depthApi($params);
//        print_r($result);

//        获取OKCoin行情（盘口数据）
//        $params = array('symbol' => 'btc_usdt');
//        $result = $client -> tickerApi($params);
//        print_r($result);

        //获取OKCoin期货行情（期货盘口）
//        $params = array('symbol' => 'btc_usd', 'contract_type' => 'this_week');
//        $result = $client -> tickerFutureApi($params);
//        print_r($result);
        //获取用户信息
        $params = array('api_key' => self::API_KEY);
        $result = $client->userinfoApi($params);
        echo $this->object2array($result);
    }


   public function object2array(&$object) {
        $object = json_encode( $object);
        return  $object;
    }
}