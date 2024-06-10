<?php

namespace App\Controllers;

class Coba extends BaseController
{
    public function index()
    {
        echo "Ini adalah controller Coba method index";
    }

    public function about($nama = '', $umur = '') // $nama dan $umur diambil dari segmen di url setelah method
    {
        echo "Halo, nama saya $nama dengan umur $umur";
    }
}
