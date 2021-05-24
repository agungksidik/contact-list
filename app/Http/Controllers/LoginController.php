<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Spatie\Permission\Models\Role;

class LoginController extends Controller{

    public function authenticate(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        $role = $request->role;
        $user = User::where('email', $request->email)->first();

        if($user->hasRole($role)) {
            if (Auth::attempt($credentials)) {            
                return redirect('/dashboard');
            }
        } else {
            return redirect('/login')->with('error', 'Role tidak sesuai.')->withInput();
        }        
        return redirect('/login')->with('error', 'Email atau password salah')->withInput();
    }
}