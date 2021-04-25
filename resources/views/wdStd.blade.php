@extends('layouts.SBstd')

@section('content')
    <div class="flex justify-center items-center ml-60 h-full bg-gray-200 p-8">
        <div class="w-5/6 h-5/6 bg-white rounded-xl shadow-xl">
            <p class="ml-12 mt-12 text-5xl font-semibold text-red-500">Withdraw</p>
            <p class="ml-12 mt-2 text-lg text-black">Select class to withdraw</p>
            <div class="flex flex-col ml-14 mr-14 mt-6 h-3/5 w-auto">
                <div class="flex-grow overflow-auto">
                    <table class="relative w-full border rounded-3xl">
                        <thead>
                            <tr>
                                <th class="sticky top-0 px-6 py-3 text-darkblue2 bg-white">Header</th>
                                <th class="sticky top-0 px-6 py-3 text-darkblue2 bg-white">Header</th>
                                <th class="sticky top-0 px-6 py-3 text-darkblue2 bg-white">Header</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-300 bg-gray-100">
                            <tr>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection