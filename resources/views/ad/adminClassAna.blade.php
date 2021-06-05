@extends('layouts.SBad')

@section('content')
    <div class="flex justify-center items-center ml-60 h-full bg-gray-200 p-8">
        <div class="w-5/6 h-5/6 bg-white rounded-xl shadow-xl">
            <p class="ml-12 mt-12 text-5xl font-semibold text-darkblue2">Class Analysis</p>
            <p class="ml-12 mt-3 text-lg text-kmutt-or">See how many students enrolled each course. [Every Sections]</p>
            <div class="flex flex-row items-center ml-14 mt-3 w-full">
                <form action="{{ route('admin.showClassAnalysis') }}" method="post">
                    @csrf
                    <label>
                        <span class="text-gray-700">Faculty:</span>
                        <select id="faculty" name="faculty" class="w-48 mt-1 rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0">
                            <option value="" selected disabled>Select Faculty</option>
                            @foreach($facLists as $facList)
                            <option value="{{ $facList->FacultyID }}">{{ $facList->FacultyName }}</option>
                            @endforeach
                        </select>
                    </label>
                    <label class="ml-5">
                        <span class="text-gray-700">Department:</span>
                        <select class="w-32 mt-1 rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0" name="department" id="department">
                        </select>
                    </label>
                    <button type="submit" class="ml-4 mt-1 w-20 h-10 focus:outline-none rounded-lg bg-kmutt-or hover:bg-kmutt-hover hover:shadow-lg">
                        <span class="flex items-center justify-center text-white">
                            Submit
                        </span>
                    </button>
                </form>
            </div>
            @isset($classes)
                <div class="flex flex-col ml-14 mr-14 mt-5 h-1/2 w-auto">
                    <div class="flex-grow overflow-auto">
                        <table class="relative w-full border rounded-3xl">
                            <thead>
                                <tr>
                                    <th class="sticky top-0 px-6 py-3 text-darkblue2 bg-white">ClassCode</th>
                                    <th class="sticky top-0 px-6 py-3 text-darkblue2 bg-white">ClassName</th>
                                    <th class="sticky top-0 px-6 py-3 text-darkblue2 bg-white">Total Students</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-300 bg-gray-100">
                                @foreach($classes as $class)
                                <tr>
                                    <td class="px-6 py-4 text-center">{{ $class->ClassCode }}</td>
                                    <td class="px-6 py-4 text-center">{{ $class->ClassName }}</td>
                                    <td class="px-6 py-4 text-center">{{ $class->totalStd }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endisset
        </div>
    </div>
    <script type="text/javascript">
        $('#faculty').change(function(){ 
            var facID = $(this).val();  
            if(facID) {
                $.ajax({
                    type:"GET",
                    url:"{{ route('getDepartmentTch') }}?FacultyID="+facID,
                    success:function(res) {
                        if(res) {
                            $("#department").empty();
                            $("#department").append('<option>Select Department</option>');
                            $.each(res,function(key,value) {
                                $("#department").append('<option value="'+key+'">'+value+'</option>');
                            });
                        }
                        else {
                            $("#department").empty();
                        }
                    }
                });
            }
            else {
                $("#department").empty();
            }   
        });
    </script>
@endsection