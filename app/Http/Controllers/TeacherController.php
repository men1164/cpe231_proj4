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

    public function showAdviseList()
    {
        $tchID = Auth::id();

        $lists = Advisor::with('student')
                        ->whereHas('student', function($q) use($tchID) {
                            $q->where('tch_id', '=', $tchID);
                        })
                        ->get();

        return view('tch.tchAdvisor', ['lists' => $lists]);
    }

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

        return view('tch.tchAdvisor', [
            'results' => $results,
            'lists' => $lists
            ]);
    }

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

            return view('tch.tchAdvisor', ['lists' => $lists]);
        }
    }
}
