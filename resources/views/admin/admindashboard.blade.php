<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal | LTBio.lk</title>
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
                        'admin-dark': '#0f172a',
                        'admin-card': '#1e293b',
                    },
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #0f172a;
        }
        .custom-scrollbar::-webkit-scrollbar { width: 6px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #334155; border-radius: 10px; }
        .nav-link.active { background: #2563eb; color: white; }
    </style>
</head>

<body class="antialiased text-slate-200">

    <aside id="sidebar" class="fixed top-0 left-0 h-full w-64 bg-slate-900 border-r border-slate-800 z-50 transition-transform -translate-x-full lg:translate-x-0 overflow-y-auto custom-scrollbar">
        <div class="p-6">
            <div class="flex items-center gap-3 mb-10">
                <div class="w-10 h-10 bg-royal-600 rounded-xl flex items-center justify-center text-white font-bold shadow-lg shadow-blue-500/20">A</div>
                <span class="text-xl font-extrabold text-white tracking-tight">Admin Portal</span>
            </div>

            <nav class="space-y-1">
                <p class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-4 ml-2">Main Menu</p>
                <a href="#overview" class="nav-link active flex items-center gap-3 px-4 py-3 rounded-xl transition font-semibold text-sm">
                    <i data-lucide="layout-dashboard" class="w-4 h-4"></i> Dashboard
                </a>
                <a href="{{ route('usermanagement') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white transition font-semibold text-sm">
                    <i data-lucide="users" class="w-4 h-4"></i> Users
                </a>
                <a href="{{ route('classmanage') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white transition font-semibold text-sm">
                    <i data-lucide="book-open" class="w-4 h-4"></i> Courses
                </a>
                <a href="{{route('lesson.lessoncreate')}}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white transition font-semibold text-sm">
                    <i data-lucide="play-circle" class="w-4 h-4"></i> Lessons
                </a>
                <a href="{{route('package.create')}}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white transition font-semibold text-sm">
                    <i data-lucide="package" class="w-4 h-4"></i> Packages
                </a>
                <a href="{{ route('paymentmanage') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white transition font-semibold text-sm">
                    <i data-lucide="credit-card" class="w-4 h-4"></i> Payments
                </a>
                <a href="{{ route('feedbackmanage') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white transition font-semibold text-sm">
                    <i data-lucide="message-square" class="w-4 h-4"></i> Feedback
                </a>
            </nav>

            <div class="mt-20 pt-10 border-t border-slate-800">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-red-400 hover:bg-red-500/10 transition font-bold text-sm">
                        <i data-lucide="log-out" class="w-4 h-4"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <main class="lg:ml-64 p-4 lg:p-8">
        
        <header class="flex items-center justify-between mb-10">
            <div>
                <h1 class="text-2xl font-bold text-white">Management Dashboard</h1>
                <p class="text-slate-500 text-sm">Manage your platform content and students.</p>
            </div>
            <div class="flex items-center gap-4">
                <button class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center text-slate-400 hover:text-white transition">
                    <i data-lucide="bell" class="w-5 h-5"></i>
                </button>
                <div class="w-10 h-10 rounded-xl bg-royal-600 flex items-center justify-center text-white font-bold">AD</div>
            </div>
        </header>

        @if(session('success'))
        <div class="bg-emerald-500/10 border border-emerald-500/20 p-4 rounded-2xl flex items-center gap-3 text-emerald-400 mb-8">
            <i data-lucide="check-circle" class="w-5 h-5"></i>
            <span class="text-sm font-bold">{{ session('success') }}</span>
        </div>
        @endif

        <section class="mb-12">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-white flex items-center gap-2">
                    <i data-lucide="folder" class="w-5 h-5 text-royal-600"></i> Active Courses
                </h2>
                <a href="{{ route('classmanage') }}" class="text-xs font-bold text-royal-600 hover:underline">Manage All</a>
            </div>

            <div class="bg-slate-900 border border-slate-800 rounded-3xl overflow-hidden shadow-sm">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="bg-slate-800/50 text-slate-400">
                            <tr>
                                <th class="px-6 py-4 font-bold uppercase tracking-wider text-[10px]">Class Name</th>
                                <th class="px-6 py-4 font-bold uppercase tracking-wider text-[10px]">Teacher</th>
                                <th class="px-6 py-4 font-bold uppercase tracking-wider text-[10px]">Sessions</th>
                                <th class="px-6 py-4 font-bold uppercase tracking-wider text-[10px]">Month</th>
                                <th class="px-6 py-4 font-bold uppercase tracking-wider text-[10px] text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-800">
                            @foreach ($classes as $c)
                            <tr class="hover:bg-slate-800/30 transition">
                                <td class="px-6 py-4 font-bold text-white">{{ $c->className }}</td>
                                <td class="px-6 py-4 text-slate-400">{{ $c->teacherName }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 bg-royal-600/10 text-royal-600 rounded-lg text-xs font-bold">{{ $c->sessionCount }} Lessons</span>
                                </td>
                                <td class="px-6 py-4 text-slate-400">{{ $c->month }}</td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('class.edit', $c->id) }}" class="p-2 bg-slate-800 hover:bg-royal-600 text-slate-400 hover:text-white rounded-lg transition">
                                            <i data-lucide="edit-3" class="w-4 h-4"></i>
                                        </a>
                                        <form action="{{ route('class.delete', $c->id) }}" method="POST" class="inline" onsubmit="return confirm('Delete this class?');">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="p-2 bg-slate-800 hover:bg-red-500 text-slate-400 hover:text-white rounded-lg transition">
                                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <section class="mb-12">
            <h2 class="text-xl font-bold text-white mb-6 flex items-center gap-2">
                <i data-lucide="package" class="w-5 h-5 text-emerald-500"></i> Subscription Packages
            </h2>
            <div class="bg-slate-900 border border-slate-800 rounded-3xl overflow-hidden shadow-sm">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="bg-slate-800/50 text-slate-400">
                            <tr>
                                <th class="px-6 py-4 font-bold uppercase tracking-wider text-[10px]">Package Name</th>
                                <th class="px-6 py-4 font-bold uppercase tracking-wider text-[10px]">Fee</th>
                                <th class="px-6 py-4 font-bold uppercase tracking-wider text-[10px]">Linked Course</th>
                                <th class="px-6 py-4 font-bold uppercase tracking-wider text-[10px] text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-800">
                            @foreach ($packages as $package)
                            <tr class="hover:bg-slate-800/30 transition">
                                <td class="px-6 py-4 font-bold text-white">{{ $package->package_name }}</td>
                                <td class="px-6 py-4">
                                    <span class="text-emerald-400 font-black">LKR {{ number_format($package->monthly_fee) }}</span>
                                </td>
                                <td class="px-6 py-4 text-slate-400">{{ $package->classModel->className ?? '-' }}</td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('package.edit', $package->id) }}" class="p-2 bg-slate-800 hover:bg-emerald-600 text-slate-400 hover:text-white rounded-lg transition">
                                            <i data-lucide="edit-3" class="w-4 h-4"></i>
                                        </a>
                                        <form action="{{ route('package.delete', $package->id) }}" method="POST" class="inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="p-2 bg-slate-800 hover:bg-red-500 text-slate-400 hover:text-white rounded-lg transition">
                                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        @foreach($classes as $class)
        <section class="mb-12">
            <h2 class="text-lg font-bold text-slate-400 mb-6 flex items-center gap-2">
                <i data-lucide="play" class="w-4 h-4"></i> {{ $class->className }} <span class="text-slate-600">/ Lessons</span>
            </h2>
            <div class="bg-slate-900 border border-slate-800 rounded-3xl overflow-hidden shadow-sm">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="bg-slate-800/50 text-slate-500">
                            <tr>
                                <th class="px-6 py-3 font-bold uppercase tracking-wider text-[9px]">Lesson Name</th>
                                <th class="px-6 py-3 font-bold uppercase tracking-wider text-[9px]">Type</th>
                                <th class="px-6 py-3 font-bold uppercase tracking-wider text-[9px]">Resources</th>
                                <th class="px-6 py-3 font-bold uppercase tracking-wider text-[9px] text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-800">
                            @forelse($class->lessons as $lesson)
                            <tr class="hover:bg-slate-800/20 transition">
                                <td class="px-6 py-4 font-semibold text-slate-200">{{ $lesson->name }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-0.5 {{ $lesson->is_paid ? 'bg-amber-500/10 text-amber-500' : 'bg-emerald-500/10 text-emerald-500' }} rounded text-[10px] font-bold uppercase">
                                        {{ $lesson->is_paid ? 'Paid' : 'Free' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    @if($lesson->file_path)
                                    <div class="flex items-center gap-1 text-royal-600 font-bold text-xs">
                                        <i data-lucide="file-text" class="w-3 h-3"></i> Attached
                                    </div>
                                    @else
                                    <span class="text-slate-600">-</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('lesson.edit', $lesson->id) }}" class="text-slate-500 hover:text-white transition"><i data-lucide="edit-3" class="w-4 h-4"></i></a>
                                        <form action="{{ route('lesson.delete', $lesson->id) }}" method="POST" class="inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-slate-500 hover:text-red-500 transition"><i data-lucide="trash-2" class="w-4 h-4"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="4" class="px-6 py-8 text-center text-slate-600 italic">No lessons in this course.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        @endforeach

    </main>

    <script>
        lucide.createIcons();
        // Simple Mobile Toggle
        const btn = document.querySelector('button[id="menu-toggle"]');
        const sidebar = document.querySelector('aside');
        if(btn) {
            btn.addEventListener('click', () => {
                sidebar.classList.toggle('-translate-x-full');
            });
        }
    </script>
</body>
</html>