<?php

namespace App\Http\Controllers\manage\admin\account;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'email.required' => 'Nama tidak boleh kosong!',
            
            'photo.max' => 'Size Avatar terlalu besar!',
            'photo.mimes' => 'Avatar harus jpeg, png, jpg!',
        ]);

        $user = User::findOrFail(Auth::user()->id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = password_hash($request->password, PASSWORD_BCRYPT);
        $user->update();

        return redirect('/panel/my-account');


    }
}