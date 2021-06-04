@extends('layouts.SBtch')

@section('content')
    <div class="flex justify-center items-center ml-60 h-full bg-gray-200 p-8">
        <div class="w-5/6 h-5/6 bg-white rounded-xl shadow-xl">
            @if(empty($ClassCode))
                <p class="ml-12 mt-12 text-5xl font-semibold text-darkblue2">Grader</p>
            @else
                <p class="ml-12 mt-12 text-5xl font-semibold text-darkblue2">Grader for {{ $ClassCode }} Section {{ $SectionNo }}</p>
            @endif
            <p class="ml-14 mt-2 text-xl text-black">Select the class you want to grade.</p>
            <div class="flex flex-row items-center ml-14 mt-3 w-full">
                <form action="{{ route('teacher.stdListsGrader') }}" method="post">
                    @csrf
                    <label>
                        <span class="text-gray-700">ClassCode:</span>
                        <select class="w-32 mt-1 rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0" name="ClassCode" id="ClassCode">
                            <option disabled selected>Select</option>
                            @foreach($results as $result)
                                <option value="{{ $result->ClassCode }}">{{ $result->ClassCode }}</option>
                            @endforeach
                        </select>
                    </label>
                    <label class="ml-5">
                        <span class="text-gray-700">Section:</span>
                        <select class="w-32 mt-1 rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0" name="SectionNo" id="SectionNo">
                        </select>
                    </label>
                    <button type="submit" class="ml-4 mt-1 w-20 h-10 focus:outline-none rounded-lg bg-kmutt-or hover:bg-kmutt-hover hover:shadow-lg">
                        <span class="flex items-center justify-center text-white">
                            Submit
                        </span>
                    </button>
                </form>
            </div>
            @isset($lists)
                @if($lists->count() == 0)
                    <p class="ml-14 mt-5 text-red-600 text-sm">No students has enrolled this class.</p>
                @else
                    <p class="ml-14 mt-2 text-xl text-kmutt-or">Total {{ $lists->count() }} students.</p>
                    <div class="flex flex-col ml-14 mr-14 mt-2 h-3/5 w-auto">
                        <div class="flex-grow overflow-auto">
                            <table class="relative w-full border rounded-3xl">
                                <thead>
                                    <tr>
                                        <th class="sticky top-0 px-6 py-3 text-darkblue2 bg-white">StudentID</th>
                                        <th class="sticky top-0 px-6 py-3 text-darkblue2 bg-white">Firstname</th>
                                        <th class="sticky top-0 px-6 py-3 text-darkblue2 bg-white">Department</th>
                                        <th class="sticky top-0 px-6 py-3 text-darkblue2 bg-white">Has Graded</th>
                                        <th class="sticky top-0 px-6 py-3 text-green-400 bg-white">Grade Input</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-300 bg-gray-100">
                                    @foreach($lists as $list)
                                        <tr>
                                            <td class="px-6 py-4 text-center">{{ $list->stdID }}</td>
                                            <td class="px-6 py-4 text-center">{{ $list->FirstName }}</td>
                                            <td class="px-6 py-4 text-center">{{ $list->DepartmentName }}</td>
                                            <td class="px-6 py-4 text-center">
                                                @if($list->Grade == NULL)
                                                <span class="flex items-center justify-center text-red-500">
                                                    <svg class="h-5 w-5" 
                                                        viewBox="0 0 20 20" 
                                                        fill="currentColor">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                                    </svg>
                                                </span>
                                                @else
                                                <span class="flex items-center justify-center text-green-500">
                                                    <svg class="h-5 w-5" 
                                                        viewBox="0 0 20 20" 
                                                        fill="currentColor">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                    </svg>
                                                </span>
                                                @endif
                                            </td>
                                            <form action="#" method="post">
                                                <td class="px-6 py-4 text-center flex flex-row items-center justify-center">
                                                    <input type="hidden" name="ClassCode" value="{{ $ClassCode }}">
                                                    <input type="hidden" name="SectionNo" value="{{ $SectionNo }}">
                                                    <input type="hidden" name="RegisterID" value="{{ $list->RegisterID }}">
                                                    <button type="submit">
                                                        <span class="flex items-center justify-center text-darkblue2">
                                                            <svg class="h-5 w-5" 
                                                                viewBox="0 0 20 20" 
                                                                fill="currentColor">
                                                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
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
            @endisset
        </div>
    </div>
    <script type="text/javascript">
        $('#ClassCode').change(function(){ 
            var cc = $(this).val();  
            if(cc) {
                $.ajax({
                    type:"GET",
                    url:"{{ route('getSectionTch') }}?ClassCode="+cc,
                    success:function(res) {
                        if(res) {
                            $("#SectionNo").empty();
                            $("#SectionNo").append('<option disabled>Select Section</option>');
                            $.each(res,function(key,value) {
                                $("#SectionNo").append('<option value="'+key+'">'+value+'</option>');
                            });
                        }
                        else {
                            $("#SectionNo").empty();
                        }
                    }
                });
            }
            else {
                $("#SectionNo").empty();
            }   
        });
    </script>
@endsection