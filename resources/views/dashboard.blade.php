<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Lasindu Senarath LMS - AtoZ Business School</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('images/logo.jpeg') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Noto+Sans+Sinhala:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    
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
                        brand: {
                            blue: '#1d4ed8',
                            dark: '#07152b',
                            accent: '#38bdf8',
                        }
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        sinhala: ['"Noto Sans Sinhala"', '"Plus Jakarta Sans"', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
            color: #0f172a;
        }

        /* ---------------- Page Load Animation Styles ---------------- */
        #lms-loader {
            position: fixed;
            inset: 0;
            z-index: 9999;
            background: #061325;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            transition: opacity 0.5s cubic-bezier(0.4, 0, 0.2, 1), visibility 0.5s;
        }
        #lms-loader.loaded {
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
        }
        .typewriter-cursor {
            display: inline-block;
            width: 3px;
            height: 1.1em;
            background: #38bdf8;
            margin-left: 4px;
            vertical-align: middle;
            animation: blink 0.7s infinite;
        }
        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0; }
        }

        /* Accordion transition */
        .accordion-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.35s ease-out;
        }
        .accordion-active .accordion-content {
            max-height: 3500px;
        }
        .accordion-active .rotate-icon {
            transform: rotate(180deg);
        }

        .hero-gradient {
            background: radial-gradient(circle at 85% 15%, rgba(56, 189, 248, 0.2) 0%, transparent 60%),
                        radial-gradient(circle at 15% 85%, rgba(29, 78, 216, 0.25) 0%, transparent 60%),
                        #0a1d35;
        }
    </style>
</head>

<body class="antialiased min-h-screen flex flex-col">

    <!-- ==============================================================
         6. PAGE LOAD ANIMATION: "LASINDU SENARATH"
         Displays letter-by-letter for ~2s on initial page load / refresh
    ============================================================== -->
    <div id="lms-loader" aria-hidden="true">
        <div class="flex flex-col items-center text-center px-4 max-w-lg">
            
            <!-- Animated Brand Badge -->
            <div class="w-16 h-16 rounded-2xl bg-gradient-to-tr from-blue-600 to-sky-400 p-0.5 shadow-xl shadow-blue-500/25 mb-6 animate-pulse">
                <div class="w-full h-full bg-navy-950 rounded-[14px] flex items-center justify-center overflow-hidden">
                    <img src="{{ asset('images/logo.jpeg') }}" alt="Logo" class="w-full h-full object-cover">
                </div>
            </div>

            <p class="text-[11px] font-bold uppercase tracking-[0.3em] text-sky-400 mb-3">
                AtoZ Business School LMS
            </p>

            <!-- Letter by letter display -->
            <div class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white mb-3 min-h-[50px] flex items-center justify-center">
                <span id="loader-text" class="bg-gradient-to-r from-white via-blue-100 to-sky-300 bg-clip-text text-transparent"></span>
                <span class="typewriter-cursor"></span>
            </div>

            <p id="loader-sub" class="text-xs sm:text-sm text-slate-400 opacity-0 transition-opacity duration-300 font-medium">
                Advanced Level Business Studies • Loading Portal
            </p>
            
            <div class="w-36 h-1 bg-white/10 rounded-full mt-6 overflow-hidden">
                <div class="w-full h-full bg-gradient-to-r from-blue-500 to-sky-400 rounded-full origin-left animate-[loaderBar_1.8s_ease-in-out_forwards]"></div>
            </div>
        </div>
    </div>

    <!-- Keyframe animation for progress bar -->
    <style>
        @keyframes loaderBar {
            0% { transform: scaleX(0); }
            50% { transform: scaleX(0.7); }
            100% { transform: scaleX(1); }
        }
    </style>

    <!-- ==============================================================
         HEADER / NAVIGATION
    ============================================================== -->
    <nav class="bg-white/90 backdrop-blur-md border-b border-slate-200/80 sticky top-0 left-0 right-0 z-50 transition-all">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                
                <!-- LMS Brand Logo -->
                <div class="flex items-center gap-3">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group">
                        <div class="w-11 h-11 rounded-xl bg-gradient-to-tr from-navy-900 to-blue-700 p-0.5 shadow-md shadow-blue-900/10 transition group-hover:scale-105">
                            <div class="w-full h-full bg-white rounded-[10px] flex items-center justify-center overflow-hidden">
                                <img src="{{ asset('images/logo.jpeg') }}" alt="AtoZ Logo" class="w-full h-full object-cover">
                            </div>
                        </div>
                        <div>
                            <div class="flex items-center gap-1.5">
                                <span class="text-[10px] font-extrabold text-blue-700 uppercase tracking-widest">AtoZ LMS</span>
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                            </div>
                            <span class="text-lg font-extrabold text-navy-950 tracking-tight block leading-none">
                                LASINDU SENARATH
                            </span>
                        </div>
                    </a>
                </div>

                <!-- Desktop Nav Links -->
                <div class="hidden md:flex items-center space-x-1 lg:space-x-2">
                    <a href="{{ route('dashboard') }}" 
                       class="px-3.5 py-2 rounded-xl text-sm font-bold text-navy-900 bg-navy-50 flex items-center gap-2">
                        <i data-lucide="layout-dashboard" class="w-4 h-4 text-blue-600"></i> Home
                    </a>
                    
                    <a href="{{ route('buyclass') }}" 
                       class="px-3.5 py-2 rounded-xl text-sm font-semibold text-slate-600 hover:text-navy-900 hover:bg-slate-50 transition flex items-center gap-2">
                        <i data-lucide="book-open" class="w-4 h-4 text-slate-400"></i> Courses
                    </a>

                    <a href="{{ route('store') }}" 
                       class="px-3.5 py-2 rounded-xl text-sm font-semibold text-slate-600 hover:text-navy-900 hover:bg-slate-50 transition flex items-center gap-2">
                        <i data-lucide="shopping-bag" class="w-4 h-4 text-slate-400"></i> Store
                    </a>

                    <a href="{{ route('about-teacher') }}" 
                       class="px-3.5 py-2 rounded-xl text-sm font-semibold text-slate-600 hover:text-navy-900 hover:bg-slate-50 transition flex items-center gap-2">
                        <i data-lucide="user-check" class="w-4 h-4 text-slate-400"></i> About Teacher
                    </a>
                </div>

                <!-- Right Header Actions -->
                <div class="flex items-center gap-3">
                    
                    <!-- Cart Button -->
                    <a href="{{ route('cart.view') }}" 
                       class="relative p-2.5 text-slate-600 hover:text-navy-900 hover:bg-slate-100 rounded-xl transition"
                       title="View Shopping Cart">
                        <i data-lucide="shopping-cart" class="w-5 h-5"></i>
                        <span id="nav-cart-count" class="absolute -top-1 -right-1 bg-blue-600 text-white text-[10px] font-bold w-4 h-4 rounded-full flex items-center justify-center shadow-sm">
                            0
                        </span>
                    </a>

                    <!-- Profile Dropdown -->
                    <div class="relative">
                        <button id="profile-menu-button" 
                                class="flex items-center gap-3 p-1.5 pr-2.5 hover:bg-slate-100 rounded-2xl transition border border-slate-200/80">
                            <div class="w-9 h-9 rounded-xl bg-navy-900 flex items-center justify-center text-white font-bold text-xs shadow-sm">
                                {{ strtoupper(substr(Auth::user()->name ?? 'ST', 0, 2)) }}
                            </div>
                            <div class="hidden sm:block text-left">
                                <p class="text-xs font-bold text-navy-950 leading-none truncate max-w-[120px]">{{ Auth::user()->name }}</p>
                                <p class="text-[10px] font-semibold text-slate-400 mt-1 uppercase">Student</p>
                            </div>
                            <i data-lucide="chevron-down" class="w-4 h-4 text-slate-400 ml-0.5"></i>
                        </button>

                        <div id="profile-dropdown" 
                             class="absolute right-0 mt-2 w-60 bg-white rounded-2xl shadow-xl border border-slate-200/90 py-2 hidden z-50">
                            <div class="px-4 py-3 border-b border-slate-100">
                                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Signed in as</p>
                                <p class="text-sm font-bold text-navy-950 truncate">{{ Auth::user()->email }}</p>
                            </div>

                            <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-50 hover:text-navy-900 transition">
                                <i data-lucide="user" class="w-4 h-4 text-slate-400"></i> My Profile
                            </a>

                            <a href="{{ route('about-teacher') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-50 hover:text-navy-900 transition">
                                <i data-lucide="graduation-cap" class="w-4 h-4 text-slate-400"></i> About Teacher
                            </a>

                            <a href="{{ route('buyclass') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-50 hover:text-navy-900 transition">
                                <i data-lucide="plus-circle" class="w-4 h-4 text-slate-400"></i> Enroll in New Class
                            </a>

                            <div class="border-t border-slate-100 my-1"></div>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 text-sm font-bold text-rose-600 hover:bg-rose-50 transition">
                                    <i data-lucide="log-out" class="w-4 h-4 text-rose-500"></i> Sign Out
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Mobile Menu Hamburger -->
                    <button id="mobile-toggle" class="md:hidden p-2 text-slate-600 hover:bg-slate-100 rounded-xl">
                        <i data-lucide="menu" class="w-6 h-6"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Drawer -->
        <div id="mobile-nav" class="hidden md:hidden border-t border-slate-100 px-4 pt-3 pb-5 bg-white space-y-1">
            <a href="{{ route('dashboard') }}" class="block px-3 py-2.5 rounded-xl text-sm font-bold bg-navy-50 text-navy-900">
                Home / Dashboard
            </a>
            <a href="{{ route('buyclass') }}" class="block px-3 py-2.5 rounded-xl text-sm font-semibold text-slate-700 hover:bg-slate-50">
                Courses & Packages
            </a>
            <a href="{{ route('store') }}" class="block px-3 py-2.5 rounded-xl text-sm font-semibold text-slate-700 hover:bg-slate-50">
                Publications & Store
            </a>
            <a href="{{ route('about-teacher') }}" class="block px-3 py-2.5 rounded-xl text-sm font-semibold text-slate-700 hover:bg-slate-50">
                About Lasindu Senarath
            </a>
            <a href="{{ route('cart.view') }}" class="block px-3 py-2.5 rounded-xl text-sm font-semibold text-slate-700 hover:bg-slate-50">
                Shopping Cart
            </a>
        </div>
    </nav>

    <!-- ==============================================================
         MAIN CONTENT AREA
    ============================================================== -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-10 flex-1 w-full space-y-10">

        <!-- Flash messages -->
        @if(session('success'))
            <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm flex items-center justify-between shadow-sm">
                <div class="flex items-center gap-3">
                    <i data-lucide="check-circle" class="w-5 h-5 text-emerald-600"></i>
                    <span class="font-bold">{{ session('success') }}</span>
                </div>
                <button onclick="this.parentElement.remove()" class="text-emerald-700 hover:text-emerald-900">
                    <i data-lucide="x" class="w-4 h-4"></i>
                </button>
            </div>
        @endif

        <!-- HERO SECTION -->
        <div class="relative overflow-hidden hero-gradient rounded-3xl lg:rounded-[2.5rem] p-8 md:p-12 text-white shadow-2xl shadow-navy-950/20 border border-navy-800/40">
            <!-- Background mesh accents -->
            <div class="absolute -top-24 -right-24 w-96 h-96 bg-sky-500/20 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-blue-600/20 rounded-full blur-3xl pointer-events-none"></div>

            <div class="relative z-10 grid lg:grid-cols-12 gap-8 items-center">
                <div class="lg:col-span-8 space-y-4">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 backdrop-blur-md border border-white/10 text-xs font-bold text-sky-300">
                        <i data-lucide="sparkles" class="w-3.5 h-3.5 text-sky-400"></i>
                        Official Student Learning Platform
                    </div>

                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white leading-tight">
                        Welcome to <br/>
                        <span class="bg-gradient-to-r from-sky-400 via-blue-200 to-white bg-clip-text text-transparent">
                            LASINDU SENARATH LMS
                        </span>
                    </h1>

                    <p class="text-slate-300 text-base sm:text-lg max-w-2xl leading-relaxed">
                        Hello, <strong class="text-white font-bold">{{ Auth::user()->name }}</strong>! Your personal gateway to A/L Business Studies excellence. Access your registered monthly classes, lecture recordings, notes, and study resources.
                    </p>

                    <!-- CTAs -->
                    <div class="pt-2 flex flex-wrap gap-3 sm:gap-4 items-center">
                        <a href="{{ route('buyclass') }}" 
                           class="px-6 py-3.5 bg-white text-navy-950 hover:bg-sky-50 font-extrabold rounded-xl shadow-lg transition-all active:scale-[0.98] flex items-center gap-2 text-sm">
                            <i data-lucide="book-open" class="w-4 h-4 text-blue-700"></i>
                            Browse Available Courses
                        </a>

                        <a href="{{ route('about-teacher') }}" 
                           class="px-6 py-3.5 bg-white/10 hover:bg-white/20 text-white font-bold rounded-xl border border-white/20 backdrop-blur-md transition-all active:scale-[0.98] flex items-center gap-2 text-sm">
                            <i data-lucide="user-check" class="w-4 h-4 text-sky-400"></i>
                            Meet Your Teacher
                        </a>
                    </div>
                </div>

                <!-- Teacher Mini Card in Hero -->
                <div class="lg:col-span-4 hidden lg:flex justify-end">
                    <div class="p-6 rounded-2xl bg-white/[0.07] backdrop-blur-md border border-white/10 shadow-xl max-w-xs w-full text-center">
                        <img src="{{ asset('images/lasindu1.jpeg') }}" 
                             alt="Lasindu Senarath" 
                             class="w-24 h-24 rounded-2xl object-cover mx-auto mb-4 border-2 border-white/20 shadow-md">
                        <h3 class="text-base font-extrabold text-white">Lasindu Senarath</h3>
                        <p class="text-xs text-sky-300 font-semibold mb-2">Lecturer in Business Studies</p>
                        <p class="text-[11px] text-slate-300 leading-snug">
                            BBA (Hons) Marketing • MBA (PIM-SJP)<br>Ada Derana Education
                        </p>
                        <a href="{{ route('about-teacher') }}" 
                           class="mt-4 block text-xs font-bold text-sky-300 hover:text-white underline underline-offset-4">
                            View Full Biography & Credentials →
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- QUICK STATS BAR -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-700 flex items-center justify-center flex-shrink-0">
                    <i data-lucide="book" class="w-6 h-6"></i>
                </div>
                <div>
                    <span class="text-2xl font-extrabold text-navy-950 block leading-tight">{{ $classes->count() }}</span>
                    <span class="text-xs font-semibold text-slate-500">Active Courses</span>
                </div>
            </div>

            <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center flex-shrink-0">
                    <i data-lucide="calendar" class="w-6 h-6"></i>
                </div>
                <div>
                    <span class="text-2xl font-extrabold text-navy-950 block leading-tight">
                        {{ $classes->pluck('month')->filter()->unique()->count() ?: 1 }}
                    </span>
                    <span class="text-xs font-semibold text-slate-500">Study Months</span>
                </div>
            </div>

            <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center flex-shrink-0">
                    <i data-lucide="award" class="w-6 h-6"></i>
                </div>
                <div>
                    <span class="text-2xl font-extrabold text-navy-950 block leading-tight">500+</span>
                    <span class="text-xs font-semibold text-slate-500">A/B Pass Records</span>
                </div>
            </div>

            <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center flex-shrink-0">
                    <i data-lucide="video" class="w-6 h-6"></i>
                </div>
                <div>
                    <span class="text-2xl font-extrabold text-navy-950 block leading-tight">HD</span>
                    <span class="text-xs font-semibold text-slate-500">Online Streaming</span>
                </div>
            </div>
        </div>

        <!-- IMPORTANT ANNOUNCEMENT BANNER -->
        <div class="p-5 sm:p-6 rounded-2xl bg-gradient-to-r from-blue-900 to-navy-900 text-white flex flex-col md:flex-row items-start md:items-center justify-between gap-4 border border-blue-800 shadow-md">
            <div class="flex items-start gap-4">
                <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <i data-lucide="bell-ring" class="w-5 h-5 text-sky-400"></i>
                </div>
                <div>
                    <h3 class="text-sm font-extrabold text-white">Live Classes & Video Library</h3>
                    <p class="text-xs text-slate-300 mt-0.5">
                        Students must complete monthly enrollments to unlock paid video lectures and tutorial materials.
                    </p>
                </div>
            </div>
            <a href="{{ route('buyclass') }}" 
               class="px-4 py-2 bg-sky-400 hover:bg-sky-300 text-navy-950 font-extrabold text-xs rounded-xl transition flex-shrink-0 flex items-center gap-1.5">
                Enroll Today <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
            </a>
        </div>

        <!-- ==============================================================
             COURSE / LMS INFORMATION (Grouped by Month)
        ============================================================== -->
        <section class="space-y-6">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-200/80 pb-4">
                <div>
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-blue-600"></span>
                        <h2 class="text-2xl font-extrabold text-navy-950 tracking-tight">Your Course Curriculum</h2>
                    </div>
                    <p class="text-sm text-slate-500 mt-1">
                        Select a class below to enter your classroom, stream video lectures, and download tutorials.
                    </p>
                </div>
                <div class="flex items-center gap-2">
                    <span class="px-3 py-1 bg-slate-100 text-slate-700 text-xs font-bold rounded-lg uppercase tracking-wider">
                        {{ $classes->count() }} Class{{ $classes->count() === 1 ? '' : 'es' }} Published
                    </span>
                </div>
            </div>

            @php
                // Group classes by month
                $groupedClasses = $classes->groupBy(function($item) {
                    return $item->month ?: 'General Modules';
                });
            @endphp

            @if($classes->isEmpty())
                <div class="text-center py-16 bg-white rounded-3xl border border-dashed border-slate-300 p-8">
                    <div class="w-16 h-16 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center mx-auto mb-4">
                        <i data-lucide="book-open" class="w-8 h-8"></i>
                    </div>
                    <h3 class="text-lg font-bold text-navy-950 mb-1">No Classes Available Yet</h3>
                    <p class="text-sm text-slate-500 max-w-md mx-auto mb-6">
                        Course modules will appear here as soon as they are published by the teacher.
                    </p>
                    <a href="{{ route('buyclass') }}" class="px-6 py-3 bg-navy-900 text-white font-bold rounded-xl text-sm hover:bg-navy-800 transition">
                        Check Available Packages
                    </a>
                </div>
            @else
                <div class="space-y-5">
                    @foreach($groupedClasses as $month => $monthClasses)
                    <div class="accordion-item accordion-active bg-white border border-slate-200/90 rounded-3xl shadow-sm overflow-hidden transition-all duration-300 hover:shadow-md">
                        
                        <!-- Month Header Toggle -->
                        <button onclick="toggleAccordion(this)" 
                                class="w-full flex items-center justify-between p-6 sm:p-7 text-left focus:outline-none hover:bg-slate-50/60 transition">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-navy-50 rounded-2xl flex items-center justify-center text-navy-800 flex-shrink-0">
                                    <i data-lucide="calendar-days" class="w-6 h-6 text-blue-700"></i>
                                </div>
                                <div>
                                    <div class="flex items-center gap-2">
                                        <h3 class="text-xl font-bold text-navy-950">{{ $month }}</h3>
                                        <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-blue-50 text-blue-700 border border-blue-100">
                                            Active Month
                                        </span>
                                    </div>
                                    <p class="text-xs text-slate-500 mt-1">
                                        {{ count($monthClasses) }} Course{{ count($monthClasses) > 1 ? 's' : '' }} ready for study
                                    </p>
                                </div>
                            </div>
                            
                            <div class="w-9 h-9 rounded-xl bg-slate-100 flex items-center justify-center transition-transform duration-300 rotate-icon">
                                <i data-lucide="chevron-down" class="w-5 h-5 text-slate-500"></i>
                            </div>
                        </button>

                        <!-- Month Course Cards -->
                        <div class="accordion-content">
                            <div class="p-6 sm:p-8 pt-2 border-t border-slate-100 bg-slate-50/40">
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                    @foreach($monthClasses as $class)
                                    <div class="bg-white p-6 rounded-2xl border border-slate-200/90 shadow-sm hover:border-blue-600 transition-all group flex flex-col justify-between">
                                        
                                        <div>
                                            <!-- Card Header -->
                                            <div class="flex justify-between items-start mb-4">
                                                <div class="p-3 bg-navy-900 rounded-xl text-white shadow-md shadow-navy-900/10 group-hover:bg-blue-700 transition">
                                                    <i data-lucide="graduation-cap" class="w-5 h-5"></i>
                                                </div>
                                                <div class="flex flex-col items-end">
                                                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">
                                                        {{ $class->month ?: 'General' }}
                                                    </span>
                                                    @if($class->sessionCount)
                                                    <span class="text-xs font-semibold text-blue-700 bg-blue-50 px-2 py-0.5 rounded-md mt-1">
                                                        {{ $class->sessionCount }} Sessions
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- Class Title & Desc -->
                                            <h4 class="text-lg font-bold text-navy-950 mb-2 group-hover:text-blue-700 transition line-clamp-2">
                                                {{ $class->className }}
                                            </h4>

                                            <p class="text-slate-500 text-xs sm:text-sm mb-5 line-clamp-3 leading-relaxed">
                                                {{ $class->description ?: 'Comprehensive lecture series and study materials for this academic unit.' }}
                                            </p>

                                            <!-- Meta info -->
                                            <div class="space-y-2 py-3 border-y border-slate-100 text-xs text-slate-600 mb-5">
                                                <div class="flex items-center justify-between">
                                                    <span class="text-slate-400">Teacher:</span>
                                                    <span class="font-bold text-navy-900">{{ $class->teacherName ?: 'Lasindu Senarath' }}</span>
                                                </div>
                                                @if($class->classTime)
                                                <div class="flex items-center justify-between">
                                                    <span class="text-slate-400">Schedule:</span>
                                                    <span class="font-semibold text-slate-700">{{ $class->classTime }}</span>
                                                </div>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Enter Classroom Button -->
                                        <div>
                                            <a href="{{ route('classview', $class->id) }}" 
                                               class="w-full flex items-center justify-center py-3.5 bg-navy-900 hover:bg-blue-700 text-white text-xs font-bold rounded-xl transition shadow-md shadow-navy-950/10 active:scale-[0.98] gap-2">
                                                Enter Classroom
                                                <i data-lucide="arrow-right" class="w-4 h-4"></i>
                                            </a>
                                        </div>

                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                    @endforeach
                </div>
            @endif
        </section>

        <!-- LEARNING MATERIALS & RESOURCES SECTION -->
        <section class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/90 shadow-sm space-y-6">
            <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                <div>
                    <h3 class="text-xl font-extrabold text-navy-950">Learning Materials & Publications</h3>
                    <p class="text-xs text-slate-500 mt-1">Study materials, published books, and examination guides.</p>
                </div>
                <a href="{{ route('store') }}" class="text-xs font-bold text-blue-700 hover:underline flex items-center gap-1">
                    Visit Store <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200/80 hover:border-blue-500 transition group">
                    <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center mb-3">
                        <i data-lucide="file-text" class="w-5 h-5"></i>
                    </div>
                    <h4 class="font-bold text-navy-950 text-sm mb-1">Business Studies Theory Tutes</h4>
                    <p class="text-xs text-slate-500 mb-3">Structured theoretical notes and classroom handouts prepared for G.C.E. A/L.</p>
                    <span class="text-xs font-bold text-blue-700 flex items-center gap-1 group-hover:translate-x-1 transition-transform">
                        Inside Classroom Modules →
                    </span>
                </div>

                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200/80 hover:border-blue-500 transition group">
                    <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center mb-3">
                        <i data-lucide="book-marked" class="w-5 h-5"></i>
                    </div>
                    <h4 class="font-bold text-navy-950 text-sm mb-1">Published Study Books</h4>
                    <p class="text-xs text-slate-500 mb-3">Official Business Studies Volumes and Exam Preparation Guides by Lasindu Senarath.</p>
                    <a href="{{ route('store') }}" class="text-xs font-bold text-emerald-700 flex items-center gap-1 group-hover:translate-x-1 transition-transform">
                        Browse Books & Store →
                    </a>
                </div>

                <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200/80 hover:border-blue-500 transition group">
                    <div class="w-10 h-10 rounded-xl bg-amber-100 text-amber-700 flex items-center justify-center mb-3">
                        <i data-lucide="check-square" class="w-5 h-5"></i>
                    </div>
                    <h4 class="font-bold text-navy-950 text-sm mb-1">Past Paper & MCQ Banks</h4>
                    <p class="text-xs text-slate-500 mb-3">Model questions, past paper analyses, and marking schemes for high A/L scoring.</p>
                    <a href="{{ route('buyclass') }}" class="text-xs font-bold text-amber-700 flex items-center gap-1 group-hover:translate-x-1 transition-transform">
                        Enrolled Classes →
                    </a>
                </div>
            </div>
        </section>

        <!-- ==============================================================
             5. HOME PAGE BUTTON FOR TEACHER DETAILS
             "About the Teacher" / "Meet Your Teacher"
             Navigates to dedicated /about-teacher page
        ============================================================== -->
        <section class="bg-gradient-to-br from-navy-950 via-navy-900 to-blue-950 rounded-3xl lg:rounded-[2.5rem] p-8 sm:p-12 text-white shadow-xl relative overflow-hidden border border-navy-800">
            <!-- Glow circle -->
            <div class="absolute -top-16 -right-16 w-72 h-72 bg-sky-500/15 rounded-full blur-3xl pointer-events-none"></div>

            <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-8 text-center md:text-left">
                <div class="flex flex-col md:flex-row items-center gap-6 max-w-2xl">
                    <img src="{{ asset('images/lasindu1.jpeg') }}" 
                         alt="Lasindu Senarath" 
                         class="w-24 h-24 sm:w-28 sm:h-28 rounded-2xl object-cover border-2 border-white/20 shadow-xl flex-shrink-0">
                    <div>
                        <span class="text-xs font-bold uppercase tracking-widest text-sky-400">Educator Profile</span>
                        <h3 class="text-2xl sm:text-3xl font-extrabold text-white mt-1">About the Teacher</h3>
                        <p class="text-slate-300 text-sm sm:text-base mt-2 leading-relaxed">
                            Learn more about <strong>Lasindu Senarath</strong> — BBA (Hons), MBA (PIM-SJP), Ada Derana Education Lecturer, and founder of modern A/L Business Studies teaching methodologies.
                        </p>
                    </div>
                </div>

                <div class="flex-shrink-0">
                    <a href="{{ route('about-teacher') }}" 
                       class="px-8 py-4 bg-sky-400 hover:bg-sky-300 text-navy-950 font-black rounded-2xl transition shadow-xl shadow-sky-500/20 active:scale-[0.98] inline-flex items-center gap-3 text-sm sm:text-base">
                        <span>Meet Your Teacher</span>
                        <i data-lucide="arrow-right" class="w-5 h-5"></i>
                    </a>
                </div>
            </div>
        </section>

    </main>

    <!-- ==============================================================
         FOOTER
    ============================================================== -->
    <footer class="bg-navy-950 text-white border-t border-navy-900 mt-16 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 pb-8 border-b border-white/10">
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <img src="{{ asset('images/logo.jpeg') }}" alt="Logo" class="w-8 h-8 rounded-lg object-cover">
                    <span class="text-base font-extrabold text-white tracking-tight">LASINDU SENARATH LMS</span>
                </div>
                <p class="text-xs text-slate-400 leading-relaxed max-w-sm">
                    Empowering students across Sri Lanka with comprehensive Advanced Level Business Studies knowledge, exam strategies, and digital learning tools.
                </p>
            </div>

            <div>
                <h4 class="text-xs font-bold uppercase tracking-widest text-sky-400 mb-4">Quick Navigation</h4>
                <ul class="space-y-2 text-xs text-slate-300">
                    <li><a href="{{ route('dashboard') }}" class="hover:text-white transition">Home Dashboard</a></li>
                    <li><a href="{{ route('buyclass') }}" class="hover:text-white transition">Course Enrollments</a></li>
                    <li><a href="{{ route('store') }}" class="hover:text-white transition">Book Store & Publications</a></li>
                    <li><a href="{{ route('about-teacher') }}" class="hover:text-white transition">About Lasindu Senarath</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-xs font-bold uppercase tracking-widest text-sky-400 mb-4">Support & Contact</h4>
                <div class="space-y-2 text-xs text-slate-300">
                    <p class="flex items-center gap-2">
                        <i data-lucide="phone" class="w-3.5 h-3.5 text-sky-400"></i> +94 70 487 0565
                    </p>
                    <p class="flex items-center gap-2">
                        <i data-lucide="mail" class="w-3.5 h-3.5 text-sky-400"></i> info@atozbusiness.lk
                    </p>
                    <p class="flex items-center gap-2">
                        <i data-lucide="map-pin" class="w-3.5 h-3.5 text-sky-400"></i> Nugegoda (Rotary) • Horana (Shilpa) • Online
                    </p>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto pt-6 flex flex-col sm:flex-row items-center justify-between text-xs text-slate-500 gap-2">
            <p>&copy; 2026 AtoZ Business School • Lasindu Senarath. All rights reserved.</p>
            <p>Designed for academic excellence.</p>
        </div>
    </footer>

    <!-- ==============================================================
         SCRIPTS: Lucide icons, Accordions, Profile Menu, 
         Letter-by-Letter Loading Animation (2 Seconds Duration)
    ============================================================== -->
    <script>
        // Initialize Lucide Icons
        lucide.createIcons();

        // -------------------------------------------------------------
        // 6. LETTER-BY-LETTER BRAND LOADING ANIMATION ("LASINDU SENARATH")
        // Duration: ~2 seconds total on page load
        // -------------------------------------------------------------
        (function() {
            const loader = document.getElementById('lms-loader');
            const targetText = 'LASINDU SENARATH';
            const textElement = document.getElementById('loader-text');
            const subElement = document.getElementById('loader-sub');
            
            if (!loader || !textElement) return;

            let currentIndex = 0;
            // 16 characters over 1400ms = ~85ms per character
            const charInterval = 85; 

            const interval = setInterval(() => {
                if (currentIndex < targetText.length) {
                    textElement.textContent += targetText[currentIndex];
                    currentIndex++;
                } else {
                    clearInterval(interval);
                    if (subElement) subElement.style.opacity = '1';
                }
            }, charInterval);

            // After approximately 2 seconds (2000ms), fade out and remove loader
            setTimeout(() => {
                loader.classList.add('loaded');
                setTimeout(() => {
                    loader.style.display = 'none';
                }, 500);
            }, 2000);
        })();

        // -------------------------------------------------------------
        // Profile Menu Dropdown
        // -------------------------------------------------------------
        const profBtn = document.getElementById('profile-menu-button');
        const profDrop = document.getElementById('profile-dropdown');
        if (profBtn && profDrop) {
            profBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                profDrop.classList.toggle('hidden');
            });
            window.addEventListener('click', () => profDrop.classList.add('hidden'));
        }

        // -------------------------------------------------------------
        // Mobile Navigation Toggle
        // -------------------------------------------------------------
        const mobileToggle = document.getElementById('mobile-toggle');
        const mobileNav = document.getElementById('mobile-nav');
        if (mobileToggle && mobileNav) {
            mobileToggle.addEventListener('click', () => {
                mobileNav.classList.toggle('hidden');
            });
        }

        // -------------------------------------------------------------
        // Accordion Toggle
        // -------------------------------------------------------------
        function toggleAccordion(element) {
            const parent = element.parentElement;
            parent.classList.toggle('accordion-active');
        }

        // -------------------------------------------------------------
        // Cart Badge Counter from LocalStorage
        // -------------------------------------------------------------
        try {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const badge = document.getElementById('nav-cart-count');
            if (badge) badge.textContent = cart.length;
        } catch(e) {}
    </script>
</body>
</html>