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

        <!-- Styles -->
     

        <style>
            body, html {
                font-family: 'Nunito', sans-serif;
                height: 100%;
            }
        </style>
    </head>
    <body>
        <div class="grid place-items-center bg-white w-full h-auto p-8">
                @yield('content')
        </div>
    </body>
</html>
