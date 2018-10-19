<?php

namespace OkexV3\src\api;


class Ett extends ApiBase
{
    public function __construct($url,$options)
    {
        parent::__construct($url,$options);
    }

    /**
     * 组合账户信息
     */
    public function getAccountsInfo(array $param = [])
    {

    }

    /**
     * 单一币种账户信息
     */
    public function getCurrency(array $param = [])
    {

    }

    /**
     * 账单流水查询
     */
    public function getLedger(array $param = [])
    {

    }

    /**
     * 下单
     */

    public function postOrder(array $param = [])
    {

    }

    /**
     * 撤销指定订单
     */
    public function deleteOrders(array $param = [])
    {

    }

    /**
     * 获取订单列表
     */

    public function getOrderList(array $param = [])
    {

    }

    /**
     * 获取订单信息
     */

    public function getOrderInfo(array $param = [])
    {

    }

    /**
     * 获取组合成分
     */
    public function getConstituentsEtt(array $param = [])
    {

    }


}