<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    //
    public function index() {
        $data['judul'] = 'Login';

        return view('templates.header', $data).
        view('login').
        view('templates.footer');
    }
    
    public function reg_index(Request $request) {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }
        
        $username = $request->input('username');
        $hash_pass = hash('sha256', md5($request->input('password')));
        // dd($hash_pass);
        // dd($request->input('username'));

        $users = new Users();
        
        // Cek username tersedia
        if($users->check_username($username) > 0) {
            return redirect()->back()->with("fail", "Username Sudah Terdaftar, Silahkan Ganti Username Anda");
            
        }else if($users->reg_user($username, $hash_pass)) {
            return redirect()->back()->with("success", "Akun Telah Terdaftar, Silahkan Log-In");

        } else {
            return redirect()->back()->with("fail", "Gagal Mendaftarkan Akun, Silahkan Coba Kembali");
        }

    }

    public function log_index(Request $request) {
        $username = $request->input('username');
        $password = $request->input('password');
        $users = new Users();

        if($users->check_acc($username, $password) > 0) {
            return redirect('/dashboard')->with("success", "Anda Berhasil Log-in");
        } else {
            return redirect()->back()->with("fail", "Username atau Password Anda Salah");
        }
    }

}
