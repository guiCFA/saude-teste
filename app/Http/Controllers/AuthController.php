<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  public function login(Request $request)
  {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials))
    {
      $token = auth()->attempt($credentials);

      return response()->json([
        'token' => $token,
        'expires_in' => auth()->factory()->getTTL() * 60
      ]);
    }
    else
    {
      return response()->json(['error' => 'Unauthorized'], 401);
    }
  }
}
