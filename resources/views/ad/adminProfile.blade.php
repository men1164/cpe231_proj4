@extends('layouts.SBad')

@section('content')
    <div class="flex justify-center items-center ml-60 h-full bg-gray-200 p-8">
        <form class="w-1/3" method="POST" action="{{ route('admin.updateProfile') }}">
            @csrf
            <h2 class="text-2xl font-bold text-center text-kmutt-or">Edit Profile</h2>
                <!-- Error Log -->
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
                <div class="mt-5">
                    @if(session('updatedWithPW'))
                        <p class="text-green-500 text-sm text-center mb-3">{{ session('updatedWithPW') }}</p>
                    @elseif(session('updated'))
                        <p class="text-green-500 text-sm text-center mb-3">{{ session('updated') }}</p>
                    @endif
                        <label class="block mb-2">
                            <span class="text-gray-700">Full Name:</span>
                            <input
                            type="text"
                            class="block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                            placeholder="Firstname"
                            id="FirstName"
                            name="FirstName"
                            value="{{ $profile->FirstName }}"
                            required
                            />
                        </label>
                        <label class="block mb-4">
                            <input
                            type="text"
                            class="block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                            placeholder="Lastname"
                            id="LastName"
                            name="LastName"
                            value="{{ $profile->LastName }}"
                            required
                            />
                        </label>
                        <label class="block mb-2">
                            <span class="text-gray-700">Change Password (not required):</span>
                            <input
                            type="password"
                            class="block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 @error('password') is-invalid @enderror"
                            placeholder="New Password"
                            id="password"
                            name="password"
                            />
                        </label>
                        <label class="block mb-5">
                            <input
                            type="password"
                            class="block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 @error('password') is-invalid @enderror"
                            placeholder="Confirm Password"
                            id="password_confirm"
                            name="password_confirmation"
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

@endsection