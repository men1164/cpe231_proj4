<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:teacher');
    }

    public function showRegisterForm() 
    {
        $facLists = DB::table('facInfo')
                        ->get();

        return view('auth.teacherRegister', [
            'facLists' => $facLists
        ]);
    }

    public function getDepartment(Request $request)
    {
        $departments = DB::table('depInfo')
                        ->where('FacultyID', '=', $request->FacultyID)
                        ->pluck('DepartmentName', 'DepartmentID');

        return response()->json($departments);
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|numeric',
            'password' => 'required|min:4|confirmed',
            'FirstName' => 'required|string',
            'LastName' => 'required|string',
            'BirthDate' => 'required',
            'Gender' => 'required',
            'CitizenID' => 'required|numeric',
            'Email' => 'required|email',
            'Personal_email' => 'required|email',
            'Grad_from' => 'required|string',
            'Grad_degree' => 'required',
            'department' => 'required',
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
            'DepartmentID' => $request->department,
            ]))
        {
            return redirect()->back()->with('success', 'Succesfully Registered');
        }

        return redirect()->back()->with('failed', 'Failed');
    }
}
