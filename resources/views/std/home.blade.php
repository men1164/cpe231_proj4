@extends('layouts.SBstd')

@section('content')
        <div class="grid grid-cols-3 gap-9 ml-60 h-full bg-gray-200 p-8">
            <div class="flex justify-center items-center grid-cols-3 col-start-1 col-end-4 bg-white rounded-xl shadow-lg">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <p class="text-4xl text-darkblue2 mr-12">Welcome, {{ Auth::user()->FirstName }}</p>
                <div class="text-gray-800">
                    <p>Name: </p>
                    <p>Program: </p>
                    <p>Department: </p>
                    <p>Faculty: </p>
                </div>
                <div class="ml-5 text-gray-500">
                    <p>{{ Auth::user()->FirstName }} {{ Auth::user()->LastName }}</p>
                    <p>International Program</p>
                    <p>Computer Engineering</p>
                    <p>Engineering</p>
                </div>
                <div class="ml-10 text-gray-800">
                    <p>Email: </p>
                    <p>Personal Email: </p>
                    <p>Advisor: </p>
                    @for($i = 1; $i < $advisorCount; $i++)
                        <br>
                    @endfor
                </div>
                <div class="ml-5 text-gray-500">
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
            <div class="flex flex-col col-start-1 col-end-2 bg-white text-darkblue2 rounded-xl shadow-lg pl-9 pt-9 pb-0">
                <p class="text-2xl">Current GPAX</p>
                <p class="font-semibold text-6xl mt-6">0.00</p>
            </div>
            <div class="flex justify-center items-center col-start-2 col-end-4 bg-white rounded-xl shadow-lg">
                <table class="w-5/6 h-5/6 text-center" style="border-style: hidden;">
                    <thead>
                        <tr>
                            <th class="border border-gray-400">DAY</th>
                            <th class="border border-gray-400">SUBJECT</th>
                            <th class="border border-gray-400">SEC</th>
                            <th class="border border-gray-400">TIME</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-gray-400" rowspan="2">MON</td>
                            <!-- if($loop->first) -->
                            <td class="border border-gray-400">Man and Ethics of Living</td>
                            <td class="border border-gray-400">33</td>
                            <td class="border border-gray-400">08.30 - 10.30</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-400">Database System</td>
                            <td class="border border-gray-400">33</td>
                            <td class="border border-gray-400">13.30 - 15.30</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-400" rowspan="1">TUE</td>
                            <td class="border border-gray-400">Statistic for Engineering</td>
                            <td class="border border-gray-400">33</td>
                            <td class="border border-gray-400">13.30 - 16.30</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-400" rowspan="1">WED</td>
                            <td class="border border-gray-400">Database System</td>
                            <td class="border border-gray-400">33</td>
                            <td class="border border-gray-400">15.30 - 17.30</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-400" rowspan="1">THU</td>
                            <td class="border border-gray-400">Computer Architecture</td>
                            <td class="border border-gray-400">33</td>
                            <td class="border border-gray-400">13.30 - 17.30</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-400" rowspan="2">FRI</td>
                            <td class="border border-gray-400">Data Model</td>
                            <td class="border border-gray-400">33</td>
                            <td class="border border-gray-400">08.30 - 12.30</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-400">Integrated Social Science</td>
                            <td class="border border-gray-400">33</td>
                            <td class="border border-gray-400">13.30 - 16.30</td>
                        </tr>
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
