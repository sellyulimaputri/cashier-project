<?php

namespace App\Http\Controllers;

use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
    public function logout(Request $req){
        $req->session()->flush('user_id');
        return redirect('/form-login');
    }
    
    public function formRegister(){
        return view('auth.register');
    }
    
    public function register(Request $request)
    {
        // Validate the form data
        // $request->validate([
        //     'username' => 'required',
        //     'email' => 'required|email',
        //     'password' => 'required|min:8',
        //     'terms' => 'accepted',
        // ]);

        // Hash the password before saving to the database
        $daftar = new users();

        $daftar->username = $request->username;
        $daftar->password = Hash::make($request->password);
        $daftar->save();

        // Redirect to the dashboard or any other desired page
        return redirect('/form-login')->with('success', 'Registration successful!');
    }
    
    public function formLogin(){
        return view('auth.login');
    }

    public function login(Request $req)
    {
        $req->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
    
        $data = DB::table('users')
            ->where('username', '=', $req->username)
            ->first(['id_user', 'user_type', 'password']);
    
        if ($data && Hash::check($req->password, $data->password)) {
            $req->session()->put('user_id', $data->id_user);
            $req->session()->put('user_type', $data->user_type);
            
            if ($data->user_type == 'administrator') {
                return redirect('/dashboard-administrator');
            } elseif ($data->user_type == 'petugas') {
                return redirect('/dashboard-petugas');
            } else {
                return redirect('/form-login')->with('gagal','Akun Anda Tidak Terdaftar');
            }
        } else {
            return redirect('/form-login')->with('gagal', 'Akun Anda Tidak Terdaftar');
        }
        
    }
}