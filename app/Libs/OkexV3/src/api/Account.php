<?php

namespace OkexV3\src\api;


class Account extends ApiBase
{
    public function __construct($url,$options)
    {
        parent::__construct($url,$options);
    }


    /**
     * 获取币种列表
     */
    public function getCurrenciesList(array $param = [])
    {
        return self::$http->get('/api/account/v3/currencies',$param);
    }

    /**
     * 钱包账户信息及单一币种账户信息
     */
    public function getWalletInfo($currency,array $param = [])
    {
        return self::$http->get('/api/account/v3/wallet/'.$currency,$param);
    }



    /**
     * 资金划转
     * @param array $param
     *
     * [
     *  'currency'=>'Y 币种','amount'=>'Y 划转数量','from'=>'Y 转出账户(0:子账户 1:币币 3:合约 4:C2C 5:币币杠杆 6:钱包 7:ETT)'
     *  'to'=>'Y 转入账户(0:子账户 1:币币 3:合约 4:C2C 5:币币杠杆 6:钱包 7:ETT)','sub_account'=>'N 子账号登录名'
     *  'instrument_id'=>'N 杠杆币对ID，仅限已开通杠杆的币对'
     * ]
     * 解释说明
     *  from或to指定为0时，sub_account为必填项。
     *  from或to指定为5时，instrument_id为必填项。
     *  OK06ETT只能在ETT组合账户和币币账户中互转，不支持转到其他账户
     */
    public function postTransfer(array $param = [])
    {
        return self::$http->post('/api/account/v3/transfer',$param);
    }

    /**
     * 提取货币
     */
    public function postWithdrawal(array $param = [])
    {

    }

    /**
     * 提币手续费
     * @param array $param
     */
    public function getWithdrawalFee(array $param = [])
    {

    }

    /**
     * 查询最近所有币种的提币记录及查询单个币种提币记录
     *
     */

    public function getWithdrawalHistory(array $param = [])
    {

    }

    /**
     * 账单流水查询
     */
    public function getLedger(array $param = [])
    {

    }

    /**
     * 获取充值地址
     */

    public function getDepositAddress(array $param = [])
    {

    }

    /**
     * 获取所有币种充值记录及获取单个币种充值记录
     * @param array $param
     */
    public function getDepositHistory(array $param = [])
    {

    }
}