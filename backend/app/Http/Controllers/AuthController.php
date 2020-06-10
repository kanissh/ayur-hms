<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    //

    public function login(Request $request)
    {

    }

    public function register(Request $request){
        
         public function register(Request $request)
    {
        try {
            $obj = $request->all();
            $obj['password'] = bcrypt($request->input('password'));
            $user = User::create($obj);
            return response()->json(['msg' => 'ok!', 'user' => $user]);
        } catch (QueryException $e) {
            return response()->json(['msg' => 'failed!']);
        }
    }


    }


}
