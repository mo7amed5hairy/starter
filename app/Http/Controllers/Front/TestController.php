<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function make_test(){
        return "test is good";
    }
}
