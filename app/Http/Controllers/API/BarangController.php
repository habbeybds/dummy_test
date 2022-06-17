<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class BarangController extends BaseController
{  
    public function getListBarang()
    {
        $barang = new Barang();
        $data = $barang->getListData();

        return $this->responseOK($data);
    }

    public function addBarang(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'inputNamaBarang' => ['required', 'string', 'max:255'],
            'inputSatuan' => ['required', 'string', 'max:255'],
            'inputHarga' => ['required', 'string', 'max:255'],
            'inputStok' => ['required', 'string', 'max:255'],
            'inputKeterangan' => ['required', 'string', 'max:255'],
        ]);

        if ($validator->fails()) {
            return $this->responseError('Gagal menambahkan barang silahkan lengkapi data dengan benar!', 422, $validator->errors());
        }

        $params = [
            'nama_barang' => $req->inputNamaBarang,
            'satuan' => $req->inputSatuan,
            'harga' => $req->inputHarga,
            'stok' => $req->inputStok,
            'keterangan' => $req->inputKeterangan,
            'status' => 'approved',
        ];

        $BarangDB = Barang::where('nama_barang', $params['nama_barang'])->first();

        if (empty($BarangDB)) {
            if ($addBarang = Barang::create($params)) {

                $response = [
                    'new_data' => $addBarang,
                    'all_data' => Barang::get(),
                    'message' => 'Berhasil menambah barang baru'
                ];

                return $this->responseOK($response, 200);
            } else {
                return $this->responseError('Gagal menambahkan silahkan coba lagi', 400);
            }
        } else {
            return $this->responseError('Data Barang sudah ada', 400);
        }
    }

}
