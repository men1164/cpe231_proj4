@extends('layouts.SBtch')

@section('content')
    <div class="flex justify-center items-center ml-60 h-full bg-gray-200 p-8">
        <div class="w-5/6 h-2/6 bg-white rounded-xl shadow-xl">
            <p class="ml-14 mt-10 text-2xl text-darkblue2">Select grade for {{ $stdID }} in {{ $ClassCode }} Section {{ $SectionNo }}.</p>
            <label class="ml-14">
                <span class="text-gray-700">Grade:</span>
                <select class="w-32 mt-10 rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0" name="ClassCode" id="ClassCode">
                    <option disabled selected>Select</option>
                    <option value="4">A</option>
                    <option value="3.5">B+</option>
                    <option value="3">B</option>
                    <option value="2.5">C+</option>
                    <option value="2">C</option>
                    <option value="1.5">D+</option>
                    <option value="1">D</option>
                    <option value="0">F</option>
                </select>
            </label>
            <button type="submit" class="ml-2 w-20 focus:outline-none text-white text-center text-sm rounded-xl py-3 px-6 bg-green-400 hover:bg-green-500 hover:shadow-lg">
                <span class="flex items-center justify-center text-white">
                    Submit
                </span>
            </button>
        </div>
    </div>
@endsection