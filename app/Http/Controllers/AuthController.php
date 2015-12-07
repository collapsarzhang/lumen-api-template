<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Auth;
use App\User;

class AuthController extends BaseController
{
  public function login(Request $request)
  {
     $this->validate($request, [
         'email'    => 'required|email',
         'password' => 'required',
     ]);

     $credentials = $request->only('email', 'password');

     if (Auth::attempt($credentials, $request->has('remember'))) {
       return ['result' => 'ok'];
     }

     return ['result' => 'not ok'];
  }
}
