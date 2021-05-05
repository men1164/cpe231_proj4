<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Advisor;
use App\Models\Teacher;
use App\Models\Program;
use App\Models\Department;
use App\Models\Faculty;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $stdID = Auth::id();
        $programID = Auth::user()->ProgramID;

        $advisorLists = Advisor::with('teacher')
                        ->whereHas('teacher', function($q) use($stdID) {
                            $q->where('std_id', '=', $stdID);
                        })->get();
        
        $advisorCount = $advisorLists->count();

        $inProgram = Program::select('ProgramID', 'ProgramName as pgName', 'DepartmentID')
                            ->where('ProgramID', '=', $programID)
                            ->first();
        
        $inDepartment = Department::select('DepartmentID', 'DepartmentName as depName', 'FacultyID')
                        ->where('DepartmentID', '=', $inProgram->DepartmentID)
                        ->first();

        $inFaculty = Faculty::select('FacultyID', 'facInfo.FacultyName as facName')
                        ->where('FacultyID', '=', $inDepartment->FacultyID)
                        ->first();

        return view('std.home', [
            'advisorLists' => $advisorLists,
            'advisorCount' => $advisorCount,
            'inProgram' => $inProgram,
            'inDepartment' => $inDepartment,
            'inFaculty' => $inFaculty 
            ]);
    }

    public function profileDetail()
    {
        $stdID = Auth::id();

        $profile = User::where('id', '=', $stdID)->first();

        return view('std.profileStd', [
            'profile' => $profile
        ]);
    }

    public function profileUpdate(Request $request)
    {
        $stdID = Auth::id();

        $this->validate($request, [
            'FirstName' => 'required|string',
            'LastName' => 'required|string',
            'Gender' => 'required',
            'Email' => 'required|email',
            'Personal_email' => 'required|email',
        ]);

        $user = User::where('id', '=', $stdID)->first();
        $user->update([
            'FirstName' => $request->FirstName,
            'LastName' => $request->LastName,
            'Gender' => $request->Gender,
            'Email' => $request->Email,
            'Personal_email' => $request->Personal_email, 
            ]);

            if(!empty($request->password))
            {
                $this->validate($request, [
                    'password' => 'required|min:4|confirmed',
                ]);

                $user->password = Hash::make($request->password);
                $user->save();
            
                return redirect()->back()->with('updatedWithPW', 'Your new information and password was updated!');
            }
            else
            {
                return redirect()->back()->with('updated', 'Your new information was updated!');
            }
    }
}
