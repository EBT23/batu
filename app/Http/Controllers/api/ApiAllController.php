<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Barang;
use App\Models\Pemesanan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ApiAllController extends Controller
{
    public function barang()
    {
        $barang = DB::table('barang')->get();

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil ditampilkan',
            'data' => $barang
        ]);
    }
    public function add_barang(Request $request)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required',
            'harga' => 'required',
            'keterangan' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarName = time() . '_' . $gambar->getClientOriginalName();
            $path = $gambar->move(public_path('upload/produk'), $gambarName);
            $gambar->gambar = $gambarName;
        } else {
            $gambarName = null;
        }

        $barang = Barang::create([
            'nama_barang' => $validatedData['nama_barang'],
            'harga' => $validatedData['harga'],
            'keterangan' => $validatedData['keterangan'],
            'gambar' => $gambarName,
        ]);

    
        return response()->json([
            'message' => 'Data pengeluaran berhasil ditambahkan.',
            'data' => $barang,
        ], 201);
    }

    public function update_barang(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required',
            'harga' => 'required',
            'keterangan' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
    
        $barang->nama_barang = $request->nama_barang;
        $barang->harga = $request->harga;
        $barang->keterangan = $request->keterangan;
    
        $gambarPath = public_path('upload/produk/' . $barang->gambar);

        if ($request->hasFile('gambar')) {
          // hapus gambar
            if (file_exists($gambarPath)) {
                unlink($gambarPath);
            }
    
            // upload gambar baru
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->move(public_path('upload/produk'), $filename);
            $barang->gambar = $path;
        }
    
        $barang->save();
    
        return response()->json([
            'message' => 'Data pengeluaran berhasil diupdate'
        ]);
    }

    public function delete_barang($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return response()->json([
            'success' => true,
            'message' => 'Pengeluaran berhasil dihapus',
            'data' => $barang
        ]);
    }

    public function get_barang_by_id($id)
    {
        $barang = DB::table('barang')
        ->where('id', '=', $id)
        ->get();

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil ditampilkan',
            'data' => $barang
        ]);
    }

    public function pemesanan()
    {
        $pemesanan = DB::table('pemesanan')
            ->join('barang','barang.id','=','pemesanan.id_barang')
            ->select('pemesanan.*','barang.nama_barang','barang.harga','barang.keterangan','barang.gambar')
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil ditampilkan',
            'data' => $pemesanan
        ]);
    }

    public function get_pemesanan_by_id($id)
    {
        $pemesanan = DB::table('pemesanan')
        ->where('id_user', '=', $id)
        ->get();


        return response()->json([
            'success' => true,
            'message' => 'Data berhasil ditampilkan',
            'data' => $pemesanan
        ]);
    }

    public function add_pemesanan(Request $request)
    {
        $validatedData = $request->validate([
            'id_barang' => 'required',
            'jumlah_berat' => 'required',
        ]);

        $barang = Barang::find($request->input('id_barang'));
        $berat = $request->input('jumlah_berat');
        $ $id_barang = $request->input('id_barang');

    
        if (!$barang) {
           
        }
    
        $harga = $barang->harga;
        $totalHarga = $berat * $harga;
    
       
        $pemesanan = new Pemesanan();
        $pemesanan->id_barang = $id_barang;
        $pemesanan->id_user = $request->id_user;
        $pemesanan->jumlah_berat = $berat;
        // $pemesanan->barang_in = Carbon::now()->format('H:i');
        $pemesanan->barang_in = now();
        $pemesanan->barang_out = null;
        $pemesanan->status_pemesanan = 'Pending';
        $pemesanan->total_harga = $totalHarga;
        $pemesanan->order_id = $request->order_id;
        $pemesanan->redirect_url = $request->redirect_url;

        $pemesanan->created_at = now();
      

        $pemesanan->save();

        return response()->json([
            'success' => true,
            'message' => 'pemesanan berhasil ditambahkan.',
            'data' => $pemesanan
        ]);

    }

    public function update_pemesanan(Request $request, $id)
    {

        $pemesanan = Pemesanan::findOrFail($id);

        $pemesanan->update($request->all());

        $pemesanan->save();

        return response()->json([
            'success' => true,
            'message' => 'pemesanan berhasil diperbarui.',
            'data' => $pemesanan
        ]);
    }

    public function delete_pemesanan($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);

        $pemesanan->delete();
        return response()->json([
            'success' => true,
            'message' => 'pemesanan berhasil dihapus',
            'data' => $pemesanan
        ]);
    }

}
