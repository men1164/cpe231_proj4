@extends('layouts.SBstd')

@section('content')
        <div class="grid grid-cols-3 gap-9 ml-60 h-full bg-gray-200 p-8">
            <div class="flex justify-center items-center grid-cols-3 col-start-1 col-end-4 bg-white rounded-xl shadow-lg">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <img src="/css/demo-profile.jpg" class="w-auto h-48 col-span-1 rounded-xl">
                <div class="ml-16 text-gray-800">
                    <p>Name: </p>
                    <p>Department: </p>
                    <p>Faculty: </p>
                </div>
                <div class="ml-5 text-gray-500">
                    <p>Thanasit Suwanposri</p>
                    <p>Computer Engineering</p>
                    <p>Engineering</p>
                </div>
                <div class="ml-16 text-gray-800">
                    <p>Email: </p>
                    <p>Personal Email: </p>
                    <p>Phone: </p>
                </div>
                <div class="ml-5 text-gray-500">
                    <p>starboy@mail.kmutt.ac.th</p>
                    <p>starboy2@gmail.com</p>
                    <p>092-222-2222</p>
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
