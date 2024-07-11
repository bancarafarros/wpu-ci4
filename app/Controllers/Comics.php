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

    public function create() // ke halaman tambah data komik
    {
        // session(); // udah ada di basecontroller
        $data = [
            'title' => 'Halaman Tambah Data Komik',
            // 'validation' => \Config\Services::validation() // kirim message validation ke view
            'validation' => session()->getFlashdata('validation') // kirim message validation ke view
        ];

        return view('comics/create', $data);
    }

    public function insert() // insert data ke db
    {
        // rules validation
        $validationRules = [
            'judul' => [                                       // kolom db
                'rules' => 'required|is_unique[comics.judul]', // rules
                'errors' => [                                  // error messages
                    'required' => '{field} komik harus diisi',
                    'is_unique' => '{field} komik sudah terdaftar'
                ]
            ]
        ];

        if (!$this->validate($validationRules)) { // cek validasi
            return redirect()->to('/comics/create') // Mengarhkan user ke halaman /comics/create
                ->withInput() // menyimpan data input dari permintaan sebelumnya ke dalam session
                ->with('validation', \Config\Services::validation()); // menyimpan input tambahan dengan nama 'validasi' dan error messages ke session
        }

        $slug = url_title($this->request->getVar('judul'), '-', true); // Membuat slug dari judul

        // insert data ke db
        $this->ComicModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $this->request->getVar('sampul')
        ]);

        session()->setFlashdata('message', 'Data berhasil ditambahkan!'); // kirim notifikasi dengan flashdata

        return redirect()->to('/comics'); // mengarahkan ke halaman /comics
    }
}
