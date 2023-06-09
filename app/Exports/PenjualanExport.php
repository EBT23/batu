<?php

namespace App\Exports;



use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PenjualanExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Mengambil data dari database
        return DB::table('penjualan')
        ->join('distributor', 'distributor.id', '=' , 'penjualan.distributor_id')
        ->join('count_manager', 'count_manager.id', '=', 'distributor.count_manager_id')
        ->join('users','users.id','=','distributor.users_id')
        ->select('count_manager.nama_cm','distributor.kode_distributor', 'users.full_name', 'distributor.area',
          'penjualan.nilai1', 'penjualan.nilai2', 'penjualan.nilai3', 'penjualan.nilai4', 'penjualan.nilai5', 'penjualan.nilai6',
          'penjualan.nilai7', 'penjualan.nilai8', 'penjualan.nilai9', 'penjualan.nilai10', 'penjualan.nilai11', 'penjualan.nilai12',
          'penjualan.total','penjualan.retur',)
        ->get();
    }

    public function headings(): array
    {
        return [
            ['COUNT MANAGER', 'KODE DISTRIBUTOR', 'DISTRIBUTOR', 'AREA','TOTAL PEMBELIAN','','','','','','','','','','','','TOTAL','%','RETUR'],
            [
            '',
            '',
            '',
            '',
            'JANUARI',
            'FEBRUARI',
            'MARET',
            'APRIL',
            'MEI',
            'JUNI',
            'JULI',
            'AGUSTUS',
            'SEPTEMBER',
            'OKTOBER',
            'NOVEMBER',
            'DESEMBER',
            '',
            '',
            '',
            ]
        ];

    }

    public function styles(Worksheet $sheet)
    {
        // Mengatur gaya sel heading yang digabungkan
        $sheet->mergeCells('E1:P1'); 
        $sheet->mergeCells('A1:A2'); 
        $sheet->mergeCells('B1:B2'); 
        $sheet->mergeCells('C1:C2'); 
        $sheet->mergeCells('D1:D2'); 
        $sheet->mergeCells('Q1:Q2'); 
        $sheet->mergeCells('R1:R2'); 
        $sheet->mergeCells('S1:S2'); 
        $sheet->getStyle('A1:S1')->getFont()->setBold(true);
        $sheet->getStyle('A1:S1')->getAlignment()->setHorizontal('center');
    }
}
