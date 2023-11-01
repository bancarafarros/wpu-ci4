<?php

namespace App\Controllers;

class Coba extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
}
