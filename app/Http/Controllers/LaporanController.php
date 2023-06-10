<?php

namespace App\Http\Controllers;

use App\Exports\LaporanExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
   public function laporan()
   {
        $data['title'] = 'Laporan Penjualan';

        $laporan = DB::table('pemesanan')
            ->join('barang','barang.id','=','pemesanan.id_barang')
            ->join('users','users.id','=','pemesanan.id_user')
            ->select('pemesanan.*','barang.nama_barang','barang.harga','users.name')
            ->where('pemesanan.status_pemesanan','=','Selesai')
            ->get();
        
        return view('admin.laporan',compact('laporan'), $data);
   }

   public function downloadExcel()
   {
       // Query data dari database
       $laporan = DB::table('pemesanan')
       ->join('barang','barang.id','=','pemesanan.id_barang')
       ->join('users','users.id','=','pemesanan.id_user')
       ->select('barang.nama_barang','pemesanan.jumlah_berat','barang.harga','users.name','pemesanan.status_pemesanan',
        'pemesanan.created_at','pemesanan.total_harga')
       ->where('pemesanan.status_pemesanan','=','Selesai')
       ->get();

       // Export data ke file Excel
       return Excel::download(new LaporanExport($laporan), 'laporan_data_penjualan.xlsx');
   }
}
