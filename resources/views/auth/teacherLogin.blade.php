@extends('layouts.loginTheme')
<!-- Log in (Teacher Role) -->
@section('content')
    <img src="../css/kmutt-logo2.png" class="w-1/5 h-auto pb-7">
    <form method="POST" action="{{ route('teacher.login.submit') }}">
        @csrf
        <div class="w-80">
            <h2 class="text-2xl font-bold text-center text-kmutt-or">Sign in</h2>
            <p class="text-base text-center text-kmutt-or">(For Professor)</p>
            <div class="mt-8 max-w-md">
                <div class="grid grid-cols-1 gap-6">
                    <label class="block">
                        <input
                        type="text"
                        class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 @error('id') is-invalid @enderror"
                        placeholder="UserID"
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
