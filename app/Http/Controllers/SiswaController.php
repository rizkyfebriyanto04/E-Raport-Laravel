<?php

namespace App\Http\Controllers;


use App\Models\Siswa;
use App\Models\Hasil;
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

        $nisn = $this->generateNisn();

        return view('master.siswa',compact('title','data','guru','kelas','jurusan','semester','nisn'));
    }

    private function generateNisn()
    {
        $currentYear = date('y');
        $codePrefix = '16.010';


        $lastNisn = DB::table('siswa_m')
            ->where('nisn', 'like', "$currentYear.$codePrefix.%")
            ->orderByRaw('CAST(SUBSTRING_INDEX(nisn, ".", -1) AS UNSIGNED) DESC')
            ->value('nisn');


        $lastNumber = 0;
        if ($lastNisn) {
            $parts = explode('.', $lastNisn);
            if (isset($parts[3])) {
                $lastNumber = intval($parts[3]);
            }
        }

        $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);

        $newNisn = $currentYear . '.' . $codePrefix . '.' . $newNumber;

        return $newNisn;
    }


    public function siswa_aksi(Request $request)
    {
        DB::beginTransaction();
        try {
            $nisn = $this->generateNisn();

            $siswa = new Siswa([
                'namalengkap' => $request->namalengkap,
                'nisn' => $nisn,
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

            \Log::info('Siswa baru disimpan dengan id : ' . $siswa->id . 'a/n' . $siswa->namalengkap);

            $matpel = DB::table('matpel_m')
                ->where('objectkelasfk', $siswa->objectkelasfk)
                ->where('objectjurusanfk', $siswa->objectjurusanfk)
                ->get();

            $paketmatpel = [];
            foreach ($matpel as $m) {
                $paketmatpel[] = [
                    'objectmatpelfk' => $m->id,
                    'objectsiswafk' => $siswa->id,
                    'objectsemesterfk' => $siswa->objectsemesterfk,
                    'nilai' => 0,
                    'ket' => '-',
                ];
            }

            Hasil::insert($paketmatpel);

            DB::table('kehadiran_t')
            ->insert([
                'objectsiswafk' => $siswa->id,
                'sakit' => '0',
                'izin' => '0',
                'tanpa_keterangan' => '0',
            ]);

            DB::commit();

            return redirect()->route('siswa')->with('success', 'Data Siswa Berhasil Ditambahkan');

        } catch (\Exception $e) {
            DB::rollback();
            \Log::error('Error menambahkan siswa: ' . $e->getMessage());

            return redirect()->route('siswa')->with('error', 'Terjadi kesalahan saat menambahkan siswa');
        }
    }

    public function hapussiswa($id){
        $siswa = Siswa::find($id);

        if ($siswa) {
            DB::table('kehadiran_t')->where('objectsiswafk', $siswa->id)->delete();

            DB::table('hasilraport_t')->where('objectsiswafk', $siswa->id)->delete();

            $siswa->delete();

            return redirect()->route('siswa')->with('success', 'Data Berhasil Dihapus');
        }

        return redirect()->route('siswa')->with('success', 'Data Berhasil Dihapus');
    }

    public function updatesiswa(Request $request, $id)
    {
        // return $request;

        $siswa = Siswa::find($id);
        $siswa->namalengkap = $request->namalengkap;
        $siswa->nisn = $request->nisn;
        $siswa->ttl = $request->ttl;
        $siswa->jk = $request->jk;
        $siswa->objectkelasfk = $request->kelas;
        $siswa->objectjurusanfk = $request->jurusan;
        $siswa->objectsemesterfk = $request->semester;
        $siswa->objectgurufk = $request->walikelas;
        // $siswa->agama = $request->agama;
        $siswa->alamat = $request->alamat;
        $siswa->nohp = $request->nohp;
        $siswa->save();

        return redirect()->route('siswa')->with('success', 'Data Berhasil Diubah');
    }

}
