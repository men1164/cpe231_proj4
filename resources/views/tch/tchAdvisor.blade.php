@extends('layouts.SBtch')

@section('content')

    <div class="grid grid-rows-2 gap-8 ml-60 h-full bg-gray-200 p-8">
        <div class="row-start-1 row-end-2 bg-white rounded-xl shadow-lg">
            <p class="ml-12 mt-12 text-3xl font-semibold text-darkblue2">Your current students</p>
            @if($listsCount == 0)
            <p class="ml-12 mt-2 text-lg text-kmutt-or">You are not a mentor to any student.</p>
            @else
            <div class="flex flex-col ml-14 mr-14 mt-2 h-3/5 w-auto">
                <div class="flex-grow overflow-auto">
                    <form action="{{ route('removeStd') }}" method="POST">
                    @csrf
                    <table class="relative w-full border rounded-3xl">
                        <thead>
                            <tr>
                                <th class="sticky top-0 px-6 py-3 text-darkblue2 bg-white">StudentID</th>
                                <th class="sticky top-0 px-6 py-3 text-darkblue2 bg-white">Firstname</th>
                                <th class="sticky top-0 px-6 py-3 text-darkblue2 bg-white">Lastname</th>
                                <th class="sticky top-0 px-6 py-3 text-red-500 bg-white">Remove</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-300 bg-gray-100">
                            @foreach($lists as $list)
                            <tr>
                                <td class="px-6 py-4 text-center">{{ $list->student->id }}</td>
                                <td class="px-6 py-4 text-center">{{ $list->student->FirstName }}</td>
                                <td class="px-6 py-4 text-center">{{ $list->student->LastName }}</td>
                                <td class="flex items-center justify-center px-6 py-4 text-center">
                                    <button name="selected" value="{{ $list->student->id }}" type="submit" class="w-6 h-6 focus:outline-none rounded-full bg-red-500 hover:bg-red-600 hover:shadow-lg">
                                        <span class="flex items-center justify-center text-white">
                                            <svg class="h-6 w-6" 
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
            @endif
        </div>
        <div class="row-start-2 row-end-3 bg-white rounded-xl shadow-lg">
            <form action="{{ route('showStd') }}" method="POST">
                @csrf
                <div class="flex flex-row items-center ml-12 mt-9">
                    <p class="text-lg font-semibold text-kmutt-or">Search student for add to advise list: </p>
                    <label class="ml-5">
                        <input
                        type="text"
                        class="w-40 h-10 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        placeholder="Firstname"
                        name="search"
                        id="search"
                        required
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
                    <form action="{{ route('addStd') }}" method="POST">
                        @csrf
                        <table class="relative w-full border rounded-3xl">
                            <thead>
                                <tr>
                                    <th class="sticky top-0 px-6 py-3 text-darkblue2 bg-white">StudentID</th>
                                    <th class="sticky top-0 px-6 py-3 text-darkblue2 bg-white">Firstname</th>
                                    <th class="sticky top-0 px-6 py-3 text-darkblue2 bg-white">Lastname</th>
                                    <th class="sticky top-0 px-6 py-3 text-green-400 bg-white">Add</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-300 bg-gray-100">
                                @foreach($results as $result)
                                <tr>
                                    <td class="px-6 py-4 text-center">{{ $result->id }}</td>
                                    <td class="px-6 py-4 text-center">{{ $result->FirstName }}</td>
                                    <td class="px-6 py-4 text-center">{{ $result->LastName }}</td>
                                    <td class="flex items-center justify-center px-6 py-4 text-center">
                                        <button name="selected" value="{{ $result->id }}" type="submit" class="w-6 h-6 focus:outline-none rounded-full bg-green-400 hover:bg-green-500 hover:shadow-lg">
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
                    @endisset
                </div>
            </div>            
        </div>
    </div>

@endsection