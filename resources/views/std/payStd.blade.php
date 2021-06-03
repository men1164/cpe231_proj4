@extends('layouts.SBstd')

@section('content')

    <div class="flex justify-center items-center ml-60 h-full bg-gray-200 p-8">
        <div class="w-5/6 h-3/5 bg-white rounded-xl shadow-xl">
            <p class="ml-12 mt-12 text-5xl font-semibold text-darkblue2">Payment</p>
            @if(!empty($notregis))
                <p class="ml-12 mt-2 text-lg font-semibold text-red-500">{{ $notregis }}</p>
            @elseif(!empty($paid))
                <p class="ml-12 mt-2 text-lg font-semibold text-green-400">{{ $paid }}</p>
            @else
                <form action="{{ route('paid') }}" method="post">
                @csrf
                <p class="ml-14 mt-5 text-lg font-semibold text-kmutt-or">Total Amount: {{ $fee }}</p>
                <div class="flex flex-row items-center ml-14 mt-5">
                    <p class="text-lg font-semibold text-kmutt-or">Card No. : </p>
                    <label class="ml-2">
                        <input
                        type="text"
                        class="w-60 h-10 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        placeholder="16-digit"
                        required
                        />
                    </label>
                    <p class="ml-6 text-lg font-semibold text-kmutt-or">CVC: </p>
                    <label class="ml-2">
                        <input
                        type="text"
                        class="w-20 h-10 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        placeholder="3-digit"
                        required
                        />
                    </label>
                </div>
                <div class="flex flex-row items-center ml-14 mt-5">
                    <p class="text-lg font-semibold text-kmutt-or">Holder Name: </p>
                    <label class="ml-2">
                        <input
                        type="text"
                        class="w-60 h-10 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        placeholder="Firstname Lastname"
                        required
                        />
                    </label>
                    <p class="ml-6 text-lg font-semibold text-kmutt-or">Expired Date: </p>
                    <label class="ml-2">
                        <input
                        type="text"
                        class="w-20 h-10 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        placeholder="MM/YY"
                        required
                        />
                    </label>
                </div>
                <div class="flex flex-row items-center ml-14 mt-5">
                    <button type="submit" class="w-16 h-10 focus:outline-none rounded-lg bg-green-400 hover:bg-green-500 hover:shadow-lg">
                        <span class="flex items-center justify-center text-white">
                            Pay
                        </span>
                    </button>
                </div>
                </form>
            @endif
        </div>
    </div>

@endsection