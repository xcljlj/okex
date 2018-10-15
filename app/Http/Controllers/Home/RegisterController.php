<?php

namespace App\Http\Controllers\Home;


use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterPost;
use App\Model\User;

class RegisterController extends Controller
{

    /**
     * 注册账号
     * @param Request $request
     */
    public function signUp(RegisterPost $request)
    {
        $userModel = new User();
        $userModel->mobile = $request->input('mobile');
        $userModel->password = $request->input('password');
        $result = $userModel->save();
        if ($result){
            return response()->json(['code'=>200,'msg'=>'注册成功','data'=>[]]);
        }else{
            return response()->json(['code'=>0,'msg'=>'注册失败','data'=>[]]);
        }

    }
}