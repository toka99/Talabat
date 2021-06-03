<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout(){
        auth()->user()->tokens()->delete();
        return response(['message'=> 'Logged out successfully']);
    }
}
