<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }


    public function showLoginForm()
    {
        return view('auth.adminLogin');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|numeric',
            'password' => 'required|min:4',
        ]);

        if (Auth::guard('admin')->attempt(['id' => $request->id, 'password' => $request->password]))
        {
            return redirect()->intended(route('admin.home'));
        }

        return redirect()->back()->withInput($request->only('id'));
    }
}
