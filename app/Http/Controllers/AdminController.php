<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Advisor;
use App\Models\Admin;
use App\Models\Register;
use App\Models\RegisterDetail;
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
                        ->select('classinfo.ClassName as ClassName', 'SectionNo', 'registerDetail.ClassCode as ClassCode')
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

    }

    /** Index function for advise manager page **/
    public function adviseManager()
    {
        $allLists = Advisor::join('users', 'advisor.std_id', '=', 'users.id')
                            ->join('tchUser', 'advisor.tch_id', '=', 'tchUser.id')
                            ->select('users.id as st_id', 'users.FirstName as st_FirstName', 'tchUser.id as tch_id', 'tchUser.FirstName as tch_FirstName')
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
