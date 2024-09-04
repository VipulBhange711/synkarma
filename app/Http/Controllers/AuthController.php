<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller


{
    public function addinfo_post(Request $request)
    {

        //       $data = $request->all();
        // dd($data);

       $state = $request->stt;
       $city = $request->city;
       $zip = $request->zip;
       $id = $request->id;

       $data = [
        'city' => $city,
        'state' => $state,
        'zip' => $zip,
    ];

       DB::table('users')->where('id', $id)->update($data);

       return redirect()->route('dashboard.get');
       
    }
    public function logout()
    {
        Auth::logout();
        return view('login');
    }
    public function dashboard()
    {
        if (Auth::check()) {
            return view('welcome');
        } else {
            return redirect()->route('login.get');
        }
    }

    public function login()
    {
        return view('login');
    }
    public function register()
    {
        return view('register');
    }
    public function login_post(Request $request)
    {



        $data =   $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'type' => 'required',
        ]);



        // $data = $request->all();
        // dd($data);

        if (Auth::attempt($data)) {
            return redirect()->route('dashboard.get');
        } else {
            return redirect()->route('login.get');
        }
    }
    public function register_post(Request $request)
    {
        // $data = $request->all();

        $data =   $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'type' => 'required',

        ]);
        // dd($data);
        if (User::where('email', $data['email'])->exists()) {
            return redirect()->back()->withErrors(['email_already_register' => 'Your email is already registered.'])->withInput();
        }

        $user = User::create($data);

        if ($user) {
            return redirect()->route('login.get');
        }
    }
}
