<?php

namespace App\Http\Controllers;

use App\Models\Mapel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MapelController extends Controller
{
    public function mapel(){
        $title = 'Master Mata Pelajaran';

        // tkj
        $tkjx = DB::table('matpel_m as mp')
                ->select('mp.id as mpid','mp.matapelajaran','mp.nilaikkm','mp.objectkelasfk','mp.objectjenismapelfk','mp.objectjurusanfk','jmm.id as jmmid','jmm.jenismatpel','km.id as kmid','km.kelas','jm.jurusan','jm.id as jmid')
                // ->select('mp.*','jmm.*','km.*','jm.*','mp.id as mpid')
                ->leftJoin('jenismapel_m as jmm', 'jmm.id', '=', 'mp.objectjenismapelfk')
                ->leftJoin('kelas_m as km', 'km.id', '=', 'mp.objectkelasfk')
                ->leftJoin('jurusan_m as jm', 'jm.id', '=', 'mp.objectjurusanfk')
                ->where('km.id', 1)
                ->where('jm.id', 1)
                ->get();
        // return $tkjx;

        // tkj
        $tkjxi = DB::table('matpel_m as mp')
                ->select('mp.id as mpid','mp.matapelajaran','mp.nilaikkm','mp.objectkelasfk','mp.objectjenismapelfk','mp.objectjurusanfk','jmm.id as jmmid','jmm.jenismatpel','km.id as kmid','km.kelas','jm.jurusan','jm.id as jmid')
                // ->select('mp.*','jmm.*','km.*','jm.*','mp.id as mpid')
                ->leftJoin('jenismapel_m as jmm', 'jmm.id', '=', 'mp.objectjenismapelfk')
                ->leftJoin('kelas_m as km', 'km.id', '=', 'mp.objectkelasfk')
                ->leftJoin('jurusan_m as jm', 'jm.id', '=', 'mp.objectjurusanfk')
                ->where('km.id', 2)
                ->where('jm.id', 1)
                ->get();
        // return $tkjxi;

        // tkj
        $tkjxii = DB::table('matpel_m as mp')
                ->select('mp.id as mpid','mp.matapelajaran','mp.nilaikkm','mp.objectkelasfk','mp.objectjenismapelfk','mp.objectjurusanfk','jmm.id as jmmid','jmm.jenismatpel','km.id as kmid','km.kelas','jm.jurusan','jm.id as jmid')
                // ->select('mp.*','jmm.*','km.*','jm.*','mp.id as mpid')
                ->leftJoin('jenismapel_m as jmm', 'jmm.id', '=', 'mp.objectjenismapelfk')
                ->leftJoin('kelas_m as km', 'km.id', '=', 'mp.objectkelasfk')
                ->leftJoin('jurusan_m as jm', 'jm.id', '=', 'mp.objectjurusanfk')
                ->where('km.id', 3)
                ->where('jm.id', 1)
                ->get();
        // return $tkjxii;

        // tkj
        $mpx = DB::table('matpel_m as mp')
                ->select('mp.id as mpid','mp.matapelajaran','mp.nilaikkm','mp.objectkelasfk','mp.objectjenismapelfk','mp.objectjurusanfk','jmm.id as jmmid','jmm.jenismatpel','km.id as kmid','km.kelas','jm.jurusan','jm.id as jmid')
                // ->select('mp.*','jmm.*','km.*','jm.*','mp.id as mpid')
                ->leftJoin('jenismapel_m as jmm', 'jmm.id', '=', 'mp.objectjenismapelfk')
                ->leftJoin('kelas_m as km', 'km.id', '=', 'mp.objectkelasfk')
                ->leftJoin('jurusan_m as jm', 'jm.id', '=', 'mp.objectjurusanfk')
                ->where('km.id', 1)
                ->where('jm.id', 2)
                ->get();
        // return $mpx;

        // tkj
        $mpxi = DB::table('matpel_m as mp')
                ->select('mp.id as mpid','mp.matapelajaran','mp.nilaikkm','mp.objectkelasfk','mp.objectjenismapelfk','mp.objectjurusanfk','jmm.id as jmmid','jmm.jenismatpel','km.id as kmid','km.kelas','jm.jurusan','jm.id as jmid')
                // ->select('mp.*','jmm.*','km.*','jm.*','mp.id as mpid')
                ->leftJoin('jenismapel_m as jmm', 'jmm.id', '=', 'mp.objectjenismapelfk')
                ->leftJoin('kelas_m as km', 'km.id', '=', 'mp.objectkelasfk')
                ->leftJoin('jurusan_m as jm', 'jm.id', '=', 'mp.objectjurusanfk')
                ->where('km.id', 2)
                ->where('jm.id', 2)
                ->get();
        // return $mpxi;

        // tkj
        $mpxii = DB::table('matpel_m as mp')
                ->select('mp.id as mpid','mp.matapelajaran','mp.nilaikkm','mp.objectkelasfk','mp.objectjenismapelfk','mp.objectjurusanfk','jmm.id as jmmid','jmm.jenismatpel','km.id as kmid','km.kelas','jm.jurusan','jm.id as jmid')
                // ->select('mp.*','jmm.*','km.*','jm.*','mp.id as mpid')
                ->leftJoin('jenismapel_m as jmm', 'jmm.id', '=', 'mp.objectjenismapelfk')
                ->leftJoin('kelas_m as km', 'km.id', '=', 'mp.objectkelasfk')
                ->leftJoin('jurusan_m as jm', 'jm.id', '=', 'mp.objectjurusanfk')
                ->where('km.id', 3)
                ->where('jm.id', 2)
                ->get();
        // return $mpxii;

        // tkj
        $ulp = DB::table('matpel_m as mp')
                ->select('mp.id as mpid','mp.matapelajaran','mp.nilaikkm','mp.objectkelasfk','mp.objectjenismapelfk','mp.objectjurusanfk','jmm.id as jmmid','jmm.jenismatpel','km.id as kmid','km.kelas','jm.jurusan','jm.id as jmid')
                // ->select('mp.*','jmm.*','km.*','jm.*','mp.id as mpid')
                ->leftJoin('jenismapel_m as jmm', 'jmm.id', '=', 'mp.objectjenismapelfk')
                ->leftJoin('kelas_m as km', 'km.id', '=', 'mp.objectkelasfk')
                ->leftJoin('jurusan_m as jm', 'jm.id', '=', 'mp.objectjurusanfk')
                ->where('km.id', 1)
                ->where('jm.id', 3)
                ->get();
        // return $ulp;

        // tkj
        $ulpi = DB::table('matpel_m as mp')
                ->select('mp.id as mpid','mp.matapelajaran','mp.nilaikkm','mp.objectkelasfk','mp.objectjenismapelfk','mp.objectjurusanfk','jmm.id as jmmid','jmm.jenismatpel','km.id as kmid','km.kelas','jm.jurusan','jm.id as jmid')
                // ->select('mp.*','jmm.*','km.*','jm.*','mp.id as mpid')
                ->leftJoin('jenismapel_m as jmm', 'jmm.id', '=', 'mp.objectjenismapelfk')
                ->leftJoin('kelas_m as km', 'km.id', '=', 'mp.objectkelasfk')
                ->leftJoin('jurusan_m as jm', 'jm.id', '=', 'mp.objectjurusanfk')
                ->where('km.id', 2)
                ->where('jm.id', 3)
                ->get();
        // return $ulpi;

        // tkj
        $ulpii = DB::table('matpel_m as mp')
                ->select('mp.id as mpid','mp.matapelajaran','mp.nilaikkm','mp.objectkelasfk','mp.objectjenismapelfk','mp.objectjurusanfk','jmm.id as jmmid','jmm.jenismatpel','km.id as kmid','km.kelas','jm.jurusan','jm.id as jmid')
                // ->select('mp.*','jmm.*','km.*','jm.*','mp.id as mpid')
                ->leftJoin('jenismapel_m as jmm', 'jmm.id', '=', 'mp.objectjenismapelfk')
                ->leftJoin('kelas_m as km', 'km.id', '=', 'mp.objectkelasfk')
                ->leftJoin('jurusan_m as jm', 'jm.id', '=', 'mp.objectjurusanfk')
                ->where('km.id', 3)
                ->where('jm.id', 3)
                ->get();
        // return $ulpii;

        // tkj
        $bp = DB::table('matpel_m as mp')
                ->select('mp.id as mpid','mp.matapelajaran','mp.nilaikkm','mp.objectkelasfk','mp.objectjenismapelfk','mp.objectjurusanfk','jmm.id as jmmid','jmm.jenismatpel','km.id as kmid','km.kelas','jm.jurusan','jm.id as jmid')
                // ->select('mp.*','jmm.*','km.*','jm.*','mp.id as mpid')
                ->leftJoin('jenismapel_m as jmm', 'jmm.id', '=', 'mp.objectjenismapelfk')
                ->leftJoin('kelas_m as km', 'km.id', '=', 'mp.objectkelasfk')
                ->leftJoin('jurusan_m as jm', 'jm.id', '=', 'mp.objectjurusanfk')
                ->where('km.id', 1)
                ->where('jm.id', 4)
                ->get();
        // return $bp;

        // tkj
        $bpi = DB::table('matpel_m as mp')
                ->select('mp.id as mpid','mp.matapelajaran','mp.nilaikkm','mp.objectkelasfk','mp.objectjenismapelfk','mp.objectjurusanfk','jmm.id as jmmid','jmm.jenismatpel','km.id as kmid','km.kelas','jm.jurusan','jm.id as jmid')
                // ->select('mp.*','jmm.*','km.*','jm.*','mp.id as mpid')
                ->leftJoin('jenismapel_m as jmm', 'jmm.id', '=', 'mp.objectjenismapelfk')
                ->leftJoin('kelas_m as km', 'km.id', '=', 'mp.objectkelasfk')
                ->leftJoin('jurusan_m as jm', 'jm.id', '=', 'mp.objectjurusanfk')
                ->where('km.id', 2)
                ->where('jm.id', 4)
                ->get();
        // return $bpi;

        // tkj
        $bpii = DB::table('matpel_m as mp')
                ->select('mp.id as mpid','mp.matapelajaran','mp.nilaikkm','mp.objectkelasfk','mp.objectjenismapelfk','mp.objectjurusanfk','jmm.id as jmmid','jmm.jenismatpel','km.id as kmid','km.kelas','jm.jurusan','jm.id as jmid')
                // ->select('mp.*','jmm.*','km.*','jm.*','mp.id as mpid')
                ->leftJoin('jenismapel_m as jmm', 'jmm.id', '=', 'mp.objectjenismapelfk')
                ->leftJoin('kelas_m as km', 'km.id', '=', 'mp.objectkelasfk')
                ->leftJoin('jurusan_m as jm', 'jm.id', '=', 'mp.objectjurusanfk')
                ->where('km.id', 3)
                ->where('jm.id', 4)
                ->get();
        // return $ulpii;

        $kelas = DB::table('kelas_m')->get();
        $jenismapel = DB::table('jenismapel_m')->get();
        $jurusan = DB::table('jurusan_m')->get();

        return view('master.matpel',compact('title','kelas','jenismapel','jurusan','tkjx','tkjxi','tkjxii','mpx','mpxi','mpxii','ulp','ulpi','ulpii','bp','bpi','bpii'));
    }

    public function mapel_aksi(Request $request)
    {
        // return $request->nilaikkm;

        $exists = DB::table('matpel_m')
        ->where('matapelajaran', $request->matapelajaran)
        ->where('objectkelasfk', $request->kelas)
        ->where('objectjenismapelfk', $request->jurusan)
        ->where('objectjurusanfk', $request->jurusanmapel)
        ->exists();

        if ($exists) {
            // Return with an error message if mata pelajaran already exists
            return redirect()->route('mapel')
                ->with('error', 'Mata Pelajaran sudah ada.');
        }

        $mapel = new Mapel([
            'matapelajaran' => $request->matapelajaran,
            'nilaikkm' => $request->nilaikkm,
            'objectkelasfk' => $request->kelas,
            'objectjenismapelfk' => $request->jurusan,
            'objectjurusanfk' => $request->jurusanmapel,
        ]);

        $mapel->save();

        return redirect()->route('mapel')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function hapusmapel($mpid){
        $mapel = Mapel::find($mpid);
        $mapel->delete();

        return redirect()->route('mapel')->with('success', 'Data Berhasil Dihapus');
    }

    public function updatemapel(Request $request, $mpid)
    {
        // return $mpid;
        $mapel = Mapel::find($mpid);
        $mapel->matapelajaran = $request->matapelajaran;
        $mapel->nilaikkm = $request->nilaikkm;
        $mapel->objectkelasfk = $request->objectkelasfk;
        $mapel->objectjenismapelfk = $request->objectjenismapelfk;
        $mapel->objectjurusanfk = $request->objectjurusanfk;
        $mapel->save();

        return redirect()->route('mapel')->with('success', 'Data Berhasil Diubah');
    }
}
