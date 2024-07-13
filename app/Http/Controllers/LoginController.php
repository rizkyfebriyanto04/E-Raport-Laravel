<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect ('home');
        }
        else {
            $title = 'E-Raport';
            $data = DB::table('users')
                ->get();
            $siswa = DB::table('siswa_m')
                    ->get();
            $guru = DB::table('guru_m')
                    ->get();
            return view('login', compact('title','siswa','guru','data'));
        }
    }

    public function loginaksi(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
        if (Auth::attempt($data)) {
            return redirect('home');
        }
        else {
            // return 'test2';
            Session::flash('error','Email Atau Password salah.');
            return redirect('/');
        }
    }

    public function logoutaksi()
    {
        Auth::logout();
        return redirect('/');
    }
}

