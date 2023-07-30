<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function profile(){
        return view('admin.admin_profile' , ['adminData' =>Auth::user() ]);
    }

    public function destroy(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function edit_profile(){
        return view('admin.admin_edit_profile' , ['adminData' => Auth::user()]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'image' => ['image']
         ]);

    }

    public function request_email_edit(){
        $current =Auth::user()->email;
        return view();
    }

}
