<?php

namespace App\Http\Controllers\Web;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:web')->except('do_logout');
    }
    public function index()
    {
        return view('pages.web.auth.login');
    }
    public function register()
    {
        return view('pages.web.auth.register');
    }
    public function do_register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nim' => 'required',
            'prodi' => 'required',
            'email' => 'email',
            'username' => 'required',
            'password' => 'required|min:8',
            'confirm_password' => 'required|min:8',
        ]);

        if($request->password!=$request->confirm_password){
            return Redirect::back()->withErrors(['msg', 'The Message']);
        } else {
            $user = new User;
            $request['role'] = 'user';
            // $user->gambar = $request->gambar;
            $user->name = Str::title($request->name);
            $user->nim = $request->nim;
            $user->prodi = $request->prodi;
            $user->email = $request->email;
            $user->username = $request->username;
            // $user->role = $request->role;
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('auth.index')->with('status', 'Berhasil Registrasi');
        }
    }

    public function do_login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:8',
        ]);

        if(Auth::guard('web')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember))
        {
            return redirect()->intended('dashboard');
        }else{
            return Redirect::back()->withErrors(['msg', 'The Message']);
        }
    }
    public function do_logout()
    {
        $user = Auth::guard('web')->user();
        Auth::logout($user);
        return redirect('auth');
    }
}