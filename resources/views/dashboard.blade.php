<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard | AtoZ Business School</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'royal-600': '#2563eb',
                        'royal-700': '#1d4ed8',
                        'royal-900': '#1e3a8a',
                        'soft-bg': '#f8fafc',
                    },
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
        }
        .accordion-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }
        .accordion-active .accordion-content {
            max-height: 2000px; /* Large enough for class grid */
        }
        .accordion-active .rotate-icon {
            transform: rotate(180deg);
        }
    </style>
</head>

<body class="antialiased">

    <nav class="bg-white/80 backdrop-blur-md border-b border-gray-100 fixed top-0 left-0 right-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-royal-600 rounded-xl flex items-center justify-center text-white font-bold shadow-lg shadow-blue-200">A</div>
                    <span class="text-xl font-extrabold text-royal-900 tracking-tight">AtoZ Business School</span>
                </div>

                <div class="hidden md:flex items-center space-x-8">
                    <a href="#home" class="text-royal-600 font-bold flex items-center gap-2">
                        <i data-lucide="layout-grid" class="w-5 h-5"></i> Dashboard
                    </a>
                    <a href="{{ route('buyclass') }}" class="text-gray-500 hover:text-royal-600 font-medium transition flex items-center gap-2">
                        <i data-lucide="shopping-cart" class="w-5 h-5"></i> Enroll Now
                    </a>
                </div>

                <div class="flex items-center gap-4">
                    <button class="relative p-2 text-gray-400 hover:bg-gray-100 rounded-full transition">
                        <i data-lucide="bell" class="w-6 h-6"></i>
                        <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
                    </button>

                    <div class="relative group">
                        <button id="profile-menu-button" class="flex items-center gap-3 p-1.5 hover:bg-gray-50 rounded-2xl transition border border-transparent hover:border-gray-200">
                            <div class="w-10 h-10 rounded-xl bg-royal-900 flex items-center justify-center text-white font-bold text-sm">
                                {{ substr(Auth::user()->name, 0, 2) }}
                            </div>
                            <div class="hidden sm:block text-left">
                                <p class="text-xs font-bold text-royal-900 leading-none">{{ Auth::user()->name }}</p>
                                <p class="text-[10px] text-gray-500 mt-1">Student Account</p>
                            </div>
                            <i data-lucide="chevron-down" class="w-4 h-4 text-gray-400"></i>
                        </button>
                        <div id="profile-dropdown" class="absolute right-0 mt-2 w-56 bg-white rounded-2xl shadow-xl border border-gray-100 py-2 hidden">
                            <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-4 py-3 text-sm text-gray-700 hover:bg-gray-50">
                                <i data-lucide="user" class="w-4 h-4"></i> My Profile
                            </a>
                            <div class="border-t border-gray-100 my-1"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 text-sm text-red-600 hover:bg-red-50">
                                    <i data-lucide="log-out" class="w-4 h-4"></i> Log Out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-28 pb-12">
        
        <div class="relative overflow-hidden bg-royal-900 rounded-[2.5rem] p-8 md:p-12 mb-10 text-white">
            <div class="absolute top-0 right-0 w-64 h-64 bg-royal-600/20 rounded-full blur-3xl -mr-20 -mt-20"></div>
            <div class="relative z-10">
                <h2 class="text-4xl md:text-4xl font-extrabold mb-4">Hello, {{ Auth::user()->name }}! 👋</h2>
                <p class="text-blue-100/80 text-lg max-w-xl">Keep pushing your boundaries. Your education is the investment that pays the best interest.</p>
                
                
            </div>
        </div>

        <div class="space-y-6">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-2xl font-extrabold text-royal-900">Your Learning Path</h2>
                <span class="px-4 py-1.5 bg-royal-100 text-royal-600 rounded-full text-xs font-bold uppercase tracking-wider">Grouped by Month</span>
            </div>

            @php
                // Logic to group classes by month for the UI
                $groupedClasses = $classes->groupBy('month');
            @endphp

            @foreach($groupedClasses as $month => $monthClasses)
            <div class="accordion-item bg-white border border-gray-100 rounded-[2rem] shadow-sm overflow-hidden transition-all duration-300 hover:shadow-md">
                <button onclick="toggleAccordion(this)" class="w-full flex items-center justify-between p-6 sm:p-8 text-left focus:outline-none">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-royal-50 rounded-2xl flex items-center justify-center text-royal-600">
                            <i data-lucide="calendar" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">{{ $month }}</h3>
                            <p class="text-sm text-gray-500">{{ count($monthClasses) }} Course{{ count($monthClasses) > 1 ? 's' : '' }} available</p>
                        </div>
                    </div>
                    <div class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center transition-transform duration-300 rotate-icon">
                        <i data-lucide="chevron-down" class="w-5 h-5 text-gray-400"></i>
                    </div>
                </button>

                <div class="accordion-content">
                    <div class="p-6 sm:p-8 pt-0 border-t border-gray-50 bg-gray-50/30">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($monthClasses as $class)
                            <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm hover:border-royal-600 transition-all group">
                                <div class="flex justify-between items-start mb-4">
                                    <div class="p-3 bg-royal-600 rounded-2xl text-white shadow-lg shadow-blue-200">
                                        <i data-lucide="graduation-cap" class="w-6 h-6"></i>
                                    </div>
                                    <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">{{ $class->month }}</span>
                                </div>
                                
                                <h4 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-royal-600 transition">{{ $class->className }}</h4>
                                <p class="text-gray-500 text-sm mb-6 line-clamp-2 leading-relaxed">{{ $class->description }}</p>
                                
                                <div class="space-y-4">
                                    <div class="flex justify-between text-xs font-bold text-gray-400 mb-1">
                                        <span>Course Progress</span>
                                        <span>65%</span>
                                    </div>
                                    <div class="w-full bg-gray-100 h-2 rounded-full overflow-hidden">
                                        <div class="bg-royal-600 h-full rounded-full" style="width: 65%"></div>
                                    </div>
                                    
                                    <a href="{{ route('classview', $class->id) }}"
                                       class="w-full flex items-center justify-center py-4 bg-royal-900 text-white text-sm font-bold rounded-2xl hover:bg-royal-600 transition shadow-lg shadow-gray-200 active:scale-[0.98]">
                                        Enter Classroom
                                        <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
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
    </main>

    <script>
        lucide.createIcons();

        // Profile Dropdown
        const profBtn = document.getElementById('profile-menu-button');
        const profDrop = document.getElementById('profile-dropdown');
        profBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            profDrop.classList.toggle('hidden');
        });
        window.addEventListener('click', () => profDrop.classList.add('hidden'));

        // Accordion Toggle Logic
        function toggleAccordion(element) {
            const parent = element.parentElement;
            parent.classList.toggle('accordion-active');
            
            // Optional: Close others when opening one
            /*
            document.querySelectorAll('.accordion-item').forEach(item => {
                if (item !== parent) item.classList.remove('accordion-active');
            });
            */
        }
    </script>
</body>
</html>