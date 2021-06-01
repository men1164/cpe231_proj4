@extends('layouts.regisTheme')

@section('content')
    <form method="post" action="{{ route('teacher.register.submit') }}">
        @csrf
            <h2 class="text-2xl font-bold text-center text-kmutt-or">Register (Complex Form #2)</h2>
            <p class="text-base text-center text-kmutt-or">Professor (Teacher) Role</p>

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
            
            <!-- Status message -->
            @if(session('success'))
                        <p class="text-green-500 text-sm text-center mt-3">{{ session('success') }}</p>
                    @elseif(session('failed'))
                        <p class="text-red-600 text-sm text-center mt-3">{{ session('failed') }}</p>
                    @endif
            <div class="grid grid-cols-1 gap-2 mt-8">
                    <label class="block mb-7">
                        <input
                        type="text"
                        class="block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 @error('id') is-invalid @enderror"
                        placeholder="UserID"
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
                    <label class="block mb-4">
                        <span class="text-gray-700">Graduated From:</span>
                        <input
                        type="text"
                        class="block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                        placeholder="Oxford"
                        id="Grad_from"
                        name="Grad_from"
                        required
                        />
                    </label>
                    <label class="block mb-2">
                        <span class="text-gray-700">Degree Graduated:</span>
                        <select class="block w-full mt-1 rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0" name="Grad_degree" id="Grad_degree">
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
                    <div class='flex justify-center w-full pt-6'>
                        <button type="submit" class="w-1/2 focus:outline-none text-white text-sm rounded-full py-3 px-6 bg-kmutt-or hover:bg-kmutt-hover hover:shadow-lg">
                            Submit
                        </button>
                    </div>
            </div>
    </form>
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
