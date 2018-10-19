<?php
/**
 * 合约API
 */

namespace OkexV3\src\api;


class Futures
{
    public function __construct($url,$options)
    {
        parent::__construct($url,$options);
    }

    /**
     * 合约持仓信息
     */
    public function getPositionInfo(array $param = [])
    {

    }

    /**
     * 单个合约持仓信息
     */
    public function getTypePositionInfo(array $param = [])
    {

    }

    /**
     * 获取所有币种的合约账户信息。
     */
    public function getAccountsInfo(array $param = [])
    {

    }

    /**
     * 获取合约币种杠杆倍数
     */

    public function getAccountsTypeLeverage(array $param = [])
    {

    }

    /**
     * 设定合约币种杠杆倍数
     */
    public function setAccountsTypeLeverage(array $param = [])
    {

    }

    /**
     * 账单流水查询
     */

    public function getAccountsTypeLedger(array $param = [])
    {

    }

    /**
     * 下单
     */
    public function postOrder(array $param = [])
    {

    }

    /**
     * 批量下单
     */
    public function postOrders(array $param = [])
    {

    }

    /**
     * 撤销指定订单
     */

    public function postCancelOrder(array $param = [])
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
    public function getOrdersInfo(array $param = [])
    {

    }

    /**
     * 获得交易明细
     */

    public function getFills(array $param = [])
    {

    }

    /**
     * 获取合约信息
     */
    public function getInstrumentsInfo(array $param = [])
    {

    }

    /**
     * 获取深度数据
     */
    public function getTypeBook(array $param = [])
    {

    }

    /**
     * 获取全部ticker信息
     */
    public function getTicker(array $param = [])
    {

    }

    /**
     * 获取某个ticker信息
     */

    public function getTypeTicker(array $param = [])
    {

    }

    /**
     * 获取成交数据
     */

    public function getTypeTrades(array $param = [])
    {

    }

    /**
     * 获取K线数据
     */

    public function getTypeCandles(array $param = [])
    {

    }

    /**
     * 获取指数信息
     */
    public function getTypeIndex(array $param = [])
    {

    }

    /**
     * 获取法币汇率
     */

    public function getRate(array $param = [])
    {

    }

    /**
     * 获取预估交割价
     */

    public function getEstimatedPrice(array $param = [])
    {

    }

    /**
     * 获取平台总持仓量
     */
    public function getOpenInterest(array $param = [])
    {

    }

    /**
     * 获取当前限价
     *
     */
    public function getPriceLimit(array $param = [])
    {

    }

    /**
     * 获取爆仓单
     */

    public function getLiquidation(array $param = [])
    {

    }

    /**
     * 获取合约挂单冻结数量
     */

    public function getHolds(array $param = [])
    {

    }
}