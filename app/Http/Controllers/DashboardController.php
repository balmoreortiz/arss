<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

 //function index 
    class DashboardController extends Controller
    {
        public function index()
        {
            if(Auth::user()->hasRole('user')){
                 return view('userdash');
            }elseif(Auth::user()->hasRole('taller')){
                 return view('tallerdash');
            }elseif(Auth::user()->hasRole('admin')){
             return view('dashboard');
        }
        }
    
    }