<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class TeacherRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:teacher');
    }

    public function showRegisterForm() 
    {
        return view('auth.teacherRegister');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|numeric',
            'password' => 'required|min:4',
        ]);

        if(Teacher::create(['id' => $request->id, 'password' => Hash::make($request->password)]))
        {
            return redirect()->back()->with('success', 'Succesfully Registered');
        }

        return redirect()->back()->with('failed', 'Failed');
    }
}
