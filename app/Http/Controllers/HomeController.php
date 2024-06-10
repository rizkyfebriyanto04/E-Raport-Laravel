<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $title = 'E-Raport';

        $guru = DB::table('guru_m')->count();
        $siswa = DB::table('siswa_m')->count();
        $jurusan = DB::table('jurusan_m')->count();

        $jklakilaki = DB::table('siswa_m')->where('jk', 'Laki - Laki')->count();
        $jkperempuan = DB::table('siswa_m')->where('jk', 'Perempuan')->count();

        $dataJurusan = DB::table('siswa_m as sm')
            ->select(DB::raw('COUNT(sm.namalengkap) as jumlah_siswa'), 'jp.bidangjurusan', 'jp.kdjurusan')
            ->leftJoin('jurusan_m as jp', 'jp.id', '=', 'sm.objectjurusanfk')
            ->groupBy('jp.bidangjurusan', 'jp.kdjurusan')
            ->get();

        // return $dataJurusan;
        return view('home',compact('title','guru','siswa','jurusan','jklakilaki','jkperempuan','dataJurusan'));
        // $title = 'My App Pos';
        // $produk = DB::table('produk_m as pm')
        // ->leftJoin('kategori_m as km', 'km.id','=','pm.kategori_id')
        // ->select('km.*','pm.*','pm.id as pmid')
        // ->where('pm.statusenabled', 1)
        // ->where('km.statusenabled', 1)
        // ->count();

        // $kategori = DB::table('kategori_m as km')
        // ->select('km.*')
        // ->where('km.statusenabled', 1)
        // ->count();

        // $totalProduk = DB::table('produk_m as pm')
        // ->leftJoin('kategori_m as km', 'km.id','=','pm.kategori_id')
        // ->where('pm.statusenabled', 1)
        // ->where('km.statusenabled', 1)
        // ->count();

        // $sisastok = DB::table('produk_m as pm')
        //     ->leftJoin('kategori_m as km', 'km.id','=','pm.kategori_id')
        //     ->select(DB::raw('SUM(pm.stok) as total_stok'))
        //     ->where('pm.statusenabled', 1)
        //     ->where('km.statusenabled', 1)
        //     ->first()->total_stok;

        // $penjualan2 = DB::table('penjualan_t as pj')
        //     ->leftJoin('produk_m as pm', 'pm.id','=','pj.objectprodukfk')
        //     ->leftJoin('kategori_m as km', 'km.id','=','pm.kategori_id')
        //     ->select('km.*','pm.*','pm.id as pmid','pj.*')
        //     ->where('pj.statusenabled', 1)
        //     ->count();

        // $penjualan = DB::table('penjualan_t as pj')
        //     ->leftJoin('produk_m as pm', 'pm.id','=','pj.objectprodukfk')
        //     ->leftJoin('kategori_m as km', 'km.id','=','pm.kategori_id')
        //     ->select(DB::raw('MONTH(pj.tanggal_jual) as bulan'), DB::raw('COUNT(pj.id) as total_penjualan'))
        //     ->where('pj.statusenabled', 1)
        //     ->groupBy(DB::raw('MONTH(pj.tanggal_jual)'))
        //     ->get();
        //     // return $penjualan;

        // $dataPenjualan = [];
        // foreach ($penjualan as $penjualanPerBulan) {
        //     $dataPenjualan[] = $penjualanPerBulan->total_penjualan;
        // }
        // $optionsProfileVisit['series'][0]['data'] = $dataPenjualan;

        // return view('home',compact('title','produk','penjualan2','kategori','sisastok','dataPenjualan'));
    }
}
