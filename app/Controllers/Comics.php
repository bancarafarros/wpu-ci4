<?php

namespace App\Controllers;

use App\Models\ComicModel;

// 1 Controller 1 View
// nama controller sebaiknya jamak/plural
class Comics extends BaseController
{
    protected $ComicModel; // property class untuk memanggil model

    public function __construct()
    {
        // memanggil property class untuk intansiasi class dari file model 
        $this->ComicModel = new ComicModel();
    }
    public function index()
    {
        // mengambil seluruh data dengan menggunakan property class dan dijadikan array dengan findAll()
        $comic = $this->ComicModel->findAll();
        // dd($komik);

        $data = [
            'title' => 'Daftar Komik',
            'comic' => $comic // persiapa mengirim data ke view
        ];

        // connect db tanpa model
        // $db = \Config\Database::connect();
        // $komik = $db->query("SELECT * FROM comics");
        // // dd($komik);
        // foreach ($komik->getResultArray() as $row) {
        //     d($row);
        // }

        return view('comics/index', $data); // mengambalikan/memanggil view sekaligus mengirim data
    }
}
