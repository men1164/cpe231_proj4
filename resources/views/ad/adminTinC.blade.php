@extends('layouts.SBad')

@section('content')
    <div class="grid grid-rows-3 gap-8 ml-60 h-full bg-gray-200 p-8">
        <div class="row-start-1 row-end-3 bg-white rounded-xl shadow-lg">
            <p class="ml-12 mt-10 text-3xl font-semibold text-darkblue2">Current Courses.</p>
            <form action="{{ route('admin.searchTch') }}" method="post">
                @csrf
                <div class="flex flex-row items-center ml-12 mt-5">
                    <p class="text-lg font-semibold text-kmutt-or">Teacher ID: </p>
                    @if(empty($tchID))
                    <label class="ml-2">
                        <input
                        type="text"
                        class="w-40 h-10 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        placeholder="1xxxxxxxx"
                        name="tchID"
                        id="tchID"
                        />
                    </label>
                    @else
                    <label class="ml-2">
                        <input
                        type="text"
                        class="w-40 h-10 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        value="{{ $tchID }}"
                        name="tchID"
                        id="tchID"
                        />
                    </label>
                    @endif
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
            @if(!empty($notfound))
                <p class="ml-12 mt-5 text-red-600 text-sm">{{ $notfound }}</p>
            @endif
            @isset($results)
            <div class="flex flex-col ml-14 mr-14 mt-5 h-2/3 w-auto">
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
                                    <td class="px-6 py-4 text-center">
                                        {{ $result->ClassCode }}
                                    </td>
                                    <td class="px-6 py-4 text-center">{{ $result->ClassName }}</td>
                                    <td class="px-6 py-4 text-center">
                                        {{ $result->SectionNo }}
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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endisset
        </div>
        <div class="row-start-3 row-end-4 bg-white rounded-xl shadow-lg">
            <p class="ml-12 mt-8 text-2xl font-semibold text-darkblue2">Add new course to Teacher.</p>
            <form action="{{ route('admin.addToClass') }}" method="post">
                @csrf
                <div class="flex flex-row items-center ml-12 mt-5">
                    <p class="text-lg font-semibold text-kmutt-or">Teacher ID: </p>
                    <label class="ml-2">
                        <input
                        type="text"
                        class="w-40 h-10 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        placeholder="6xxxxxxxx"
                        name="tchID"
                        id="tchID"
                        />
                    </label>
                    <p class="text-lg font-semibold text-kmutt-or ml-5">ClassCode: </p>
                    <label class="ml-2">
                        <input
                        type="text"
                        class="w-40 h-10 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        placeholder="1xxxxxxxx"
                        name="ClassCode"
                        id="ClassCode"
                        />
                    </label>
                    <p class="text-lg font-semibold text-kmutt-or ml-5">SectionNo: </p>
                    <label class="ml-2">
                        <input
                        type="text"
                        class="w-40 h-10 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        placeholder="1xxxxxxxx"
                        name="SectionNo"
                        id="SectionNo"
                        />
                    </label>
                    <button type="submit" class="ml-5 w-16 h-10 focus:outline-none rounded-lg bg-green-400 hover:bg-green-500 hover:shadow-lg">
                        <span class="flex items-center justify-center text-white">
                            <svg class="h-6 w-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>  
                        </span>
                    </button>
                </div>
            </form>
            @if(!empty($success))
                <p class="ml-12 mt-3 text-md font-semibold text-green-400">{{ $success }}</p>
            @endif
            @if(!empty($failed))
                <p class="ml-12 mt-3 text-md font-semibold text-red-500">{{ $failed }}</p>
            @endif
        </div>
    </div>

@endsection