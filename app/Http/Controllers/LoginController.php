<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $redirectTo;
    public function redirectTo()
    {
        switch(Auth::user()->role){
            case 'encadrant':
            $this->redirectTo = '/encadrant';
            return $this->redirectTo;
                break;
            case 'etudiant':
                $this->redirectTo = '/etudiant';
                return $this->redirectTo;
                break;

            default:
                $this->redirectTo = '/login';
                return $this->redirectTo;
        }

        // return $next($request);
    }
}
