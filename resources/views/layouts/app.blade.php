<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <style>
        /* Styles for calculator form and table */
        body {
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .calculator-container {
            width: 400px;
            margin: auto;
            margin-top: 50px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px #ccc;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            text-align: center;
            color: #333;
            font-size: 24px;
            margin-top: 0;
            margin-bottom: 20px;
        }

        .calculator-form {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .calculator-form input[type="text"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-bottom: 2px solid #ccc;
            font-size: 16px;
            margin-bottom: 20px;
            color: #555;
        }

        .calculator-form button[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease-in-out;
        }

        .calculator-form button[type="submit"]:hover {
            background-color: #3e8e41;
        }

        .calculator-table {
            width: 100%;
            margin-top: 20px;
        }

        .calculator-table table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        .calculator-table th,
        .calculator-table td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        .calculator-table th {
            background-color: #4CAF50;
            color: #fff;
            font-size: 18px;
            font-weight: bold;
        }

        .calculator-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination a {
            display: inline-block;
            padding: 6px 12px;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -ms-touch-action: manipulation;
            touch-action: manipulation;
            cursor: pointer;
            border: 1px solid #ccc;
            border-radius: 4px;
            color: #333;
            background-color: #fff;
            transition: background-color 0.3s ease-in-out;
            margin: 0 5px;
        }

        .pagination a:hover,
        .pagination a:focus {
            color: #23527c;
            background-color: #eee;
            border-color: #adadad;
        }

        .pagination .active a,
        .pagination .active a:hover,
        .pagination .active a:focus {
            z-index: 2;
            color: #fff;
            background-color: #23527c;
            border-color: #23527c;
            cursor: default;
        }

        .pagination .disabled a,
        .pagination .disabled a:hover,
        .pagination .disabled a:focus {
            color: #777;
            cursor: not-allowed;
            background-color: #fff;
            border-color: #ccc;
        }
    </style>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
