<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function login()
    {
        return response()->json([
            'code' => 20000,
            'data' => [
                "token" => "admin-token"
            ]
        ]);
    }

    public function info()
    {
        return response()->json([
            'code' => 20000,
            'data' => [
                "roles" => ["admin"],
                "introduction" => "超级管理员",
                "avatar" => "http://markdown.yeek.top/bolg/20191029/b8Ytj5Mons6f.jpg?imageslim",
                "name" => "Admin"
            ],
        ]);
    }
}
