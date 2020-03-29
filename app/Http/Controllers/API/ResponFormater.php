<?php

namespace App\Http\Controllers\API;

class ResponFormater{
    
    protected static $response =[
        'meta'=>[
            'code'=>200,
            'status'=>'sucess',
            'message'=>null
        ],
        'data'=> null
    ];

    public static function success($data = null, $message=null){

        self::$response['meta']['message']= $message; //self yaitu fungsi yang di gunakan untuk menggantikan this (kara ini pake method static)
        self::$response['data']=$data;

        return response()->json(self::$response, self::$response['meta']['code']);
    }

    public static function error($data=null, $message= null, $code = 400){
        self::$response['meta']['status']='error';
  
        self::$response['meta']['message']=$message;
        self::$response['data']=$data;
        self::$response['meta']['code']=$code;
        return response()->json(self::$response, self::$response['meta']['code']);


    }

}

