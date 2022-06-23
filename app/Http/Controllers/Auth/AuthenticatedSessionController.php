<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }
    public function createE()
    {
        return view('auth.loginE');
    }
    public function createA()
    {
        return view('auth.loginA');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {        
        $role=User::query()->select('role')->where('email','=',$request->email)->get();
       // dd(gettype($role));
        foreach($role as $role){
        if($role->role=='etudiant')
        {
        $request->authenticate();
        $request->session()->regenerate();
    return redirect(RouteServiceProvider::ETUDIANT);
        }

    else {
    return back()->withErrors(['errors', "Cet étudiant n'existe pas"]);
         }
            }

    }
    public function storeE(LoginRequest $request)
    {
        $role=User::query()->select('role')->where('email','=',$request->email)->get();
         foreach($role as $role){
        if($role->role=='encadrant'){
        $request->authenticate();
        $request->session()->regenerate();
    return redirect(RouteServiceProvider::ENCADRANT);}

    else {return back()->withErrors(['errors', "Ce Professeur n'existe pas"]);}
 }
            }
 public function storeA(LoginRequest $request)
            {
                $role=User::query()->select('role')->where('email','=',$request->email)->get();
                 foreach($role as $role){
                if($role->role=='admin'){
                $request->authenticate();
                $request->session()->regenerate();
            return redirect()->route('Admin');

            }
        
            else {
               
                return redirect()->route('loginA')->withErrors(['errors', "Ce Professeur n'existe pas"]);
            }
         }
     }
        


    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
