@extends('layouts.SBad')

@section('content')
    <div class="flex justify-center items-center ml-60 h-full bg-gray-200 p-8">
        <div class="w-5/6 h-5/6 bg-white rounded-xl shadow-xl">
            <p class="ml-12 mt-12 text-5xl font-semibold text-darkblue2">Register Manager</p>
            <form action="{{ route('admin.searchStd') }}" method="post">
                @csrf
                <div class="flex flex-row items-center ml-12 mt-5">
                    <p class="text-lg text-red-400">Input StudentID :</p>
                    <label class="ml-3">
                        @if(empty($std_id))
                            <input
                            type="text"
                            class="w-40 h-10 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            placeholder="6xxxxxxxxxx"
                            name="search"
                            id="search"
                            />
                        @else
                            <input
                            type="text"
                            class="w-40 h-10 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            value="{{ $std_id }}"
                            name="search"
                            id="search"
                            />
                        @endif
                    </label>
                    <button type="submit" class="ml-2 w-16 h-10 focus:outline-none rounded-lg bg-kmutt-or hover:bg-kmutt-hover hover:shadow-lg">
                        <span class="flex items-center justify-center text-white">
                            <svg class="h-6 w-6" 
                                fill="none" 
                                viewBox="0 0 24 24" 
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </span>
                    </button>  
                </div>
            </form>
            @if(session('notfound'))
                <p class="ml-12 mt-5 text-red-600 text-sm">{{ session('notfound') }}</p>
            @endif
            @if(!empty($nomore))
                <p class="ml-12 mt-5 text-red-600 text-sm">{{ $nomore }}</p>
            @endif
            @isset($results)
                <div class="flex flex-col ml-14 mr-14 mt-5 h-3/5 w-auto">
                    <div class="flex-grow overflow-auto">
                        <table class="relative w-full border rounded-3xl">
                            <thead>
                                <tr>
                                    <th class="sticky top-0 px-6 py-3 text-darkblue2 bg-white">ClassCode</th>
                                    <th class="sticky top-0 px-6 py-3 text-darkblue2 bg-white">ClassName</th>
                                    <th class="sticky top-0 px-6 py-3 text-darkblue2 bg-white">SectionNo</th>
                                    <th class="sticky top-0 px-6 py-3 text-red-500 bg-white">Remove</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-300 bg-gray-100">
                                @foreach($results as $result)
                                <tr>
                                    <form action="{{ route('admin.removeRegis') }}" method="POST">
                                        @csrf
                                        <td class="px-6 py-4 text-center">
                                            {{ $result->ClassCode }}
                                            <input type="hidden" name="ClassCode" id="ClassCode" value="{{ $result->ClassCode }}">
                                        </td>
                                        <td class="px-6 py-4 text-center">{{ $result->ClassName }}</td>
                                        <td class="px-6 py-4 text-center">
                                            {{ $result->SectionNo }}
                                            <input type="hidden" name="SectionNo" id="SectionNo" value="{{ $result->SectionNo }}"> 
                                            <input type="hidden" name="RegisterID" id="RegisterID" value="{{ $result->RegisterID }}">   
                                            <input type="hidden" name="stdID" id="stdID" value="{{ $std_id }}">
                                        </td>
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
                                    </form>
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