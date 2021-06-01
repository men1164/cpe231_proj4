@extends('layouts.regisTheme')

@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <h2 class="text-2xl font-bold text-center text-kmutt-or">Register (Complex Form #1)</h2>
            <!-- Error Log -->
            @error('id')
                <span class="text-red-600 text-sm" role="alert">
                    <strong>{{ $message }}</strong><br>
                </span>
            @enderror
            @error('password')
                <span class="text-red-600 text-sm" role="alert">
                    <strong>{{ $message }}</strong><br>
                </span>
            @enderror
            @error('FirstName')
                <span class="text-red-600 text-sm" role="alert">
                    <strong>{{ $message }}</strong><br>
                </span>
            @enderror
            @error('LastName')
                <span class="text-red-600 text-sm" role="alert">
                    <strong>{{ $message }}</strong><br>
                </span>
            @enderror
            @error('BirthDate')
                <span class="text-red-600 text-sm" role="alert">
                    <strong>{{ $message }}</strong><br>
                </span>
            @enderror
            @error('Gender')
                <span class="text-red-600 text-sm" role="alert">
                    <strong>{{ $message }}</strong><br>
                </span>
            @enderror
            @error('CitizenID')
                <span class="text-red-600 text-sm" role="alert">
                    <strong>{{ $message }}</strong><br>
                </span>
            @enderror
            @error('Email')
                <span class="text-red-600 text-sm" role="alert">
                    <strong>{{ $message }}</strong><br>
                </span>
            @enderror
            @error('Personal_email')
                <span class="text-red-600 text-sm" role="alert">
                    <strong>{{ $message }}</strong><br>
                </span>
            @enderror
            @error('Degree')
                <span class="text-red-600 text-sm" role="alert">
                    <strong>{{ $message }}</strong><br>
                </span>
            @enderror
            @error('ProgramID')
                <span class="text-red-600 text-sm" role="alert">
                    <strong>{{ $message }}</strong><br>
                </span>
            @enderror
            @error('Room')
                <span class="text-red-600 text-sm" role="alert">
                    <strong>{{ $message }}</strong><br>
                </span>
            @enderror
            @error('DateStarted')
                <span class="text-red-600 text-sm" role="alert">
                    <strong>{{ $message }}</strong><br>
                </span>
            @enderror
            <div class="grid grid-cols-1 gap-2 mt-8">
                    <label class="block mb-7">
                        <input
                        type="text"
                        class="block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 @error('id') is-invalid @enderror"
                        placeholder="StudentID"
                        id="id"
                        name="id"
                        required
                        />
                    </label>
                    <label class="block mb-2">
                        <input
                        type="password"
                        class="block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 @error('password') is-invalid @enderror"
                        placeholder="Password"
                        id="password"
                        name="password"
                        required
                        />
                    </label>
                    <label class="block mb-7">
                        <input
                        type="password"
                        class="block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 @error('password') is-invalid @enderror"
                        placeholder="Confirm Password"
                        id="password_confirm"
                        name="password_confirmation"
                        required
                        />
                    </label>
                    <label class="block mb-2">
                        <span class="text-gray-700">Full Name:</span>
                        <input
                        type="text"
                        class="block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                        placeholder="Firstname"
                        id="FirstName"
                        name="FirstName"
                        required
                        />
                    </label>
                    <label class="block mb-4">
                        <input
                        type="text"
                        class="block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                        placeholder="LastName"
                        id="LastName"
                        name="LastName"
                        required
                        />
                    </label>
                    <label class="block">
                        <span class="text-gray-700">Birthdate:</span>
                        <input
                        type="date"
                        class="block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                        id="BirthDate"
                        name="BirthDate"
                        />
                    </label>
                    <label class="block mb-2">
                        <span class="text-gray-700">Gender:</span>
                        <select class="block w-full mt-1 rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0" name="Gender" id="Gender">
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                            <option value="O">Other</option>
                        </select>
                    </label>
                    <label class="block mb-4">
                        <span class="text-gray-700">CitizenID:</span>
                        <input
                        type="text"
                        class="block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                        placeholder="12xxxxxxxxxx9"
                        id="CitizenID"
                        name="CitizenID"
                        required
                        />
                    </label>
                    <label class="block mb-2">
                        <span class="text-gray-700">Email:</span>
                        <input
                        type="text"
                        class="block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                        placeholder="sample@mail.kmutt.ac.th"
                        id="Email"
                        name="Email"
                        required
                        />
                    </label>
                    <label class="block mb-4">
                        <span class="text-gray-700">Personal Email:</span>
                        <input
                        type="text"
                        class="block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                        placeholder="sample@gmail.com"
                        id="Personal_email"
                        name="Personal_email"
                        required
                        />
                    </label>
                    <label class="block mb-2">
                        <span class="text-gray-700">Degree:</span>
                        <select class="block w-full mt-1 rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0" name="Degree" id="Degree">
                            <option value="Bachelor">Bachelor</option>
                            <option value="Master">Master</option>
                            <option value="Doctor">Doctor</option>
                        </select>
                    </label>
                    <label class="block mb-2">
                        <span class="text-gray-700">Faculty:</span>
                        <select id="faculty" name="faculty" class="block w-full mt-1 rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0">
                            <option value="" selected disabled>Select Faculty</option>
                            @foreach($facLists as $facList)
                            <option value="{{ $facList->FacultyID }}">{{ $facList->FacultyName }}</option>
                            @endforeach
                        </select>
                    </label>
                    <label class="block mb-2">
                        <span class="text-gray-700">Department:</span>
                        <select id="department" name="department" class="block w-full mt-1 rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0">
                        </select>
                    </label>
                    <label class="block mb-2">
                        <span class="text-gray-700">Program:</span>
                        <select id="ProgramID" name="ProgramID" class="block w-full mt-1 rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0">
                        </select>
                    </label>
                    <label class="block mb-2">
                        <span class="text-gray-700">Room:</span>
                        <select class="block w-full mt-1 rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0" name="Room" id="Room">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                    </label>
                    <label class="block">
                        <span class="text-gray-700">Date Started:</span>
                        <input
                        type="date"
                        class="block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                        id="DateStarted"
                        name="DateStarted"
                        />
                    </label>
                    <div class='flex justify-center w-full pt-6'>
                        <button type="submit" class="w-1/2 focus:outline-none text-white text-sm rounded-full py-3 px-6 bg-kmutt-or hover:bg-kmutt-hover hover:shadow-lg">
                            Submit
                        </button>
                    </div>
                  
                    <!-- <label class="block">
                        <span class="text-gray-700">When is your event?</span>
                        <input
                        type="date"
                        class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                        />
                    </label>
                    <label class="block">
                        <span class="text-gray-700">What type of event is it?</span>
                        <select
                        class="block w-full mt-1 rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                        >
                        <option>Corporate event</option>
                        <option>Wedding</option>
                        <option>Birthday</option>
                        <option>Other</option>
                        </select>
                    </label>
                    <label class="block">
                        <span class="text-gray-700">Additional details</span>
                        <textarea
                        class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                        rows="3"
                        ></textarea>
                    </label>    
                    <div class="block">
                        <div class="mt-2">
                            <div>
                                <label class="inline-flex items-center">
                                <input
                                type="checkbox"
                                class="rounded bg-gray-200 border-transparent focus:border-transparent focus:bg-gray-200 text-gray-700 focus:ring-1 focus:ring-offset-2 focus:ring-gray-500"
                                />
                                <span class="ml-2">Email me news and special offers</span>
                                </label>
                            </div>
                        </div>
                    </div> --> 
            </div>
    </form>

    <script type="text/javascript">
        $('#faculty').change(function(){ 
            var facID = $(this).val();  
            if(facID) {
                $.ajax({
                    type:"GET",
                    url:"{{ route('getDepartment') }}?FacultyID="+facID,
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
                $("#ProgramID").empty();
            }   
        });

        $('#department').on('change',function() {
            var depID = $(this).val();  
            if(depID) {
                $.ajax({
                    type:"GET",
                    url:"{{ route('getProgram') }}?DepartmentID="+depID,
                    success:function(res) {        
                        if(res) {
                            $("#ProgramID").empty();
                            $("#ProgramID").append('<option>Select Program</option>');
                            $.each(res,function(key,value) {
                                $("#ProgramID").append('<option value="'+key+'">'+value+'</option>');
                            });
                        } 
                        else {
                            $("#ProgramID").empty();
                        }
                    }
                });
            }
            else {
                $("#ProgramID").empty();
            }  
        });
    </script>

@endsection
