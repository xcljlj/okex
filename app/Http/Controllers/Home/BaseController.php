<?php

namespace App\Http\Controllers\Home;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    private $auth_status;
    public static $userInfo;
    public function __construct()
    {
        $this->middleware('authLogin')->except(['index']);
    }

}