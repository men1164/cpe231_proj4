@extends('layouts.SBstd')

@section('content')

    <div class="flex justify-center items-center ml-60 h-full bg-gray-200 p-8">
        <div class="w-5/6 h-5/6 bg-white rounded-xl shadow-xl">
            <p class="ml-12 mt-12 text-5xl font-semibold text-darkblue2">Grade results</p>
            @if($regisCount == 0)
            <p class="ml-12 mt-3 text-xl text-kmutt-or">You didn't enroll any class.</p>
            @else
            <p class="ml-12 mt-3 text-xl text-kmutt-or">Current GPAX: </p>
            <div class="flex flex-col ml-14 mr-14 mt-6 h-3/5 w-auto">
                <div class="flex-grow overflow-auto">
                    <table class="relative w-full border rounded-3xl">
                        <thead>
                            <tr>
                                <th class="sticky top-0 px-6 py-3 text-darkblue2 bg-white">ClassCode</th>
                                <th class="sticky top-0 px-6 py-3 text-darkblue2 bg-white">ClassName</th>
                                <th class="sticky top-0 px-6 py-3 text-darkblue2 bg-white">Grade</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-300 bg-gray-100">
                            @foreach($currentRegis as $list)
                            <tr>
                                <td class="px-6 py-4 text-center">{{ $list->ClassCode }}</td>
                                <td class="px-6 py-4 text-center">{{ $list->ClassName }}</td>
                                @if($list->Grade == NULL)
                                    <td class="px-6 py-4 text-center">-</td>
                                @else
                                    @if($list->Grade == 4)
                                        <td class="px-6 py-4 text-center">A</td>
                                    @elseif($list->Grade == 3.5)
                                        <td class="px-6 py-4 text-center">B+</td>
                                    @elseif($list->Grade == 3)
                                        <td class="px-6 py-4 text-center">B</td>
                                    @elseif($list->Grade == 2.5)
                                        <td class="px-6 py-4 text-center">C+</td>
                                    @elseif($list->Grade == 2)
                                        <td class="px-6 py-4 text-center">C</td>
                                    @elseif($list->Grade == 1.5)
                                        <td class="px-6 py-4 text-center">D+</td>
                                    @elseif($list->Grade == 1)
                                        <td class="px-6 py-4 text-center">D</td>
                                    @elseif($list->Grade == 0)
                                        <td class="px-6 py-4 text-center">F</td>
                                    @endif
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif
        </div>
    </div>

@endsection