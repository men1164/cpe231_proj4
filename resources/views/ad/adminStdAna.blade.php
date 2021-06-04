@extends('layouts.SBad')

@section('content')
    <div class="flex justify-center items-center ml-60 h-full bg-gray-200 p-8">
        <div class="w-5/6 h-5/6 bg-white rounded-xl shadow-xl">
            <p class="ml-12 mt-12 text-5xl font-semibold text-darkblue2">Student Analysis</p>
            <p class="ml-12 mt-3 text-lg text-kmutt-or">See how many students in each department.</p>
            <div class="flex flex-row items-center ml-14 mt-3 w-full">
                <form action="{{ route('admin.showStdAnalysis') }}" method="post">
                    @csrf
                    <label>
                        <span class="text-gray-700">Faculty:</span>
                        <select id="faculty" name="faculty" class="w-auto mt-1 rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0">
                            <option value="" selected disabled>Select Faculty</option>
                            @foreach($facLists as $facList)
                            <option value="{{ $facList->FacultyID }}">{{ $facList->FacultyName }}</option>
                            @endforeach
                        </select>
                    </label>
                    <button type="submit" class="ml-4 mt-1 w-20 h-10 focus:outline-none rounded-lg bg-kmutt-or hover:bg-kmutt-hover hover:shadow-lg">
                        <span class="flex items-center justify-center text-white">
                            Submit
                        </span>
                    </button>
                </form>
            </div>
            @isset($stdLists)
                <p class="ml-14 mt-3 text-base text-green-500">{{ $facSelected }}</p>
                <div class="flex flex-col ml-14 mr-14 mt-2 h-1/2 w-auto">
                    <div class="flex-grow overflow-auto">
                        <table class="relative w-full border rounded-3xl">
                            <thead>
                                <tr>
                                    <th class="sticky top-0 px-6 py-3 text-darkblue2 bg-white">Department</th>
                                    <th class="sticky top-0 px-6 py-3 text-darkblue2 bg-white">Program</th>
                                    <th class="sticky top-0 px-6 py-3 text-darkblue2 bg-white">Total Students</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-300 bg-gray-100">
                                @foreach($stdLists as $list)
                                <tr>
                                    <td class="px-6 py-4 text-center">{{ $list->DepartmentName }}</td>
                                    <td class="px-6 py-4 text-center">{{ $list->ProgramName }}</td>
                                    <td class="px-6 py-4 text-center">{{ $list->totalStd }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endisset
        </div>
    </div>
@endsection