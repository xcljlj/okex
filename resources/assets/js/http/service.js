/*
 |--------------------------------------------------------------------------
 | 网络拦截器
 |--------------------------------------------------------------------------
 |
 |
 */


import axios from 'axios'
// import Vue from 'Vue'
import axiosConfig from './axios.config'
// import MessageBox from 'components/message-box'
// import Flash from 'components/flash'
// import Loading from 'components/loading'
// const status = {
//   SUCCESS: 1000200, // 7136说 只有成功
  // //NET_ERR: 1000000,   // 网络连接异常，请稍候再试
  // BIZ_ERR: 1003, // 业务请求异常
  // NO_AUTH: 1004,
  // SYS_ERR: 1000500, // 系统错误
  // LOG_OUT: 1000501, // 账号在其他地方登入
  // NOT_TELL: 1000504, // 账号已注册
  // N_TELL: 1000505, //  账号未注册
  // NOT_BING: 1000301, // 跳转至绑卡页面
  // NOT_PASSWORD: 1000302, // 跳转至设置交易密码页面
  // NOT_REAL: 1000303, // 跳转至实名验证页面(此错误码目前只有M站调用时返回)

  // NOT_CASH: 1000000, // 您还未投资活期，请先投资活期才能激活卡券
  // ERR_CODE: 1000305, //  短信验证码错误

  // NON_PHONE: 71000440, // 非手机访问，
  // jump_code: 71000450, // 错误跳转提示
  // JR_EXCEPTION_ERROR: 71000400, // m站提示异常
  // ERR_BUSINESS: 1000002, // 业务错误 验证码不存在
// }

// 创建axios实例
const service = axios.create(axiosConfig);
// let domain = process.domain;
// if (process.env.NODE_ENV == 'dev') {
//   service.defaults.baseURL = domain;
// } else if (process.env.NODE_ENV == 'debug') {
//   service.defaults.baseURL = '';
// } else if (process.env.NODE_ENV == 'prod') {
//   // 判断协议
//   let ishttps = 'https:' == document.location.protocol ? true : false;
//   if (ishttps) {
//     domain = domain.replace("http", "https");
//   }
//   service.defaults.baseURL = domain
// }
service.defaults.baseURL = window.location.origin;
// service.defaults.headers = {
//   'Access-Control-Allow-Origin': '*',
//   'Content-Type': 'application/json;charset=utf-8'
// },

service.interceptors.request.use(config => {
  // Loading.open('请求中...')
  return config;

}, error => {
  // Loading.close()
  // Flash('请求超时，请重试')
  console.log(error); // for debug
  Promise.reject(error);
})

// respone拦截器
service.interceptors.response.use(response => {
  // Loading.close()
  return response;
}, error => {
  // Loading.close()
  // Flash('请求超时，请重试')
  console.log('error' + error);
  return Promise.reject(error);

})

export default service;
export {
  status
};
