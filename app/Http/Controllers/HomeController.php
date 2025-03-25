<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * 홈 페이지를 표시합니다.
     */
    public function index()
    {
        return view('home');
    }
}
