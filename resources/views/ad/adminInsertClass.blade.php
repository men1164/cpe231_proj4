@extends('layouts.SBad')

@section('content')
    <div class="flex justify-center items-center ml-60 h-auto bg-gray-200 p-8">
        <form class="w-1/3" method="POST" action="{{ route('admin.insertClass') }}">
            @csrf
            <h2 class="text-2xl font-bold text-center text-kmutt-or">Insert New Class</h2>
            @isset($completed)
                <p class="text-green-500 text-sm text-center mt-3">{{ $completed }}</p>
            @endisset
                <div class="mt-5">
                        <label class="block mb-2">
                            <span class="text-gray-700">Faculty:</span>
                            <select id="faculty" name="faculty" class="block w-full mt-1 rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0" required>
                                <option value="" selected disabled>Select Faculty</option>
                                @foreach($facLists as $facList)
                                <option value="{{ $facList->FacultyID }}">{{ $facList->FacultyName }}</option>
                                @endforeach
                            </select>
                        </label>
                        <label class="block mb-2">
                            <span class="text-gray-700">Department:</span>
                            <select id="department" name="department" class="block w-full mt-1 rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0" required>
                            </select>
                        </label>
                        <label class="block mb-2">
                            <span class="text-gray-700">ClassCode:</span>
                            <input
                            type="text"
                            class="block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                            placeholder="XXXxxx"
                            id="ClassCode"
                            name="ClassCode"
                            required
                            />
                        </label>
                        <label class="block mb-2">
                            <span class="text-gray-700">ClassName:</span>
                            <input
                            type="text"
                            class="block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                            id="ClassName"
                            name="ClassName"
                            required
                            />
                        </label>
                        <label class="block mb-2">
                            <span class="text-gray-700">Section:</span>
                            <input
                            type="number"
                            class="block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                            id="SectionNo"
                            name="SectionNo"
                            required
                            />
                        </label>
                        <label class="block mb-2">
                            <span class="text-gray-700">Credit:</span>
                            <input
                            type="number"
                            class="block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                            id="Credit"
                            name="Credit"
                            required
                            />
                        </label>
                        <label class="block mb-2">
                            <span class="text-gray-700">Date:</span>
                            <select id="Day" name="Day" class="block w-full mt-1 rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0" required>
                                <option value="" selected disabled>Select Day</option>
                                <option value="Mon">Monday</option>
                                <option value="Tue">Tuesday</option>
                                <option value="Wed">Wednesday</option>
                                <option value="Thu">Thursday</option>
                                <option value="Fri">Friday</option>
                                <option value="Sat">Saturday</option>
                                <option value="Sun">Sunday</option>
                            </select>
                        </label>
                        <label class="block mb-2">
                            <span class="text-gray-700">Time Start:</span>
                            <input
                            type="time"
                            class="block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                            id="TimeStart"
                            name="TimeStart"
                            required
                            />
                        </label>
                        <label class="block mb-2">
                            <span class="text-gray-700">Time End:</span>
                            <input
                            type="time"
                            class="block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                            id="TimeEnd"
                            name="TimeEnd"
                            required
                            />
                        </label>
                        <div class='flex justify-center w-full pt-6'>
                            <button type="submit" class="w-1/2 focus:outline-none text-white text-sm rounded-full py-3 px-6 bg-kmutt-or hover:bg-kmutt-hover hover:shadow-lg">
                                Submit
                            </button>
                        </div>
                </div>
        </form>
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
                            $("#department").append('<option disabled selected>Select Department</option>');
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