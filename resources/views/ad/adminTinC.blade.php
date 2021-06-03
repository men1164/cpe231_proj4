@extends('layouts.SBad')

@section('content')
    <div class="grid grid-rows-3 gap-8 ml-60 h-full bg-gray-200 p-8">
        <div class="row-start-1 row-end-3 bg-white rounded-xl shadow-lg">
            <p class="ml-12 mt-12 text-3xl font-semibold text-darkblue2">Current advisor lists.</p>
            <div class="flex flex-col ml-14 mr-14 mt-5 h-2/3 w-auto">
                <div class="flex-grow overflow-auto">
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
                                <tr>
                                    <td class="px-6 py-4 text-center">Column
                                    </td>
                                    <td class="px-6 py-4 text-center">Column</td>
                                    <td class="px-6 py-4 text-center">
                                        Column
                                    </td>
                                    <td class="px-6 py-4 text-center">Column</td>
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row-start-3 row-end-4 bg-white rounded-xl shadow-lg">
            <p class="ml-12 mt-8 text-2xl font-semibold text-darkblue2">Add new advisor lists.</p>
            
                <div class="flex flex-row items-center ml-12 mt-5">
                    <p class="text-lg font-semibold text-kmutt-or">Student ID: </p>
                    <label class="ml-2">
                        <input
                        type="text"
                        class="w-40 h-10 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        placeholder="6xxxxxxxx"
                        name="stdID"
                        id="stdID"
                        />
                    </label>
                    <p class="text-lg font-semibold text-kmutt-or ml-5">Teacher ID: </p>
                    <label class="ml-2">
                        <input
                        type="text"
                        class="w-40 h-10 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        placeholder="1xxxxxxxx"
                        name="tchID"
                        id="tchID"
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
        </div>
    </div>

@endsection