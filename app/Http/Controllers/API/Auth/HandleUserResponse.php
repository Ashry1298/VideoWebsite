<?php

namespace App\Http\Controllers\API\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

trait HandleUserResponse
{
    public function handleRegisterResponse($data = null, $message, $status = true, $code = 200)
    { 
        $array = [
            'User' => $data,
            'Message' => $message,
            'status' => $status,
            'code' => $code,
            'token' => $data->createToken("access_token")->plainTextToken,
        ];
        return $array;
    }
    public function handleLoginResponse($data = null, $message, $status = true, $code = 200)
    { 
        $array = [
            'Message' => $message,
            'status' => $status,
            'code' => $code,
            'token' => $data->createToken("access_token")->plainTextToken,
        ];
        return $array;
    }

    public function HandleResponse($message, $status = true, $code = 200)
    {
        $array = [
            'Message' => $message,
            'status' => $status,
            'code' => $code,
        ];
        return $array;
    }

}
