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
        $lists = Advisor::get();

        return view('tch.tchAdvisor', ['lists' => $lists]);
    }

    public function showStdList(Request $request)
    {
        $results = User::where('FirstName', 'like', $request->search.'%')
                        ->get();

        return view('tch.tchAdvisor', ['results' => $results]);
    }

    public function addStudent(Request $request)
    {
        $tchID = Auth::id();

        if(Advisor::create([
            'std_id' => $request->selected,
            'tch_id' => $tchID,
            ]))
        {
            return view('tch.tchAdvisor');
        }
    }
}
