<?php

namespace App\Controllers\Admin; // namespace ditambah nama folder

use App\Controllers\BaseController; // tambah useApp\Controllers\BaseController

class Users extends BaseController
{
    public function index()
    {
        echo "Ini adalah controller Users method index yang ada di dalam folder Admin";
    }
}
