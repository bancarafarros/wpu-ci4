<?php

namespace App\Controllers;

use App\Models\KomikModel;
use PharIo\Manifest\Url;

class Komik extends BaseController
{
    protected $komikModel;

    public function __construct()
    {
        $this->komikModel = new KomikModel();
    }

    public function index()
    {
        // $komik = $this->komikModel->findAll();

        $data = [
            'title' => 'Daftar Komik',
            // 'komik' => $komik
            'komik' => $this->komikModel->getKomik()
        ];

        // $komikModel = new \App\Models\KomikModel(); // alternatif pake model
        // $komikModel = new KomikModel(); // dipindahin ke construct

        // dd($komik);


        // connect db tanpa model
        // $db = \Config\Database::connect();
        // $komik = $db->query("SELECT * FROM komik");
        // dd($komik);
        // foreach ($komik->getResultArray() as $row) {
        //     dd($row);
        // }

        return view('komik/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Komik',
            'komik' => $this->komikModel->getKomik($slug)
        ];

        if (empty($data['komik'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul komik ' . $slug . ' tidak ditemukan');
        }

        return view('komik/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Komik',
            'validation' => \Config\Services::validation()
        ];

        return view('komik/create', $data);
    }

    public function save()
    {
        // validasi input
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[komik.judul]',
                'errors' => [
                    'required' => '{field} komik harus diisi',
                    'is_unique' => '{field} komik sudah terdaftar'
                ]
            ],
            // 'sampul' => [
            //     'rules' => 'is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
            //     'errors' => [
            //         'is_image' => 'File yang Anda pilih bukan gambar',
            //         'mime_in' => 'File yang Anda pilih bukan gambar'
            //     ]
            // ]
        ])) {
            // $validation = \Config\Services::validation(); // ngambil pesan kesalahan
            // return redirect()->to('/Komik/create')->withInput()->with('validation', $validation);
            return redirect()->to('/Komik/create')->withInput();
        }

        // ambil file
        $fileSampul = $this->request->getFile('sampul');

        // cek upload gambar atau gk
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'default.jpg';
        } else {
            // ambil nama file
            $namaSampul = $fileSampul->getName();
            // pindah ke folder img
            $fileSampul->move('img');
            // $fileSampul->move('img', $namaSampul);
        }

        // generate nama file random
        // $namaSampul = $fileSampul->getRandomName();

        $slug = url_title($this->request->getVar('judul'), '-', true);

        $this->komikModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $namaSampul
        ]);

        session()->setFlashdata('message', 'Data berhasil ditambah');

        return redirect()->to('/Komik');
    }

    public function delete($id)
    {
        // cari gambar berdasarkan id
        $komik = $this->komikModel->find($id);

        // cek jika gambarnya default
        if ($komik['sampul'] != 'default.jpg') {
            // hapus gambar
            unlink('img/' . $komik['sampul']);
        }

        $this->komikModel->delete($id);
        session()->setFlashdata('message', 'Data berhasil dihapus');
        return redirect()->to('/Komik');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Form Ubah Data Komik',
            'validation' => \Config\Services::validation(),
            'komik' => $this->komikModel->getKomik($slug)
        ];

        return view('komik/edit', $data);
    }

    public function update($id)
    {
        // // cek judul
        // $komikLama = $this->komikModel->getKomik($this->request->getVar('slug'));
        // if ($komikLama['judul'] == $this->request->getVar('judul')) {
        //     $rule_judul = 'required';
        // } else {
        //     $rule_judul = 'required|is_unique[komik.judul]';
        // }

        // // validasi input
        // if (!$this->validate(
        //     [
        //         'judul' => [
        //             'rules' => $rule_judul,
        //             'errors' => [
        //                 'required' => '{field} komik harus diisi',
        //                 'is_unique' => '{field} komik sudah terdaftar'
        //             ]
        //         ],
        //         'sampul' => [
        //             'rules' => 'is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
        //             'errors' => [
        //                 'is_image' => 'File yang Anda pilih bukan gambar',
        //                 'mime_in' => 'File yang Anda pilih bukan gambar'
        //             ]
        //         ]
        //     ]
        // )) {
        //     // $validation = \Config\Services::validation(); // ngambil pesan kesalahan
        //     // return redirect()->to('/Komik/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        //     return redirect()->to('/Komik/edit/' . $this->request->getVar('slug'))->withInput();
        // }

        $fileSampul = $this->request->getFile('sampul');

        // cek gambar, apakah tetap gambar lama
        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('sampulLama');
        } else {
            // ambil nama file
            $namaSampul = $fileSampul->getName();
            // pindah ke folder img
            $fileSampul->move('img');
            // $fileSampul->move('img', $namaSampul);

            // hapus sampul lama
            unlink('img/' . $this->request->getVar('sampulLama'));
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);

        $this->komikModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $namaSampul
        ]);

        session()->setFlashdata('message', 'Data berhasil diubah');

        return redirect()->to('/Komik');
    }
}
