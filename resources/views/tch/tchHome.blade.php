@extends('layouts.SBtch')

@section('content')
        <div class="grid grid-cols-3 gap-9 ml-60 h-full bg-gray-200 p-8">
            <div class="flex justify-center items-center grid-cols-3 col-start-1 col-end-4 bg-white rounded-xl shadow-lg">
                <p class="text-4xl text-darkblue2 font-bold">Welcome, <br>{{ Auth::user()->FirstName }}</p>
                <div class="ml-20 text-gray-800">
                    <p>Name: </p>
                    <p>Gender: </p>
                    <p>Department: </p>
                    <p>Faculty: </p>
                </div>
                <div class="ml-5 text-gray-500">
                    <p>{{ Auth::user()->FirstName }} {{ Auth::user()->LastName }}</p>
                    @if(Auth::user()->Gender == "M")
                        <p>Male</p>
                    @elseif(Auth::user()->Gender == "F")
                        <p>Female</p>
                    @else
                        <p>Other</p>
                    @endif
                    <p>{{ $inDepartment->DepartmentName }}</p>
                    <p>{{ $inDepartment->FacultyName }}</p>
                </div>
                <div class="ml-10 text-gray-800">
                    <p>Email: </p>
                    <p>Personal Email: </p>
                    <p>Graduated From: </p>
                    <p>Degree: </p>
                </div>
                <div class="ml-5 text-gray-500">
                    <p>{{ Auth::user()->Email }}</p>
                    <p>{{ Auth::user()->Personal_email }}</p>
                    <p>{{ Auth::user()->Grad_from }}</p>
                    <p>{{ Auth::user()->Grad_degree }}</p>
                </div>
            </div>
            <div class="flex flex-col justify-center items-center col-start-1 col-end-2 bg-white text-darkblue2 rounded-xl shadow-lg">
                <p class="text-2xl text-center">Total Class <br> currently teaching</p>
                <p class="font-semibold text-6xl mt-6">{{ $totalClass }}</p>
            </div>
            <div class="flex justify-center items-center col-start-2 col-end-4 bg-white rounded-xl shadow-lg">
                <table class="w-5/6 h-5/6 text-center" style="border-style: hidden;">
                    <thead>
                        <tr>
                            <th class="border border-gray-400">ClassCode</th>
                            <th class="border border-gray-400">Section</th>
                            <th class="border border-gray-400">Day</th>
                            <th class="border border-gray-400">TIME</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($timetable as $time)
                        <tr>
                            <td class="border border-gray-400">{{ $time->ClassCode }}</td>
                            <td class="border border-gray-400">{{ $time->SectionNo }}</td>
                            <td class="border border-gray-400">{{ $time->Day }}</td>
                            <td class="border border-gray-400">{{\Carbon\Carbon::createFromFormat('H:i:s',$time->TS)->format('H:i') }} - {{\Carbon\Carbon::createFromFormat('H:i:s',$time->TE)->format('H:i') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- <div class="text-center text-sm">
                    <p class="font-semibold pb-2">DAY</p> 
                    <p>MON</p>
                    <p>TUE</p>
                    <p>WED</p>
                    <p>THU</p>
                    <p>FRI</p>
                </div>
                <div class="text-center text-sm ml-20">
                    <p class="font-semibold pb-2">SUBJECT</p> 
                    <p>Man and Ethics of Living</p>
                    <p>Statistic For Engineering</p>
                    <p>Database System</p>
                    <p>Computer Architecture</p>
                    <p>Data Model</p>
                </div>
                <div class="text-center text-sm ml-20">
                    <p class="font-semibold pb-2">SEC</p> 
                    <p>33</p>
                    <p>32</p>
                    <p>31</p>
                    <p>32</p>
                    <p>33</p>
                </div>
                <div class="text-center text-sm ml-20">
                    <p class="font-semibold pb-2">TIME</p> 
                    <p>08.30 - 10.30</p>
                    <p>13.30 - 16.00</p>
                    <p>13.30 - 15.30</p>
                    <p>13.30 - 17.30</p>
                    <p>08.30 - 12.30</p>
                </div> -->
            </div>
        </div>

@endsection
