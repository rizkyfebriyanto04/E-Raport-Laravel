<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;



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

        $siswa = $request->objectsiswafk === '--Pilih--' ? null : $request->objectsiswafk;
        $guru = $request->objectgurufk === '--Pilih--' ? null : $request->objectgurufk;
        // return $guru;

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
            'objectsiswafk' => $siswa,
            'objectgurufk' => $guru,
        ]);
        $user->save();

        return redirect()->route('registrasi')->with('success', 'Akun Berhasil Di Tambahkan');
    }

    public function registrasi_aksi_login(Request $request)
    {
        // dd($request);

        $siswa = $request->objectsiswafk === '--Pilih--' ? null : $request->objectsiswafk;
        $guru = $request->objectgurufk === '--Pilih--' ? null : $request->objectgurufk;
        // return $guru;

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
            'objectsiswafk' => $siswa,
            'objectgurufk' => $guru,
        ]);
        $user->save();

        // return redirect()->route('/')->with('success', 'Daftar Akun berhasil');
        Session::flash('success','Daftar Akun berhasil');
            return redirect('/');
    }

    public function hapusregistrasi($id){
        // $user = User::find($id);
        // $user->delete();
        // return redirect()->route('registrasi')->with('success', 'Data Berhasil Dihapus');
        if($id == 0){
            return redirect()->route('registrasi')->with('error', 'Admin Tidak bisa di Hapus');
        }else{
            $user = User::find($id);
            $user->delete();
            return redirect()->route('registrasi')->with('success', 'Data Berhasil Dihapus');
        }
    }

    public function updateregistrasi(Request $request, $id)
    {
        // $request->validate([
        //     'namalengkap' => 'required',
        // ]);

        // $guru->namalengkap = $request->namalengkap;
        $guru = User::find($id);
        $guru->name = $request->namalengkap;
        $guru->email = $request->email;
        $guru->role = $request->role;
        $guru->password = Hash::make($request->password);
        // $guru->objectsiswafk = $request->objectsiswafk;
        // $guru->objectgurufk = $request->objectgurufk;
        $guru->save();

        return redirect()->route('registrasi')->with('success', 'Data Berhasil Diubah');
    }


}
