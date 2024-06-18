<?php

namespace App\Http\Controllers;

use App\Models\Mapel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MapelController extends Controller
{
    public function mapel(){
        $title = 'Master Mata Pelajaran';

        $data = DB::table('matpel_m as mp')
                ->select('mp.*','jmm.*','km.*')
                ->leftJoin('jenismapel_m as jmm', 'jmm.id', '=', 'mp.objectjenismapelfk')
                ->leftJoin('kelas_m as km', 'km.id', '=', 'mp.objectkelasfk')
                ->get();

        $kelas = DB::table('kelas_m')->get();
        $jenismapel = DB::table('jenismapel_m')->get();

        return view('master.matpel',compact('title','data','kelas','jenismapel'));
    }

    public function mapel_aksi(Request $request)
    {
        $mapel = new Mapel([
            'namalengkap' => $request->namalengkap,
            'nilaikkm' => $request->nilaikkm,
            'objectkelasfk' => $request->kelas,
            'objectjenismapelfk' => $request->jurusan,
        ]);

        $mapel->save();

        return redirect()->route('matpel')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function hapussiswa($id){
        $mapel = Mapel::find($id);
        $mapel->delete();

        return redirect()->route('matpel')->with('success', 'Data Berhasil Dihapus');
    }

    public function updatesiswa(Request $request, $id)
    {
        $mapel = Mapel::find($id);
        $mapel->matapelajaran = $request->matapelajaran;
        $mapel->nilaikkm = $request->nilaikkm;
        $mapel->objeckkelasfk = $request->kelas;
        $mapel->objeckjenismapelfk = $request->jenismapel;

        return redirect()->route('matpel')->with('success', 'Data Berhasil Diubah');
    }
}
