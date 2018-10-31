<?php
/**
 * 发送短信验证码
 */

namespace App\Http\Controllers\Home;


use App\Http\Controllers\Controller;
use App\Model\SmsLog;
use App\Model\User;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SmsController extends Controller
{

    const SMS_TYPE_REGISTER = 1;
    const SMS_TYPE_LOGIN = 2;

    /**
     * 发送注册短信验证码
     */
    public function sendRegisterCode(Request $request)
    {
        try{
            $mobile = $request->input('mobile');
            //查询手机号码是否已注册
            $user = User::where(['mobile' => $mobile])->first();
            if ($user) {
                return response()->json(['code' => 0, 'msg' => '用户已经存在', 'data' => []]);
            }
            $smsLog = new SmsLog;
//        $smsCode = mt_rand(1000, 9999);
            $smsCode = '1234';
            $smsLog->content = '你的短信验证码是:' . $smsCode;
            $smsLog->sms_type = self::SMS_TYPE_REGISTER;
            $smsLog->sms_code = $smsCode;
            $smsLog->send_time = date('Y-m-d H:i:s');
            $result = $smsLog->save();
            if ($result) {
                return response()->json(['code' => 200, 'msg' => '短信发送成功', 'data' => []]);
            } else {
                return response()->json(['code' => 0, 'msg' => '短信发送失败', 'data' => []]);
            }
        }catch (\Exception $exception){
            var_dump($exception->getLine());
            var_dump($exception->getMessage());
        }


    }


    /**
     * 发送登录短信验证码
     */

    public function sendLoginCode(Request $request)
    {
        try{
            $mobile = $request->input('mobile');
            //查询手机号码是否已注册
            $user = User::where(['mobile' => $mobile])->first();
            if (!$user) {
                return response()->json(['code' => 0, 'msg' => '用户不存在,请先注册', 'data' => []]);
            }
            $smsLog = new SmsLog;
            $smsLog->mobile = $mobile;
//        $smsCode = mt_rand(1000, 9999);
            $smsCode = '1234';
            $smsLog->content = '你的短信验证码是:' . $smsCode;
            $smsLog->sms_type = self::SMS_TYPE_LOGIN;
            $smsLog->sms_code = $smsCode;
            $smsLog->send_time = date('Y-m-d H:i:s');
            $result = $smsLog->save();
            if ($result) {
                return response()->json(['code' => 200, 'msg' => '短信发送成功', 'data' => []]);
            } else {
                return response()->json(['code' => 0, 'msg' => '短信发送失败', 'data' => []]);
            }
        }catch (\Exception $exception){
            var_dump($exception->getLine());
            var_dump($exception->getMessage());
        }

    }
}