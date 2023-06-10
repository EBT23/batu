<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\DB;
class PemesananController extends Controller
{
    public function pemesanan()
    {
        $pemesanan = DB::table('pemesanan')
            ->join('barang','barang.id','=','pemesanan.id_barang')
            ->join('users','users.id','=','pemesanan.id_user')
            ->select('pemesanan.*','barang.nama_barang','barang.harga','users.name')
            ->get();


        return view('admin.pemesanan',compact('pemesanan'));
    }

    public function update_pemesanan(Request $request, $id)
    {
        
         $pemesanan = Pemesanan::find($id);

            if (!$pemesanan) {
                return response()->json([
                    'message' => 'Data not found'
                ], 404);
            }
    
            // Update barang_in barang_out & status
                $pemesanan->barang_in = $request->barang_in;
                $pemesanan->barang_out = $request->barang_out;
                $pemesanan->status_pemesanan = $request->status_pemesanan;
    
                $pemesanan->save();

            return redirect()
                ->route('pemesanan')
                ->with('success', 'Pemesanan berhasil diperbarui.');
    }

}
