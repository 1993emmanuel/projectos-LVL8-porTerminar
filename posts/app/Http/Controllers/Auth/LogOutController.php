<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogOutController extends Controller
{
    //
    public function store(){
    	// dd('logOut');
    	auth()->logout();
    	return redirect()->route('home');
    }
}
