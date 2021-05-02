@extends('layouts.SBad')

@section('content')

    <div class="grid grid-rows-2 gap-8 ml-60 h-full bg-gray-200 p-8">
        <div class="row-start-1 row-end-3 bg-white rounded-xl shadow-lg">
            <p class="ml-12 mt-12 text-3xl font-semibold text-darkblue2">Current advisor lists.</p>
            @isset($lists)
            <div class="flex flex-col ml-14 mr-14 mt-5 h-3/5 w-auto">
                <div class="flex-grow overflow-auto">
                    <form action="{{ route('admin.removeAdvise') }}" method="POST">
                    @csrf
                    <table class="relative w-full border rounded-3xl">
                        <thead>
                            <tr>
                                <th class="sticky top-0 px-6 py-3 text-darkblue2 bg-white">StudentID</th>
                                <th class="sticky top-0 px-6 py-3 text-darkblue2 bg-white">Firstname</th>
                                <th class="sticky top-0 px-6 py-3 text-darkblue2 bg-white">TeacherID</th>
                                <th class="sticky top-0 px-6 py-3 text-darkblue2 bg-white">Firstname</th>
                                <th class="sticky top-0 px-6 py-3 text-red-500 bg-white">Remove</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-300 bg-gray-100">
                            @foreach($lists as $list)
                            <tr>
                                <td class="px-6 py-4 text-center">
                                    {{ $list->st_id }}
                                    <input type="hidden" name="stdID" id="stdID" value="{{ $list->st_id }}">
                                </td>
                                <td class="px-6 py-4 text-center">{{ $list->st_FirstName }}</td>
                                <td class="px-6 py-4 text-center">
                                    {{ $list->tch_id }}
                                    <input type="hidden" name="tchID" id="tchID" value="{{ $list->tch_id }}">    
                                </td>
                                <td class="px-6 py-4 text-center">{{ $list->tch_FirstName }}</td>
                                <td class="flex items-center justify-center px-6 py-4 text-center">
                                    <button type="submit" class="w-6 h-6 focus:outline-none rounded-full bg-red-500 hover:bg-red-600 hover:shadow-lg">
                                        <span class="flex items-center justify-center text-white">
                                            <svg class="h-5 w-5" 
                                                fill="none" 
                                                viewBox="0 0 24 24" 
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                                            </svg>
                                        </span>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </form>
                </div>
            </div>
            @endisset
        </div>
    </div>

@endsection