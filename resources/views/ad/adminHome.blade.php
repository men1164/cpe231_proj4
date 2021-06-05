@extends('layouts.SBad')

@section('content')
    <div class="flex justify-center items-center ml-60 h-full bg-gray-200 p-8">
        <div class="flex flex-col p-10 items-center justify-center w-5/6 h-auto bg-white rounded-xl shadow-xl">
            <p class="text-5xl font-semibold text-darkblue2 text-center">Welcome, </p>
            <p class="mt-2 text-5xl font-semibold text-darkblue2 text-center">Admin {{ Auth::id() }}</p>
            <p class="mt-7 text-lg text-black text-center">You can manage and access the data.</p>
        </div>
    </div>

@endsection
