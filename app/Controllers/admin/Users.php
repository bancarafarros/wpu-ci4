<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;

class Users extends BaseController
{
    public function index()
    {
        echo "Ini controller Users method index yang ada di dalam folder admin";
    }

    public function about($nama = "", $umur = 0)
    {
        echo "Halo nama saya $nama, saya berusia $umur tahun";
    }

    public function produk($id = 0)
    {
        echo "ID produk adalah $id";
    }
}
