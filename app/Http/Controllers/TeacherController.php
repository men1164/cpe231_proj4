<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Advisor;
use App\Models\Teacher;

class TeacherController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('tch.tchHome');
    }

    /** Show advise lists **/
    public function showAdviseList()
    {
        $tchID = Auth::id();

        $lists = Advisor::with('student')
                        ->whereHas('student', function($q) use($tchID) {
                            $q->where('tch_id', '=', $tchID);
                        })
                        ->get();
        
        $listsCount = $lists->count();

        return view('tch.tchAdvisor', [
                    'lists' => $lists,
                    'listsCount' => $listsCount
                    ]);
    }

    /** Show student lists search result **/
    public function showStdList(Request $request)
    {
        $tchID = Auth::id();

        $results = User::where('FirstName', 'like', $request->search.'%')
                        ->get();

        $lists = Advisor::with('student')
                        ->whereHas('student', function($q) use($tchID) {
                            $q->where('tch_id', '=', $tchID);
                        })
                        ->get();
        
        $listsCount = $lists->count();

        return view('tch.tchAdvisor', [
            'results' => $results,
            'lists' => $lists,
            'listsCount' => $listsCount
            ]);
    }

    /** Add student into advise lists **/
    public function addStudent(Request $request)
    {
        $tchID = Auth::id();

        if(Advisor::create([
            'std_id' => $request->selected,
            'tch_id' => $tchID,
            ]))
        {
            $lists = Advisor::with('student')
                        ->whereHas('student', function($q) use($tchID) {
                            $q->where('tch_id', '=', $tchID);
                        })
                        ->get();
            
            $listsCount = $lists->count();

            return view('tch.tchAdvisor', [
                        'lists' => $lists,
                        'listsCount' => $listsCount]);
        }
    }

    /** Romove student from advisor lists **/
    public function removeStudent(Request $request)
    {
        $tchID = Auth::id();

        if(Advisor::where([
            ['std_id', '=', $request->selected],
            ['tch_id', '=', $tchID]])
            ->delete())
        {
            $lists = Advisor::with('student')
                        ->whereHas('student', function($q) use($tchID) {
                            $q->where('tch_id', '=', $tchID);
                        })
                        ->get();
            
            $listsCount = $lists->count();

            return view('tch.tchAdvisor', [
                        'lists' => $lists,
                        'listsCount' => $listsCount
                        ]);
        }
    }

    /** Show current profile detail **/
    public function profileDetail()
    {
        $tchID = Auth::id();

        $profile = Teacher::where('id', '=', $tchID)->first();

        return view('tch.tchProfile', [
            'profile' => $profile
        ]);
    }

    /** Perform an update to their profile **/
    public function profileUpdate(Request $request)
    {
        $tchID = Auth::id();

        $this->validate($request, [
            'FirstName' => 'required|string',
            'LastName' => 'required|string',
            'Gender' => 'required',
            'Email' => 'required|email',
            'Personal_email' => 'required|email',
            'Grad_from' => 'required',
            'Grad_degree' => 'required',
        ]);

        $user = Teacher::where('id', '=', $tchID)->first();
        $user->update([
            'FirstName' => $request->FirstName,
            'LastName' => $request->LastName,
            'Gender' => $request->Gender,
            'Email' => $request->Email,
            'Personal_email' => $request->Personal_email, 
            'Grad_from' => $request->Grad_from,
            'Grad_degree' => $request->Grad_degree,
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
