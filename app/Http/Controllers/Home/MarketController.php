<?php
namespace App\Http\Controllers\Home;

use OkexV3\src\OkexAuthConf;
use OkexV3\src\Okex;
use App\Http\Controllers\Controller;

class MarketController extends Controller
{
    const API_KEY = "7411c6e8-aa66-44c9-bbe7-b522ba5c27d7";
    const SECRET_KEY = "E84A2D1114C80E9B68F76F4D69B3C1BF";
    const PASS_PHRASE = "@xcljlj";

    public function index(){
        $okexAuthConfObj = new OkexAuthConf(self::API_KEY,self::SECRET_KEY,self::PASS_PHRASE);
        $okClient = Okex::Spot($okexAuthConfObj);
        $res = $okClient->getProductsInfo();
        var_dump($res);
        return response()->json($res);

    }
}