@extends('layouts.SBstd')

@section('content')
    <div class="flex justify-center items-center ml-60 h-full bg-gray-200 p-8">
        <div class="w-5/6 h-5/6 bg-white rounded-xl shadow-xl">
            <p class="ml-12 mt-12 text-5xl font-semibold text-red-500">Withdraw</p>
            <p class="ml-12 mt-2 text-lg text-black">Select class to withdraw</p>
            @if($regisCount == 0)
                <p class="ml-12 mt-2 text-lg text-kmutt-or">You have not register for this semester yet.</p>
            @else
                <div class="flex flex-col ml-14 mr-14 mt-5 h-3/5 w-auto">
                    <div class="flex-grow overflow-auto">
                        <table class="relative w-full border rounded-3xl">
                            <thead>
                                <tr>
                                    <th class="sticky top-0 px-6 py-3 text-darkblue2 bg-white">ClassCode</th>
                                    <th class="sticky top-0 px-6 py-3 text-darkblue2 bg-white">ClassName</th>
                                    <th class="sticky top-0 px-6 py-3 text-darkblue2 bg-white">SectionNo</th>
                                    <th class="sticky top-0 px-6 py-3 text-red-500 bg-white">Withdraw</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-300 bg-gray-100">
                                @foreach($currentRegis as $sub)
                                <tr>
                                    <form action="{{ route('withdrawed') }}" method="POST">
                                        @csrf
                                        <td class="px-6 py-4 text-center">
                                            {{ $sub->ClassCode }}
                                            <input type="hidden" name="ClassCode" id="ClassCode" value="{{ $sub->ClassCode }}">
                                        </td>
                                        <td class="px-6 py-4 text-center">{{ $sub->ClassName }}</td>
                                        <td class="px-6 py-4 text-center">
                                            {{ $sub->SectionNo }}
                                            <input type="hidden" name="SectionNo" id="SectionNo" value="{{ $sub->SectionNo }}"> 
                                            <input type="hidden" name="RegisterID" id="RegisterID" value="{{ $sub->RegisterID }}">   
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
            @endif
        </div>
    </div>
@endsection