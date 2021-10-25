<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public $key = "asldhuwhufewewkjfhgweaskhdu8237487256kdnf";
    // cek admin
    function cekAdmin(){
        if ( Auth::user()->role === 'admin' ){
            return true;
        }else {
            return false;
        }
    }

    function refresh(){
        // return $this->respondWithToken(Auth::user()->refresh());
    }

    protected function respondWithToken($token){
        return [
            "access_token" => $token,
            "token_type" => "bearer"
        ];
    }
}
