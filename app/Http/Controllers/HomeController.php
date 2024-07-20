<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index(){
        if (Auth::user()->role == 'admin') {

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

        }else if (Auth::user()->role == 'siswa') {
            $title = 'E-Raport';

            $guru = DB::table('guru_m')->count();
            $siswa = DB::table('siswa_m')->where('id', Auth::user()->objectsiswafk)->get();
            $jurusan = DB::table('jurusan_m')->count();

            $jklakilaki = DB::table('siswa_m')->where('jk', 'Laki - Laki')->count();
            $jkperempuan = DB::table('siswa_m')->where('jk', 'Perempuan')->count();

            $dataJurusan = DB::table('siswa_m as sm')
                ->select(DB::raw('COUNT(sm.namalengkap) as jumlah_siswa'), 'jp.bidangjurusan', 'jp.kdjurusan')
                ->leftJoin('jurusan_m as jp', 'jp.id', '=', 'sm.objectjurusanfk')
                ->groupBy('jp.bidangjurusan', 'jp.kdjurusan')
                ->get();

            $grades = DB::table('siswa_m as sm')
                ->leftJoin('hasilraport_t as hr', 'hr.objectsiswafk', '=', 'sm.id')
                ->leftJoin('matpel_m as mp', 'mp.id', '=', 'hr.objectmatpelfk')
                ->leftJoin('semester_m as sms', 'sms.id', '=', 'hr.objectsemesterfk')
                ->leftJoin('kelas_m as km','km.id', '=', 'sm.objectkelasfk')
                ->where('sm.id', Auth::user()->objectsiswafk)
                ->select('mp.matapelajaran', 'hr.nilai', 'sms.semester', 'sms.tahunajaran')
                ->get();

            // Process the data to calculate averages
            $semesterData = [];

            foreach ($grades as $grade) {
                $yearSemester = $grade->tahunajaran . ' - Semester ' . ($grade->semester == 1 ? 'Ganjil' : 'Genap');
                $semesterData[$yearSemester][] = $grade->nilai;
            }

            $averageGrades = [];

            foreach ($semesterData as $yearSemester => $grades) {
                $averageGrades[$yearSemester] = array_sum($grades) / count($grades);
            }


            $grades = DB::table('siswa_m as sm')
                ->leftJoin('hasilraport_t as hr', 'hr.objectsiswafk', '=', 'sm.id')
                ->leftJoin('matpel_m as mp', 'mp.id', '=', 'hr.objectmatpelfk')
                ->leftJoin('semester_m as sms', 'sms.id', '=', 'hr.objectsemesterfk')
                ->where('sm.id', Auth::user()->objectsiswafk)
                ->select('mp.matapelajaran', 'hr.nilai')
                ->get();

            // Calculate the total or average score for each subject
            $subjectScores = [];
            $subjectCounts = [];

            foreach ($grades as $grade) {
                if (isset($subjectScores[$grade->matapelajaran])) {
                    $subjectScores[$grade->matapelajaran] += $grade->nilai;
                    $subjectCounts[$grade->matapelajaran]++;
                } else {
                    $subjectScores[$grade->matapelajaran] = $grade->nilai;
                    $subjectCounts[$grade->matapelajaran] = 1;
                }
            }

            foreach ($subjectScores as $subject => $totalScore) {
                $subjectScores[$subject] = $totalScore / $subjectCounts[$subject]; // Calculate average
            }
            return view('siswahome',compact('title','guru','siswa','jurusan','jklakilaki','jkperempuan','dataJurusan','averageGrades','subjectScores'));

        }else if (Auth::user()->role == 'guru') {
            $title = 'E-Raport';

            $guru = DB::table('guru_m')->count();
            $siswa = DB::table('siswa_m')->where('objectgurufk', Auth::user()->objectgurufk)->count();
            $jurusan = DB::table('jurusan_m')->count();

            $jklakilaki = DB::table('siswa_m')->where('jk', 'Laki - Laki')->count();
            $jkperempuan = DB::table('siswa_m')->where('jk', 'Perempuan')->count();

            $dataJurusan = DB::table('siswa_m as sm')
                ->select(DB::raw('COUNT(sm.namalengkap) as jumlah_siswa'), 'jp.bidangjurusan', 'jp.kdjurusan')
                ->leftJoin('jurusan_m as jp', 'jp.id', '=', 'sm.objectjurusanfk')
                ->groupBy('jp.bidangjurusan', 'jp.kdjurusan')
                ->get();

            $grades = DB::table('siswa_m as sm')
                ->leftJoin('hasilraport_t as hr', 'hr.objectsiswafk', '=', 'sm.id')
                ->leftJoin('matpel_m as mp', 'mp.id', '=', 'hr.objectmatpelfk')
                ->leftJoin('semester_m as sms', 'sms.id', '=', 'hr.objectsemesterfk')
                ->leftJoin('kelas_m as km','km.id', '=', 'sm.objectkelasfk')
                ->leftJoin('guru_m as gm','gm.id', '=', 'sm.objectgurufk')
                ->leftJoin('jenismapel_m as jm','jm.id', '=','mp.objectjenismapelfk')
                ->where('sm.objectgurufk', Auth::user()->objectgurufk)
                ->select('mp.matapelajaran',
                            'hr.nilai',
                            'km.kelas',
                            'gm.namalengkap as namaguru',
                            'jm.jenismatpel')
                ->get();
            // return $grades;
            $data = [
                'Normatif' => [],
                'Adatif' => [],
                'Produktif' => [],
                'Muatan Lokal' => []
            ];

            foreach ($grades as $grade) {
                $data[$grade->jenismatpel][] = $grade->nilai;
            }

            $averageData = [];
            foreach ($data as $key => $values) {
                $averageData[$key] = count($values) ? round(array_sum($values) / count($values), 2) : 0;
            }
            // return $averageData;

            return view('guruhome',compact('title','siswa','averageData'));

        }else if (Auth::user()->role == 'orangtua') {
            $title = 'E-Raport';

            $guru = DB::table('guru_m')->count();
            $siswa = DB::table('siswa_m')->where('id', Auth::user()->objectsiswafk)->get();
            $jurusan = DB::table('jurusan_m')->count();

            $jklakilaki = DB::table('siswa_m')->where('jk', 'Laki - Laki')->count();
            $jkperempuan = DB::table('siswa_m')->where('jk', 'Perempuan')->count();

            $dataJurusan = DB::table('siswa_m as sm')
                ->select(DB::raw('COUNT(sm.namalengkap) as jumlah_siswa'), 'jp.bidangjurusan', 'jp.kdjurusan')
                ->leftJoin('jurusan_m as jp', 'jp.id', '=', 'sm.objectjurusanfk')
                ->groupBy('jp.bidangjurusan', 'jp.kdjurusan')
                ->get();

            $grades = DB::table('siswa_m as sm')
                ->leftJoin('hasilraport_t as hr', 'hr.objectsiswafk', '=', 'sm.id')
                ->leftJoin('matpel_m as mp', 'mp.id', '=', 'hr.objectmatpelfk')
                ->leftJoin('semester_m as sms', 'sms.id', '=', 'hr.objectsemesterfk')
                ->leftJoin('kelas_m as km','km.id', '=', 'sm.objectkelasfk')
                ->where('sm.id', 1)
                ->select('mp.matapelajaran', 'hr.nilai', 'sms.semester', 'sms.tahunajaran')
                ->get();

            // Process the data to calculate averages
            $semesterData = [];

            foreach ($grades as $grade) {
                $yearSemester = $grade->tahunajaran . ' - Semester ' . ($grade->semester == 1 ? 'Ganjil' : 'Genap');
                $semesterData[$yearSemester][] = $grade->nilai;
            }

            $averageGrades = [];

            foreach ($semesterData as $yearSemester => $grades) {
                $averageGrades[$yearSemester] = array_sum($grades) / count($grades);
            }


            $grades = DB::table('siswa_m as sm')
                ->leftJoin('hasilraport_t as hr', 'hr.objectsiswafk', '=', 'sm.id')
                ->leftJoin('matpel_m as mp', 'mp.id', '=', 'hr.objectmatpelfk')
                ->leftJoin('semester_m as sms', 'sms.id', '=', 'hr.objectsemesterfk')
                ->where('sm.id', 1)
                ->select('mp.matapelajaran', 'hr.nilai')
                ->get();

            // Calculate the total or average score for each subject
            $subjectScores = [];
            $subjectCounts = [];

            foreach ($grades as $grade) {
                if (isset($subjectScores[$grade->matapelajaran])) {
                    $subjectScores[$grade->matapelajaran] += $grade->nilai;
                    $subjectCounts[$grade->matapelajaran]++;
                } else {
                    $subjectScores[$grade->matapelajaran] = $grade->nilai;
                    $subjectCounts[$grade->matapelajaran] = 1;
                }
            }

            foreach ($subjectScores as $subject => $totalScore) {
                $subjectScores[$subject] = $totalScore / $subjectCounts[$subject]; // Calculate average
            }

            $kehadiran = DB::table('kehadiran_t')->where('objectsiswafk', Auth::user()->objectsiswafk)->get();
            // return $siswa;
            return view('orangtuahome',compact('title','guru','siswa','jurusan','jklakilaki','jkperempuan','dataJurusan','averageGrades','subjectScores','kehadiran'));
        }else{
            return view('notfound');
        }

    }
}
