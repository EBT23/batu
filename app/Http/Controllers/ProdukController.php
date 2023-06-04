<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    public function produk()
    {
        $produk = DB::table('barang')->get();
        return view('admin.produk',compact('produk'));
    }

    public function tambah_produk(Request $request)
    {
        $data = [
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'keterangan' => $request->keterangan,
            'gambar' => $request->gambar,
         
        ];
        DB::table('barang')->insert($data);
        return redirect()->route('produk');
    }

    public function edit_produk(Request $request, $id)
    {
        DB::table('barang')->where('id', $id)->update([
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'keterangan' => $request->keterangan,
            'gambar' => $request->gambar,
        ]);
        return redirect()->route('produk');
    }



    function hapus_produk($id)
    {
        DB::table('barang')->where('id', $id)->delete();
        // Alert::success('Success', 'Jadwal Dokter berhasil dihapus!!');
        return redirect()->route('produk');
    }

}
