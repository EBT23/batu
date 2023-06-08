<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class LaporanController extends Controller
{
   public function laporan()
   {
        $data['title'] = 'Laporan Penjualan';

        $laporan = DB::table('pemesanan')
            ->join('barang','barang.id','=','pemesanan.id_barang')
            ->select('pemesanan.*','barang.nama_barang')
            ->where('pemesanan.status_pemesanan','=','Selesai')
            ->get();
        
        return view('admin.laporan',compact('laporan'), $data);
   }
}
