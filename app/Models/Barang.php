<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Barang extends Model
{
    // use HasFactory;
    protected $table = 'barangs';
    protected $primaryKey = 'id';
    protected $fillable = ['nama_barang', 'satuan', 'harga', 'stok', 'status','keterangan'];


    public function getListData()
    {
        return $this->select('barangs.*')
            ->orderBy('barangs.id', 'DESC')->get();
    }
}
