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
        // return $data;
        return view('registrasi.register', compact('title','data'));
    }

    public function registrasi_aksi(Request $request)
    {
        return $request;
        // $user = new User([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'role' => $request->role,
        //     'password' => Hash::make($request->password),
        //     'objectsiswafk' => $request->objectsiswafk,
        //     'objectgurufk' => $request->objectgurufk,
        // ]);
        // $user->save();

        return redirect()->route('registrasi')->with('success', 'Akun Berhasil Di Tambahkan');
    }
}
