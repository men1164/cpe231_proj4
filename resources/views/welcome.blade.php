<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sign in</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="icon" href="/css/kmutt-logo.ico" type="image/icon type">

        <style>
            body, html {
                font-family: 'Nunito', sans-serif;
                height: 100%;
            }
        </style>
    </head>
    <body>
        <div class="grid place-items-center bg-gray-200 h-full">
            <div class="flex flex-col items-center justify-center bg-white w-4/5 h-3/5 rounded-2xl shadow-2xl">
                <p class="text-5xl text-darkblue2">Welcome to Student Registration</p>
                <p class="text-base mt-2 text-darkblue2">by Kimetsu no Database 2</p>
                <p class="text-xl text-black mt-6">Sign in as (Role)</p>
                <div class="flex flex-row justify-center items-center mt-4 w-4/5">
                    <a href="{{ route('login') }}" class="w-1/6 focus:outline-none text-white text-center text-sm rounded-full py-3 px-6 bg-kmutt-or hover:bg-kmutt-hover hover:shadow-lg">Student</a>
                    <a href="{{ route('teacher.login') }}" class="w-1/6 focus:outline-none text-white text-center text-sm rounded-full py-3 px-6 ml-6 bg-kmutt-or hover:bg-kmutt-hover hover:shadow-lg">Teacher</a>
                    <a href="{{ route('admin.login') }}" class="w-1/6 focus:outline-none text-white text-center text-sm rounded-full py-3 px-6 ml-6 bg-kmutt-or hover:bg-kmutt-hover hover:shadow-lg">Admin</a>
                </div>

                    <!--<a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Teacher</a>
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Admin</a> -->

                <p class="text-xl text-black mt-9">Register new account</p>        
                <div class="flex flex-row justify-center items-center mt-4 w-4/5">
                    <a href="{{ route('register') }}" class="w-1/5 focus:outline-none text-white text-center text-sm rounded-full py-3 px-6 bg-kmutt-or hover:bg-kmutt-hover hover:shadow-lg">Student Register</a>
                    <a href="{{ route('teacher.register') }}" class="w-1/5 focus:outline-none text-white text-center text-sm rounded-full py-3 px-6 ml-6 bg-kmutt-or hover:bg-kmutt-hover hover:shadow-lg">Teacher Register</a>      
                </div>              
            </div>
        </div>
    </body>
</html>
