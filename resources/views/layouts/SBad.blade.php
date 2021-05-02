<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Student Registration</title>

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
        <!-- sidebar -->
        <div class="h-full w-60 p-4 bg-white shadow-xl fixed">
            <ul class="flex flex-col w-full">
                <li>
                    <a href="{{ route('admin.home') }}"
                    class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-500 hover:bg-gray-100">
                        <span class="flex items-center justify-center text-lg text-darkblue2">
                            <svg fill="none"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                class="h-6 w-6">
                                <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                        </span>
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <span class="flex font-medium text-sm text-gray-400 px-4 my-4 uppercase">Manager</span>
                </li>
                <li>
                    <a href="#"
                    class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-500 hover:bg-gray-100">
                        <span class="flex items-center justify-center text-lg text-green-400">
                            <svg class="h-6 w-6"
                                fill="none" 
                                viewBox="0 0 24 24" 
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </span>
                        <span class="ml-3">Register List</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.advise') }}"
                    class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-500 hover:bg-gray-100">
                        <span class="flex items-center justify-center text-lg text-darkblue2">
                            <svg class="h-6 w-6" 
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </span>
                        <span class="ml-3">Advisor</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                    class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-500 hover:bg-gray-100">
                        <span class="flex items-center justify-center text-lg text-darkblue2">
                            <svg class="h-6 w-6" 
                                fill="none" 
                                viewBox="0 0 24 24" 
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </span>
                        <span class="ml-3">Grader</span>
                    </a>
                </li>
                <li>
                    <span class="flex font-medium text-sm text-gray-400 px-4 my-4 uppercase">Account</span>
                </li>
                <li>
                    <a href="#"
                    class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-500 hover:bg-gray-100">
                        <span class="flex items-center justify-center text-lg text-darkblue2">
                            <svg fill="none"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                class="h-6 w-6">
                                <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </span>
                        <span class="ml-3">Profile</span>
                    </a>
                </li>
                <li>
                    <a  href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                        class="flex flex-row items-center h-12 px-4 rounded-lg text-gray-500 hover:bg-gray-100">
                        <span class="flex items-center justify-center text-lg text-red-400">
                            <svg class="h-6 w-6" 
                                fill="none" 
                                viewBox="0 0 24 24" 
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                        </span>
                        <span class="ml-3">Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
            <div class="flex justify-center">
                <div class="absolute bottom-5 text-xs text-center text-gray-400">
                    <span class="flex items-center justify-center text-gray-400 mb-2">
                        <a href="https://github.com/men1164/cpe231_proj4">
                            <svg class="h-5 w-5" 
                                fill="gray"
                                viewBox="0 0 24 24">
                                <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                            </svg>
                        </a>
                    </span>
                    <p>Kimetsu no Database 2</p>
                    <p>Copyright © 2021</p>
                </div>
            </div>
        </div>
        
        <!-- Content -->
        @yield('content')

    </body>
</html>