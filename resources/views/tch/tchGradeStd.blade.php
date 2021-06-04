@extends('layouts.SBtch')

@section('content')
    <div class="flex justify-center items-center ml-60 h-full bg-gray-200 p-8">
        <div class="w-5/6 h-2/5 bg-white rounded-xl shadow-xl">
            <p class="ml-14 mt-10 text-2xl text-darkblue2">Select grade for {{ $stdID }} in {{ $ClassCode }} Section {{ $SectionNo }}.</p>
            <form action="{{ route('teacher.grading') }}" method="post">
                @csrf
                <label class="ml-14">
                    <span class="text-gray-700">Grade:</span>
                    @if(empty($grade))
                    <select class="w-32 mt-5 rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0" name="Grade" id="Grade">
                        <option value="" selected>Select</option>
                        <option value="4">A</option>
                        <option value="3.5">B+</option>
                        <option value="3">B</option>
                        <option value="2.5">C+</option>
                        <option value="2">C</option>
                        <option value="1.5">D+</option>
                        <option value="1">D</option>
                        <option value="0">F</option>
                    </select>
                    @else
                    <select class="w-32 mt-5 rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0" name="Grade" id="Grade">
                        @if($grade == 4)
                            <option value="">Set back to NULL</option>
                            <option value="4" selected>A</option>
                            <option value="3.5">B+</option>
                            <option value="3">B</option>
                            <option value="2.5">C+</option>
                            <option value="2">C</option>
                            <option value="1.5">D+</option>
                            <option value="1">D</option>
                            <option value="0">F</option>
                        @elseif($grade == 3.5)
                            <option value="">Set back to NULL</option>
                            <option value="4">A</option>
                            <option value="3.5" selected>B+</option>
                            <option value="3">B</option>
                            <option value="2.5">C+</option>
                            <option value="2">C</option>
                            <option value="1.5">D+</option>
                            <option value="1">D</option>
                            <option value="0">F</option>
                        @elseif($grade == 3)
                            <option value="">Set back to NULL</option>
                            <option value="4">A</option>
                            <option value="3.5">B+</option>
                            <option value="3" selected>B</option>
                            <option value="2.5">C+</option>
                            <option value="2">C</option>
                            <option value="1.5">D+</option>
                            <option value="1">D</option>
                            <option value="0">F</option>
                        @elseif($grade == 2.5)
                            <option value="">Set back to NULL</option>
                            <option value="4">A</option>
                            <option value="3.5">B+</option>
                            <option value="3">B</option>
                            <option value="2.5" selected>C+</option>
                            <option value="2">C</option>
                            <option value="1.5">D+</option>
                            <option value="1">D</option>
                            <option value="0">F</option>
                        @elseif($grade == 2)
                            <option value="">Set back to NULL</option>
                            <option value="4">A</option>
                            <option value="3.5">B+</option>
                            <option value="3">B</option>
                            <option value="2.5">C+</option>
                            <option value="2" selected>C</option>
                            <option value="1.5">D+</option>
                            <option value="1">D</option>
                            <option value="0">F</option>
                        @elseif($grade == 1.5)
                            <option value="">Set back to NULL</option>
                            <option value="4">A</option>
                            <option value="3.5">B+</option>
                            <option value="3">B</option>
                            <option value="2.5">C+</option>
                            <option value="2">C</option>
                            <option value="1.5" selected>D+</option>
                            <option value="1">D</option>
                            <option value="0">F</option>
                        @elseif($grade == 1)
                            <option value="">Set back to NULL</option>
                            <option value="4">A</option>
                            <option value="3.5">B+</option>
                            <option value="3">B</option>
                            <option value="2.5">C+</option>
                            <option value="2">C</option>
                            <option value="1.5">D+</option>
                            <option value="1" selected>D</option>
                            <option value="0">F</option>
                        @elseif($grade == 0)
                            <option value="">Set back to NULL</option>
                            <option value="4">A</option>
                            <option value="3.5">B+</option>
                            <option value="3">B</option>
                            <option value="2.5">C+</option>
                            <option value="2">C</option>
                            <option value="1.5">D+</option>
                            <option value="1">D</option>
                            <option value="0" selected>F</option>
                        @endif
                    </select>
                    @endif
                </label>
                <input type="hidden" name="ClassCode" value="{{ $ClassCode }}">
                <input type="hidden" name="SectionNo" value="{{ $SectionNo }}">
                <input type="hidden" name="RegisterID" value="{{ $RegisterID }}">
                <input type="hidden" name="stdID" value="{{ $stdID }}">
                <button type="submit" class="ml-2 w-20 focus:outline-none text-white text-center text-sm rounded-xl py-3 px-6 bg-green-400 hover:bg-green-500 hover:shadow-lg">
                    <span class="flex items-center justify-center text-white">
                        Submit
                    </span>
                </button>
            </form>
            @if(!empty($havegrade))
                <p class="ml-14 mt-3 text-base text-green-400">{{ $havegrade }}</p>
            @endif
            <form action="{{ route('teacher.stdListsGrader') }}" method="post">
                @csrf
                <input type="hidden" name="ClassCode" value="{{ $ClassCode }}">
                <input type="hidden" name="SectionNo" value="{{ $SectionNo }}">
                <button type="submit" class="ml-14 w-24 h-10 mt-5 focus:outline-none rounded-lg bg-kmutt-or hover:bg-kmutt-hover hover:shadow-lg">
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
            </form>
        </div>
    </div>
@endsection