<?php

namespace App\Http\Controllers\manage\content\contribute;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserAccountController extends Controller
{
    public function index() {
        return view('main.contribute.account.index');
    }

    public function handleValidationImage(Request $request) {
        $file = $request->file('file');
        if($file){

            $validator = Validator::make($request->all(), [
                'file' => 'max:500|required|image|mimes:jpg,png,jpeg'
            ],[
                'file.required' => 'File gambar tidak boleh kosong!',
                'file.max' => 'Tidak dapat mengunggah file lebih dari 500KB',
                'file.mimes' => 'Format file salah. <br> Format file yang bisa dipakai adalah JPG, JPEG, dan PNG',
                'file.image' => 'Format file salah. <br> Format file yang bisa dipakai adalah JPG, JPEG, dan PNG',
            ]);

            if($validator->fails()){
                return response()->json(['error' => $validator->errors()->first()]);
            }

            return response()->json(['success' => 'success!']);

        }

        return;
    }

    public function updateUserAccount(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'photo' => 'nullable|max:1024|mimes:jpeg,png,jpg|image',
            'password' => 'nullable|confirmed|min:5',
        ],[
            'name.required' => 'Nama tidak boleh kosong!',
            'email.required' => 'Email tidak boleh kosong!',
            'email.email' => 'Email tidak valid!',
            'password.confirmed' => 'Password tidak cocok!',
            'password.min' => 'Password terlalu pendek!',
            
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
        $user->password = password_hash($request->password, PASSWORD_BCRYPT);
        $user->update();

        return redirect('/user/my-account');

    }
}
