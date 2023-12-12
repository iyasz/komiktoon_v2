<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function handleSubmitLogin(Request $request) {

        if($request->isMethod('get')){
            $user = User::where('remember_token', '!=', NULL)->first();
            return view('auth.login', compact('user'));
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

            $user = User::where('email', $request->email)->first();

            if (!$user || $user->password == NULL) {
                return back()->withErrors(['error_message' => 'Email atau Password anda salah!']);
            }

            if(Auth::attempt(['email' => $request->email, 'password' => $request->password], true)){
                $request->session()->regenerate();

                $user = Auth::user()->role_id;

                // setcookie("email", $request->email, time() + (365 * 24 * 60 * 60));

                if($user == 1){
                    return redirect('/panel/admin/dashboard')->with('success', 'Anda berhasil login!');
                }else{
                    return redirect('/')->with('success', 'Anda berhasil login!');
                }
                
            }

            return back()->withErrors(['error_message' => 'Email atau Password anda salah!']);
        }
    }

    public function handleRedirectGoogle() {
        
        return Socialite::driver('google')
        ->with(['prompt' => 'select_account'])
        ->redirect();
        // return Socialite::driver('google')->redirect();
    }
    
    public function handleCallbackGoogle() {
        $userGoogle = Socialite::driver('google')->user();
        // dd($userGoogle);
        $user = User::where('email', $userGoogle->email)->first();
        if($user && $user->password != NULL){

            Auth::login($user);
            return redirect('/')->with('success', 'Anda berhasil login!');
        }else{

            if(!$user){
                $user = new User();
                $user->photo = $userGoogle->avatar;
                $user->name = $userGoogle->name;
                $user->email = $userGoogle->email;
                $user->role_id = 2;
                $user->register_token = md5(30);
                $user->save();
            }
            return redirect('/auth/register/mC3EtY3yxkqyyAqRnjKeDguCf/'.$user->register_token);
            // return view('auth.registerGoogle');
        }
        
    }

    public function registerGoogleView(Request $request, $token) {
        // dd($user);
        $user = User::where('register_token', $token)->first();
        if(!$user){
            abort(404);
        }

        // dd($user);
        return view('auth.registerGoogle', compact('user', 'token'));

    }

    public function handleRegisterGoogle(Request $request, $token) {
        $credentials = $request->validate([
            'password' => 'required|string|confirmed|max:150|min:5',
            'password_confirmation' => 'required|string|max:150',
        ], [
            'password.required' => 'Password tidak boleh kosong!',
            'password.confirmed' => 'Password tidak sesuai!',
            'password.max' => 'Tidak boleh lebih dari 150 huruf!',
            'password.min' => 'Tidak boleh kurang dari 5 huruf!',
            
            'password_confirmation.required' => 'Confirm Password tidak boleh kosong!',
            'password_confirmation.max' =>  'Tidak boleh lebih dari 150 huruf!',
        ]);

        $user = User::where('register_token', $token)->first();
        if(!$user){
            abort(404);
        }

        $user->password = password_hash($request->password, PASSWORD_BCRYPT);
        $user->register_token = NULL;
        $user->update();

        Auth::login($user);

        return redirect('/')->with('success', 'Anda berhasil login!');
    }
    
    public function handleSubmitRegister(Request $request) {

        if($request->isMethod('get')){
            return view('auth.register');
        }
        
        if($request->isMethod('post')){
            $credentials = $request->validate([
                'email' => 'required|email|unique:users|max:150|min:5',
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
                'password.min' => 'Tidak boleh kurang dari 5 huruf!',
                
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

    public function showForgotPassword() {
        return view('auth.forgot-password');    
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->regenerateToken();
        $request->session()->invalidate();

        return redirect('/auth/login')->with('success', 'Anda berhasil logout!');

    }
}
