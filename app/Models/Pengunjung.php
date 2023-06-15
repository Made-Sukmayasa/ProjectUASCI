<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengunjung extends Model
{
    protected $table            = 'pengunjung';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['name','nim','no_hp','prodi'];


}
