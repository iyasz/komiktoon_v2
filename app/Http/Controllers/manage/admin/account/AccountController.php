<?php

namespace App\Http\Controllers\manage\admin\account;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    public function index() {
        return view('manage.admin.account.index');
    }

    public function update(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'photo' => 'nullable|max:1024|mimes:jpeg,png,jpg|image',
            'password' => 'nullable|confirmed',
        ],[
            'name.required' => 'Nama tidak boleh kosong!',
            'email.required' => 'Email tidak boleh kosong!',
            'email.email' => 'Email tidak valid!',
            'password.confirmed' => 'Password tidak cocok!',
            
            'photo.max' => 'Size Avatar terlalu besar!',
            'photo.mimes' => 'Avatar harus jpeg, png, jpg!',
        ]);

        $user = User::findOrFail(Auth::user()->id);

        $user->name = $request->name;
        $user->email = $request->email;
        if($request->photo){
            if($user->photo != NULL){

                $exist = Storage::disk('public')->exists($user->photo);
                
                if($exist){
                    Storage::disk('public')->delete($user->photo);   
                }
            }  
            
            $user->photo = $request->photo->store('avatar','public');
        }

        if($request->password){
            $user->password = password_hash($request->password, PASSWORD_BCRYPT);
        }
        $user->update();

        return redirect('/panel/my-account');


    }
}
