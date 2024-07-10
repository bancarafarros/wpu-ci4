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
        // $comic = $this->ComicModel->findAll(); // udah diganti sama getComic() di ComicModel
        // dd($komik);

        $data = [
            'title' => 'Daftar Komik',
            'comic' => $this->ComicModel->getComic() // kirim semua data komik ke view
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

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Komik',
            'comic' => $this->ComicModel->getComic($slug) // kirim salah satu data komik berdasarkan $slug ke view
        ];

        // jika komik tidak ada di table
        if (empty($data['komik'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul komik ' . $slug . ' tidak ditemukan!');
        }

        return view('comics/detail', $data); // mengarahkan ke view detail komik
    }

    public function create() // halaman form tambah data komik
    {
        $data = [
            'title' => 'Halaman Tambah Data Komik',
        ];

        return view('comics/create', $data);
    }

    public function insert() // insert data komik ke db
    {
        // dd($this->request->getVar());

        $slug = url_title($this->request->getVar('judul'), '-', true); // bikin slug pake url_title()
        $this->ComicModel->save([                                      // run model
            'judul' => $this->request->getVar('judul'),                // ambil data 'judul' pake getVar()
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $this->request->getVar('sampul')
        ]);

        session()->setFlashData('message', 'Data berhasil ditambahkan!'); // session flashdata buat notifikasi

        return redirect()->to('/comics');
    }
}
