<?php

namespace App\Http\Controllers;

use App\Models\Penilaian;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Providers\AppServiceProvider;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class PenilaianController extends Controller
{
    public function index(){
        $title = 'E-Raport';
        $siswa = DB::table('siswa_m')
                ->get();

        return view('penilaian/kehadiran',compact('title','siswa'));
    }

    public function kehadiran_aksi(Request $request){
        $title = 'E-Raport';

        $kehadiran = DB::table('kehadiran_t')
                ->where('objectsiswafk',$request->siswaId)
                ->get();
        $data = $kehadiran->map(function($item) {
            return [
                'sakit' => $item->sakit,
                'izin' => $item->izin,
                'tanpaKeterangan' => $item->tanpa_keterangan,
            ];
        });

        return response()->json($data);

    }

    public function updateKehadiran(Request $request) {
        $siswaId = $request->input('siswaId');
        $sakit = $request->input('sakit');
        $izin = $request->input('izin');
        $tanpaKeterangan = $request->input('tanpaKeterangan');

        $attendance = DB::table('kehadiran_t')
            ->where('objectsiswafk', $siswaId)
            ->first();

        if ($attendance) {
            // Update existing record
            DB::table('kehadiran_t')
                ->where('objectsiswafk', $siswaId)
                ->update([
                    'sakit' => $sakit,
                    'izin' => $izin,
                    'tanpa_keterangan' => $tanpaKeterangan,
                ]);
        } else {
            // Insert new record
            DB::table('kehadiran_t')
                ->insert([
                    'objectsiswafk' => $siswaId,
                    'sakit' => $sakit,
                    'izin' => $izin,
                    'tanpa_keterangan' => $tanpaKeterangan,
                ]);
        }

        return response()->json(['message' => 'Data saved successfully']);

    }


    public function penilaian_nilai(){
        $title = 'E-Raport';
        $siswa = DB::table('siswa_m as sm')
                ->select('sm.*','km.*','jm.*','sm.id as smid')
                ->leftJoin('kelas_m as km','km.id','=','sm.objectkelasfk')
                ->leftJoin('jurusan_m as jm','jm.id','=','sm.objectjurusanfk')
                // ->where('km.id,')
                ->get();
        // return $siswa;
        return view('penilaian/nilai',compact('title','siswa'));
    }

    public function penilaian_aksi($id){
        $title = 'E-Raport';

        $nilai = DB::table('hasilraport_t as hr')
                ->select('hr.*','mp.*','hr.id as hrid')
                ->leftJoin('matpel_m as mp','mp.id','=','hr.objectmatpelfk')
                ->where('hr.objectsiswafk', $id)
                ->get();
        // return $nilai;
        return view('penilaian/daftarnilai',compact('title','nilai'));
    }

    public function penilaian_update(Request $request){
        $title = 'E-Raport';
        foreach ($request->hrid as $index => $hrid) {
            // Find the Penilaian model by hrid
            $penilaian = Penilaian::find($hrid);

            if ($penilaian) {
                // Update the nilai and ket fields
                $penilaian->nilai = $request->nilai[$index];
                $penilaian->ket = $request->ket[$index];
                $penilaian->save();
            } else {
                // Log if the penilaian object was not found
                \Log::warning('Penilaian not found for hrid: ' . $hrid);
            }
        }


        return redirect()->route('nilai')->with('success', 'Data Berhasil Diubah');
    }

    public function digitalraport(Request $request){
        $title = 'E-Raport';
        // dd(Auth::user()->name);

        if(Auth::user()->role == 'siswa'){
            $siswa = DB::table('siswa_m as sm')
            ->select('sm.*','km.*','jm.*','sm.id as smid')
            ->leftJoin('kelas_m as km','km.id','=','sm.objectkelasfk')
            ->leftJoin('jurusan_m as jm','jm.id','=','sm.objectjurusanfk')
            ->where('sm.id', Auth::user()->objectsiswafk )
            ->get();
        }else{
            $siswa = DB::table('siswa_m as sm')
            ->select('sm.*','km.*','jm.*','sm.id as smid')
            ->leftJoin('kelas_m as km','km.id','=','sm.objectkelasfk')
            ->leftJoin('jurusan_m as jm','jm.id','=','sm.objectjurusanfk')
            // ->where('km.id,')
            ->get();
        }
        return view('penilaian.raport',compact('title','siswa'));
    }

    public function penyebut($nilai) {
        $nilai = abs($nilai);
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " ". $huruf[$nilai];
        } else if ($nilai <20) {
            $temp = $this->penyebut($nilai - 10). " belas";
        } else if ($nilai < 100) {
            $temp = $this->penyebut($nilai/10)." puluh". $this->penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " seratus" . $this->penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = $this->penyebut($nilai/100) . " ratus" . $this->penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " seribu" . $this->penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = $this->penyebut($nilai/1000) . " ribu" . $this->penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = $this->penyebut($nilai/1000000) . " juta" . $this->penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = $this->penyebut($nilai/1000000000) . " milyar" . $this->penyebut(fmod($nilai,1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = $this->penyebut($nilai/1000000000000) . " trilyun" . $this->penyebut(fmod($nilai,1000000000000));
        }
        return $temp;
    }

    public function terbilang($nilai) {
        if($nilai<0) {
            $hasil = "minus ". trim($this->penyebut($nilai));
        } else {
            $hasil = trim($this->penyebut($nilai));
        }
        return $hasil;
    }


    public function hasilpdf($id){

        // ini_set('memory_limit','2048M');
        // ini_set('max_execution_time',100000);

        $title = 'E-Raport';
        // return $id;

        $nilai = DB::table('hasilraport_t as hr')
                ->select('hr.*','mp.*','hr.id as hrid','sm.*','sm.namalengkap','km.*','sms.*','jm.*','jmt.jenismatpel')
                ->leftJoin('matpel_m as mp','mp.id','=','hr.objectmatpelfk')
                ->leftJoin('siswa_m as sm','sm.id','=','hr.objectsiswafk')
                ->leftJoin('kelas_m as km','km.id','=','sm.objectkelasfk')
                ->leftJoin('semester_m as sms','sms.id','=','sm.objectsemesterfk')
                ->leftJoin('jurusan_m as jm','jm.id','=','sm.objectjurusanfk')
                ->leftJoin('jenismapel_m as jmt','jmt.id','=','mp.objectjenismapelfk')
                ->where('sm.id', $id)
                ->get();
                // ->groupBy('jmt.jenismatpel');
        // return $nilai;
        foreach ($nilai as $n) {
            $n->nilai_terbilang = $this->terbilang($n->nilai);
        }

        $kehadiran = DB::table('kehadiran_t as kt')
                ->where('objectsiswafk', $id)
                ->get();

        $terbilang = function($nilai) {
            return $this->terbilang($nilai);
        };

        // $pdf = PDF::loadView('penilaian.cetakan', ['title' => $title, 'nilai' => $nilai]);
        // return $pdf->stream('Raport.pdf');
        return view('penilaian.cetakan',compact('title','nilai','kehadiran','terbilang'));
    }

    public function menampilkannilai($id){
        // return $id;
        $title = 'E-Raport';
        // return $id;

        $nilai = DB::table('hasilraport_t as hr')
                ->select('hr.*','mp.*','hr.id as hrid','sm.*','sm.namalengkap','km.*','sms.*','jm.*','jmt.jenismatpel')
                ->leftJoin('matpel_m as mp','mp.id','=','hr.objectmatpelfk')
                ->leftJoin('siswa_m as sm','sm.id','=','hr.objectsiswafk')
                ->leftJoin('kelas_m as km','km.id','=','sm.objectkelasfk')
                ->leftJoin('semester_m as sms','sms.id','=','sm.objectsemesterfk')
                ->leftJoin('jurusan_m as jm','jm.id','=','sm.objectjurusanfk')
                ->leftJoin('jenismapel_m as jmt','jmt.id','=','mp.objectjenismapelfk')
                ->where('sm.id', $id)
                ->get();
        // return $nilai;

        return response()->json($nilai);
    }

    public function penilaianimportexcel_aksi($id){
        $title = 'E-Raport';
        // return $id;

        $nilai = DB::table('hasilraport_t as hr')
                ->select('mp.id as matpelid', 'mp.matapelajaran', 'sm.id as siswaid', 'sm.namalengkap','hr.nilai','hr.ket','sms.id as semesid', 'sms.semester','sms.tahunajaran')
                ->leftJoin('matpel_m as mp','mp.id','=','hr.objectmatpelfk')
                ->leftJoin('siswa_m as sm','sm.id','=','hr.objectsiswafk')
                ->leftJoin('kelas_m as km','km.id','=','sm.objectkelasfk')
                ->leftJoin('semester_m as sms','sms.id','=','sm.objectsemesterfk')
                ->leftJoin('jurusan_m as jm','jm.id','=','sm.objectjurusanfk')
                ->leftJoin('jenismapel_m as jmt','jmt.id','=','mp.objectjenismapelfk')
                ->where('sm.id', $id)
                ->orderby('mp.objectjenismapelfk', 'asc')
                ->get();
        // return $nilai[0]->siswaid;
        $siswaId = $nilai->isNotEmpty() ? $nilai->first()->siswaid : null;
        // return $siswaId;
        $siswa = DB::table('siswa_m as sm')
                ->leftJoin('kelas_m as km','km.id','=','sm.objectkelasfk')
                ->leftJoin('jurusan_m as jm','jm.id','=','sm.objectjurusanfk')
                ->where('sm.id', $id)
                ->first();

        return view('penilaian.datasiswanilai',compact('nilai','title','siswa','siswaId'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls'
        ]);

        $file = $request->file('file');
        $spreadsheet = IOFactory::load($file->getRealPath());
        $sheet = $spreadsheet->getActiveSheet();
        $data = $sheet->toArray();

        // Assuming the first row is the header
        $header = array_shift($data);

        foreach ($data as $index => $row) {
            try {
                // return $row;
                // Extracting values from the row
                $matapelajaran = $row[0]; // Adjust index as needed
                $namalengkap = $row[1]; // Adjust index as needed
                $nilai = $row[2]; // Adjust index as needed
                $ket = $row[3]; // Adjust index as needed
                $semester = $row[4]; // Adjust index as needed
                $tahunajaran = $row[5]; // Adjust index as needed

                // Get the IDs for matapelajaran, namalengkap, and semester
                $matapelajaranId = DB::table('matpel_m')
                    ->where('matapelajaran', $matapelajaran)
                    ->value('id');
                $siswaId = DB::table('siswa_m')
                    ->where('namalengkap', $namalengkap)
                    ->value('id');
                $semesterId = DB::table('semester_m')
                    ->where('semester', $semester)
                    ->where('tahunajaran', $tahunajaran)
                    ->value('id');
                // return $semesterId;

                if ($matapelajaranId && $siswaId && $semesterId) {
                    // Check if the record exists
                    $existingRecord = DB::table('hasilraport_t')
                        ->where('objectmatpelfk', $matapelajaranId)
                        ->where('objectsiswafk', $siswaId)
                        ->where('objectsemesterfk', $semesterId)
                        ->first();

                    if ($existingRecord) {
                        // Update the existing record
                        DB::table('hasilraport_t')
                            ->where('id', $existingRecord->id)
                            ->update([
                                'nilai' => $nilai,
                                'ket' => $ket,
                            ]);
                    } else {
                        // Log that the record was not found
                        Log::warning("No existing record found for update", [
                            'matapelajaran' => $matapelajaran,
                            'namalengkap' => $namalengkap,
                            'semester' => $semester,
                            'tahunajaran' => $tahunajaran
                        ]);
                    }
                }
            } catch (\Exception $e) {
                // Log exception details
                Log::error("Failed to process row $index", [
                    'row_data' => $row,
                    'error_message' => $e->getMessage()
                ]);
            }
        }

        return redirect()->back()->with('success', 'Data imported successfully!');
    }


    public function exportPenilaian($id)
    {
        $nilai = DB::table('hasilraport_t as hr')
                    ->select('mp.matapelajaran', 'sm.namalengkap', 'hr.nilai', 'hr.ket', 'sms.semester','sms.tahunajaran')
                    ->leftJoin('matpel_m as mp', 'mp.id', '=', 'hr.objectmatpelfk')
                    ->leftJoin('siswa_m as sm', 'sm.id', '=', 'hr.objectsiswafk')
                    ->leftJoin('semester_m as sms', 'sms.id', '=', 'hr.objectsemesterfk')
                    ->where('sm.id', $id)
                    ->orderby('mp.objectjenismapelfk', 'asc')
                    ->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set header
        $sheet->setCellValue('A1', 'Mata Pelajaran');
        $sheet->setCellValue('B1', 'Nama Siswa');
        $sheet->setCellValue('C1', 'Nilai');
        $sheet->setCellValue('D1', 'Keterangan');
        $sheet->setCellValue('E1', 'Semester');
        $sheet->setCellValue('F1', 'Tahun Ajaran');

        // Populate data
        $row = 2;
        foreach ($nilai as $d) {
            $sheet->setCellValue('A' . $row, $d->matapelajaran);
            $sheet->setCellValue('B' . $row, $d->namalengkap);
            $sheet->setCellValue('C' . $row, $d->nilai);
            $sheet->setCellValue('D' . $row, $d->ket);
            $sheet->setCellValue('E' . $row, $d->semester);
            $sheet->setCellValue('F' . $row, $d->tahunajaran);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'nilairaport.xlsx';

        return response()->stream(
            function () use ($writer) {
                $writer->save('php://output');
            },
            200,
            [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            ]
        );
    }
}
