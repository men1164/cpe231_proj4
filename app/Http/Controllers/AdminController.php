<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Advisor;
use App\Models\User;
use App\Models\Faculty;
use App\Models\Admin;
use App\Models\Register;
use App\Models\RegisterDetail;
use App\Models\Teacher;
use App\Models\TeacherInClass;
use App\Models\Timetable;
use App\Models\ClassInfo;
use App\Models\ClassSection;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('ad.adminHome');
    }

    public function regisIndex()
    {
        return view('ad.adminRegisManage');
    }

    /** Search student ID to manage thier registerd class **/
    public function searchStd(Request $request)
    {
        $regis = Register::where('std_id', '=', $request->search)->first();
        
        if($regis == NULL)
        {
            return redirect()->back()->with('notfound', 'Not found this StudentID that already registered, please try again');
        }
        else
        {
            $stdID = $regis->std_id;

            $results = RegisterDetail::where('RegisterID', '=', $regis->RegisterID)
                        ->join('classinfo', 'registerDetail.ClassCode', '=', 'classinfo.ClassCode')
                        ->select('classinfo.ClassName as ClassName', 'SectionNo', 'registerDetail.ClassCode as ClassCode', 'RegisterID')
                        ->orderBy('ClassCode')
                        ->orderBy('SectionNo')
                        ->get();

            return view('ad.adminRegisManage', [
                'results' => $results,
                'std_id' => $stdID
            ]);
        }
    }

    /** Remove class from thier registered **/
    public function removedRegis(Request $request)
    {
        RegisterDetail::where([
            ['RegisterID', '=', $request->RegisterID],
            ['ClassCode', '=', $request->ClassCode],
            ['SectionNo', '=', $request->SectionNo]
        ])->delete();

        /** remaining class **/
        $results = RegisterDetail::where('RegisterID', '=', $request->RegisterID)
                    ->join('classinfo', 'registerDetail.ClassCode', '=', 'classinfo.ClassCode')
                    ->select('classinfo.ClassName as ClassName', 'SectionNo', 'registerDetail.ClassCode as ClassCode', 'RegisterID')
                    ->get();

        if($results->count() == 0)
        {
            Register::where('RegisterID', '=', $request->RegisterID)->delete();

            return view('ad.adminRegisManage')->with('std_id', $request->stdID)->with('nomore', 'No more class that '.$request->stdID.' has registered');
        }
        else
        {
            return view('ad.adminRegisManage', [
                'results' => $results,
                'std_id' => $request->stdID
            ]);
        }

    }

    public function coursetchIndex()
    {
        return view('ad.adminTinC');
    }

    /** Index function for advise manager page **/
    public function adviseManager()
    {
        $allLists = Advisor::join('users', 'advisor.std_id', '=', 'users.id')
                            ->join('tchUser', 'advisor.tch_id', '=', 'tchUser.id')
                            ->select('users.id as st_id', 'users.FirstName as st_FirstName', 'tchUser.id as tch_id', 'tchUser.FirstName as tch_FirstName')
                            ->orderBy('st_id')
                            ->get();

        return view('ad.adminAdvisor',[
            'lists' => $allLists
        ]);
    }

    /** Perform a delete advise **/
    public function adviseDelete(Request $request)
    {
        if(Advisor::where([
            ['std_id', '=', $request->stdID],
            ['tch_id', '=', $request->tchID]
            ])
            ->delete())
        {
            $allLists = Advisor::join('users', 'advisor.std_id', '=', 'users.id')
                            ->join('tchUser', 'advisor.tch_id', '=', 'tchUser.id')
                            ->select('users.id as st_id', 'users.FirstName as st_FirstName', 'tchUser.id as tch_id', 'tchUser.FirstName as tch_FirstName')
                            ->get();
                    
            return view('ad.adminAdvisor', [
                'lists' => $allLists
            ]);
        }
    }

    /** Perform adding advise list **/
    public function adviseAdd(Request $request)
    {
        if(Advisor::insert([
            'std_id' => $request->stdID,
            'tch_id' => $request->tchID,
        ]))
        {
            $allLists = Advisor::join('users', 'advisor.std_id', '=', 'users.id')
                            ->join('tchUser', 'advisor.tch_id', '=', 'tchUser.id')
                            ->select('users.id as st_id', 'users.FirstName as st_FirstName', 'tchUser.id as tch_id', 'tchUser.FirstName as tch_FirstName')
                            ->get();
                    
            return view('ad.adminAdvisor', [
                'lists' => $allLists
            ]);
        }
        else
        {
            return view('ad.adminAdvisor')->withErrors('StudentID or Teacher ID does not match the records.');
        }
    }

    public function searchTch(Request $request)
    {
        $results = TeacherInClass::where('tchID', '=', $request->tchID)
                    ->join('tchUser', 'TeacherInClass.tchID', '=', 'tchUser.id')
                    ->join('classinfo', 'TeacherInClass.ClassCode', '=','classinfo.ClassCode')
                    ->select('classinfo.ClassName as ClassName', 'TeacherInClass.ClassCode as ClassCode', 'TeacherInClass.SectionNo as SectionNo', 'tchUser.id as tchID')
                    ->orderBy('ClassCode')
                    ->orderBy('SectionNo')
                    ->get();

        if($results->count() == 0)
        {
            return view('ad.adminTinC')->with('tchID', $request->tchID)->with('notfound', 'Input ID does not match in the records or may not teaching in any class');
        }
        else
        {
            return view('ad.adminTinC', [
                'results' => $results,
                'tchID' => $request->tchID
            ]);
        }
    }

    public function addToClass(Request $request)
    {
        if(TeacherInClass::insert([
            'SectionNo' => $request->SectionNo,
            'ClassCode' => $request->ClassCode,
            'tchID' => $request->tchID
        ]))
        {
            return view('ad.adminTinC', [
                'success' => 'Added '.$request->tchID.' to class '.$request->ClassCode.' section '.$request->SectionNo.' complete.'
            ]);
        }
        else
        {
            return redirect()->back()->with('failed', 'The input data not found');
        }
    }

    public function removeFromClass(Request $request)
    {
        TeacherInClass::where([
            ['SectionNo', '=', $request->SectionNo],
            ['ClassCode', '=', $request->ClassCode],
            ['tchID', '=', $request->tchID]
        ])->delete();

        $results = TeacherInClass::where('tchID', '=', $request->tchID)
                    ->join('tchUser', 'TeacherInClass.tchID', '=', 'tchUser.id')
                    ->join('classinfo', 'TeacherInClass.ClassCode', '=','classinfo.ClassCode')
                    ->select('classinfo.ClassName as ClassName', 'TeacherInClass.ClassCode as ClassCode', 'TeacherInClass.SectionNo as SectionNo', 'tchUser.id as tchID')
                    ->get();

        if($results->count() == 0)
        {
            return view('ad.adminTinC')->with('tchID', $request->tchID)->with('notfound', 'Input ID does not match in the records or may not teaching in any class');
        }
        else
        {
            return view('ad.adminTinC', [
                'results' => $results,
                'tchID' => $request->tchID
            ]);
        }
    }

    public function classAnalysisIndex()
    {
        $facLists = DB::table('facInfo')
                        ->get();

        return view('ad.adminClassAna', [
            'facLists' => $facLists
        ]);
    }

    public function showClassAnalysis(Request $request)
    {
        // $classes = RegisterDetail::join('classinfo', 'registerDetail.ClassCode', '=', 'classinfo.ClassCode')
        //                         ->where('classinfo.DepartmentID', '=', $request->department)
        //                         ->select('registerDetail.ClassCode as ClassCode', 'classinfo.ClassName as ClassName', 'registerDetail.SectionNo as SectionNo', DB::raw('count(registerDetail.RegisterID) as totalStd'))
        //                         ->groupBy('registerDetail.ClassCode', 'registerDetail.SectionNo')
        //                         ->get();

        $classes = RegisterDetail::select('classinfo.ClassCode as ClassCode', 'classinfo.ClassName as ClassName', DB::raw('count(registerDetail.RegisterID) as totalStd'))
                                ->rightJoin('classinfo', 'registerDetail.ClassCode', '=', 'classinfo.ClassCode')
                                ->where('classinfo.DepartmentID', '=', $request->department)
                                ->groupBy('classinfo.ClassCode')
                                ->get();

        // $classes = DB::table('classSec')
        //             ->select('classSec.ClassCode as ClassCode', 'classinfo.ClassName as ClassName', 'classSec.SectionNo as SectionNo', DB::raw('count(registerDetail.RegisterID) as totalStd'))
        //             ->where('classinfo.DepartmentID', '=', $request->department)
        //             ->leftJoin('registerDetail', 'registerDetail.ClassCode', '=', 'classSec.ClassCode')
        //             ->join('classinfo', 'classinfo.ClassCode', '=', 'classSec.ClassCode')
        //             ->groupBy('classSec.ClassCode', 'classSec.SectionNo')
        //             ->orderBy('classSec.ClassCode')
        //             ->orderBy('classSec.SectionNo')
        //             ->get();

        $facLists = DB::table('facInfo')
                        ->get();                                

        return view('ad.adminClassAna', [
            'facLists' => $facLists,
            'classes' => $classes
        ]);
    }

    public function stdAnalysisIndex()
    {
        $facLists = DB::table('facInfo')
                        ->get();

        return view('ad.adminStdAna', [
            'facLists' => $facLists
        ]);
    }

    public function showStdAnalysis(Request $request)
    {
        $stdLists = User::select('depInfo.DepartmentName as DepartmentName', 'programInfo.ProgramName as ProgramName', DB::raw('count(users.id) as totalStd'))
                        ->rightJoin('programInfo', 'users.ProgramID', '=', 'programInfo.ProgramID')
                        ->join('depInfo', 'programInfo.DepartmentID', '=', 'depInfo.DepartmentID')
                        ->join('facInfo', 'depInfo.FacultyID', '=', 'facInfo.FacultyID')
                        ->where('facInfo.FacultyID', '=', $request->faculty)
                        ->groupBy('depInfo.DepartmentID', 'programInfo.ProgramID')
                        ->get();

        $facSelected = Faculty::where('FacultyID', '=', $request->faculty)->first();
            
        $facLists = DB::table('facInfo')
                        ->get();

        return view('ad.adminStdAna', [
            'facLists' => $facLists,
            'stdLists' => $stdLists,
            'facSelected' => $facSelected->FacultyName
        ]);
    }

    public function newClassIndex()
    {
        $facLists = DB::table('facInfo')
                        ->get();

        return view('ad.adminInsertClass', [
            'facLists' => $facLists
        ]);
    }

    public function insertClass(Request $request)
    {
        
        
        ClassInfo::insert([
            'ClassCode' => $request->ClassCode,
            'ClassName' => $request->ClassName,
            'DepartmentID' => $request->department,
            'Credit' => $request->Credit
        ]);

        ClassSection::insert([
            'ClassCode' => $request->ClassCode,
            'SectionNo' => $request->SectionNo
        ]);

        Timetable::insert([
            'ClassCode' => $request->ClassCode,
            'SectionNo' => $request->SectionNo,
            'Day' => $request->Day,
            'TimeStart' => $request->TimeStart,
            'TimeEnd' => $request->TimeEnd
        ]);

        
        $facLists = DB::table('facInfo')
                        ->get();

        return view('ad.adminInsertClass', [
            'facLists' => $facLists,
            'completed' => 'Insert '.$request->ClassCode.' Section '.$request->SectionNo.' to database Completed!'
        ]);
    }

    /** Index function for profile editing page **/
    public function profileDetail()
    {
        $adminID = Auth::id();

        $profile = Admin::where('id', '=', $adminID)->first();

        return view('ad.adminProfile', [
            'profile' => $profile
        ]);
    }

    /** Perform an update profile **/
    public function profileUpdate(Request $request)
    {
        $adminID = Auth::id();

        $this->validate($request, [
            'FirstName' => 'required|string',
            'LastName' => 'required|string',
        ]);

        $user = Admin::where('id', '=', $adminID)->first();
        $user->update([
            'FirstName' => $request->FirstName,
            'LastName' => $request->LastName,
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
