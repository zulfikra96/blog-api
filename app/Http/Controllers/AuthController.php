<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;


class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function login()
    {
        return ["login" => "ini login"];
    }

    public function register(Request $request)
    {
        $this->validate($request,[
            'fullname' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required'
        ]);
        $hash = app()->make('hash');

        $user = [
            "fullname" => $request->input('fullname'),
            "email" => $request->input('email'),
            "username" => $request->input('username'),
            "password" => $hash->make($request->input('password')),
        ];

        // check email
    
        $db = User::where(['email' => $request->input('email')])->first();
        if($db){
            return response()->json([
                "email" => "email is exist"
            ],401);
            die();
        }
        $register = User::create($user);

        // is success to register?
        if($register){
            $res['success'] = true;
            $res['message'] = 'success registering';
        }else{
            $res['success'] = false;
            $res['message'] = 'failed to register';
        }

        return response($user);
    }
}
