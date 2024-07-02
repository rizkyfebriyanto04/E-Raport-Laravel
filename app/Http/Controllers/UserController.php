<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    public function registrasi()
    {
        $title = 'E-Raport';
        $data = DB::table('users')
                ->get();
        $siswa = DB::table('siswa_m')
                ->get();
        $guru = DB::table('guru_m')
                ->get();
        // return $data;
        return view('registrasi.register', compact('title','data','siswa','guru'));
    }

    public function registrasi_aksi(Request $request)
    {
        // return $request;

        $objectsiswafk = $request->objectsiswafk === '-- Pilih --' ? null : $request->objectsiswafk;
        $objectgurufk = $request->objectgurufk === '-- Pilih --' ? null : $request->objectgurufk;

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
            'objectsiswafk' => $objectsiswafk,
            'objectgurufk' => $objectgurufk,
        ]);
        $user->save();

        return redirect()->route('registrasi')->with('success', 'Akun Berhasil Di Tambahkan');
    }

    public function hapusregistrasi($id){
        $user = User::find($id);
        $user->delete();

        return redirect()->route('registrasi')->with('success', 'Data Berhasil Dihapus');
    }

    public function updateregistrasi(Request $request, $id)
    {
        // $request->validate([
        //     'namalengkap' => 'required',
        // ]);

        // $guru->namalengkap = $request->namalengkap;
        $guru = User::find($id);
        $guru->name = $request->name;
        $guru->email = $request->email;
        $guru->role = $request->role;
        $guru->password = Hash::make($request->password);
        $guru->objectsiswafk = $request->objectsiswafk;
        $guru->objectgurufk = $request->objectgurufk;
        $guru->save();

        return redirect()->route('guru')->with('success', 'Data Berhasil Diubah');
    }


}
