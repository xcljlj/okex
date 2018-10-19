<?php

namespace OkexV3\src\api;


class Margin
{
    public function __construct($url,$options)
    {
        parent::__construct($url,$options);
    }

    /**
     * 币币杠杆账户信息
     *
     */
    public function getAccountsInfo(array $param = [])
    {

    }

    /**
     * 单一币对账户信息
     */

    public function getAccountsType(array $param = [])
    {

    }

    /**
     * 账单流水查询
     *
     */

    public function getAccountsTypeLedger(array $param = [])
    {

    }


    /**
     * 杠杆配置信息
     */
    public function getAccountsAvailability(array $param = [])
    {

    }

    /**
     * 某个杠杆配置信息
     */
    public function getAccountsTypeAvailability(array $param = [])
    {

    }

    /**
     * 获取借币记录
     */

    public function getAccountsBorrowed(array $param = [])
    {

    }

    /**
     * 某账户借币记录
     */

    public function getAccountsTypeBorrowed(array $param = []){

    }

    /**
     * 借币
     */
    public function postAccountsBorrow(array $param = [])
    {

    }

    /**
     * 还币
     */
    public function postAccountsRepayment(array $param = [])
    {

    }

    /**
     * 下单
     */
    public function postOrders(array $param = [])
    {

    }

    /**
     * 批量下单
     */

    public function postBatchOrders(array $param = [])
    {

    }

    /**
     * 撤销指定订单
     */
    public function postCancelOrdersId(array $param = [])
    {

    }

    /**
     * 批量撤销订单
     *
     */

    public function postCancelBatchOrders(array $param = [])
    {

    }

    /**
     * 获取订单列表
     */
    public function getOrdersList(array $param = [])
    {

    }

    /**
     * 获取订单信息
     */

    public function getOrdersIdInfo(array $param = [])
    {

    }

    /**
     * 获取所有未成交订单
     */
    public function getOrdersPending(array $param = [])
    {

    }

    /**
     * 获取成交明细
     */

    public function getFills(array $param = [])
    {

    }

}