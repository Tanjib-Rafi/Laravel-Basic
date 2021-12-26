<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }
    //login store data recv kor be tai kic hu reqs class
    public function loginstore(Request $request){
        $email = $request->email;
        $password = $request->password;
        $user = User::where('email','=',$email)
                    ->where('password','=', $password)
                    ->first();
        //dd($user);
        if(!$user){
            return redirect()->back()->with('err_msg','Invalid email or password');
        }
        else{
            //store user data in session
            $request->session()->put('username', $user->name);
            $request->session()->put('useremail', $user->email);
            $request->session()->put('userrole', $user->role);

            if($user->role=='Student') {
                return redirect()->to('student');
            }
            else {
                return redirect()->to('teacher');
            }
        }
    }



public function studentdashboard(){
            return view('website.pages.dashboard');
}

public function logout() {
    Session::forget(['username','userrole']);
    return redirect()->to('login');
}

public function teacherdashboard(){
        return view('admin.pages.dashboard');
}

    public function tables(){
        return view('admin.pages.tables');
    }

    public function teacher(){
        return view('teacher');
    }
}

