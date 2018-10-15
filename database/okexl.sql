-- --------------------------------------------------------
-- 主机:                           192.168.33.105
-- 服务器版本:                        5.5.60-log - Source distribution
-- 服务器操作系统:                      Linux
-- HeidiSQL 版本:                  9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- 导出 qkl 的数据库结构
CREATE DATABASE IF NOT EXISTS `qkl` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `qkl`;

-- 导出  表 qkl.ok_order 结构
CREATE TABLE IF NOT EXISTS `ok_order` (
  `orderid` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `order_type` tinyint(4) NOT NULL COMMENT '订单类型 ,1-购买vip卡订单|2-充值订单',
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '用户关联uid',
  `goodsid` int(11) NOT NULL DEFAULT '0' COMMENT '商品id',
  `order_num` varchar(25) NOT NULL DEFAULT '0' COMMENT '订单号',
  `order_amount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '订单金额',
  `order_status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '订单状态，1-支付中|2-已支付|3-订单失效',
  `c_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `u_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '修改时间',
  PRIMARY KEY (`orderid`),
  KEY `index` (`uid`,`order_num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='订单表';

-- 数据导出被取消选择。
-- 导出  表 qkl.ok_order_pay 结构
CREATE TABLE IF NOT EXISTS `ok_order_pay` (
  `pid` int(11) NOT NULL AUTO_INCREMENT COMMENT '支付id',
  `orderid` int(11) NOT NULL COMMENT '订单ID',
  `pay_status` tinyint(4) NOT NULL COMMENT '订单支付状态 1-已支付|2未支付',
  `pay_money` decimal(10,2) NOT NULL COMMENT '支付金额',
  `c_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `u_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '修改时间',
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='支付订单表';

-- 数据导出被取消选择。
-- 导出  表 qkl.ok_sms_log 结构
CREATE TABLE IF NOT EXISTS `ok_sms_log` (
  `sid` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `mobile` varchar(15) NOT NULL DEFAULT '0' COMMENT '手机号码',
  `content` varchar(50) NOT NULL COMMENT '短信内容',
  `sms_code` char(6) NOT NULL COMMENT '短信验证码',
  `is_verify` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否验证 1-已验证|2-未验证',
  `send_status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '发送状态：1-待发送|2-成功|3-失败',
  `error_msg` varchar(50) NOT NULL DEFAULT '''''' COMMENT '错误信息',
  `error_code` varchar(20) NOT NULL DEFAULT '''''' COMMENT '错误码',
  `send_time` timestamp NULL DEFAULT NULL COMMENT '短信发送时间',
  `c_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `u_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '修改时间',
  PRIMARY KEY (`sid`),
  KEY `index` (`mobile`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='短信日志表';

-- 数据导出被取消选择。
-- 导出  表 qkl.ok_user 结构
CREATE TABLE IF NOT EXISTS `ok_user` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `mobile` varchar(15) COLLATE utf8_unicode_ci NOT NULL COMMENT '手机号码',
  `username` varchar(25) COLLATE utf8_unicode_ci DEFAULT '''''' COMMENT '用户名',
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户密码',
  `sex` int(11) NOT NULL DEFAULT '0' COMMENT '性别:0-保密|1-男|2-女|',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '记住用户Token',
  `platform` int(11) NOT NULL COMMENT '平台类型，1-pc|2-h5|3-ios|4-安卓|5-wap',
  `is_valid` int(11) NOT NULL DEFAULT '1' COMMENT '是否有效 0-禁用|1-有效',
  `c_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `u_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '修改时间',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 数据导出被取消选择。
-- 导出  表 qkl.ok_user_login_log 结构
CREATE TABLE IF NOT EXISTS `ok_user_login_log` (
  `lid` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `uid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '关联用户ID',
  `login_ip` varchar(25) NOT NULL DEFAULT '''''' COMMENT '登录IP',
  `platform` tinyint(1) NOT NULL DEFAULT '0' COMMENT '平台类型，1-pc|2-h5|3-ios|4-安卓|5-wap',
  `c_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `u_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '修改时间',
  PRIMARY KEY (`lid`),
  KEY `index` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='会员登录日志表';

-- 数据导出被取消选择。
-- 导出  表 qkl.ok_user_money 结构
CREATE TABLE IF NOT EXISTS `ok_user_money` (
  `moneyid` int(10) unsigned NOT NULL COMMENT '主键id',
  `uid` int(10) unsigned NOT NULL COMMENT '用户id',
  `amount` decimal(10,2) unsigned NOT NULL COMMENT '金额',
  `freeze_amount` decimal(10,2) unsigned NOT NULL COMMENT '冻结金额',
  `money_status` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '账户状态 1-有效|2-冻结状态',
  `c_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `u_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '更新时间',
  PRIMARY KEY (`moneyid`),
  KEY `index` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='用户账户表';

-- 数据导出被取消选择。
-- 导出  表 qkl.ok_user_okex 结构
CREATE TABLE IF NOT EXISTS `ok_user_okex` (
  `okexid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `uid` int(11) NOT NULL COMMENT '关联users表ID',
  `api_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT 'okex接口key',
  `secret_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT 'okex接口授权key',
  `c_time` timestamp NULL DEFAULT NULL COMMENT '创建时间',
  `u_time` timestamp NULL DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`okexid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 数据导出被取消选择。
-- 导出  表 qkl.ok_user_vip 结构
CREATE TABLE IF NOT EXISTS `ok_user_vip` (
  `vid` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `uid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '关联用户ID',
  `level` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'vip级别，1-初级会员|2-中级会员|3高级会员',
  `integral` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'vip 会员积分',
  `is_valid` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT 'vip 是否有效 1-有效|2-无效',
  `c_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `u_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`vid`),
  KEY `index` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='vip会员表';

-- 数据导出被取消选择。
-- 导出  表 qkl.ok_user_vip_card 结构
CREATE TABLE IF NOT EXISTS `ok_user_vip_card` (
  `uvcid` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `vcid` int(11) NOT NULL DEFAULT '0' COMMENT 'vip卡id',
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '关联用户id',
  `uvc_no` varchar(25) NOT NULL DEFAULT '''''' COMMENT '子卡片编号',
  `is_use` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否使用，0-未使用|1-已使用',
  `c_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `u_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '修改时间',
  PRIMARY KEY (`uvcid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='用户购买vip卡表';

-- 数据导出被取消选择。
-- 导出  表 qkl.ok_vip_card 结构
CREATE TABLE IF NOT EXISTS `ok_vip_card` (
  `cid` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `card_name` varchar(25) NOT NULL DEFAULT '0' COMMENT 'vip卡名称',
  `describe` varchar(255) NOT NULL DEFAULT '0' COMMENT 'vip卡描述',
  `card_num` varchar(25) NOT NULL DEFAULT '0' COMMENT 'vip卡编号',
  `card_money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'vip卡金额',
  `card_validity_period` int(11) NOT NULL DEFAULT '0' COMMENT 'vip卡有效期 0-永久有效|大于0，为月数',
  `c_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `u_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '修改时间',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='vip会员卡';

-- 数据导出被取消选择。
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
