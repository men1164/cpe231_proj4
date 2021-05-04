<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
}
