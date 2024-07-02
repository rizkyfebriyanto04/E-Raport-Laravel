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
                ->select('mp.*','jmm.*','km.*','jm.*')
                ->leftJoin('jenismapel_m as jmm', 'jmm.id', '=', 'mp.objectjenismapelfk')
                ->leftJoin('kelas_m as km', 'km.id', '=', 'mp.objectkelasfk')
                ->leftJoin('jurusan_m as jm', 'jm.id', '=', 'mp.objectjurusanfk')
                ->where('km.id', 1)
                ->where('jm.id', 1)
                ->get();


        $kelas = DB::table('kelas_m')->get();
        $jenismapel = DB::table('jenismapel_m')->get();
        $jurusan = DB::table('jurusan_m')->get();

        return view('master.matpel',compact('title','kelas','jenismapel','jurusan','tkjx'));
    }

    public function mapel_aksi(Request $request)
    {
        $mapel = new Mapel([
            'namalengkap' => $request->namalengkap,
            'nilaikkm' => $request->nilaikkm,
            'objectkelasfk' => $request->kelas,
            'objectjenismapelfk' => $request->jurusan,
            'objectjurusanfk' => $request->jurusanmapel,
        ]);

        $mapel->save();

        return redirect()->route('matpel')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function hapusmapel($id){
        $mapel = Mapel::find($id);
        $mapel->delete();

        return redirect()->route('matpel')->with('success', 'Data Berhasil Dihapus');
    }

    public function updatemapel(Request $request, $id)
    {
        $mapel = Mapel::find($id);
        $mapel->matapelajaran = $request->matapelajaran;
        $mapel->nilaikkm = $request->nilaikkm;
        $mapel->objeckkelasfk = $request->kelas;
        $mapel->objeckjenismapelfk = $request->jenismapel;
        $mapel->objectjurusanfk = $request->jurusanmapel;

        return redirect()->route('matpel')->with('success', 'Data Berhasil Diubah');
    }
}
