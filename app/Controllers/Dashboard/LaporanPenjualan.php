<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;

class LaporanPenjualan extends BaseController
{
    protected $transaksiModel;

    public function __construct()
    {
        helper('tgl');
        $this->transaksiModel = new TransaksiModel();
    }
    
    public function index()
    { 
        $tglLaporan = $this->request->getGet('tglLaporan');
        $dataLaporanByTanggal = [];
    
        $transaksiSelesai = $this->transaksiModel->where('status', 'Selesai')->findAll();
    
        foreach ($transaksiSelesai as $transaksi) {
            $updated_at = substr($transaksi['updated_at'], 0, 7); // Ambil tahun dan bulan
    
            if ($tglLaporan && $updated_at == $tglLaporan) {
                $dataLaporanByTanggal[] = $transaksi;
            } elseif (!$tglLaporan && $updated_at == date('Y-m')) {
                $dataLaporanByTanggal[] = $transaksi;
            }
        }
    
        $header = $tglLaporan ? tgl_bulanTahun($tglLaporan) : tgl_bulanTahun(date('Y-m'));
    
        $data = [
            'laporan_penjualan' => $dataLaporanByTanggal,
            'header' => $header
        ];
        $data['title'] = "Laporan Penjualan - ".$header;
        
        return view('dashboard/laporan-penjualan/index', $data);
    }
    
}
