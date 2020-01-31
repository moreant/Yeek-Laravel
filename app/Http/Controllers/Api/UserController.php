<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $user = $request->username;
        if (strlen($user) > 3) {
            return response()->json([
                'code' => 20000,
                'data' => [
                    "token" => "$user-token"
                ]
            ]);
        } else {
            return response()->json([
                'code' => 50001,
                'data' => [],
                'message' => "用户名小于3位"
            ]);
        }
    }

    public function info(Request $request)
    {
        $token = $request->token;
        $user  =  strstr($token,  '-token',  true);
        $roles = $user === "admin" ? 'admin' : 'user';
        return response()->json([
            'code' => 20000,
            'data' => [
                "roles" => [$roles],
                "introduction" => "超级管理员",
                "avatar" => "http://markdown.yeek.top/bolg/20191029/b8Ytj5Mons6f.jpg?imageslim",
                "name" => $user
            ],
        ]);
    }

    public function logout()
    {
        return response()->json([
            'code' => 20000,
            'data' => "success"
        ]);
    }
}
