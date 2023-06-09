<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Barang;
use App\Models\Pemesanan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

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
        ->where('id', '=', $id)
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
        $id_barang = $request->input('id_barang');
        $id_user = Auth::id();
    
        if (!$barang) {
           
        }
    
        $harga = $barang->harga;
        $totalHarga = $berat * $harga;
    
       
        $pemesanan = new Pemesanan();
        $pemesanan->id_barang = $id_barang;
        $pemesanan->id_user = $id_user;
        $pemesanan->jumlah_berat = $berat;
        // $pemesanan->barang_in = Carbon::now()->format('H:i');
        $pemesanan->barang_in = null;
        $pemesanan->barang_out = null;
        $pemesanan->status_pemesanan = 'Pending';
        $pemesanan->total_harga = $totalHarga;
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
