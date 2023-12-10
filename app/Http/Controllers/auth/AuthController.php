<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function handleSubmitLogin(Request $request) {

        if($request->isMethod('get')){
            return view('auth.login');
        }
        
        if($request->isMethod('post')){
            $credentials = $request->validate([
                'email' => 'required|email|string',
                'password' => 'required|string',
            ],[
                'email.required' => 'Email tidak boleh kosong!',
                'email.email' => 'Email tidak boleh kosong!',

                'password.required' => 'Password tidak boleh kosong!',
            ]);

            if(Auth::attempt($credentials)){
                $request->session()->regenerate();

                $user = Auth::user()->role_id;

                if($user == 1){
                    return redirect('/panel/admin/dashboard')->with('success', 'Anda berhasil login!');
                }else{
                    return redirect('/')->with('success', 'Anda berhasil login!');
                }

            }

            return back()->withErrors(['all' => 'Email atau Password anda salah!']);
        }
    }
    
    public function handleSubmitRegister(Request $request) {

        if($request->isMethod('get')){
            return view('auth.register');
        }
        
        if($request->isMethod('post')){
            $credentials = $request->validate([
                'email' => 'required|email|unique:users|max:150',
                'name' => 'required|max:150|string',
                'password' => 'required|string|confirmed|max:150',
                'password_confirmation' => 'required|string|max:150',
            ], [
                'email.required' => 'Email tidak boleh kosong!',
                'email.unique' => 'Email sudah terdaftar!',
                'email.email' => 'Harus menggunakan email!',
                'email.max' => 'Tidak boleh lebih dari 150 huruf!',
                
                'name.required' => 'Nama tidak boleh kosong!',
                'name.max' => 'Tidak boleh lebih dari 150 huruf!',
    
                'password.required' => 'Password tidak boleh kosong!',
                'password.confirmed' => 'Password tidak sesuai!',
                'password.max' => 'Tidak boleh lebih dari 150 huruf!',
                
                'password_confirmation.required' => 'Confirm Password tidak boleh kosong!',
                'password_confirmation.max' =>  'Tidak boleh lebih dari 150 huruf!',
            ]);

            $user = new User();
            $user->email = $request->email;
            $user->name = $request->name;
            $user->role_Id = 2;
            $user->password = password_hash($request->password, PASSWORD_BCRYPT);
            $user->save();

            Auth::login($user);

            return redirect('/')->with('success', 'Anda berhasil login!');

        }

    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->regenerateToken();
        $request->session()->invalidate();

        return redirect('/auth/login')->with('success', 'Anda berhasil logout!');

    }
}
