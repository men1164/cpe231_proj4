@extends('layouts.regisTheme')

@section('content')
    <form method="POST" action="{{ route('teacher.register.submit') }}">
        @csrf
            <h2 class="text-2xl font-bold text-center text-kmutt-or">Register (Complex Form #2)</h2>
            <p class="text-base text-center text-kmutt-or">Professor (Teacher) Role</p>
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
                        <!-- Error Log -->
                        @error('id')
                            <span class="text-red-600 text-sm" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
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
                        placeholder="sample@gmail.com"
                        id="Grad_from"
                        name="Grad_from"
                        required
                        />
                    </label>
                    <label class="block mb-2">
                        <span class="text-gray-700">Degree Graduated:</span>
                        <select class="block w-full mt-1 rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0">
                            <option>Bachelor</option>
                            <option>Master</option>
                            <option>Doctor</option>
                        </select>
                    </label>
                    <label class="block mb-2">
                        <span class="text-gray-700">Faculty:</span>
                        <select class="block w-full mt-1 rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0">
                            <option>Engineering</option>
                            <option>Robotics</option>
                            <option>SoAD</option>
                        </select>
                    </label>
                    <label class="block mb-2">
                        <span class="text-gray-700">Department:</span>
                        <select class="block w-full mt-1 rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                        </select>
                    </label>
                    <div class='flex justify-center w-full pt-6'>
                        <button type="submit" class="w-1/2 focus:outline-none text-white text-sm rounded-full py-3 px-6 bg-kmutt-or hover:bg-kmutt-hover hover:shadow-lg">
                            Submit
                        </button>
                    </div>
            </div>
    </form>
@endsection
