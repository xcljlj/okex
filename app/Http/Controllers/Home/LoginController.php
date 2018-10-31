<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\LoginPost;
use App\Model\SmsLog;
use App\Model\User;
use App\Model\UserLoginLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /*
     * 有效短信
     */
    const SMS_VALID = 2;

    /**
     * 无效短信
     */
    const SMS_INVALID = 1;

    /**
     * 登录短信类型
     */
    const SMS_LOGIN = 2;
    /**
     * 用户登录
     */

    public function signIn(Request $request)
    {
        $mobile = $request->input('mobile');
        $password = $request->input('password');
        $smsCode = $request->input('smsCode');
        //短信码验证
        $smsLog = SmsLog::where(['mobile' => $mobile, 'is_verify' => self::SMS_VALID, 'sms_type' => self::SMS_LOGIN])
            ->orderByRaw('sid desc')
            ->first(['sms_code','sid']);
        if (!$smsLog ||$smsLog->sms_code != $smsCode) {
            return response()->json(['code' => 0, 'msg' => '短信验证码错误', 'data' => []]);
        }else{
            $smsLog->is_verify = self::SMS_INVALID;
            $smsLog->save();
        }
        //用户验证
        $userField = [
            'user.uid',
            'user.mobile',
            'user.username',
            'user.password',
            'user.sex',
            'user.image_url',
            'user_okex.api_key',
            'user_okex.secret_key',
            'user_vip.level',
            'user_vip.integral',
            'user_vip.is_valid'
        ];
        $user = User::where(['user.mobile' => $mobile])
            ->leftJoin('user_okex','user.uid','=','user_okex.uid')
            ->leftJoin('user_vip','user.uid','=','user_vip.uid')
            ->first($userField);
        if (md5($password) != $user->password) {
            return response()->json(['code' => 0, 'msg' => '用户密码错误', 'data' => []]);
        }

        //记录登录日志
        $userLoginLog = new UserLoginLog();
        $userLoginLog->uid = $user->uid;
        $userLoginLog->login_ip = $request->getClientIp();
        $userLoginLog->platform = 5;
        $userLoginLog->save();

        //记录session
        $userInfo = json_decode($user, true);
        unset($userInfo['password']);
        session($userInfo);

        return response()->json(['code' => 200, 'msg' => '登录成功', 'data' => []]);
    }


}
