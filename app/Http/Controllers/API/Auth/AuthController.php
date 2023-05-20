<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Api\BackEnd\UserResource;
use App\Http\Controllers\API\Auth\HandleUserResponse;
use App\Http\Requests\Api\BackEnd\Users\LoginValidation;
use App\Http\Requests\Api\BackEnd\Users\StoreValidation;

class AuthController extends Controller
{
    use HandleUserResponse;
    public function handleRegister(StoreValidation $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($request->password);
        $data['group']='user';
        $user = User::create($data);
        $message = 'You Have Registered Successfully';
        return response()->json(($this->handleRegisterResponse(new UserResource($user), $message)));
    }
    public function handleLogin(LoginValidation $request)
    {
        $isAuth = Auth::attempt(
            $request->only('email', 'password')
        );
        if (!$isAuth) {
            return response()->json([
                'Message' => "You Are Not Authenticated",
                'status' => false,
                'code' => 200
            ]);
        } else {
            $user = User::where('email', $request->email)->first();
            $message = 'You Have Logged In Successfully';
            return response()->json(($this->handleLoginResponse($user, $message)));
        }
    }
    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return response()->json($this->HandleResponse('You Have Logged Out Successfully'));
    }
}
