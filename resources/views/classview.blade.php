<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $class->className }} | Lasindu Senarath LMS</title>
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
    </style>
</head>

<body class="antialiased min-h-screen flex flex-col">

    <!-- Top Navigation -->
    <nav class="bg-white/90 backdrop-blur-md border-b border-slate-200/80 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <a href="{{ route('dashboard') }}" class="flex items-center text-xs font-bold text-blue-700 hover:text-navy-950 transition gap-2">
                    <i data-lucide="arrow-left" class="w-4 h-4"></i> Back to Dashboard
                </a>
                
                <div class="flex items-center gap-3">
                    <div class="text-right hidden sm:block">
                        <span class="text-xs font-bold text-navy-950 block leading-none">{{ Auth::user()->name ?? 'Student' }}</span>
                        <span class="text-[10px] text-slate-400 font-semibold uppercase">Student Portal</span>
                    </div>
                    <div class="w-9 h-9 rounded-xl bg-navy-900 flex items-center justify-center text-white font-bold text-xs">
                        {{ strtoupper(substr(Auth::user()->name ?? 'ST', 0, 2)) }}
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-10 flex-1 w-full space-y-10">

        <!-- Course Header Banner -->
        <div class="bg-navy-950 rounded-3xl p-8 sm:p-12 text-white shadow-xl relative overflow-hidden border border-navy-800">
            <div class="absolute -top-20 -right-20 w-80 h-80 bg-sky-500/20 rounded-full blur-3xl pointer-events-none"></div>

            <div class="relative z-10 space-y-4">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-white/10 border border-white/10 rounded-full text-[10px] font-bold uppercase tracking-widest text-sky-300">
                    <i data-lucide="award" class="w-3.5 h-3.5 text-sky-400"></i>
                    A/L Business Studies
                </div>

                <h1 class="text-2xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white leading-tight">
                    {{ $class->className }}
                </h1>

                <p class="text-slate-300 text-sm sm:text-base max-w-2xl leading-relaxed">
                    {{ $class->description ?: 'Comprehensive video lectures and study material curated by Lasindu Senarath.' }}
                </p>

                <!-- Course Metadata Badges -->
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 pt-4 max-w-3xl">
                    <div class="bg-white/[0.06] border border-white/10 p-3.5 rounded-2xl">
                        <span class="text-[9px] text-sky-300 font-bold uppercase tracking-wider block">Teacher</span>
                        <span class="text-xs sm:text-sm font-bold text-white">{{ $class->teacherName ?: 'Lasindu Senarath' }}</span>
                    </div>

                    <div class="bg-white/[0.06] border border-white/10 p-3.5 rounded-2xl">
                        <span class="text-[9px] text-sky-300 font-bold uppercase tracking-wider block">Study Month</span>
                        <span class="text-xs sm:text-sm font-bold text-white">{{ $class->month ?: 'General' }}</span>
                    </div>

                    <div class="bg-white/[0.06] border border-white/10 p-3.5 rounded-2xl">
                        <span class="text-[9px] text-sky-300 font-bold uppercase tracking-wider block">Sessions</span>
                        <span class="text-xs sm:text-sm font-bold text-white">{{ $class->sessionCount ?: $class->lessons->count() }} Lessons</span>
                    </div>

                    <div class="bg-white/[0.06] border border-white/10 p-3.5 rounded-2xl">
                        <span class="text-[9px] text-sky-300 font-bold uppercase tracking-wider block">Schedule</span>
                        <span class="text-xs sm:text-sm font-bold text-white truncate block">{{ $class->classTime ?: 'Online Available' }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Lessons Grid Section -->
        <section class="space-y-6">
            <div class="flex items-center justify-between border-b border-slate-200/80 pb-4">
                <div>
                    <h2 class="text-xl sm:text-2xl font-extrabold text-navy-950">Video Lectures & Modules</h2>
                    <p class="text-xs text-slate-500 mt-0.5">Stream recorded lectures or access free preview sessions.</p>
                </div>
                <span class="px-3 py-1 bg-slate-100 text-slate-700 text-xs font-bold rounded-lg uppercase">
                    {{ $class->lessons->count() }} Lecture{{ $class->lessons->count() === 1 ? '' : 's' }}
                </span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($class->lessons as $lesson)
                <div class="bg-white p-6 rounded-3xl border border-slate-200/90 shadow-sm hover:shadow-md hover:border-blue-500 transition-all flex flex-col justify-between group">
                    
                    <div>
                        <!-- Lesson Header -->
                        <div class="flex items-start justify-between gap-3 mb-4">
                            <div class="w-11 h-11 rounded-2xl bg-blue-50 text-blue-700 flex items-center justify-center flex-shrink-0 group-hover:bg-blue-700 group-hover:text-white transition">
                                <i data-lucide="play" class="w-5 h-5"></i>
                            </div>

                            <span class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider {{ $lesson->is_paid ? 'bg-amber-50 text-amber-700 border border-amber-200' : 'bg-emerald-50 text-emerald-700 border border-emerald-200' }}">
                                {{ $lesson->is_paid ? 'Paid Access' : 'Free Preview' }}
                            </span>
                        </div>

                        <h3 class="text-base font-bold text-navy-950 leading-snug mb-2 group-hover:text-blue-700 transition">
                            {{ $lesson->name }}
                        </h3>

                        <p class="text-slate-500 text-xs line-clamp-3 leading-relaxed mb-6">
                            {{ $lesson->description ?: 'Standard lecture video and syllabus materials for this module.' }}
                        </p>
                    </div>

                    @php
                        $videoRoute = route('classvideo', $lesson->id);
                        $canView = ! $lesson->is_paid;
                        if ($lesson->is_paid && auth()->check()) {
                            $userId = auth()->id(); 
                            $userName = auth()->user()->name ?? null; 
                            $classId = $lesson->class_id;
                            $hasApproved = \App\Models\Checkout::where('status', 'approved')
                                ->whereRaw("CONCAT(',', REPLACE(class_id, ' ', ''), ',') LIKE ?", ['%,' . $classId . ',%'])
                                ->where(function($q) use ($userId, $userName) {
                                    $q->where('user_id', $userId);
                                    if ($userName) { $q->orWhere('student_name', $userName); }
                                })->exists();
                            if ($hasApproved) { $canView = true; }
                        }
                    @endphp

                    <div class="pt-4 border-t border-slate-100">
                        @if($canView)
                            <a href="{{ $videoRoute }}" 
                               class="w-full flex items-center justify-center py-3 bg-navy-900 hover:bg-blue-700 text-white text-xs font-bold rounded-xl transition shadow-md gap-2">
                                <i data-lucide="play-circle" class="w-4 h-4 text-sky-400"></i>
                                Stream Lecture
                            </a>
                        @else
                            <a href="{{ route('buyclass') }}" 
                               class="w-full flex items-center justify-center py-3 bg-slate-900 hover:bg-black text-white text-xs font-bold rounded-xl transition gap-2">
                                <i data-lucide="lock" class="w-4 h-4 text-amber-400"></i>
                                Unlock via Enrollment
                            </a>
                        @endif
                    </div>

                </div>
                @empty
                <div class="col-span-full py-16 text-center bg-white rounded-3xl border border-dashed border-slate-300 p-8">
                    <i data-lucide="video" class="w-12 h-12 text-slate-300 mx-auto mb-3"></i>
                    <h3 class="text-base font-bold text-navy-950 mb-1">No video lectures posted for this course yet</h3>
                    <p class="text-xs text-slate-500">Upcoming sessions will be scheduled and displayed here.</p>
                </div>
                @endforelse
            </div>
        </section>

    </main>

    <footer class="bg-white border-t border-slate-200/80 py-8 px-4 text-center text-xs text-slate-400">
        &copy; 2026 Lasindu Senarath LMS • AtoZ Business School
    </footer>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>