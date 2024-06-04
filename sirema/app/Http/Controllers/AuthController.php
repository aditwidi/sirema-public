<?php

namespace App\Http\Controllers;

use App\Mail\AuthMail;
use App\Mail\ForgotPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function viewLoginPage() {
        // Check if user is already logged in
        if (Auth::check()) {
            // Redirect to the appropriate dashboard based on user role
            $role = Auth::user()->role;
            switch ($role) {
                case 'admin':
                    return redirect()->route('admin');
                case 'user':
                    return redirect()->route('user');
                case 'personil':
                    return redirect()->route('personil');
            }
        }

        return view('login');
    }

    function loginAkun(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ],[
            'email.required' => 'email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $infologin =[
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($infologin)){
            if(Auth::user()->email_verified_at != null){
                if(Auth::user()->role === 'admin'){
                    return redirect()->route('admin')->with('success','halo Admin, Anda berhasil login');
                }else if(Auth::user()->role === 'user'){
                    return redirect()->route('user')->with('success','Berhasil login');
                }else if(Auth::user()->role === 'personil'){
                    return redirect()->route('personil')->with('success','halo Personil, Anda berhasil login');
                }
            } else {
                Auth::logout();
                return redirect()->route('login')->withErrors('Akun anda belum aktif, Harap verifikasi akun terlebih dahulu');
            }

        }else{
            return redirect()->route('login')->withErrors('Email atau password salah');
        }
    }

    function forgot(){
        return view('lupa-password');
    }

    function forgot_password(Request $request){
        $user = User::where('email', '=', $request->email);
        if(!empty($user)){
            $user->remember_token = Str::random(40);
            // $user->save();

            Mail::to($user->email)->send(new ForgotPasswordMail($user));

            return redirect()->back()->with('success', "Please check your email and reset your password");
        }else{
            return redirect()->back()->with('error', "Email not found in the system");
        }
    }


    function viewRegisterPage() {
        return view('register');
    }

    function registerAkun(Request $request) {
        $str = Str::random(100);

        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6|confirmed',
        ],[
            'name.required' => 'Nama wajib diisi',
            'name.min' => 'Nama minimal 5 karakter',
            'email.required' => 'Email wajib diisi',
            'email.unique' => 'Email telah terdaftar',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 6 karakter',
            'password.confirmed' => 'The password confirmation does not match.',
        ]);

        $inforegister = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'verify_key' => $str,
        ];

        User::create($inforegister);

        $details = [
            'nama' => $inforegister['name'],
            'role' => 'user',
            'datetime' =>  date('Y-m-d H:i:s'),
            'website'=> 'Sirema (Sistem Request Media Kampus)' ,
            'url' => 'http://' . request()->getHttpHost(). "/" . "verify/" . $inforegister['verify_key'],
        ];

        Mail::to($inforegister['email'])->send(new AuthMail($details));

        return redirect()->route('verifikasi')->with('success','Link verifikasi telah dikirim ke email anda. Cek email untuk melakukan verifikasi');

    }

    function viewVerifyConfirmation(){
        return view('verifikasi');
    }
    function verify($verify_key){
        $keyCheck = User::select('verify_key')->where('verify_key',$verify_key)->exists();

        if($keyCheck){
            $user = User::where('verify_key',$verify_key)->update(['email_verified_at' => date('Y-m-d H:i:s')]);

            return redirect()->route('login')->with('success','Verifikasi berhasil. akun anda sudah aktif');
        }else{
            return redirect()->route('login')->withErrors('Keys tidak valid. pastikan telah melakukan register')->withInput();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success','Anda berhasil logout');
    }
}
