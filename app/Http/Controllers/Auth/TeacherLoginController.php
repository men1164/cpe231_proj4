<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:teacher');
    }


    public function showLoginForm()
    {
        return view('auth.teacherLogin');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|numeric',
            'password' => 'required|min:4',
        ]);

        if (Auth::guard('teacher')->attempt(['id' => $request->id, 'password' => $request->password]))
        {
            return redirect()->intended(route('teacher.home'));
        }

        return redirect()->back()->withInput($request->only('id'))->with('failed', 'Wrong password or UserID');
    }
}
