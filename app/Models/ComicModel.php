<?php

namespace App\Models;

use CodeIgniter\Model;

// nama table sebaiknya jamak/plural
// nama model sebaiknya tunggal/singular
class ComicModel extends Model
{
    protected $table = 'comics'; // deklarasi table yang digunakan
    protected $useTimestamps = true; // set useTimestamps true
}
