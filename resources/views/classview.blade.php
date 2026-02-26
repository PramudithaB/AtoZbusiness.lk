<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $class->className }} | LTBio.lk</title>
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
            color: #1e293b;
        }
        .glass-header {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
        }
    </style>
</head>
<body class="antialiased">

    <nav class="glass-header sticky top-0 z-50 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-14">
                <a href="{{ route('dashboard') }}" class="flex items-center text-royal-600 font-bold text-sm hover:text-royal-900 transition">
                    <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
                    Dashboard
                </a>
                <div class="flex items-center gap-3">
                    <span class="text-xs font-bold text-gray-600 hidden sm:block">{{ Auth::user()->name }}</span>
                    <div class="w-8 h-8 rounded-lg bg-royal-900 flex items-center justify-center text-white font-bold text-[10px]">
                        {{ substr(Auth::user()->name, 0, 2) }}
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 md:py-10">

        <div class="bg-royal-900 rounded-3xl p-6 md:p-10 mb-8 relative overflow-hidden text-white shadow-xl">
            <div class="absolute top-0 right-0 w-64 h-64 bg-royal-600/20 rounded-full blur-[80px] -mr-32 -mt-32"></div>
            
            <div class="relative z-10">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-white/10 border border-white/10 rounded-full text-[10px] font-bold uppercase tracking-widest mb-4">
                    <i data-lucide="award" class="w-3 h-3 text-blue-300"></i>
                    Academic Theory
                </div>
                <h1 class="text-2xl md:text-5xl font-extrabold tracking-tight mb-3">{{ $class->className }}</h1>
                <p class="text-blue-100/70 text-sm md:text-base max-w-xl mb-6 leading-relaxed">Curated by Lakshitha Thennakoon. Master your subject with structured video lessons and materials.</p>
                
                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                    <div class="bg-white/5 backdrop-blur-sm border border-white/10 p-3 rounded-xl">
                        <p class="text-[9px] text-blue-300 font-bold uppercase mb-1">Subject</p>
                        <p class="text-xs md:text-sm font-semibold">Biology</p>
                    </div>
                    <div class="bg-white/5 backdrop-blur-sm border border-white/10 p-3 rounded-xl">
                        <p class="text-[9px] text-blue-300 font-bold uppercase mb-1">Type</p>
                        <p class="text-xs md:text-sm font-semibold">Theory</p>
                    </div>
                    <div class="bg-white/5 backdrop-blur-sm border border-white/10 p-3 rounded-xl">
                        <p class="text-[9px] text-blue-300 font-bold uppercase mb-1">Batch</p>
                        <p class="text-xs md:text-sm font-semibold">2026</p>
                    </div>
                    <div class="bg-white/5 backdrop-blur-sm border border-white/10 p-3 rounded-xl">
                        <p class="text-[9px] text-blue-300 font-bold uppercase mb-1">Status</p>
                        <p class="text-xs md:text-sm font-semibold text-green-400">Enrolled</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-12">
            <div class="flex items-center gap-4 mb-6">
                <h2 class="text-xl md:text-2xl font-extrabold text-royal-900 whitespace-nowrap">Video Lessons</h2>
                <div class="h-px w-full bg-gray-200"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
                @forelse($class->lessons as $lesson)
                <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-all flex flex-col">
                    <div class="mb-4">
                        <div class="w-10 h-10 bg-royal-50 rounded-xl flex items-center justify-center text-royal-600 mb-4">
                            <i data-lucide="play" class="w-5 h-5"></i>
                        </div>
                        <h4 class="text-base font-bold text-gray-900 mb-1 leading-snug">{{ $lesson->name }}</h4>
                        <p class="text-gray-500 text-xs line-clamp-2 leading-relaxed">{{ $lesson->description ?? 'No extra info.' }}</p>
                    </div>

                    @php
                        $videoRoute = route('classvideo', $lesson->id);
                        $canView = ! $lesson->is_paid;
                        // ... existing PHP permission logic ...
                        if ($lesson->is_paid && auth()->check()) {
                            $userId = auth()->id(); $userName = auth()->user()->name ?? null; $classId = $lesson->class_id;
                            $hasApproved = \App\Models\Checkout::where('status', 'approved')
                                ->whereRaw("CONCAT(',', REPLACE(class_id, ' ', ''), ',') LIKE ?", ['%,' . $classId . ',%'])
                                ->where(function($q) use ($userId, $userName) {
                                    $q->where('user_id', $userId);
                                    if ($userName) { $q->orWhere('student_name', $userName); }
                                })->exists();
                            if ($hasApproved) { $canView = true; }
                        }
                    @endphp

                    <div class="mt-auto pt-4">
                        @if($canView)
                            <a href="{{ $videoRoute }}" class="w-full flex items-center justify-center py-2.5 bg-royal-600 text-white text-xs font-bold rounded-xl hover:bg-royal-700 transition gap-2 shadow-sm">
                                Watch Now
                            </a>
                        @else
                            <a href="{{ route('buyclass') }}" class="w-full flex items-center justify-center py-2.5 bg-gray-900 text-white text-xs font-bold rounded-xl hover:bg-black transition gap-2">
                                <i data-lucide="lock" class="w-3 h-3"></i> Unlock
                            </a>
                        @endif
                    </div>
                </div>
                @empty
                    <div class="col-span-full py-12 text-center bg-white rounded-2xl border border-dashed border-gray-200">
                        <p class="text-gray-400 text-sm">No lessons available yet.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <div class="bg-white rounded-3xl p-6 md:p-8 border border-gray-100 shadow-sm">
            <h2 class="text-xl md:text-2xl font-extrabold text-royal-900 mb-6 flex items-center gap-2">
                <i data-lucide="file-text" class="w-6 h-6 text-royal-600"></i>
                Study Materials
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <div class="flex items-center justify-between p-4 rounded-2xl bg-gray-50/50 border border-gray-100 hover:border-royal-200 transition-all">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 bg-white rounded-xl shadow-sm flex items-center justify-center text-red-500">
                            <i data-lucide="file-text" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <p class="font-bold text-gray-900 text-sm">Lecture Notes</p>
                            <p class="text-[10px] text-gray-400 font-medium">PDF • 4.2 MB</p>
                        </div>
                    </div>
                    <button class="px-4 py-1.5 text-xs font-bold text-royal-600 border border-royal-600 rounded-lg hover:bg-royal-600 hover:text-white transition">
                        Download
                    </button>
                </div>

                <div class="flex items-center justify-between p-4 rounded-2xl bg-gray-50/50 border border-gray-100 hover:border-royal-200 transition-all">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 bg-white rounded-xl shadow-sm flex items-center justify-center text-blue-500">
                            <i data-lucide="edit-3" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <p class="font-bold text-gray-900 text-sm">Practice Paper</p>
                            <p class="text-[10px] text-gray-400 font-medium">MCQ • Dec 2025</p>
                        </div>
                    </div>
                    <button class="px-4 py-1.5 text-xs font-bold text-royal-600 border border-royal-600 rounded-lg hover:bg-royal-600 hover:text-white transition">
                        View
                    </button>
                </div>
            </div>
        </div>
    </main>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>