<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Barang;

class ProdukController extends Controller
{
    public function produk()
    {
        $produk = DB::table('barang')->get();
        return view('admin.produk',compact('produk'));
    }

    public function tambah_produk(Request $request)
    {
      
        $request->validate([
            'nama_barang' => 'required',
            'harga' => 'required',
            'keterangan' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

     
        $data = new Barang();
        $data->nama_barang = $request->nama_barang;
        $data->harga = $request->harga;
        $data->keterangan = $request->keterangan;
        $data->created_at = now();
        $data->gambar = $request->gambar;

       
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '-' . $file->getClientOriginalName();
            $path = $file->move(public_path('upload/produk'), $filename);
            $data->gambar = $filename;
        }
        //dd($data);

        $data->save();

        return redirect()->route('produk')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit_produk(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required',
            'harga' => 'required',
            'keterangan' => 'required',
           
        ]);
      
       $data = Barang::find($id);

      
       if (!$data) {
           return response()->json([
               'message' => 'Data not found'
           ], 404);
       }

      
            $data->nama_barang = $request->nama_barang;
            $data->harga = $request->harga;
            $data->keterangan = $request->keterangan;
            $data->updated_at = now();
            

        
       if ($request->hasFile('gambar')) {
           $file = $request->file('gambar');
           $filename = time() . '-' . $file->getClientOriginalName();
           $path = $file->move(public_path('upload/produk'), $filename);
           $data->gambar = $filename;
       }

        $data->save();
        return redirect()->route('produk')->with('success', 'Data berhasil diperbarui.');
    }



    function hapus_produk($id)
    {
        DB::table('barang')->where('id', $id)->delete();
        // Alert::success('Success', 'Jadwal Dokter berhasil dihapus!!');
        return redirect()->route('produk')->with('success', 'Data berhasil dihapus.');;
    }

}
