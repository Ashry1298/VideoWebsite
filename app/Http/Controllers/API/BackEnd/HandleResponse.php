<?php

namespace App\Http\Controllers\API\BackEnd;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

trait HandleResponse
{
    public function handleCrudResponse($data = null, $message, $status = true, $code = 200)
    {
        $array = [
            'data' => $data,
            'message' => $message,
            'status' => $status,
            'code' => $code,
        ];
        return $array;
    }
}
