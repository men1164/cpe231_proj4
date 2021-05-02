<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Advisor;

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
}
