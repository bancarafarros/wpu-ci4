<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        // echo "Hello World!";
        return view('pages/home');
    }

    public function about()
    {
        return view('pages/about');
    }
}
