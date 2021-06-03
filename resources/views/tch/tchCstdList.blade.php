@extends('layouts.SBtch')

@section('content')
    <div class="flex justify-center items-center ml-60 h-full bg-gray-200 p-8">
        <div class="w-5/6 h-5/6 bg-white rounded-xl shadow-xl">
            <p class="ml-12 mt-12 text-4xl font-semibold text-darkblue2">Students in {{ $ClassCode }} Section {{ $SectionNo }}</p>
            @if($lists->count() != 0)
            <div class="flex flex-col ml-14 mr-14 mt-5 h-3/5 w-auto">
                <div class="flex-grow overflow-auto">
                    <table class="relative w-full border rounded-3xl">
                        <thead>
                            <tr>
                                <th class="sticky top-0 px-6 py-3 text-darkblue2 bg-white">StudentID</th>
                                <th class="sticky top-0 px-6 py-3 text-darkblue2 bg-white">Firstname</th>
                                <th class="sticky top-0 px-6 py-3 text-darkblue2 bg-white">Department</th>
                                <th class="sticky top-0 px-6 py-3 text-darkblue2 bg-white">Program</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-300 bg-gray-100">
                            @foreach($lists as $list)
                                <tr>
                                    <td class="px-6 py-4 text-center">{{ $list->stdID }}</td>
                                    <td class="px-6 py-4 text-center">{{ $list->FirstName }}</td>
                                    <td class="px-6 py-4 text-center">{{ $list->DepartmentName }}</td>
                                    <td class="flex items-center justify-center px-6 py-4 text-center">{{ $list->ProgramName }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @else
            <p class="ml-14 mt-3 text-md font-semibold text-red-500">No student has registered this class.</p>
            @endif
        </div>
    </div>
@endsection