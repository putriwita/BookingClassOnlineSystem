<?php

namespace App\Http\Controllers\Web;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserEditController extends Controller
{
    public function index(){
        $users = User::all();
        return view('pages.web.user.main', compact('users'));
    }

    public function update(Request $request){
        $user = User::find(Auth::user()->id);
        
        $request->validate([
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'string:255',
            'username' => 'string:255',
        ]);

        // if (Hash::check($request->password, $user->password)) {
        //     $file = $request->file('gambar');
        //     $nama_file = time() . '.' . $file->getClientOriginalExtension();
        //     $tujuan_upload = 'data_file';
        //     $file->move($tujuan_upload, $nama_file);
        //     $user->gambar = $nama_file;
        //     $user->password = Hash::make($request->new_password);
        //     $user->save();
        // } else {
        //     return redirect()->back()->with('error', 'Password lama salah');
        // }
        
        if($request->hasFile('picture')){
            $file = $request->file('picture');
            $namaFile = $file->getClientOriginalName();
            $tujuanFile = 'assets/images/';
            $file->move($tujuanFile, $namaFile);
            $user->picture = $namaFile;
        }

        $user->name = $request->name;
        $user->username = $request->username;

        $user->save();

        return redirect("user")->with('status','Profil berhasil di ubah');
    }
}
