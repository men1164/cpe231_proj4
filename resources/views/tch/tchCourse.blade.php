@extends('layouts.SBtch')

@section('content')
    <div class="flex justify-center items-center ml-60 h-full bg-gray-200 p-8">
        <div class="w-5/6 h-5/6 bg-white rounded-xl shadow-xl">
            <p class="ml-12 mt-12 text-5xl font-semibold text-darkblue2">Classes Manager</p>
            <p class="ml-14 mt-2 text-xl text-black">Your current responsible class.</p>
            @if($results->count() != 0)
            <div class="flex flex-col ml-14 mr-14 mt-5 h-3/5 w-auto">
                <div class="flex-grow overflow-auto">
                    <table class="relative w-full border rounded-3xl">
                        <thead>
                            <tr>
                                <th class="sticky top-0 px-6 py-3 text-darkblue2 bg-white">ClassCode</th>
                                <th class="sticky top-0 px-6 py-3 text-darkblue2 bg-white">ClassName</th>
                                <th class="sticky top-0 px-6 py-3 text-darkblue2 bg-white">Section</th>
                                <th class="sticky top-0 px-6 py-3 text-green-400 bg-white">See students list</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-300 bg-gray-100">
                            @foreach($results as $result)
                            <form action="{{ route('teacher.seeStdLists') }}" method="post">
                                @csrf
                                <tr>
                                    <td class="px-6 py-4 text-center">
                                        {{ $result->ClassCode }}
                                        <input type="hidden" name="ClassCode" value="{{ $result->ClassCode }}">
                                    </td>
                                    <td class="px-6 py-4 text-center">{{ $result->ClassName }}</td>
                                    <td class="px-6 py-4 text-center">
                                        {{ $result->SectionNo }}
                                        <input type="hidden" name="SectionNo" value="{{ $result->SectionNo }}">
                                    </td>
                                    <td class="flex items-center justify-center px-6 py-4 text-center">
                                        <button type="submit" class="w-6 h-6 focus:outline-none rounded-full bg-green-400 hover:bg-green-500 hover:shadow-lg">
                                            <span class="flex items-center justify-center text-white">
                                                <svg class="h-5 w-5"
                                                    fill="none" 
                                                    viewBox="0 0 24 24" 
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                                </svg> 
                                            </span>
                                        </button>
                                    </td>
                                </tr>
                            </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @else
            <p class="ml-14 mt-3 text-md font-semibold text-red-500">You don't have any class in your responsibility.</p>
            @endif
        </div>
    </div>
@endsection