<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home'
        ];

        echo view('layout/header', $data);
        return view('pages/home');
        echo view('layout/footer');
    }

    public function about()
    {
        $data = [
            'title' => 'About'
        ];

        echo view('layout/header', $data);
        return view('pages/about');
        echo view('layout/footer');
    }
}
