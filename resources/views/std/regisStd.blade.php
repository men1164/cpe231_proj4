@extends('layouts.SBstd')

@section('content')
    <div class="grid grid-rows-2 gap-8 ml-60 h-full bg-gray-200 p-8">
        <div class="row-start-1 row-end-2 bg-white rounded-xl shadow-lg">
            <p class="ml-12 mt-12 text-3xl font-semibold text-darkblue2">Your Registration</p>
            @if($regisCount == 0)
                <p class="ml-12 mt-2 text-lg text-kmutt-or">You have not register for this semester yet.</p>
            @else
            <div class="flex flex-col ml-14 mr-14 mt-2 h-3/5 w-auto">
                <div class="flex-grow overflow-auto">
                    <table class="relative w-full border rounded-3xl">
                        <thead>
                            <tr>
                                <th class="sticky top-0 px-6 py-3 text-darkblue2 bg-white">ClassCode</th>
                                <th class="sticky top-0 px-6 py-3 text-darkblue2 bg-white">ClassName</th>
                                <th class="sticky top-0 px-6 py-3 text-darkblue2 bg-white">Section</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-300 bg-gray-100">
                            @foreach($currentRegis as $regis)
                            <tr>
                                <td class="px-6 py-4 text-center">{{ $regis->ClassCode }}</td>
                                <td class="px-6 py-4 text-center">{{ $regis->ClassName }}</td>
                                <td class="px-6 py-4 text-center">{{ $regis->SectionNo }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif
        </div>
        <div class="row-start-2 row-end-3 bg-white rounded-xl shadow-lg">
            <form action="{{ route('searchClass') }}" method="post">
                @csrf
                <div class="flex flex-row items-center ml-12 mt-12">
                    <p class="text-lg font-semibold text-kmutt-or">Search the class to register: </p>
                    <label class="ml-5">
                        <input
                        type="text"
                        class="w-40 h-10 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        placeholder="Class Code"
                        name="ClassCode"
                        id="ClassCode"
                        />
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
            <div class="flex flex-col ml-14 mr-14 mt-5 h-3/5 w-auto">
                <div class="flex-grow overflow-auto">
                    @isset($results)
                        @if($resultCount != 0)
                            <form action="{{ route('registered') }}" method="post">
                                @csrf
                                <table class="relative w-full border rounded-3xl">
                                    <thead>
                                        <tr>
                                            <th class="sticky top-0 px-6 py-3 text-darkblue2 bg-white">Class Code</th>
                                            <th class="sticky top-0 px-6 py-3 text-darkblue2 bg-white">Class Name</th>
                                            <th class="sticky top-0 px-6 py-3 text-darkblue2 bg-white">Section</th>
                                            <th class="sticky top-0 px-6 py-3 text-green-400 bg-white">Register</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-300 bg-gray-100">
                                        @foreach($results as $result)
                                        <tr>
                                            <td class="px-6 py-4 text-center">
                                                {{ $result->ClassCode }}
                                                <input type="hidden" name="ClassCode" id="ClassCode" value="{{ $result->ClassCode }}">
                                            </td>
                                            <td class="px-6 py-4 text-center">{{ $className->ClassName }}</td>
                                            <td class="px-6 py-4 text-center">
                                                {{ $result->SectionNo }}
                                                <input type="hidden" name="SectionNo" id="SectionNo" value="{{ $result->SectionNo }}">
                                            </td>
                                            <td class="flex items-center justify-center px-6 py-4 text-center">
                                                <button type="submit" class="w-6 h-6 focus:outline-none rounded-full bg-green-400 hover:bg-green-500 hover:shadow-lg">
                                                    <span class="flex items-center justify-center text-white">
                                                        <svg class="h-6 w-6"
                                                            fill="none"
                                                            viewBox="0 0 24 24"
                                                            stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                                        </svg>  
                                                    </span>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </form>
                        @else
                            <p class="mt-2 text-base text-kmutt-or">Class Code doesn't match any records.</p>
                        @endif
                    @endisset
                </div>
            </div>
        </div>
    </div>

@endsection