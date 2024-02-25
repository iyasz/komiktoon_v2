<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\PasswordResetToken;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function handleSubmitLogin(Request $request) {

        if($request->isMethod('get')){
            $banner = Banner::where('type', 2)->get();
            return view('auth.login', compact('banner'));
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

            if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
                $request->session()->regenerate();

                $user = Auth::user()->role_id;

                if($user == 1){
                    return redirect('/panel/admin/dashboard');
                }else{
                    return redirect()->intended('/');
                }
                
            }

            return back()->withErrors(['error_message' => 'Email atau Password anda salah!']);
        }
    }

    public function handleRedirectGoogle() {
        
        return Socialite::driver('google')
        ->with(['prompt' => 'select_account'])
        ->redirect();
    }   
    
    public function handleCallbackGoogle() {
        $userGoogle = Socialite::driver('google')->user();
        // dd($userGoogle);
        $user = User::where('email', $userGoogle->email)->first();
        if($user && $user->password != NULL){

            Auth::login($user); 
            return redirect()->intended('/');
        }else{

            if(!$user){
                $user = new User();

                if($userGoogle->avatar){

                // Ambil gambar dari URL
                $avatarUrl = $userGoogle->avatar;
                $image = file_get_contents($avatarUrl);

                // Simpan gambar ke penyimpanan lokal Laravel
                $filename = 'img/' . uniqid() . '.jpg';
                Storage::disk('public')->put($filename, $image);

                // Simpan path gambar ke model User
                $user->photo = $filename;
                }

                $user->name = $userGoogle->name;
                $user->email = $userGoogle->email;
                $user->role_id = 2;
                $user->register_token = md5(30);
                $user->save();
            }
            return redirect('/auth/register/mC3EtY3yxkqyyAqRnjKeDguCf/'.$user->register_token);
        }
        
    }

    public function registerGoogleView(Request $request, $token) {
        $user = User::where('register_token', $token)->first();
        if(!$user){
            abort(404);
        }

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

        return redirect()->intended('/');
    }
    
    public function handleSubmitRegister(Request $request) {

        if($request->isMethod('get')){
            $banner = Banner::where('type', 2)->get();
            return view('auth.register', compact('banner'));
        }
        
        if($request->isMethod('post')){
            $credentials = $request->validate([
                'email' => 'required|email|unique:users|max:150',
                'name' => 'required|max:50|string|min:5',
                'password' => 'required|string|confirmed|max:50|min:5',
                'password_confirmation' => 'required|string|max:150',
            ], [
                'email.required' => 'Email tidak boleh kosong!',
                'email.unique' => 'Email sudah terdaftar!',
                'email.email' => 'Harus menggunakan email!',
                'email.max' => 'Tidak boleh lebih dari 150 huruf!',
                
                'name.required' => 'Nama tidak boleh kosong!',
                'name.max' => 'Tidak boleh lebih dari 50 huruf!',
                'password.min' => 'Nama terlalu pendek!',
    
                'password.required' => 'Password tidak boleh kosong!',
                'password.confirmed' => 'Password tidak sesuai!',
                'password.max' => 'Tidak boleh lebih dari 50 huruf!',
                'password.min' => 'Tidak boleh kurang dari 5 huruf!',
                
                'password_confirmation.required' => 'Confirm Password tidak boleh kosong!',
                'password_confirmation.max' =>  'Tidak boleh lebih dari 50 huruf!',
            ]);

            $user = new User();
            $user->email = $request->email;
            $user->name = $request->name;
            $user->role_Id = 2;
            $user->password = password_hash($request->password, PASSWORD_BCRYPT);
            $user->save();

            Auth::login($user);

            return redirect('/');

        }

    }

    public function showForgetPassword() {
        return view('auth.forget-password');    
    }

    public function handleForgetPassword(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email|string',
        ], [
            'email.required' => 'Email tidak boleh kosong!',
            'email.email' => 'Harus menggunakan email!',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                ? back()->with(['success' => __($status)])
                : back()->withErrors(['email' => [__($status)]]);
    }

    public function showResetPassword($token) {
        $email = PasswordResetToken::where('email', request()->email)->first();

        if(!$email){
            abort(404);
        }

        return view('auth.reset-password', ['token' => $token]);
    }

    public function handleResetPassword(Request $request, $token) {
        $validate = $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|confirmed|max:150|min:5',
            'password_confirmation' => 'required|string|max:150',
        ], [
            'token.required' => 'Token tidak valid!',

            'email.required' => 'Email tidak valid!',
            'email.email' => 'Email tidak valid!',

            'password.required' => 'Password tidak boleh kosong!',
            'password.confirmed' => 'Password tidak sesuai!',
            'password.max' => 'Tidak boleh lebih dari 150 huruf!',
            'password.min' => 'Tidak boleh kurang dari 5 huruf!',
            
            'password_confirmation.required' => 'Confirm Password tidak boleh kosong!',
            'password_confirmation.max' =>  'Tidak boleh lebih dari 150 huruf!',
        ]);

        $userToken = PasswordResetToken::where('email', request()->email)->first();
        if(!$userToken || $request->email != request()->email || $request->token != request()->token){
            abort(404);
        }

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
     
                $user->save();
     
                event(new PasswordReset($user));
            }
        );

        
        if($status === Password::PASSWORD_RESET){
            $userForget = User::where('email', $request->email)->first();
            if($userForget->register_token != NULL){
                $userForget->register_token = NULL;
                $userForget->update();
            }
        }

        return $status === Password::PASSWORD_RESET
        
                ? redirect()->route('login')->with('success', __($status))
                : back()->withErrors(['error_messages' => __($status)]);       

    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->regenerateToken();
        $request->session()->invalidate();

        return redirect('/');

    }
}
