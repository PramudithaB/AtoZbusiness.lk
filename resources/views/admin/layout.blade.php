<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') | Lasindu Senarath LMS</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('images/logo.jpeg') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
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
        .custom-scrollbar::-webkit-scrollbar {
            width: 5px;
            height: 5px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background-color: #cbd5e1;
            border-radius: 999px;
        }
        .admin-nav-item.active {
            background-color: #eff6ff;
            color: #1d4ed8;
            font-weight: 700;
            border-right: 3px solid #1d4ed8;
        }
        .admin-nav-item.active i {
            color: #1d4ed8;
        }
        .toast-animate-in {
            animation: toastSlideIn 0.3s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        .toast-animate-out {
            animation: toastSlideOut 0.3s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        @keyframes toastSlideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        @keyframes toastSlideOut {
            from { transform: translateX(0); opacity: 1; }
            to { transform: translateX(100%); opacity: 0; }
        }
    </style>
</head>

<body class="antialiased min-h-screen bg-slate-50 flex">

    <!-- ==============================================================
         8. TOAST NOTIFICATIONS (Top-Right Floating)
    ============================================================== -->
    <div id="toast-container" class="fixed top-5 right-5 z-[9999] flex flex-col gap-3 pointer-events-none max-w-sm w-full px-4">
        
        @if(session('success'))
        <div id="success-toast" class="pointer-events-auto bg-white border border-emerald-200/90 shadow-xl rounded-2xl p-4 flex items-start gap-3 toast-animate-in">
            <div class="w-8 h-8 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center flex-shrink-0 mt-0.5">
                <i data-lucide="check-circle" class="w-5 h-5"></i>
            </div>
            <div class="flex-1 min-w-0">
                <h4 class="text-xs font-extrabold uppercase tracking-wider text-emerald-800">Action Successful</h4>
                <p class="text-xs font-semibold text-slate-700 mt-0.5 leading-snug">{{ session('success') }}</p>
            </div>
            <button onclick="dismissToast('success-toast')" class="text-slate-400 hover:text-slate-600 p-1">
                <i data-lucide="x" class="w-4 h-4"></i>
            </button>
        </div>
        @endif

        @if(session('error'))
        <div id="error-toast" class="pointer-events-auto bg-white border border-rose-200/90 shadow-xl rounded-2xl p-4 flex items-start gap-3 toast-animate-in">
            <div class="w-8 h-8 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center flex-shrink-0 mt-0.5">
                <i data-lucide="alert-circle" class="w-5 h-5"></i>
            </div>
            <div class="flex-1 min-w-0">
                <h4 class="text-xs font-extrabold uppercase tracking-wider text-rose-800">Action Failed</h4>
                <p class="text-xs font-semibold text-slate-700 mt-0.5 leading-snug">{{ session('error') }}</p>
            </div>
            <button onclick="dismissToast('error-toast')" class="text-slate-400 hover:text-slate-600 p-1">
                <i data-lucide="x" class="w-4 h-4"></i>
            </button>
        </div>
        @endif

        @if(isset($errors) && $errors->any())
        <div id="validation-toast" class="pointer-events-auto bg-white border border-rose-200/90 shadow-xl rounded-2xl p-4 flex items-start gap-3 toast-animate-in">
            <div class="w-8 h-8 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center flex-shrink-0 mt-0.5">
                <i data-lucide="alert-triangle" class="w-5 h-5"></i>
            </div>
            <div class="flex-1 min-w-0">
                <h4 class="text-xs font-extrabold uppercase tracking-wider text-rose-800">Form Validation Error</h4>
                <ul class="text-xs text-slate-700 mt-1 space-y-0.5 list-disc list-inside">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
            <button onclick="dismissToast('validation-toast')" class="text-slate-400 hover:text-slate-600 p-1">
                <i data-lucide="x" class="w-4 h-4"></i>
            </button>
        </div>
        @endif

    </div>

    <!-- ==============================================================
         7. LIGHT-THEMED ADMIN SIDEBAR
    ============================================================== -->
    <aside id="admin-sidebar" 
           class="fixed top-0 left-0 h-full w-64 bg-white border-r border-slate-200/80 z-40 transition-transform -translate-x-full lg:translate-x-0 flex flex-col justify-between shadow-sm">
        
        <div class="p-5 overflow-y-auto custom-scrollbar flex-1">
            
            <!-- Admin Brand Logo -->
            <div class="flex items-center gap-3 pb-6 border-b border-slate-100 mb-6">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-navy-950 to-blue-700 p-0.5 shadow-md shadow-blue-900/10 flex-shrink-0">
                    <div class="w-full h-full bg-white rounded-[10px] flex items-center justify-center overflow-hidden">
                        <img src="{{ asset('images/logo.jpeg') }}" alt="Logo" class="w-full h-full object-cover">
                    </div>
                </div>
                <div class="min-w-0">
                    <span class="text-[9px] font-extrabold text-blue-700 uppercase tracking-widest block">ADMINISTRATION</span>
                    <span class="text-sm font-extrabold text-navy-950 tracking-tight block truncate">Lasindu Senarath</span>
                </div>
            </div>

            <!-- Navigation Links -->
            <nav class="space-y-1">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em] mb-2 px-3">Main Navigation</p>

                <a href="{{ route('admindashboard') }}" 
                   class="admin-nav-item {{ request()->routeIs('admindashboard') ? 'active' : '' }} flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 hover:text-navy-900 transition text-xs font-semibold">
                    <i data-lucide="layout-dashboard" class="w-4 h-4 text-slate-400"></i> Dashboard Overview
                </a>

                <a href="{{ route('usermanagement') }}" 
                   class="admin-nav-item {{ request()->routeIs('usermanagement') ? 'active' : '' }} flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 hover:text-navy-900 transition text-xs font-semibold">
                    <i data-lucide="users" class="w-4 h-4 text-slate-400"></i> Registered Users
                </a>

                <a href="{{ route('classmanage') }}" 
                   class="admin-nav-item {{ request()->routeIs('classmanage') ? 'active' : '' }} flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 hover:text-navy-900 transition text-xs font-semibold">
                    <i data-lucide="folder-plus" class="w-4 h-4 text-slate-400"></i> Create Course
                </a>

                <a href="{{ route('lesson.lessoncreate') }}" 
                   class="admin-nav-item {{ request()->routeIs('lesson.lessoncreate') ? 'active' : '' }} flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 hover:text-navy-900 transition text-xs font-semibold">
                    <i data-lucide="video" class="w-4 h-4 text-slate-400"></i> Add Lesson
                </a>

                <a href="{{ route('package.create') }}" 
                   class="admin-nav-item {{ request()->routeIs('package.create') ? 'active' : '' }} flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 hover:text-navy-900 transition text-xs font-semibold">
                    <i data-lucide="package" class="w-4 h-4 text-slate-400"></i> Create Package
                </a>

                <a href="{{ route('paymentmanage') }}" 
                   class="admin-nav-item {{ request()->routeIs('paymentmanage') ? 'active' : '' }} flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 hover:text-navy-900 transition text-xs font-semibold">
                    <i data-lucide="credit-card" class="w-4 h-4 text-slate-400"></i> Payment Requests
                </a>

                <a href="{{ route('feedbackmanage') }}" 
                   class="admin-nav-item {{ request()->routeIs('feedbackmanage') ? 'active' : '' }} flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 hover:text-navy-900 transition text-xs font-semibold">
                    <i data-lucide="message-square" class="w-4 h-4 text-slate-400"></i> Student Feedback
                </a>

                <div class="pt-4 mt-4 border-t border-slate-100">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em] mb-2 px-3">Student View</p>

                    <a href="{{ route('dashboard') }}" 
                       target="_blank"
                       class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 hover:text-blue-700 transition text-xs font-semibold">
                        <i data-lucide="external-link" class="w-4 h-4 text-blue-500"></i> Student Portal
                    </a>

                    <a href="{{ route('about-teacher') }}" 
                       target="_blank"
                       class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 hover:text-blue-700 transition text-xs font-semibold">
                        <i data-lucide="user" class="w-4 h-4 text-blue-500"></i> Teacher Profile
                    </a>
                </div>
            </nav>
        </div>

        <!-- Sidebar Footer & Logout -->
        <div class="p-5 border-t border-slate-100 bg-slate-50/50">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-8 h-8 rounded-lg bg-navy-900 text-white font-bold text-xs flex items-center justify-center">
                    AD
                </div>
                <div class="min-w-0 flex-1">
                    <p class="text-xs font-bold text-navy-950 truncate">{{ Auth::user()->name ?? 'Administrator' }}</p>
                    <p class="text-[10px] text-slate-400 truncate">Platform Manager</p>
                </div>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" 
                        class="w-full flex items-center justify-center gap-2 px-3 py-2 rounded-xl text-rose-600 hover:bg-rose-50 text-xs font-bold transition border border-rose-100">
                    <i data-lucide="log-out" class="w-3.5 h-3.5"></i> Sign Out
                </button>
            </form>
        </div>
    </aside>

    <!-- Sidebar Backdrop on Mobile -->
    <div id="sidebar-backdrop" class="fixed inset-0 bg-slate-900/30 z-30 hidden lg:hidden"></div>

    <!-- ==============================================================
         MAIN ADMIN AREA
    ============================================================== -->
    <div class="lg:ml-64 flex-1 flex flex-col min-w-0">
        
        <!-- Light Admin Header -->
        <header class="bg-white border-b border-slate-200/80 sticky top-0 z-20 px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            
            <div class="flex items-center gap-3">
                <!-- Hamburger for mobile -->
                <button id="sidebar-toggle" class="lg:hidden p-2 rounded-xl text-slate-600 hover:bg-slate-100">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </button>

                <div>
                    <h1 class="text-xl sm:text-2xl font-extrabold text-navy-950 tracking-tight leading-tight">
                        @yield('header_title', 'Admin Dashboard')
                    </h1>
                    <p class="text-xs text-slate-500 hidden sm:block">
                        @yield('header_subtitle', 'Manage LMS classes, students, and subscriptions.')
                    </p>
                </div>
            </div>

            <!-- Header Right Search & Actions -->
            <div class="flex items-center gap-3">
                
                <!-- Quick table filter input -->
                <div class="relative hidden sm:block">
                    <i data-lucide="search" class="w-4 h-4 text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2 pointer-events-none"></i>
                    <input type="text" 
                           id="global-table-filter" 
                           placeholder="Filter data on this page..."
                           class="pl-9 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-700 placeholder-slate-400 focus:outline-none focus:border-blue-600 focus:bg-white focus:ring-2 focus:ring-blue-600/10 w-56 transition">
                </div>

                <a href="{{ route('classmanage') }}" 
                   class="px-3.5 py-2 bg-navy-900 hover:bg-navy-800 text-white font-bold rounded-xl text-xs transition flex items-center gap-2 shadow-sm">
                    <i data-lucide="plus" class="w-3.5 h-3.5"></i>
                    <span class="hidden sm:inline">Add Class</span>
                </a>
            </div>
        </header>

        <!-- Dynamic Main Content -->
        <main class="p-4 sm:p-6 lg:p-8 flex-1 space-y-8">
            @yield('content')
        </main>

        <!-- Admin Footer -->
        <footer class="bg-white border-t border-slate-200/80 px-6 py-4 text-xs text-slate-400 flex flex-col sm:flex-row justify-between items-center gap-2">
            <span>Lasindu Senarath LMS • AtoZ Business School Admin Portal</span>
            <span>All changes are applied immediately</span>
        </footer>

    </div>

    <!-- ==============================================================
         GLOBAL SCRIPTS & TOAST AUTO-DISMISS
    ============================================================== -->
    <script>
        lucide.createIcons();

        // Mobile Sidebar Toggle
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const sidebar = document.getElementById('admin-sidebar');
        const backdrop = document.getElementById('sidebar-backdrop');

        if (sidebarToggle && sidebar && backdrop) {
            sidebarToggle.addEventListener('click', () => {
                sidebar.classList.toggle('-translate-x-full');
                backdrop.classList.toggle('hidden');
            });
            backdrop.addEventListener('click', () => {
                sidebar.classList.add('-translate-x-full');
                backdrop.classList.add('hidden');
            });
        }

        // Toast Dismissal
        function dismissToast(id) {
            const toast = document.getElementById(id);
            if (toast) {
                toast.classList.add('toast-animate-out');
                setTimeout(() => toast.remove(), 300);
            }
        }

        // Auto dismiss toasts after 4 seconds
        setTimeout(() => {
            const toasts = ['success-toast', 'error-toast', 'validation-toast'];
            toasts.forEach(id => {
                const el = document.getElementById(id);
                if (el) dismissToast(id);
            });
        }, 4000);

        // Real-time table filter
        const filterInput = document.getElementById('global-table-filter');
        if (filterInput) {
            filterInput.addEventListener('keyup', function() {
                const query = this.value.toLowerCase().trim();
                const tableRows = document.querySelectorAll('tbody tr');
                
                tableRows.forEach(row => {
                    const text = row.innerText.toLowerCase();
                    if (!query || text.includes(query)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        }
    </script>
    @yield('scripts')
</body>
</html>
