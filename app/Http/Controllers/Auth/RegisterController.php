<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function getDepartment(Request $request)
    {
        $departments = DB::table('depInfo')
                        ->where('FacultyID', '=', $request->FacultyID)
                        ->pluck('DepartmentName', 'DepartmentID');

        return response()->json($departments);
    }

    public function getProgram(Request $request)
    {
        $programs = DB::table('programInfo')
                    ->where('DepartmentID', '=', $request->DepartmentID)
                    ->pluck('ProgramName', 'ProgramID');

        return response()->json($programs);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'id' => ['required', 'numeric'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
            'FirstName' => ['required', 'string'],
            'LastName' => ['required', 'string'],
            'BirthDate' => ['required'],
            'Gender' => ['required'],
            'CitizenID' => ['required', 'numeric'],
            'Email' => ['required', 'email'],
            'Personal_email' => ['required', 'email'],
            'Degree' => ['required'],
            'ProgramID' => ['required'],
            'Room' => ['required'],
            'DateStarted' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'id' => $data['id'],
            'password' => Hash::make($data['password']),
            'FirstName' => $data['FirstName'],
            'LastName' => $data['LastName'],
            'BirthDate' => $data['BirthDate'],
            'Gender' => $data['Gender'],
            'CitizenID' => $data['CitizenID'],
            'Email' => $data['Email'],
            'Personal_email' => $data['Personal_email'],
            'Degree' => $data['Degree'],
            'ProgramID' => $data['ProgramID'],
            'Room' => $data['Room'],
            'DateStarted' => $data['DateStarted'],
        ]);
    }
}
