<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\LoginPost;
use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * 登录首页
     */
    public function index(){
        return view('login');
    }

    /**
     * 用户登录
     */

    public function signIn(Request $request){
        $mobile = $request->input('mobile');
        $simCode = $request->input('simCode');
        return json_encode(['name'=>$mobile,'simCode'=>$simCode]);


    }

    /**
     * 用户注册
     */
    public function register(Request $request){
        $mobile  = $request->input('mobile');
        $simCode = $request->input('smsCode');
        $password = $request->input('password');
//        $repeatPassword = $request->input('repeatPassword');
        $verifyCode = $request->input('verifyCode');

        $userModel = new User();
        $userModel->mobile = $mobile;
        $userModel->password = md5($password.md5('okex'));
        $userModel->username = $mobile;
        $userModel->mobile = $mobile;



    }



    /**
     * 退出登录
     */
    public function signOut(){

    }
}
