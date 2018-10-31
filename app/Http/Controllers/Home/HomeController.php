<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userInfo = $request->session()->all();

        return response()->json(['code'=>200,'msg'=>'','data'=>$userInfo]);
    }
    public function test(){
        echo 1111;
    }
    /**
     * 退出登录
     */
    public function signOut()
    {
        session()->flush();
        return response()->json(['code' => 200, 'msg' => '退出成功', 'data' => []]);
    }
}
