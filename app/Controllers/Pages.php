<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | Charr',
            // 'tes' => ['satu', 'dua', 'tiga']
        ];

        return view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About Me'
        ];

        return view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact Us',
            'alamat' => [
                [
                    'tipe' => 'rumah',
                    'alamat' => 'Jl. yg benar',
                    'kota' => 'Jekardah'
                ],
                [
                    'tipe' => 'kantor',
                    'alamat' => 'Jl. in aja dulu',
                    'kota' => 'Jaxel'
                ]
            ]
        ];

        return view('pages/contact', $data);
    }
}
