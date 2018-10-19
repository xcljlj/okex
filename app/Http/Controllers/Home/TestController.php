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


    public function httpRequest($url, $method, $postfields = null, $headers = array(), $debug = false)
    {
        $method = strtoupper($method);
        $ci = curl_init();
        /* Curl settings */
        curl_setopt($ci, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
        curl_setopt($ci, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.2; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0");
        curl_setopt($ci, CURLOPT_CONNECTTIMEOUT, 60); /* 在发起连接前等待的时间，如果设置为0，则无限等待 */
        curl_setopt($ci, CURLOPT_TIMEOUT, 7); /* 设置cURL允许执行的最长秒数 */
        curl_setopt($ci, CURLOPT_RETURNTRANSFER, true);
        switch ($method) {
            case "POST":
                curl_setopt($ci, CURLOPT_POST, true);
                if (!empty($postfields)) {
                    $tmpdatastr = is_array($postfields) ? http_build_query($postfields) : $postfields;
                    curl_setopt($ci, CURLOPT_POSTFIELDS, $tmpdatastr);
                }
                break;
            default:
                curl_setopt($ci, CURLOPT_CUSTOMREQUEST, $method); /* //设置请求方式 */
                break;
        }
        $ssl = preg_match('/^https:\/\//i', $url) ? TRUE : FALSE;
        curl_setopt($ci, CURLOPT_URL, $url);
        if ($ssl) {
            curl_setopt($ci, CURLOPT_SSL_VERIFYPEER, FALSE); // https请求 不验证证书和hosts
            curl_setopt($ci, CURLOPT_SSL_VERIFYHOST, FALSE); // 不从证书中检查SSL加密算法是否存在
        }
        //curl_setopt($ci, CURLOPT_HEADER, true); /*启用时会将头文件的信息作为数据流输出*/
        //curl_setopt($ci, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ci, CURLOPT_MAXREDIRS, 2); /* 指定最多的HTTP重定向的数量，这个选项是和CURLOPT_FOLLOWLOCATION一起使用的 */
        curl_setopt($ci, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ci, CURLINFO_HEADER_OUT, true);
        /* curl_setopt($ci, CURLOPT_COOKIE, $Cookiestr); * *COOKIE带过去** */
        $response = curl_exec($ci);
        $requestinfo = curl_getinfo($ci);
        $http_code = curl_getinfo($ci, CURLINFO_HTTP_CODE);
        if ($debug) {
            echo "=====post data======\r\n";
            var_dump($postfields);
            echo "=====info===== \r\n";
            print_r($requestinfo);
//            echo "=====response=====\r\n";
//            print_r($response);
            echo "=====code=====\r\n";
            print_r($http_code);
        }
        curl_close($ci);
        return $response;
    }

   public function object2array(&$object) {
        $object = json_encode( $object);
        return  $object;
    }
}