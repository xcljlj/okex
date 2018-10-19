<?php

namespace OkexV3\src\api;


class Spot
{
    public function __construct($url,$options)
    {
        parent::__construct($url,$options);
    }

    /**
     * 币币账户信息及单一币种账户信息
     */

    public function getAccountsInfo(array $param = [])
    {

    }

    /**
     * 账单流水查询
     */

    public function getAccountsCurrencyLedger(array $param = [])
    {

    }

    /**
     * 单笔下单
     */
    public function postOrders(array $param = [])
    {

    }

    /**
     * 批量下单下单
     */
    public function postBatchOrders(array $param = [])
    {

    }

    /**
     * 撤销指定订单（单个订单）
     *
     */
    public function postCancelOrders(array $param = [])
    {

    }

    /**
     * 批量撤销订单
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
     * 获取所有未成交订单
     *
     */
    public function getOrdersPending(array $param = [])
    {

    }

    /**
     * 获取订单信息
     */
    public function getOrdersInfo(array $param = [])
    {

    }

    /**
     * 获取成交明细
     */

    public function getFills(array $param = [])
    {

    }

    /**
     * 获取币对信息
     */
    public function getProductsInfo(array $param = []){

    }

    /**
     * 获取深度数据
     */
    public function getProductsInstrumentIdBook(array $param = [])
    {

    }

    /**
     * 获取全部ticker信息
     */
    public function getProductsTickerInfo(array $param = [])
    {

    }

    /**
     * 获取某个ticker信息
     */

    public function getProductsInstrumentIdTicker(array $param = [])
    {

    }

    /**
     * 获取成交数据
     */
    public function getProductsInstrumentIdTrades(array $param = [])
    {

    }

    /**
     * 获取K线数据
     */
    public function getProductsInstrumentIdCandles(array $param = [])
    {

    }
}