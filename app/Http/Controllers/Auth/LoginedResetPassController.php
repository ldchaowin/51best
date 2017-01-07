<?php

namespace App\Http\Controllers\Auth;



use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;

class LoginedResetPassController extends Controller
{


    /**
     * show the view of security for the logined
     *
     */

    public function index()
    {
        return view('auth/passwords/loginedReset');
    }



    public function resetPassword(Request $request){



        $oldpassword = $request->oldpassword;
        $password = $request->password;
        $rules = [
            'oldpassword'=>'required|between:6,20',
            'password'=>'required|between:6,20|confirmed',
        ];

        $this->validate($request,$rules);

        $user = Auth::user();

        if(Hash::check($oldpassword,$user->password)){
            $user->password = bcrypt($password);
            $user->save();
            Auth::logout();  //更改完这次密码后，退出这个用户
            return redirect('/login');
        }


    }
}
