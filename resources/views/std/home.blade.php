@extends('layouts.SBstd')

@section('content')
        <div class="grid grid-cols-3 gap-9 ml-60 h-full bg-gray-200 p-8">
            <div class="flex justify-center items-center grid-cols-3 col-start-1 col-end-4 bg-white rounded-xl shadow-lg">
                <p class="text-4xl text-darkblue2 mr-20">Welcome,<br>{{ Auth::user()->FirstName }}</p>
                <div class="text-gray-800">
                    <p>Name: </p>
                    <p>Program: </p>
                    <p>Department: </p>
                    <p>Faculty: </p>
                </div>
                <div class="ml-5 text-gray-500">
                    <p>{{ Auth::user()->FirstName }} {{ Auth::user()->LastName }}</p>
                    <p>{{ $inProgram->pgName }}</p>
                    <p>{{ $inDepartment->depName }}</p>
                    <p>{{ $inFaculty->facName }}</p>
                </div>
                <div class="ml-10 text-gray-800">
                    <p>Gender: </p>
                    <p>Email: </p>
                    <p>Personal Email: </p>
                    <p>Advisor: </p>
                    @for($i = 1; $i < $advisorCount; $i++)
                        <br>
                    @endfor
                </div>
                <div class="ml-5 text-gray-500">
                    @if(Auth::user()->Gender == "M")
                        <p>Male</p>
                    @elseif(Auth::user()->Gender == "F")
                        <p>Female</p>
                    @else
                        <p>Other</p>
                    @endif
                    <p>{{ Auth::user()->Email }}</p>
                    <p>{{ Auth::user()->Personal_email }}</p>
                    @if($advisorCount == 0)
                        <p> - </p>
                    @else
                        @foreach($advisorLists as $list)
                            <p>{{ $list->teacher->FirstName }}</p>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="flex flex-col justify-center items-center col-start-1 col-end-2 bg-white text-darkblue2 rounded-xl shadow-lg">
                <p class="text-2xl text-center">Total Enrolled Class</p>
                <p class="font-semibold text-6xl mt-6">{{ $totalEnroll }}</p>
            </div>
            <div class="flex justify-center items-center col-start-2 col-end-4 bg-white rounded-xl shadow-lg">
            @if(!empty($timetable))
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
            @else
                <p class="text-2xl text-center text-red-500">You have not enrolled any class.</p>
            @endif
            </div>
        </div>

@endsection
