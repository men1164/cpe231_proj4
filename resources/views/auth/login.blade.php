@extends('layouts.loginTheme')
<!-- Log in (Student Role) -->
@section('content')
    <img src="css/kmutt-logo2.png" class="w-1/5 h-auto pb-7">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="w-80">
            <h2 class="text-2xl font-bold text-center text-kmutt-or">Sign in</h2>
            <div class="mt-8 max-w-md">
                <div class="grid grid-cols-1 gap-6">
                    <label class="block">
                        <input
                        type="text"
                        class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 @error('id') is-invalid @enderror"
                        placeholder="StudentID"
                        id="id"
                        name="id"
                        required
                        />
                    </label>
                    <label class="block">
                        <input
                        type="password"
                        class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 form-control @error('password') is-invalid @enderror"
                        placeholder="Password"
                        id="password"
                        name="password"
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
                    <div class='flex flex-col items-center w-full pt-6'>
                        <button type="submit" class="w-1/3 focus:outline-none text-white text-sm rounded-full py-3 px-6 bg-kmutt-or hover:bg-kmutt-hover hover:shadow-lg">
                            Submit
                        </button>
                    </div>     
                </div>
            </div> 
        </div>
    </form>
@endsection
