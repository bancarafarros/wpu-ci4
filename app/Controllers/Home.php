<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    function coba()
    {
        echo "Hello World!";
    }
}
