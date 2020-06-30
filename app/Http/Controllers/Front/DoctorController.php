<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DoctorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('go_doc2');
    }

    public function go_doc1(){
        return "hello docone";
    }
    public function go_doc2(){
        return "hello doctwo";
    }
    public function go_doc3(){
        return "hello doc3";
    }
    public function go_doc4(){
        return "hello doc4";
    }

}
