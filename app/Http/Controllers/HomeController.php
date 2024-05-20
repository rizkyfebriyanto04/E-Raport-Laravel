<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $title = 'E-Raport';
        return view('home',compact('title'));
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
