<?php

namespace App\Http\Controllers;

use App\Exports\LaporanExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PenjualanExport;

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

   public function downloadExcel()
   {
       // Query data dari database
       $laporan = DB::table('pemesanan')
       ->join('barang','barang.id','=','pemesanan.id_barang')
       ->select('pemesanan.*','barang.nama_barang')
       ->where('pemesanan.status_pemesanan','=','Selesai')
       ->get();

       // Export data ke file Excel
       return Excel::download(new LaporanExport($laporan), 'laporan_data_penjualan.xlsx');
   }
}
