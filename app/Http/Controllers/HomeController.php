<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Advisor;
use App\Models\Teacher;

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

        $advisorLists = Advisor::with('teacher')
                        ->whereHas('teacher', function($q) use($stdID) {
                            $q->where('std_id', '=', $stdID);
                        })->get();
        
        $advisorCount = $advisorLists->count();
        
        return view('std.home', [
            'advisorLists' => $advisorLists,
            'advisorCount' => $advisorCount]);
    }
}
