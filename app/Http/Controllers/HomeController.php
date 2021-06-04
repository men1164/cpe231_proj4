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
                            ->orderBy('ClassCode')
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
        }
        
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
                            ->select('classinfo.ClassName as ClassName', 'SectionNo', 'registerDetail.ClassCode as ClassCode', 'registerDetail.RegisterID as RegisterID')
                            ->get();

            $regisCount = $currentRegis->count();

            return view('std.wdStd',[
                'regisCount' => $regisCount,
                'currentRegis' => $currentRegis
            ]);
        }
    }

    public function withdraw(Request $request)
    {
        $stdID = Auth::id();

        RegisterDetail::where([
            ['RegisterID', '=', $request->RegisterID],
            ['ClassCode', '=', $request->ClassCode],
            ['SectionNo', '=', $request->SectionNo]
        ])->delete();

        $regisID = Register::where('std_id', '=', $stdID) 
                            ->first();

        $currentRegis = RegisterDetail::where('RegisterID', '=', $regisID->RegisterID)
                        ->join('classinfo', 'registerDetail.ClassCode', '=', 'classinfo.ClassCode')
                        ->select('classinfo.ClassName as ClassName', 'SectionNo', 'registerDetail.ClassCode as ClassCode', 'registerDetail.RegisterID as RegisterID')
                        ->get();

        $regisCount = $currentRegis->count();
            
        if($regisCount == 0)
        {
            Register::where('std_id', '=', $stdID)->delete();
        }

        return view('std.wdStd',[
            'regisCount' => $regisCount,
            'currentRegis' => $currentRegis
        ]);
    }

    public function viewGradeIndex()
    {
        $stdID = Auth::id();

        $regisID = Register::where('std_id', '=', $stdID) 
                            ->first();

        if($regisID == NULL)
        {
            $regisCount = 0;

            return view('std.gradeStd',[
                'regisCount' => $regisCount
            ]);
        }
        else
        {
            $mssg = NULL;
            $CxG = 0;
            $TotalCredit = 0;
            $GPAX = 0;

            $currentRegis = RegisterDetail::where('RegisterID', '=', $regisID->RegisterID)
                            ->join('classinfo', 'registerDetail.ClassCode', '=', 'classinfo.ClassCode')
                            ->select('classinfo.ClassName as ClassName', 'classinfo.Credit as Credit', 'Grade', 'registerDetail.ClassCode as ClassCode')
                            ->get();

            foreach($currentRegis as $list)
            {
                if($list->Grade == NULL)
                {
                    $mssg = "[All classes must be graded.]";
                    break;
                }

                $TotalCredit = $TotalCredit + $list->Credit;
                $CxG = $CxG + ($list->Grade * $list->Credit);
            }

            if($TotalCredit != 0 && $CxG != 0)
            {
                $GPAX = number_format($CxG/$TotalCredit, 2);
            }

            $regisCount = $currentRegis->count();

            return view('std.gradeStd',[
                'regisCount' => $regisCount,
                'currentRegis' => $currentRegis,
                'mssg' => $mssg,
                'GPAX' => $GPAX
            ]);
        }
    }

    public function paymentIndex()
    {
        $stdID = Auth::id();

        $regis = Register::where('std_id', '=', $stdID)->first();

        if($regis == NULL)
        {
            return view('std.payStd', [
                'notregis' => 'You have not registered any class yet.'
            ]);
        }
        else
        {   
            if($regis->PayStatus == 1)
            {
                return view('std.payStd', [
                    'paid' => 'You have already paid for this semester.'
                ]);
            }
            else
            {
                $tuition = User::where('id', '=', $stdID)
                        ->join('programInfo', 'users.ProgramID', '=', 'programInfo.ProgramID')
                        ->select('programInfo.TuitionFee as fee')
                        ->first();

                return view('std.payStd', [
                    'fee' => $tuition->fee
                ]);
            }

        }
    }

    public function paidUpdate()
    {
        $stdID = Auth::id();

        Register::where('std_id', '=', $stdID)
                ->update(['PayStatus' => 1]);

        return view('std.payStd', [
            'paid' => 'You have already paid for this semester.'
        ]);
    }
}
