import axios from './service'
// import http from 'axios'
import {
  stringify
} from 'qs'

export default function fetch(url, data = {}, method, headers) {

  return new Promise((resolve, reject) => {
    // console.log(url, method,method || 'post',)
    // data = stringify(data) // 使用'application/x-www-form-urlencoded; charset=UTF-8'格式提交数据需要进行序列化
    data = method !== 'get' ? stringify(data) : data
    axios({
      url,
      method: method || 'post',
      data: method !== 'get' ? data : '',
      params: method === 'get' ? data : '',
      headers: headers || {
          // 'Content-Type': 'application/json;charset=UTF-8; charset=UTF-8'
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' // 以formdata的格式发送请求数据 ， 去掉后默认以json格式发送数据Content-Type默认为：content-type: application/json;charset=UTF-8
      },
    }).then(response => {
      resolve(response.data)
    }).catch(error => {
      console.log('封装主入口-->')
      console.log(error)
      reject(error)
    })
  })

}
