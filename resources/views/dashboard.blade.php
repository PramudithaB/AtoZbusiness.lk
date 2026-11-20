<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard | Lasindu Senarath LMS - AtoZ Business School</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('images/logo.jpeg') }}" />
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Noto+Sans+Sinhala:wght@400;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS & Lucide Icons -->
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
            background-color: #fafbfc;
            color: #0f2b4c;
        }
        .accordion-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }
        .accordion-active .accordion-content {
            max-height: 3500px;
        }
        .accordion-active .rotate-icon {
            transform: rotate(180deg);
        }
        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background-color: #cbd5e1;
            border-radius: 999px;
        }
    </style>
</head>

<body class="antialiased min-h-screen flex flex-col bg-[#fafbfc]">

    <!-- ==========================================
         TOP NAVIGATION BAR (White & Navy Blue)
    =========================================== -->
    <nav class="bg-white border-b border-slate-200/90 sticky top-0 left-0 right-0 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                
                <!-- Logo -->
                <div class="flex items-center gap-3">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group">
                        <div class="w-11 h-11 rounded-xl bg-navy-900 p-0.5 shadow-sm group-hover:bg-navy-800 transition">
                            <div class="w-full h-full bg-white rounded-[10px] flex items-center justify-center overflow-hidden">
                                <img src="{{ asset('images/logo.jpeg') }}" alt="AtoZ Logo" class="w-full h-full object-cover">
                            </div>
                        </div>
                        <div>
                            <span class="text-[10px] font-extrabold text-navy-600 uppercase tracking-widest block leading-tight">
                                AtoZ LMS • Business School
                            </span>
                            <span class="text-base sm:text-lg font-extrabold text-navy-950 tracking-tight block leading-none">
                                LASINDU SENARATH
                            </span>
                        </div>
                    </a>
                </div>

                <!-- Desktop Navigation Links -->
                <div class="hidden md:flex items-center space-x-1 lg:space-x-2">
                    <a href="{{ route('dashboard') }}" 
                       class="px-3.5 py-2 rounded-xl text-sm font-bold text-navy-950 bg-navy-50 flex items-center gap-2">
                        <i data-lucide="layout-dashboard" class="w-4 h-4 text-navy-700"></i> Home
                    </a>
                    
                    <a href="{{ route('buyclass') }}" 
                       class="px-3.5 py-2 rounded-xl text-sm font-semibold text-slate-600 hover:text-navy-950 hover:bg-slate-50 transition flex items-center gap-2">
                        <i data-lucide="book-open" class="w-4 h-4 text-slate-400"></i> Courses
                    </a>

                    <a href="{{ route('studypack.index') }}" 
                       class="px-3.5 py-2 rounded-xl text-sm font-semibold text-slate-600 hover:text-navy-950 hover:bg-slate-50 transition flex items-center gap-2">
                        <i data-lucide="package" class="w-4 h-4 text-slate-400"></i> Study Packs
                    </a>

                    <a href="{{ route('pastpapers.index') }}" 
                       class="px-3.5 py-2 rounded-xl text-sm font-semibold text-slate-600 hover:text-navy-950 hover:bg-slate-50 transition flex items-center gap-2">
                        <i data-lucide="file-text" class="w-4 h-4 text-slate-400"></i> Past Papers
                    </a>

                    <a href="{{ route('store') }}" 
                       class="px-3.5 py-2 rounded-xl text-sm font-semibold text-slate-600 hover:text-navy-950 hover:bg-slate-50 transition flex items-center gap-2">
                        <i data-lucide="shopping-bag" class="w-4 h-4 text-slate-400"></i> Store
                    </a>


                </div>

                <!-- Right Header Actions -->
                <div class="flex items-center gap-2 sm:gap-3">
                    
                    <!-- Cart Button -->
                    <a href="{{ route('cart.view') }}" 
                       class="relative p-2.5 text-slate-600 hover:text-navy-950 hover:bg-slate-100 rounded-xl transition"
                       title="View Shopping Cart">
                        <i data-lucide="shopping-cart" class="w-5 h-5"></i>
                        <span id="nav-cart-count" class="absolute top-1 right-1 bg-navy-900 text-white text-[10px] font-bold w-4 h-4 rounded-full flex items-center justify-center">
                            0
                        </span>
                    </a>

                    <!-- Profile Dropdown -->
                    <div class="relative">
                        <button id="profile-menu-button" 
                                class="flex items-center gap-2.5 p-1.5 pr-3 hover:bg-slate-50 rounded-2xl transition border border-slate-200">
                            <div class="w-9 h-9 rounded-xl bg-navy-900 flex items-center justify-center text-white font-bold text-xs shadow-sm">
                                {{ strtoupper(substr(Auth::user()->name ?? 'ST', 0, 2)) }}
                            </div>
                            <div class="hidden sm:block text-left">
                                <p class="text-xs font-bold text-navy-950 leading-none truncate max-w-[120px]">{{ Auth::user()->name }}</p>
                                <p class="text-[10px] font-semibold text-slate-400 mt-1 uppercase">{{ Auth::user()->usertype === 'admin' ? 'Admin' : 'Student' }}</p>
                            </div>
                            <i data-lucide="chevron-down" class="w-3.5 h-3.5 text-slate-400"></i>
                        </button>

                        <div id="profile-dropdown" 
                             class="absolute right-0 mt-2 w-56 bg-white rounded-2xl shadow-lg border border-slate-200 py-2 hidden z-50">
                            <div class="px-4 py-2.5 border-b border-slate-100">
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Signed in as</p>
                                <p class="text-xs font-bold text-navy-950 truncate">{{ Auth::user()->email }}</p>
                            </div>

                            @if(Auth::user()->usertype === 'admin')
                                <a href="{{ route('admindashboard') }}" class="flex items-center gap-2.5 px-4 py-2 text-xs font-bold text-indigo-700 hover:bg-indigo-50 transition">
                                    <i data-lucide="shield" class="w-4 h-4"></i> Admin Panel
                                </a>
                            @endif

                            <a href="{{ route('profile.edit') }}" class="flex items-center gap-2.5 px-4 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-50 hover:text-navy-950 transition">
                                <i data-lucide="user" class="w-4 h-4 text-slate-400"></i> My Profile
                            </a>

                            <a href="{{ route('studypack.index') }}" class="flex items-center gap-2.5 px-4 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-50 hover:text-navy-950 transition">
                                <i data-lucide="package" class="w-4 h-4 text-slate-400"></i> My Study Packs
                            </a>

                            <a href="{{ route('buyclass') }}" class="flex items-center gap-2.5 px-4 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-50 hover:text-navy-950 transition">
                                <i data-lucide="plus-circle" class="w-4 h-4 text-slate-400"></i> Enroll in New Class
                            </a>

                            <div class="border-t border-slate-100 my-1"></div>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full flex items-center gap-2.5 px-4 py-2 text-xs font-bold text-rose-600 hover:bg-rose-50 transition">
                                    <i data-lucide="log-out" class="w-4 h-4 text-rose-500"></i> Sign Out
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Mobile Menu Toggle -->
                    <button id="mobile-toggle" class="md:hidden p-2 text-slate-600 hover:bg-slate-100 rounded-xl">
                        <i data-lucide="menu" class="w-6 h-6"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Drawer -->
        <div id="mobile-nav" class="hidden md:hidden border-t border-slate-100 px-4 pt-3 pb-5 bg-white space-y-1">
            <a href="{{ route('dashboard') }}" class="block px-3 py-2.5 rounded-xl text-sm font-bold bg-navy-50 text-navy-950">
                Home / Dashboard
            </a>
            <a href="{{ route('buyclass') }}" class="block px-3 py-2.5 rounded-xl text-sm font-semibold text-slate-700 hover:bg-slate-50">
                Courses & Packages
            </a>
            <a href="{{ route('studypack.index') }}" class="block px-3 py-2.5 rounded-xl text-sm font-semibold text-slate-700 hover:bg-slate-50">
                Study Packs
            </a>
            <a href="{{ route('pastpapers.index') }}" class="block px-3 py-2.5 rounded-xl text-sm font-semibold text-slate-700 hover:bg-slate-50">
                Past Papers
            </a>
            <a href="{{ route('store') }}" class="block px-3 py-2.5 rounded-xl text-sm font-semibold text-slate-700 hover:bg-slate-50">
                Store & Publications
            </a>

            <a href="{{ route('cart.view') }}" class="block px-3 py-2.5 rounded-xl text-sm font-semibold text-slate-700 hover:bg-slate-50">
                Shopping Cart
            </a>
        </div>
    </nav>

    <!-- ==========================================
         MAIN CONTENT AREA
    =========================================== -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex-1 w-full space-y-8">

        <!-- Flash messages -->
        @if(session('success'))
            <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-900 text-sm flex items-center justify-between shadow-sm">
                <div class="flex items-center gap-3">
                    <i data-lucide="check-circle" class="w-5 h-5 text-emerald-600"></i>
                    <span class="font-bold">{{ session('success') }}</span>
                </div>
                <button onclick="this.parentElement.remove()" class="text-emerald-700 hover:text-emerald-900">
                    <i data-lucide="x" class="w-4 h-4"></i>
                </button>
            </div>
        @endif

        <!-- ==========================================
             CLEAN WELCOME CARD (White & Navy Blue)
        =========================================== -->
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/90 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-6">
            
            <!-- Left Info -->
            <div class="space-y-2 max-w-xl">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-navy-50 text-navy-800 border border-navy-100">
                    <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                    A/L Business Studies Student Portal
                </span>

                <h1 class="text-2xl sm:text-3xl font-extrabold text-navy-950 tracking-tight">
                    Welcome, {{ Auth::user()->name }} 👋
                </h1>

                <p class="text-slate-500 text-sm leading-relaxed">
                    Access your monthly lecture recordings, course materials, and NIE curriculum video study packs.
                </p>

                <!-- Action Buttons -->
                <div class="pt-2 flex flex-wrap gap-3 items-center">
                    <a href="{{ route('buyclass') }}" 
                       class="px-4 py-2.5 bg-navy-900 hover:bg-navy-800 text-white font-bold rounded-xl text-xs sm:text-sm transition shadow-sm flex items-center gap-2">
                        <i data-lucide="book-open" class="w-4 h-4"></i>
                        Browse All Courses
                    </a>
                    <a href="#studypacks" 
                       class="px-4 py-2.5 bg-white hover:bg-slate-50 text-navy-900 font-semibold rounded-xl text-xs sm:text-sm border border-slate-200 transition flex items-center gap-2">
                        <i data-lucide="video" class="w-4 h-4 text-navy-700"></i>
                        Study Packs
                    </a>
                </div>
            </div>

            <!-- Right Quick Stats -->
            <div class="flex items-center gap-3 sm:gap-4 flex-shrink-0 pt-4 md:pt-0 border-t md:border-t-0 border-slate-100">
                <div class="bg-navy-50/60 border border-navy-100 rounded-2xl p-4 text-center min-w-[110px]">
                    <span class="text-2xl sm:text-3xl font-extrabold text-navy-950 block">{{ $classes->count() }}</span>
                    <span class="text-[11px] font-bold text-navy-700 uppercase tracking-wider">Active Classes</span>
                </div>
                <div class="bg-navy-50/60 border border-navy-100 rounded-2xl p-4 text-center min-w-[110px]">
                    <span class="text-2xl sm:text-3xl font-extrabold text-navy-950 block">{{ $studyPacks->count() }}</span>
                    <span class="text-[11px] font-bold text-navy-700 uppercase tracking-wider">Study Packs</span>
                </div>
            </div>

        </div>

        <!-- ==========================================
             SECTION 1: STUDY PACKS (වීඩියෝ පාඩම් මාලා)
        =========================================== -->
        <section id="studypacks" class="space-y-4">
            <div class="flex items-center justify-between pb-2 border-b border-slate-200">
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-lg bg-navy-900 text-white flex items-center justify-center shadow-sm">
                        <i data-lucide="video" class="w-4 h-4"></i>
                    </div>
                    <div>
                        <h2 class="text-lg sm:text-xl font-extrabold text-navy-950">Study Packs • වීඩියෝ පාඩම් මාලා</h2>
                    </div>
                </div>
                <a href="{{ route('studypack.index') }}" class="text-xs font-bold text-navy-800 hover:text-navy-950 hover:underline flex items-center gap-1">
                    View All <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                </a>
            </div>

            <!-- Study Pack Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                @forelse($studyPacks as $pack)
                    @php
                        $hasAccess = $studyPackApprovals[$pack->id] ?? false;
                        $hasPending = $studyPackPendings[$pack->id] ?? false;
                        $packPrice = $pack->price ?? ($pack->package->monthly_fee ?? 2500);
                    @endphp
                    <div class="bg-white rounded-2xl p-6 border border-slate-200 hover:border-navy-400 shadow-sm hover:shadow transition-all flex flex-col justify-between gap-4">
                        <div class="space-y-3">
                            
                            <!-- Badges -->
                            <div class="flex items-center justify-between gap-2 flex-wrap">
                                <span class="px-2.5 py-1 rounded-lg text-[10px] font-extrabold bg-navy-50 text-navy-900 border border-navy-100 uppercase tracking-wider">
                                    {{ $pack->grade ?? 'Grade 12 & 13' }} • NIE Syllabus
                                </span>
                                
                                @if($hasAccess)
                                    <span class="px-2.5 py-1 rounded-lg text-[10px] font-extrabold bg-emerald-50 text-emerald-700 border border-emerald-200 flex items-center gap-1">
                                        <i data-lucide="check-circle" class="w-3 h-3"></i> Enrolled & Active
                                    </span>
                                @elseif($hasPending)
                                    <span class="px-2.5 py-1 rounded-lg text-[10px] font-extrabold bg-amber-50 text-amber-700 border border-amber-200 flex items-center gap-1">
                                        <i data-lucide="clock" class="w-3 h-3"></i> Pending Approval
                                    </span>
                                @else
                                    <span class="text-sm font-extrabold text-navy-950 flex items-center gap-1">
                                        <i data-lucide="lock" class="w-3.5 h-3.5 text-slate-400"></i>
                                        Rs. {{ number_format($packPrice) }}
                                    </span>
                                @endif
                            </div>

                            <!-- Title -->
                            <h3 class="text-lg font-bold text-navy-950 leading-snug">
                                {{ $pack->title }}
                            </h3>

                            <p class="text-xs text-slate-500 line-clamp-2 leading-relaxed">
                                {{ $pack->description ?? 'නිපුණතා මට්ටම් ආවරණය වන පරිදි සකසන ලද සම්පූර්ණ න්‍යායාත්මක වීඩියෝ පාඩම් එකතුව.' }}
                            </p>

                            <!-- Meta info -->
                            <div class="flex items-center gap-4 text-xs text-slate-500 font-semibold pt-1">
                                <span class="flex items-center gap-1.5">
                                    <i data-lucide="layers" class="w-3.5 h-3.5 text-navy-600"></i> {{ $pack->topics_count }} Topics
                                </span>
                                <span class="flex items-center gap-1.5">
                                    <i data-lucide="play-circle" class="w-3.5 h-3.5 text-navy-600"></i> {{ $pack->subtopics_count }} Video Lessons
                                </span>
                            </div>
                        </div>

                        <!-- Action Button -->
                        <div class="pt-4 border-t border-slate-100">
                            @if($hasAccess)
                                <a href="{{ route('studypack.show', $pack->id) }}" 
                                   class="w-full py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs rounded-xl transition shadow-sm flex items-center justify-center gap-2">
                                    <span>Watch Lessons / පාඩම් නරඹන්න</span>
                                    <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                                </a>
                            @elseif($hasPending)
                                <a href="{{ route('studypack.show', $pack->id) }}" 
                                   class="w-full py-2.5 bg-amber-500 hover:bg-amber-600 text-white font-bold text-xs rounded-xl transition shadow-sm flex items-center justify-center gap-2">
                                    <i data-lucide="clock" class="w-3.5 h-3.5"></i>
                                    <span>Verification Pending</span>
                                </a>
                            @else
                                <a href="{{ route('studypack.show', $pack->id) }}" 
                                   class="w-full py-2.5 bg-navy-900 hover:bg-navy-800 text-white font-bold text-xs rounded-xl transition shadow-sm flex items-center justify-center gap-2">
                                    <i data-lucide="shopping-cart" class="w-3.5 h-3.5 text-amber-400"></i>
                                    <span>Enroll & Buy (Rs. {{ number_format($packPrice) }})</span>
                                </a>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="col-span-full p-8 text-center bg-white rounded-2xl border border-dashed border-slate-200 text-slate-400">
                        <p class="font-bold text-sm">තවමත් Study Packs නොමැත.</p>
                    </div>
                @endforelse
            </div>
        </section>

        <!-- ==========================================
             SECTION 2: COURSE CURRICULUM (මාසික පන්ති)
        =========================================== -->
        <section class="space-y-4">
            <div class="flex items-center justify-between pb-2 border-b border-slate-200">
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-lg bg-navy-900 text-white flex items-center justify-center shadow-sm">
                        <i data-lucide="calendar" class="w-4 h-4"></i>
                    </div>
                    <div>
                        <h2 class="text-lg sm:text-xl font-extrabold text-navy-950">Your Course Curriculum • මාසික පන්ති</h2>
                    </div>
                </div>
                <span class="px-2.5 py-1 bg-navy-50 text-navy-900 border border-navy-100 text-xs font-bold rounded-lg">
                    {{ $classes->count() }} Classes
                </span>
            </div>

            @php
                $groupedClasses = $classes->groupBy(function($item) {
                    return $item->month ?: 'General Modules';
                });
            @endphp

            @if($classes->isEmpty())
                <div class="text-center py-12 bg-white rounded-2xl border border-dashed border-slate-200 p-6">
                    <div class="w-12 h-12 rounded-xl bg-navy-50 text-navy-700 flex items-center justify-center mx-auto mb-3">
                        <i data-lucide="book-open" class="w-6 h-6"></i>
                    </div>
                    <h3 class="text-base font-bold text-navy-950 mb-1">No Classes Available Yet</h3>
                    <p class="text-xs text-slate-500 max-w-sm mx-auto mb-4">
                        Course modules will appear here as soon as they are published.
                    </p>
                    <a href="{{ route('buyclass') }}" class="px-4 py-2 bg-navy-900 text-white font-bold rounded-xl text-xs hover:bg-navy-800 transition">
                        Check Available Packages
                    </a>
                </div>
            @else
                <div class="space-y-4">
                    @foreach($groupedClasses as $month => $monthClasses)
                    <div class="accordion-item accordion-active bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden transition-all">
                        
                        <!-- Month Header Toggle -->
                        <button onclick="toggleAccordion(this)" 
                                class="w-full flex items-center justify-between p-4 sm:p-5 text-left focus:outline-none hover:bg-slate-50/70 transition">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 bg-navy-50 rounded-xl flex items-center justify-center text-navy-800 flex-shrink-0">
                                    <i data-lucide="calendar-days" class="w-4 h-4"></i>
                                </div>
                                <div>
                                    <div class="flex items-center gap-2">
                                        <h3 class="text-base font-bold text-navy-950">{{ $month }}</h3>
                                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-navy-50 text-navy-800 border border-navy-100">
                                            {{ count($monthClasses) }} {{ count($monthClasses) === 1 ? 'Course' : 'Courses' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="w-8 h-8 rounded-lg bg-slate-100 flex items-center justify-center transition-transform duration-200 rotate-icon">
                                <i data-lucide="chevron-down" class="w-4 h-4 text-slate-500"></i>
                            </div>
                        </button>

                        <!-- Month Course Cards -->
                        <div class="accordion-content">
                            <div class="p-4 sm:p-5 pt-0 border-t border-slate-100 bg-[#fafcff]">
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 pt-3">
                                    @foreach($monthClasses as $class)
                                    <div class="bg-white p-5 rounded-xl border border-slate-200 hover:border-navy-400 shadow-sm hover:shadow transition-all flex flex-col justify-between">
                                        
                                        <div class="space-y-3">
                                            <div class="flex justify-between items-start">
                                                <div class="p-2 bg-navy-900 rounded-lg text-white">
                                                    <i data-lucide="graduation-cap" class="w-4 h-4"></i>
                                                </div>
                                                @if($class->sessionCount)
                                                <span class="text-[10px] font-bold text-navy-800 bg-navy-50 border border-navy-100 px-2 py-0.5 rounded-md">
                                                    {{ $class->sessionCount }} Sessions
                                                </span>
                                                @endif
                                            </div>

                                            <h4 class="text-base font-bold text-navy-950 line-clamp-2">
                                                {{ $class->className }}
                                            </h4>

                                            @if($class->description)
                                            <p class="text-slate-500 text-xs line-clamp-2 leading-relaxed">
                                                {{ $class->description }}
                                            </p>
                                            @endif

                                            <div class="pt-2 text-xs text-slate-500 space-y-1 border-t border-slate-100">
                                                <p><span class="text-slate-400">Teacher:</span> <strong class="text-navy-950">{{ $class->teacherName ?: 'Lasindu Senarath' }}</strong></p>
                                                @if($class->classTime)
                                                <p><span class="text-slate-400">Schedule:</span> {{ $class->classTime }}</p>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="pt-4">
                                            <a href="{{ route('classview', $class->id) }}" 
                                               class="w-full flex items-center justify-center py-2.5 bg-navy-900 hover:bg-navy-800 text-white text-xs font-bold rounded-xl transition gap-2 shadow-sm">
                                                <span>Enter Classroom</span>
                                                <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
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

    </main>

    <!-- ==========================================
         CLEAN & COMPACT FOOTER (White & Navy Blue)
    =========================================== -->
    <footer class="bg-white border-t border-slate-200 py-6 px-4 sm:px-6 lg:px-8 mt-12 text-xs text-slate-500">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-2.5">
                <img src="{{ asset('images/logo.jpeg') }}" alt="Logo" class="w-6 h-6 rounded-md object-cover">
                <span class="font-extrabold text-navy-950">LASINDU SENARATH LMS • AtoZ Business School</span>
            </div>
            <div class="flex items-center gap-4 font-semibold text-slate-600">
                <a href="{{ route('dashboard') }}" class="hover:text-navy-950 transition">Home</a>
                <a href="{{ route('buyclass') }}" class="hover:text-navy-950 transition">Courses</a>
                <a href="{{ route('studypack.index') }}" class="hover:text-navy-950 transition">Study Packs</a>

            </div>
            <p>&copy; 2026 AtoZ Business School. All rights reserved.</p>
        </div>
    </footer>

    <!-- ==============================================================
         FLOATING LIVE CHAT WIDGET (Bottom Right)
         - Click opens compact chat popup towards the left/bottom
         - Chats with student's name
         - Admin can delete any chat message right inside the chat box
    ============================================================== -->
    <div id="chat-widget-root" class="fixed bottom-6 right-6 z-50">
        
        <!-- Floating Chat Icon Button -->
        <button id="chat-toggle-btn" 
                onclick="toggleChatBox()" 
                class="w-14 h-14 rounded-full bg-navy-900 hover:bg-navy-800 text-white shadow-xl shadow-navy-950/25 flex items-center justify-center transition-all hover:scale-105 active:scale-95 relative group"
                title="Live Chat & Inquiries">
            <i data-lucide="message-circle" id="chat-icon-closed" class="w-6 h-6 text-white transition-transform"></i>
            <i data-lucide="x" id="chat-icon-open" class="w-6 h-6 text-white hidden transition-transform"></i>
            <!-- Active Notification Dot -->
            <span class="absolute top-1 right-1 w-3.5 h-3.5 bg-emerald-500 border-2 border-white rounded-full"></span>
        </button>

        <!-- Compact Chat Box Popup (Left/Above position) -->
        <div id="chat-box" 
             class="hidden fixed bottom-24 right-6 w-[92vw] sm:w-[380px] h-[520px] max-h-[82vh] bg-white rounded-3xl shadow-2xl border border-slate-200/90 flex flex-col overflow-hidden z-50 transition-all duration-300">
            
            <!-- Chat Header -->
            <div class="p-4 bg-navy-950 text-white flex items-center justify-between border-b border-navy-900">
                <div class="flex items-center gap-3 min-w-0">
                    <div class="w-10 h-10 rounded-2xl bg-white/10 flex items-center justify-center flex-shrink-0 text-white border border-white/10">
                        <i data-lucide="messages-square" class="w-5 h-5 text-sky-300"></i>
                    </div>
                    <div class="min-w-0">
                        <div class="flex items-center gap-1.5">
                            <h4 class="text-xs font-extrabold uppercase tracking-wider text-white">Live Student Chat</h4>
                            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        </div>
                        <p class="text-[11px] text-slate-300 truncate">
                            Chatting as: <strong class="text-white">{{ Auth::user()->name }}</strong>
                            @if(Auth::user()->usertype === 'admin')
                                <span class="ml-1 text-[9px] bg-amber-500/30 text-amber-300 border border-amber-400/30 px-1.5 py-0.5 rounded font-mono font-bold uppercase">Admin Mode</span>
                            @endif
                        </p>
                    </div>
                </div>

                <div class="flex items-center gap-1">
                    <button onclick="fetchChatMessages()" class="p-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-white/10 transition" title="Refresh">
                        <i data-lucide="refresh-cw" class="w-3.5 h-3.5"></i>
                    </button>
                    <button onclick="toggleChatBox()" class="p-1.5 rounded-lg text-slate-400 hover:text-white hover:bg-white/10 transition" title="Close">
                        <i data-lucide="x" class="w-4 h-4"></i>
                    </button>
                </div>
            </div>

            <!-- Notice Sub-header -->
            <div class="px-4 py-2 bg-navy-50/70 border-b border-slate-100 flex items-center justify-between text-[11px] text-slate-600">
                <span class="flex items-center gap-1.5 font-medium">
                    <i data-lucide="info" class="w-3.5 h-3.5 text-navy-700"></i>
                    <span>පන්ති පිළිබඳ විමසීම් හා ගැටලු</span>
                </span>
                <span class="text-[10px] text-emerald-600 font-bold bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-200">
                    Online
                </span>
            </div>

            <!-- Messages Area -->
            <div id="chat-messages-container" class="flex-1 p-4 overflow-y-auto space-y-3 bg-[#fafbfc] text-xs custom-scrollbar">
                <div class="text-center py-10 text-slate-400">
                    <i data-lucide="loader-2" class="w-5 h-5 animate-spin mx-auto mb-2 text-slate-400"></i>
                    <p class="text-xs">Loading messages...</p>
                </div>
            </div>

            <!-- Chat Input Footer -->
            <form id="chat-form" onsubmit="sendChatMessage(event)" class="p-3 bg-white border-t border-slate-200/90 flex items-center gap-2">
                <input type="text" 
                       id="chat-input" 
                       placeholder="Type a message as {{ strtok(Auth::user()->name, ' ') }}..." 
                       maxlength="1000"
                       required
                       autocomplete="off"
                       class="flex-1 px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-navy-950 placeholder-slate-400 focus:outline-none focus:bg-white focus:border-navy-900 transition">
                
                <button type="submit" 
                        id="chat-send-btn"
                        class="p-2.5 bg-navy-900 hover:bg-navy-800 text-white rounded-xl transition shadow-sm active:scale-95 flex items-center justify-center flex-shrink-0"
                        title="Send Message">
                    <i data-lucide="send" class="w-4 h-4"></i>
                </button>
            </form>

        </div>

    </div>

    <!-- ==========================================
         SCRIPTS
    =========================================== -->
    <script>
        // Lucide Icons Initialization
        lucide.createIcons();

        // Profile Menu Dropdown
        const profBtn = document.getElementById('profile-menu-button');
        const profDrop = document.getElementById('profile-dropdown');
        if (profBtn && profDrop) {
            profBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                profDrop.classList.toggle('hidden');
            });
            window.addEventListener('click', () => profDrop.classList.add('hidden'));
        }

        // Mobile Navigation Toggle
        const mobileToggle = document.getElementById('mobile-toggle');
        const mobileNav = document.getElementById('mobile-nav');
        if (mobileToggle && mobileNav) {
            mobileToggle.addEventListener('click', () => {
                mobileNav.classList.toggle('hidden');
            });
        }

        // Accordion Toggle
        function toggleAccordion(element) {
            const parent = element.parentElement;
            parent.classList.toggle('accordion-active');
        }

        // Cart Badge Counter from LocalStorage
        try {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const badge = document.getElementById('nav-cart-count');
            if (badge) badge.textContent = cart.length;
        } catch(e) {}

        // ==========================================
        // LIVE CHAT SYSTEM JAVASCRIPT
        // ==========================================
        let isChatOpen = false;
        let chatPollInterval = null;
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

        function toggleChatBox() {
            const chatBox = document.getElementById('chat-box');
            const iconClosed = document.getElementById('chat-icon-closed');
            const iconOpen = document.getElementById('chat-icon-open');

            isChatOpen = !isChatOpen;

            if (isChatOpen) {
                chatBox.classList.remove('hidden');
                iconClosed.classList.add('hidden');
                iconOpen.classList.remove('hidden');
                fetchChatMessages();
                // Focus input
                setTimeout(() => {
                    document.getElementById('chat-input')?.focus();
                }, 100);
                // Start polling every 5 seconds
                if (!chatPollInterval) {
                    chatPollInterval = setInterval(fetchChatMessages, 5000);
                }
            } else {
                chatBox.classList.add('hidden');
                iconClosed.classList.remove('hidden');
                iconOpen.classList.add('hidden');
                if (chatPollInterval) {
                    clearInterval(chatPollInterval);
                    chatPollInterval = null;
                }
            }
        }

        function fetchChatMessages() {
            fetch("{{ route('chat.messages') }}", {
                headers: {
                    'Accept': 'application/json',
                }
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    renderMessages(data.messages, data.is_admin);
                }
            })
            .catch(err => {
                console.error("Chat fetch error:", err);
            });
        }

        function renderMessages(messages, isAdmin) {
            const container = document.getElementById('chat-messages-container');
            if (!container) return;

            if (messages.length === 0) {
                container.innerHTML = `
                    <div class="text-center py-12 text-slate-400">
                        <i data-lucide="message-square" class="w-8 h-8 mx-auto mb-2 text-slate-300"></i>
                        <p class="font-bold text-xs text-navy-950 mb-1">No messages yet</p>
                        <p class="text-[11px] text-slate-400">Be the first to say hello or ask a question!</p>
                    </div>`;
                lucide.createIcons();
                return;
            }

            const isScrolledToBottom = container.scrollHeight - container.clientHeight <= container.scrollTop + 60;

            let html = '';
            messages.forEach(msg => {
                const isMe = msg.is_me;
                const canDelete = msg.can_delete || isAdmin;

                if (isMe) {
                    // Right-aligned (Sent by current user)
                    html += `
                        <div class="flex flex-col items-end group" id="chat-msg-${msg.id}">
                            <div class="flex items-center gap-1.5 mb-1 text-[10px] text-slate-400">
                                <span>${escapeHtml(msg.time)}</span>
                                <span class="font-bold text-navy-900">You</span>
                            </div>
                            <div class="flex items-center gap-1.5 max-w-[85%]">
                                ${canDelete ? `
                                    <button type="button" 
                                            onclick="deleteChatMessage(${msg.id})"
                                            class="opacity-0 group-hover:opacity-100 p-1 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded transition" 
                                            title="Delete message">
                                        <i data-lucide="trash-2" class="w-3.5 h-3.5"></i>
                                    </button>
                                ` : ''}
                                <div class="px-3.5 py-2.5 bg-navy-900 text-white rounded-2xl rounded-br-none shadow-sm leading-relaxed break-words text-xs">
                                    ${escapeHtml(msg.message)}
                                </div>
                            </div>
                        </div>`;
                } else {
                    // Left-aligned (Sent by other students or admin)
                    html += `
                        <div class="flex flex-col items-start group" id="chat-msg-${msg.id}">
                            <div class="flex items-center gap-1.5 mb-1 text-[10px]">
                                <span class="font-bold text-navy-950">${escapeHtml(msg.user_name)}</span>
                                ${msg.is_admin ? '<span class="px-1.5 py-0.2 bg-blue-50 text-blue-700 font-extrabold text-[9px] rounded border border-blue-200 uppercase">Teacher</span>' : ''}
                                <span class="text-slate-400">${escapeHtml(msg.time)}</span>
                            </div>
                            <div class="flex items-center gap-1.5 max-w-[85%]">
                                <div class="px-3.5 py-2.5 bg-white text-navy-950 border border-slate-200/90 rounded-2xl rounded-bl-none shadow-sm leading-relaxed break-words text-xs">
                                    ${escapeHtml(msg.message)}
                                </div>
                                ${canDelete ? `
                                    <button type="button" 
                                            onclick="deleteChatMessage(${msg.id})"
                                            class="opacity-0 group-hover:opacity-100 p-1 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded transition" 
                                            title="Delete message">
                                        <i data-lucide="trash-2" class="w-3.5 h-3.5"></i>
                                    </button>
                                ` : ''}
                            </div>
                        </div>`;
                }
            });

            container.innerHTML = html;
            lucide.createIcons();

            // Auto-scroll to bottom if user was already at bottom or on first load
            if (isScrolledToBottom) {
                container.scrollTop = container.scrollHeight;
            }
        }

        function sendChatMessage(e) {
            e.preventDefault();
            const input = document.getElementById('chat-input');
            const message = input.value.trim();
            if (!message) return;

            const sendBtn = document.getElementById('chat-send-btn');
            sendBtn.disabled = true;

            fetch("{{ route('chat.send') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify({ message: message })
            })
            .then(res => res.json())
            .then(data => {
                sendBtn.disabled = false;
                if (data.success) {
                    input.value = '';
                    fetchChatMessages();
                    // Scroll to bottom
                    const container = document.getElementById('chat-messages-container');
                    if (container) {
                        setTimeout(() => { container.scrollTop = container.scrollHeight; }, 100);
                    }
                } else {
                    alert(data.error || 'Failed to send message.');
                }
            })
            .catch(err => {
                sendBtn.disabled = false;
                console.error("Send error:", err);
            });
        }

        function deleteChatMessage(id) {
            if (!confirm('Delete this chat message? / මෙම පණිවිඩය ඉවත් කරන්නද?')) {
                return;
            }

            fetch("{{ url('/chat/delete') }}/" + id, {
                method: 'DELETE',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                }
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    const el = document.getElementById('chat-msg-' + id);
                    if (el) el.remove();
                } else {
                    alert(data.error || 'Failed to delete message.');
                }
            })
            .catch(err => {
                console.error("Delete error:", err);
            });
        }

        function escapeHtml(str) {
            return String(str || '').replace(/[&<>"']/g, c => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[c]));
        }
    </script>
</body>
</html>
