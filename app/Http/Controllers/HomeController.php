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
use App\Models\ClassSection;
use App\Models\ClassInfo;
use App\Models\Register;
use App\Models\RegisterDetail;

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

    /** Give a current user's information in edit profile page **/
    public function profileDetail()
    {
        $stdID = Auth::id();

        $profile = User::where('id', '=', $stdID)->first();

        return view('std.profileStd', [
            'profile' => $profile
        ]);
    }

    /** Perform an update profile **/
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

    /** Show the current registration list of the student **/
    public function showCurrentRegis()
    {
        $stdID = Auth::id();

        $regisID = Register::where('std_id', '=', $stdID) 
                            ->first();

        if($regisID == NULL)
        {
            $regisCount = 0;

            return view('std.regisStd',[
                'regisCount' => $regisCount
            ]);
        }
        else
        {
            $currentRegis = RegisterDetail::where('RegisterID', '=', $regisID->RegisterID)
                            ->join('classinfo', 'registerDetail.ClassCode', '=', 'classinfo.ClassCode')
                            ->select('classinfo.ClassName as ClassName', 'SectionNo', 'registerDetail.ClassCode as ClassCode')
                            ->get();

            $regisCount = $currentRegis->count();

            return view('std.regisStd',[
                'regisCount' => $regisCount,
                'currentRegis' => $currentRegis
            ]);
        }
    }

    /** Search a class to register **/
    public function searchClass(Request $request)
    {
        $stdID = Auth::id();

        $results = ClassSection::where('ClassCode', '=', $request->ClassCode)
                    ->get();

        $getClassName = ClassInfo::where('ClassCode', '=', $request->ClassCode)
                        ->select('ClassName')
                        ->first();

        $resultCount = $results->count();

        $regisID = Register::where('std_id', '=', $stdID) 
                            ->first();

        if($regisID == NULL)
        {
            $regisCount = 0;

            return view('std.regisStd',[
                'regisCount' => $regisCount,
                'results' => $results,
                'resultCount' => $resultCount,
                'className' => $getClassName
            ]);
        }
        else
        {
            $currentRegis = RegisterDetail::where('RegisterID', '=', $regisID->RegisterID)
                            ->join('classinfo', 'registerDetail.ClassCode', '=', 'classinfo.ClassCode')
                            ->select('classinfo.ClassName as ClassName', 'SectionNo', 'registerDetail.ClassCode as ClassCode')
                            ->get();

            $regisCount = $currentRegis->count();

            return view('std.regisStd',[
                'regisCount' => $regisCount,
                'currentRegis' => $currentRegis,
                'results' => $results,
                'resultCount' => $resultCount,
                'className' => $getClassName
            ]);
        }
    }

    /** Perform a register query **/
    public function registerClass(Request $request)
    {
        $stdID = Auth::id();

        $hasRegistered = Register::where('std_id', '=', $stdID)->first();

        /* IF NEVER REGISTER */
        if($hasRegistered == NULL)
        {
            Register::insert([
                'std_id' => $stdID,
                'semester' => 2,
                'year' => 2563,
                'PayStatus' => 0
            ]);
            
            $regisID = Register::where('std_id', '=', $stdID) 
                        ->first();

            RegisterDetail::insert([
                'RegisterID' => $regisID->RegisterID,
                'SectionNo' => $request->SectionNo,
                'ClassCode' => $request->ClassCode
            ]);

            $currentRegis = RegisterDetail::where('RegisterID', '=', $regisID->RegisterID)
                            ->join('classinfo', 'registerDetail.ClassCode', '=', 'classinfo.ClassCode')
                            ->select('classinfo.ClassName as ClassName', 'SectionNo', 'registerDetail.ClassCode as ClassCode')
                            ->get();

            $regisCount = $currentRegis->count();

            return view('std.regisStd', [
                'currentRegis' => $currentRegis,
                'regisID' => $regisID->RegisterID,
                'regisCount' => $regisCount
            ]);
        }
        else
        {
            $regisID = Register::where('std_id', '=', $stdID) 
                        ->first();

            RegisterDetail::insert([
                'RegisterID' => $regisID->RegisterID,
                'SectionNo' => $request->SectionNo,
                'ClassCode' => $request->ClassCode
            ]);

            $currentRegis = RegisterDetail::where('RegisterID', '=', $regisID->RegisterID)
                            ->join('classinfo', 'registerDetail.ClassCode', '=', 'classinfo.ClassCode')
                            ->select('classinfo.ClassName as ClassName', 'SectionNo', 'registerDetail.ClassCode as ClassCode')
                            ->get();

            $regisCount = $currentRegis->count();

            return view('std.regisStd', [
                'currentRegis' => $currentRegis,
                'regisID' => $regisID->RegisterID,
                'regisCount' => $regisCount
            ]);
        }
    }

    /** Show current registration for display in withdraw page **/
    public function showCurrentRegisWD()
    {
        $stdID = Auth::id();

        $regisID = Register::where('std_id', '=', $stdID) 
                            ->first();

        if($regisID == NULL)
        {
            $regisCount = 0;

            return view('std.wdStd',[
                'regisCount' => $regisCount
            ]);
        }
        else
        {
            $currentRegis = RegisterDetail::where('RegisterID', '=', $regisID->RegisterID)
                            ->join('classinfo', 'registerDetail.ClassCode', '=', 'classinfo.ClassCode')
                            ->select('classinfo.ClassName as ClassName', 'SectionNo', 'registerDetail.ClassCode as ClassCode', 'RegisterID')
                            ->get();

            $regisCount = $currentRegis->count();

            return view('std.wdStd',[
                'regisCount' => $regisCount,
                'currentRegis' => $currentRegis
            ]);
        }
    }
}
