@extends('layouts.SBtch')

@section('content')
    <div class="flex justify-center items-center ml-60 h-full bg-gray-200 p-8">
        <div class="w-5/6 h-5/6 bg-white rounded-xl shadow-xl">
            <p class="ml-12 mt-12 text-4xl font-semibold text-darkblue2">Students in {{ $ClassCode }} Section {{ $SectionNo }}</p>
            @if($lists->count() != 0)
            <p class="ml-12 mt-2 text-xl text-kmutt-or">Total {{ $lists->count() }} students.</p>
            <div class="flex flex-col ml-14 mr-14 mt-2 h-3/5 w-auto">
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
            <a href="{{ route('teacher.classIndex') }}">
                <button class="ml-14 w-24 h-10 mt-4 focus:outline-none rounded-lg bg-kmutt-or hover:bg-kmutt-hover hover:shadow-lg">
                    <span class="flex items-center justify-center text-white">
                        <svg class="h-6 w-6" 
                            fill="none" 
                            viewBox="0 0 24 24" 
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        <p class="ml-2">Back</p>
                    </span>
                </button>
            </a>
        </div>
    </div>
@endsection