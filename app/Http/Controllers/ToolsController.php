<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToolsController extends Controller
{
    public function lower($str){
        $lower = preg_replace('/\s+/', '_', $str);
        $lower = strtolower($lower);
        return $lower;
    }
}
