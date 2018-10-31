<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use OkexV3\src\Okex;
use OkexV3\src\OkexAuthConf;

class PayController extends BaseController
{

    const API_KEY     = "4ea73533-ef39-4700-8869-512c5e61248a";
    const SECRET_KEY  = "A4E0E42C1EA3D8EE0F43C082967525FB";
    const PASS_PHRASE = "mryang123456789";

    /**
     * 币币交易下单
     *
     * @author 7221 2018/10/26
     */
    public function postSpotOrders()
    {
        $okexAuthConfObj = new OkexAuthConf(self::API_KEY, self::SECRET_KEY, self::PASS_PHRASE);
        $okClient        = Okex::Spot($okexAuthConfObj);
        //        $params['client_oid']     = '20181029';
        $params['client_oid']     = '20181030';
        $params['instrument_id']  = 'LTC-USDT';
        $params['side']           = 'sell';
        $params['type']           = 'limit';
        $params['size']           = '1';
        $params['price']          = '400';
        $params['margin_trading'] = '1';
        $res                      = $okClient->postOrders($params);
        if (!$res) {
            return response()->json(['code' => 0, 'msg' => '下单失败', 'data' => []]);
        }
        return response()->json(['code' => 200, 'msg' => '下单成功', 'data' => $res]);
    }

    /**
     * 币币下单挂单后单笔取消订单
     *
     * @author 7221 2018/10/30
     */
    public function postSpotCancelOrders()
    {
        $okexAuthConfObj         = new OkexAuthConf(self::API_KEY, self::SECRET_KEY, self::PASS_PHRASE);
        $okClient                = Okex::Spot($okexAuthConfObj);
        $params['instrument_id'] = 'LTC-USDT';
        $params['client_oid']    = '20181029';
        $res                     = $okClient->postCancelOrders($orderid = '1712748165860352', $params);
        if (!$res) {
            return response()->json(['code' => 0, 'msg' => '撤单失败', 'data' => []]);
        }
        return response()->json(['code' => 200, 'msg' => '撤单成功', 'data' => $res]);
    }

    /**
     * 币币获取订单列表
     *
     * @author 7221 2018/10/30
     */
    public function getSpotOrdersList()
    {
        $okexAuthConfObj         = new OkexAuthConf(self::API_KEY, self::SECRET_KEY, self::PASS_PHRASE);
        $okClient                = Okex::Spot($okexAuthConfObj);
        $params['instrument_id'] = 'LTC-USDT';
        $params['status']        = 'all';
        $params['from']          = '0';
        //        $params['to']            = 'all';
        $params['limit'] = '10';
        $res             = $okClient->getOrdersList($params);
        if (!$res) {
            return response()->json(['code' => 0, 'msg' => '列表获取失败', 'data' => []]);
        }
        return response()->json(['code' => 200, 'msg' => '列表获取成功', 'data' => $res]);
    }

    /**
     * 币币获取深度数据
     *
     * @author 7221 2018/10/30
     */
    public function getSpotProductsInstrumentIdBook()
    {
        $okexAuthConfObj = new OkexAuthConf(self::API_KEY, self::SECRET_KEY, self::PASS_PHRASE);
        $okClient        = Okex::Spot($okexAuthConfObj);
        $instrument_id   = 'LTC-USDT';
        $params['size']  = '10';
        $params['depth'] = '0.0001';
        $res             = $okClient->getProductsInstrumentIdBook($instrument_id, $params);
        if (!$res) {
            return response()->json(['code' => 0, 'msg' => '获取深度数据失败', 'data' => []]);
        }
        return response()->json(['code' => 200, 'msg' => '获取深度数据成功', 'data' => $res]);
    }

    /**
     * 币币获取全部ticker信息
     *
     * @author 7221 2018/10/30
     */
    public function getSpotProductsTickerInfo()
    {
        $okexAuthConfObj = new OkexAuthConf(self::API_KEY, self::SECRET_KEY, self::PASS_PHRASE);
        $okClient        = Okex::Spot($okexAuthConfObj);
        $res             = $okClient->getProductsTickerInfo();
        if (!$res) {
            return response()->json(['code' => 0, 'msg' => '获取全部ticker信息失败', 'data' => []]);
        }
        return response()->json(['code' => 200, 'msg' => '获取全部ticker信息成功', 'data' => $res]);
    }

    /**
     * 币币获取某个ticker信息
     *
     * @author 7221 2018/10/30
     */
    public function getSpotProductsInstrTicker()
    {
        $okexAuthConfObj = new OkexAuthConf(self::API_KEY, self::SECRET_KEY, self::PASS_PHRASE);
        $okClient        = Okex::Spot($okexAuthConfObj);
        $instrument_id   = 'LTC-USDT';
        $res             = $okClient->getProductsInstrumentIdTicker($instrument_id);
        if (!$res) {
            return response()->json(['code' => 0, 'msg' => '获取某个ticker信息失败', 'data' => []]);
        }
        return response()->json(['code' => 200, 'msg' => '获取某个ticker信息成功', 'data' => $res]);
    }

    /**
     * 币币获取成交数据
     *
     * @author 7221 2018/10/30
     */
    public function getSpotProductsInstrumentIdTrades()
    {
        $okexAuthConfObj = new OkexAuthConf(self::API_KEY, self::SECRET_KEY, self::PASS_PHRASE);
        $okClient        = Okex::Spot($okexAuthConfObj);
        $instrument_id   = 'LTC-USDT';
        $res             = $okClient->getProductsInstrumentIdTrades($instrument_id);
        if (!$res) {
            return response()->json(['code' => 0, 'msg' => '获取成交数据失败', 'data' => []]);
        }
        return response()->json(['code' => 200, 'msg' => '获取成交数据成功', 'data' => $res]);
    }


    /**
     * 币币获取币对信息
     *
     * @author 7221 2018/10/26
     */
    public function getSpotProductsInfo()
    {
        $okexAuthConfObj = new OkexAuthConf(self::API_KEY, self::SECRET_KEY, self::PASS_PHRASE);
        $okClient        = Okex::Spot($okexAuthConfObj);
        $res             = $okClient->getProductsInfo();
        if (!$res) {
            return response()->json(['code' => 0, 'msg' => '获取数据失败', 'data' => []]);
        }
        return response()->json(['code' => 200, 'msg' => '成功', 'data' => $res]);
    }

    /**
     * 获取币币API K线图
     * @author 7221 2018/10/26
     */
    public function getSpotProductsCandles()
    {
        $date           = date_create();
        $startMicrotime = date_format($date, 'Y-m-d 00:00:00.u');
        list($start, $end) = explode(' ', $startMicrotime);
        $startTime = $start . 'T' . substr($end, 0, -3) . 'Z';
        $microtime = date_format($date, 'Y-m-d H:i:s.u');
        list($start, $end) = explode(' ', $microtime);
        $endTime               = $start . 'T' . substr($end, 0, -3) . 'Z';
        $params['granularity'] = (int)180;
        $params['start']       = $startTime;
        $params['end']         = $endTime;
        $okexAuthConfObj       = new OkexAuthConf(self::API_KEY, self::SECRET_KEY, self::PASS_PHRASE);
        $okClient              = Okex::Spot($okexAuthConfObj);
        $res                   = $okClient->getProductsInstrumentIdCandles($instrument_id = 'btc-usdt', $params);
        if (!$res) {
            return response()->json(['code' => 0, 'msg' => '获取数据失败', 'data' => []]);
        }
        return response()->json(['code' => 200, 'msg' => '成功', 'data' => $res]);
    }

    /**
     * 币币获取所有未成交订单
     * @author 7071 2018/10/30
     */
    public function getSpotOrdersPending()
    {
        $okexAuthConfObj = new OkexAuthConf(self::API_KEY, self::SECRET_KEY, self::PASS_PHRASE);
        $okClient        = Okex::Spot($okexAuthConfObj);
        $params = [
            'from'              => '1',
            'to'                => '20',
            'limit'             => '10',
            'instrument_id'     => 'LTC-USDT'
        ];
        $res             = $okClient->getOrdersPending($params);
        if (!$res) {
            return response()->json(['code' => 0, 'msg' => '获取数据失败', 'data' => []]);
        }
        return response()->json(['code' => 200, 'msg' => '成功', 'data' => $res]);
    }

    /**
     * 币币获取订单信息
     */
    public function getSpotOrdersInfo()
    {
        $okexAuthConfObj = new OkexAuthConf(self::API_KEY, self::SECRET_KEY, self::PASS_PHRASE);
        $okClient        = Okex::Spot($okexAuthConfObj);
        $params = [
            'instrument_id'     => 'LTC-USDT'
        ];
        $orderId = '1703532269289472';
        //$orderId = \request()->get('orderid');
        $res             = $okClient->getOrdersInfo($params, $orderId);
        if (!$res) {
            return response()->json(['code' => 0, 'msg' => '获取数据失败', 'data' => []]);
        }
        return response()->json(['code' => 200, 'msg' => '成功', 'data' => $res]);
    }

    /**
     * 币币获取订单信息
     */
    public function getSpotFills()
    {
        $okexAuthConfObj = new OkexAuthConf(self::API_KEY, self::SECRET_KEY, self::PASS_PHRASE);
        $okClient        = Okex::Spot($okexAuthConfObj);
        $orderId = '1703532269289472';
        //$orderId = \request()->get('orderid');
        $params = [
            'order_id'          => $orderId,
            'instrument_id'     => 'LTC-USDT',
            'from'              => '0',
            //'to'                => '10',
            'limit'             => '10'

        ];
        $res             = $okClient->getFills($params, $orderId);
        if (!$res) {
            return response()->json(['code' => 0, 'msg' => '获取数据失败', 'data' => []]);
        }
        return response()->json(['code' => 200, 'msg' => '成功', 'data' => $res]);
    }
}
