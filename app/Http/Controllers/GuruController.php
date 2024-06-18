<?php

namespace App\Http\Controllers;

use App\Models\Guru;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuruController extends Controller
{
    public function Guru(){
        $title = 'Master Guru';

        $data = DB::table('guru_m')
                ->get();

        return view('master.guru',compact('title','data'));
    }

    public function guru_aksi(Request $request)
    {
        $request->validate([
            'namalengkap' => 'required',
        ]);

        $guru = new Guru([
            'namalengkap' => $request->namalengkap,
        ]);

        $guru->save();

        return redirect()->route('guru')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function editguru($id)
    {
        $guru = Guru::find($id);
        return view('guru.edit', compact('guru'));
    }

    public function updateguru(Request $request, $id)
    {
        $request->validate([
            'namalengkap' => 'required',
        ]);

        $guru = Guru::find($id);
        $guru->namalengkap = $request->namalengkap;
        $guru->save();

        return redirect()->route('guru')->with('success', 'Data Berhasil Diubah');
    }

    public function hapusguru($id){
        $guru = Guru::find($id);
        $guru->delete();

        return redirect()->route('guru')->with('success', 'Data Berhasil Dihapus');
    }
}
