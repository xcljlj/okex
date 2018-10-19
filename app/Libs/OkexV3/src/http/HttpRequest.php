<?php

namespace OkexV3\src\http;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use OkexV3\src\exception\OkCoinException;

class HttpRequest
{
    use Auth;

    public $url;

    public $debug = true;

    public $timestamp;

    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * 配置HTTP请求头部
     */
    protected function setHeaders($method, $requestPath, $body = '')
    {
        $header = [
            'OK-ACCESS-KEY' => $this->api_key,
            'OK-ACCESS-SIGN' => $this->signature($this->timestamp, $method, $requestPath,$this->secret_key,$body = ''),
            'OK-ACCESS-TIMESTAMP' => $this->timestamp,
            'OK-ACCESS-PASSPHRASE' => $this->passphrase,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];
        return $header;
    }

    /**
     * 发送请求
     */
    protected function send($method, $requestPath, $param = [], $body = '')
    {
        $this->getTime();
        $headers = $this->setHeaders($method, $requestPath, $body = '');
        try {
            $client = new Client([
                'base_uri' => $this->url
            ]);
            $res = $client->request($method, $requestPath, [
                'headers' => $headers
            ]);
            $result = json_decode($res->getBody(), true);
            return $result;
        } catch (ClientException $e) {//获取客户端错误信息
            throw new OkCoinException('客户端请求错误:' . $e->getMessage(), $e->getCode());
        } catch (RequestException $e) {//获取请求错误新
            throw new OkCoinException('请求错误:' . $e->getMessage(), $e->getCode());
        }

    }

    public function get($requestPath, $body = '')
    {
        return $this->send('GET', $requestPath, $body);
    }

    public function post($requestPath, $body)
    {
        return $this->send('POST', $requestPath, $body);
    }

    public function delete($requestPath, $body)
    {
        return $this->send('DELETE', $requestPath, $body);
    }

    public function getTime()
    {
        $date = date_create();
        $microtime = date_format($date, 'Y-m-d H:i:s.u');
        list($start, $end) = explode(' ', $microtime);
        $this->timestamp = $start . 'T' . substr($end, 0, -3) . 'Z';
    }
}