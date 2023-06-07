<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
   public function laporan()
   {
        $data['title'] = 'Laporan Penjualan';

        
        return view('admin.laporan', $data);
   }
}
