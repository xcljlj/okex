<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\SmsLog;
use App\Model\User;

class RegisterController extends Controller
{

    /**
     * 注册账号
     * @param Request $request
     */
    public function signUp(Request $request)
    {
        $userModel = new User();
        $mobile = $request->input('mobile');
        $password = $request->input('password');
        $smsCode = $request->input('smsCode');
        //验证短信验证码是否正确
        $smsLog = SmsLog::where(['mobile' => $mobile, 'is_verify' => 2])->orderByRaw('sid desc')->first();
        if ($smsLog->sms_code != $smsCode) {
            return response()->json(['code' => 0, 'msg' => '短信验证码错误', 'data' => []]);
        }
        $userModel->mobile = $mobile;
        $userModel->password = md5($password);
        $result = $userModel->save();
        if ($result) {
            $smsLog->is_verify = 1;
            $smsLog->save();
            return response()->json(['code' => 200, 'msg' => '注册成功', 'data' => []]);
        } else {
            return response()->json(['code' => 0, 'msg' => '注册失败', 'data' => []]);
        }

    }
}