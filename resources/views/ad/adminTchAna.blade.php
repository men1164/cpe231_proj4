@extends('layouts.SBad')

@section('content')
    <div class="flex justify-center items-center ml-60 h-full bg-gray-200 p-8">
        <div class="w-5/6 h-5/6 bg-white rounded-xl shadow-xl">
            <p class="ml-12 mt-12 text-5xl font-semibold text-darkblue2">Teacher Analysis</p>
            <p class="ml-12 mt-3 text-lg text-kmutt-or">See how many teachers in each department.</p>
            @isset($tchs)
                <div class="flex flex-col ml-14 mr-14 mt-4 h-3/5 w-auto">
                    <div class="flex-grow overflow-auto">
                        <table class="relative w-full border rounded-3xl">
                            <thead>
                                <tr>
                                    <th class="sticky top-0 px-6 py-3 text-darkblue2 bg-white">Department</th>
                                    <th class="sticky top-0 px-6 py-3 text-darkblue2 bg-white">Total Teachers</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-300 bg-gray-100">
                                @foreach($tchs as $list)
                                <tr>
                                    <td class="px-6 py-4 text-center">{{ $list->DepartmentName }}</td>
                                    <td class="px-6 py-4 text-center">{{ $list->totalTch }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endisset
        </div>
    </div>
@endsection