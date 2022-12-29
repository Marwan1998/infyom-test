<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class UserAuthAPIController extends Controller
{

    
    //post request
    public function login(Request $request)
    {
        return Response::json(['message' => 'login'], 200);
    }

    //post request
    public function register(Request $request)
    {
        return Response::json(['message' => 'register'], 200);
    }

    //get request
    public function logout(Request $request)
    {
        return Response::json(['message' => 'logout'], 200);
    }

    //get request
    public function get_info(Request $request)
    {
        return Response::json(['message' => 'get_info'], 200);
    }
    
}
