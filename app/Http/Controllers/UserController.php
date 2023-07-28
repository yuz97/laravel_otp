<?php

namespace App\Http\Controllers;

use App\Events\Auth\UserActivationEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function verification(){

        return view('auth.verification');
    }


    public function postVerification(Request $request){

        $user = User::where('activation_token',$request->otp)->first();

        if($user == null){
            return back()->with('errors','kode OTP salah,silahkan cek kembali');
        }else{

            $user->update([
                'isVerified' => true,
                'activation_token' => false
            ]);
            return redirect()->route('login')->with('success','selamat akun Anda telah aktif!');

        }

    }

    public function postResend(Request $request){

        $this->validates($request);
        $user = User::where('email',$request->email)->first();

        // send email
        if ($user == null) {
            return back()->with('errors','email yang anda masukkan salah,silahkan cek kembali');

        }else{

            $user->activation_token = Str::random(6);
            $user->save();

            // kirim email kembali ke email
            event(new UserActivationEmail($user));

            return redirect()->route('verification')->with('success','kode OTP telah dikirim,silahkan cek email');
        }
    }

    protected function validates(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ],[
            'email.exists' => 'email tidak ditemukan,silahkan cek kembali'
        ]);
    }
}
