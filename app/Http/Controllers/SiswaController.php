<?php

namespace App\Http\Controllers;


use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    public function siswa(){
        $title = 'Master Siswa';

        $data = DB::table('siswa_m as sm')
                ->select('sm.namalengkap','sm.nisn','sm.ttl','sm.jk','sm.agama','sm.alamat','sm.nohp','km.kelas','sms.semester','gm.namalengkap as namaguru','sm.id','jm.jurusan','sm.*')
                ->leftJoin('kelas_m as km', 'km.id', '=', 'sm.objectkelasfk')
                ->leftJoin('jurusan_m as jm', 'jm.id', '=', 'sm.objectjurusanfk')
                ->leftJoin('semester_m as sms', 'sms.id', '=', 'sm.objectsemesterfk')
                ->leftJoin('guru_m as gm', 'gm.id', '=', 'sm.objectgurufk')
                ->get();
        // return $data;

        $guru = DB::table('guru_m')->get();
        $kelas = DB::table('kelas_m')->get();
        $jurusan = DB::table('jurusan_m')->get();
        $semester = DB::table('semester_m')->get();

        return view('master.siswa',compact('title','data','guru','kelas','jurusan','semester'));
    }

    public function siswa_aksi(Request $request)
    {
        $siswa = new Siswa([
            'namalengkap' => $request->namalengkap,
            'nisn' => $request->nisn,
            'objectkelasfk' => $request->kelas,
            'objectjurusanfk' => $request->jurusan,
            'objectsemesterfk' => $request->semester,
            'objectgurufk' => $request->walikelas,
            'ttl' => $request->tgl,
            'jk' => $request->jeniskelamin,
            'alamat' => $request->alamat,
            'nohp' => $request->nohp,
            'agama' => 'Islam',
        ]);

        $siswa->save();

        return redirect()->route('siswa')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function hapussiswa($id){
        $siswa = Siswa::find($id);
        $siswa->delete();

        return redirect()->route('siswa')->with('success', 'Data Berhasil Dihapus');
    }

    public function updatesiswa(Request $request, $id)
    {
        $request->validate([
            'namalengkap' => 'required',
            'nisn' => 'required',
            'ttl' => 'required',
            'jk' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'semester' => 'required',
            'walikelas' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
        ]);

        $siswa = Siswa::find($id);
        $siswa->namalengkap = $request->namalengkap;
        $siswa->nisn = $request->nisn;
        $siswa->ttl = $request->ttl;
        $siswa->jk = $request->jk;
        $siswa->kelas = $request->kelas;
        $siswa->jurusan = $request->jurusan;
        $siswa->semester = $request->semester;
        $siswa->walikelas = $request->walikelas;
        $siswa->agama = $request->agama;
        $siswa->alamat = $request->alamat;
        $siswa->nohp = $request->nohp;
        $siswa->save();

        return redirect()->route('siswa')->with('success', 'Data Berhasil Diubah');
    }

}
