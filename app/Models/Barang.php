<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
   public function barangMasuk()
{
    return $this->hasMany(BarangMasuk::class, 'id_barang');
}
}
