<?php

namespace App\Models;

use CodeIgniter\Model;

// nama table sebaiknya jamak/plural
// nama model sebaiknya tunggal/singular
class ComicModel extends Model
{
    protected $table = 'comics';                                                   // deklarasi table yang digunakan
    protected $useTimestamps = true;                                               // set useTimestamps true
    protected $allowedFields = ['judul', 'slug', 'penulis', 'penerbit', 'sampul']; // deklarasi fields yang boleh diisi

    public function getComic($slug = false)
    {
        if ($slug == false) {
            return $this->findAll(); // untuk menampilkan semua data komik di view index
        }

        return $this->where(['slug' => $slug])->first(); // untuk menampilkan salah satu data komik berdasarkan $slug
    }
}
