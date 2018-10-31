<?php

namespace App\Http\Controllers\Home;

use OkexV3\src\OkexAuthConf;
use OkexV3\src\Okex;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    const API_KEY = "7411c6e8-aa66-44c9-bbe7-b522ba5c27d7";
    const SECRET_KEY = "E84A2D1114C80E9B68F76F4D69B3C1BF";
    const PASS_PHRASE = "@xcljlj";

//    const API_KEY = "4ea73533-ef39-4700-8869-512c5e61248a";
//    const SECRET_KEY = "A4E0E42C1EA3D8EE0F43C082967525FB";
//    const PASS_PHRASE = "mryang123456789";

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 获取用户信息
     * @param Request $request
     *
     */
    public function userInfo(Request $request)
    {
        $userInfo = $request->session()->all();
        return response()->json(['code' => 200, 'msg' => '用户信息', 'data' => $userInfo]);
    }

    /**
     * 获取用户钱包账户信息
     */
    public function getAccountInfo(){
        $uid = self::$userInfo['uid'];
        $okexAuthConfObj = new OkexAuthConf(self::API_KEY,self::SECRET_KEY,self::PASS_PHRASE);
        $okClient = Okex::Account($okexAuthConfObj);
        $res = $okClient->getWalletInfo();
        if (!$res){
            return response()->json(['code'=>0,'msg'=>'获取数据失败','data'=>[]]);
        }
        return response()->json(['code'=>200,'msg'=>'成功','data'=>$res]);
    }

    /**
     * 获取用户币币账号信息
     */
    public function getSpotInfo(){
        $okexAuthConfObj = new OkexAuthConf(self::API_KEY,self::SECRET_KEY,self::PASS_PHRASE);
        $okClient = Okex::Spot($okexAuthConfObj);
        $res = $okClient->getAccountsInfo();
        if (!$res){
            return response()->json(['code'=>0,'msg'=>'获取数据失败','data'=>[]]);
        }
        return response()->json(['code'=>200,'msg'=>'成功','data'=>$res]);
    }

    /**
     * 获取用户Ett账号信息
     */
    public function getEttInfo(){
        $okexAuthConfObj = new OkexAuthConf(self::API_KEY,self::SECRET_KEY,self::PASS_PHRASE);
        $okClient = Okex::Ett($okexAuthConfObj);
        $res = $okClient->getAccountsInfo();
        if (!$res){
            return response()->json(['code'=>0,'msg'=>'获取数据失败','data'=>[]]);
        }
        return response()->json(['code'=>200,'msg'=>'成功','data'=>$res]);
    }

    /**
     * 获取钱包账单流水
     *
     */
    public function getAccountLedger()
    {
        $okexAuthConfObj = new OkexAuthConf(self::API_KEY,self::SECRET_KEY,self::PASS_PHRASE);
        $okClient = Okex::Account($okexAuthConfObj);
        $res = $okClient->getLedger();
        if (!$res){
            return response()->json(['code'=>0,'msg'=>'获取数据失败','data'=>[]]);
        }
        return response()->json(['code'=>200,'msg'=>'成功','data'=>$res]);
    }

    /**
     *  币币账单流水
     */
    public function getSpotLedger(){
        $okexAuthConfObj = new OkexAuthConf(self::API_KEY,self::SECRET_KEY,self::PASS_PHRASE);
        $okClient = Okex::Spot($okexAuthConfObj);
        $res = $okClient->getLedger('usdt',['from'=>1,'to'=>2,'limit'=>10]);
        if (!$res){
            return response()->json(['code'=>0,'msg'=>'获取数据失败','data'=>[]]);
        }
        return response()->json(['code'=>200,'msg'=>'成功','data'=>$res]);
    }

    /**
     *  Ett账单流水
     */
    public function getEttLedger()
    {
        $okexAuthConfObj = new OkexAuthConf(self::API_KEY,self::SECRET_KEY,self::PASS_PHRASE);
        $okClient = Okex::Ett($okexAuthConfObj);
        $res = $okClient->getLedger('USDT');
        if (!$res){
            return response()->json(['code'=>0,'msg'=>'获取数据失败','data'=>[]]);
        }
        return response()->json(['code'=>200,'msg'=>'成功','data'=>$res]);
    }
}