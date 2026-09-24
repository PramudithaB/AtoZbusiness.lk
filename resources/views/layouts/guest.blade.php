<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Lasindu Senarath LMS') }}</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('images/logo.jpeg') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CDN with Navy theme -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        navy: {
                            50: '#f0f5fa',
                            100: '#e1ecf6',
                            200: '#c5dcee',
                            300: '#99c3e2',
                            400: '#64a3d2',
                            500: '#2c6aa3',
                            600: '#1e5285',
                            700: '#163f68',
                            800: '#0f2b4c',
                            900: '#0a1d35',
                            950: '#061325',
                        },
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
        }
    </style>
</head>

<body class="font-sans text-slate-800 antialiased min-h-screen flex flex-col justify-center items-center p-4 bg-slate-100">
    
    <div class="mb-6 text-center">
        <a href="{{ route('login') }}" class="inline-flex flex-col items-center group">
            <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-navy-950 to-blue-700 p-0.5 shadow-lg shadow-blue-900/10 mb-2 transition group-hover:scale-105">
                <div class="w-full h-full bg-white rounded-[14px] flex items-center justify-center overflow-hidden">
                    <img src="{{ asset('images/logo.jpeg') }}" alt="Logo" class="w-full h-full object-cover">
                </div>
            </div>
            <span class="text-[10px] font-extrabold uppercase tracking-widest text-blue-700">AtoZ Business School</span>
            <span class="text-lg font-extrabold text-navy-950 tracking-tight">LASINDU SENARATH LMS</span>
        </a>
    </div>

    <div class="w-full sm:max-w-md bg-white p-8 rounded-3xl shadow-xl border border-slate-200/90">
        {{ $slot }}
    </div>

    <div class="mt-8 text-xs text-slate-400">
        &copy; 2026 Lasindu Senarath LMS
    </div>
</body>
</html>
