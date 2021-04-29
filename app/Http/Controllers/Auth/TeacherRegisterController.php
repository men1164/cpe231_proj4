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
            'password' => 'required|min:4|confirmed',
            'FirstName' => 'required|string',
            'LastName' => 'required|string',
            'CitizenID' => 'required|numeric',
            'Email' => 'required|email',
            'Personal_email' => 'required|email',
            'Grad_from' => 'required|string',
        ]);

        if(Teacher::create([
            'id' => $request->id,
            'password' => Hash::make($request->password),
            'FirstName' => $request->FirstName,
            'LastName' => $request->LastName,
            'BirthDate' => $request->BirthDate,
            'Gender' => $request->Gender,
            'CitizenID' => $request->CitizenID,
            'Email' => $request->Email,
            'Personal_email' => $request->Personal_email,
            'Grad_from' => $request->Grad_from,
            'Grad_degree' => $request->Grad_degree,
            'DepartmentID' => $request->DepartmentID,
            ]))
        {
            return redirect()->back()->with('success', 'Succesfully Registered');
        }

        return redirect()->back()->with('failed', 'Failed');
    }
}
