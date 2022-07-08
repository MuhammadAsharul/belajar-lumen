<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{
    //tampilkan data produk berupa json
    public function index()
    {
        $produk = Produk::all();
        return response()->json([
            'success' => true,
            'message' => 'Data Produk',
            'data' => $produk
        ], 200);
    }

    //proses tambah data produk di rest api
    public function store(Request $request)
    {
        // validasi data
        $validator = Validator::make($request->all(), [
            'namaProduk' => 'required',
            'deskripsiProduk' => 'required',
            'hargaProduk' => 'required',
            'kategoriProduk' => 'required'
        ]);
        // jika validasi gagal
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Semua kolom harus diisi',
                'data' => $validator->errors()
            ], 401);
        }
        // jika validasi berhasil
        else {
            $produk = Produk::create([
                'namaProduk' => $request->input('namaProduk'),
                'deskripsiProduk' => $request->input('deskripsiProduk'),
                'hargaProduk' => $request->input('hargaProduk'),
                'kategoriProduk' => $request->input('kategoriProduk')
            ]);
            if ($produk) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Produk berhasil ditambahkan',
                    'data' => $produk
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Produk gagal ditambahkan'
                ], 400);
            }
        }
    }

    //tampilkan data produk berdasarkan id
    public function show($id)
    {
        $produk = Produk::find($id);
        if ($produk) {
            return response()->json([
                'success' => true,
                'message' => 'Data Produk',
                'data' => $produk
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Produk tidak ditemukan'
            ], 404);
        }
    }

    //proses edit data produk berdasarkan id
    public function update(Request $request, $id)
    {
        // validasi data
        $validator = Validator::make($request->all(), [
            'namaProduk' => 'required',
            'deskripsiProduk' => 'required',
            'hargaProduk' => 'required',
            'kategoriProduk' => 'required'
        ]);
        // jika validasi gagal
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Semua kolom harus diisi',
                'data' => $validator->errors()
            ], 401);
        }
        // jika validasi berhasil
        else {
            $produk = Produk::whereId($id)->update([
                'namaProduk' => $request->input('namaProduk'),
                'deskripsiProduk' => $request->input('deskripsiProduk'),
                'hargaProduk' => $request->input('hargaProduk'),
                'kategoriProduk' => $request->input('kategoriProduk')
            ]);
            if ($produk) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Produk berhasil diubah',
                    'data' => $produk
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Produk gagal diubah'
                ], 400);
            }
        }
    }

    //proses hapus data produk berdasarkan id
    public function destroy($id)
    {
        $produk = Produk::whereId($id)->first();
        if ($produk) {
            $produk->delete();
            return response()->json([
                'success' => true,
                'message' => 'Data Produk berhasil dihapus'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Produk tidak ditemukan'
            ], 404);
        }
    }
}
