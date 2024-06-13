<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home'
        ];

        return view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About'
        ];

        return view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact',

            // data alamat array asosiatif
            'alamat' => [
                [
                    'tipe' => 'Rumah',
                    'alamat' => 'Jl. zzzzzzz',
                    'kota' => 'Jekardah'
                ],
                [
                    'tipe' => 'Apart',
                    'alamat' => 'Jl. yyyyyy',
                    'kota' => 'Jaxel'
                ]
            ]
        ];

        return view('pages/contact', $data);
    }
}
