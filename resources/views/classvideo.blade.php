<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $lesson->name }} - Lecture Hall</title>
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
                    }
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
        .glass-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }
    </style>
</head>
<body class="antialiased pb-12">

    <nav class="bg-white border-b border-gray-100 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <a href="{{ url()->previous() }}" class="flex items-center text-royal-600 font-bold text-sm hover:text-royal-900 transition">
                    <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
                    Back to Module
                </a>
                <div class="flex items-center gap-3">
                    <span class="text-xs font-bold text-gray-500 hidden sm:block">AtoZ Business School</span>
                    <div class="w-8 h-8 rounded-lg bg-royal-900 flex items-center justify-center text-white font-bold text-[10px]">
                        {{ substr(Auth::user()->name, 0, 2) }}
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12">
        <div class="grid lg:grid-cols-12 gap-8 items-start">
            
            <div class="lg:col-span-8 space-y-6">
                
                <div class="bg-white rounded-[2.5rem] p-8 md:p-12 shadow-2xl shadow-blue-100 border border-gray-100 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-royal-600/5 rounded-full blur-3xl -mr-32 -mt-32"></div>
                    
                    <div class="relative z-10 flex flex-col items-center text-center">
                        <div class="w-20 h-20 bg-royal-50 rounded-3xl flex items-center justify-center text-royal-600 mb-6 shadow-sm">
                            <i data-lucide="video" class="w-10 h-10"></i>
                        </div>
                        
                        <span class="px-4 py-1.5 bg-royal-100 text-royal-700 text-[10px] font-bold uppercase tracking-widest rounded-full mb-4">
                            Ready to stream
                        </span>
                        
                        <h1 class="text-3xl md:text-5xl font-extrabold text-gray-900 mb-4 tracking-tight">
                            {{ $lesson->name }}
                        </h1>
                        
                        <p class="text-gray-500 text-base md:text-lg max-w-lg mb-10 leading-relaxed">
                            Welcome to your online lecture. Click the button below to open the secure video player and start learning.
                        </p>

                        <a href="{{ $lesson->link }}" target="_blank" 
                           class="group w-full max-w-md bg-royal-600 text-white py-5 rounded-[2rem] font-black text-xl shadow-xl shadow-blue-200 hover:bg-royal-900 transition-all active:scale-[0.98] flex items-center justify-center gap-3">
                            <i data-lucide="play-circle" class="w-7 h-7 fill-current text-blue-300"></i>
                            Join Lecture Now
                        </a>
                        
                        <div class="mt-6 flex items-center gap-6 text-gray-400 font-bold text-[10px] uppercase tracking-widest">
                            <span class="flex items-center gap-1.5"><i data-lucide="check-circle-2" class="w-4 h-4 text-green-500"></i> Secure Connection</span>
                            <span class="flex items-center gap-1.5"><i data-lucide="users" class="w-4 h-4 text-blue-500"></i> Student Portal</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-sm">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">Lecture Overview</h2>
                    <p class="text-gray-600 leading-relaxed text-sm md:text-base">
                        {{ $lesson->description ?? 'No specific description provided for this lesson.' }}
                    </p>

                    @if($lesson->notice)
                        <div class="mt-8 flex gap-4 p-5 bg-amber-50 border border-amber-100 rounded-2xl">
                            <i data-lucide="alert-circle" class="w-6 h-6 text-amber-600 flex-shrink-0"></i>
                            <div>
                                <h4 class="font-bold text-amber-900 text-sm">Teacher's Notice</h4>
                                <p class="text-amber-800 text-sm mt-1">{{ $lesson->notice }}</p>
                            </div>
                        </div>
                    @endif
                </div>

            </div>

            <div class="lg:col-span-4 space-y-6">
                
                <div class="bg-royal-900 rounded-[2rem] p-8 text-white shadow-xl shadow-blue-900/10">
                    <h3 class="text-lg font-bold mb-6 flex items-center gap-3">
                        <i data-lucide="folder-down" class="w-5 h-5 text-blue-400"></i>
                        Lesson Resources
                    </h3>
                    
                    @if($lesson->file_path)
                    <div class="space-y-3">
                        <a href="{{ route('storage.file', ['encoded' => base64_encode($lesson->file_path)]) }}" 
                           class="flex items-center justify-between p-4 bg-white/10 hover:bg-white/20 border border-white/10 rounded-2xl transition group">
                            <div class="flex items-center gap-3">
                                <i data-lucide="file-text" class="w-5 h-5 text-blue-300"></i>
                                <span class="text-sm font-semibold">Lecture Tute</span>
                            </div>
                            <i data-lucide="download" class="w-4 h-4 opacity-0 group-hover:opacity-100 transition"></i>
                        </a>
                    </div>
                    @else
                    <div class="text-center py-6 border-2 border-dashed border-white/10 rounded-2xl">
                        <p class="text-blue-100/40 text-xs font-bold uppercase tracking-widest">No files available</p>
                    </div>
                    @endif
                </div>

                <div class="bg-white rounded-[2rem] p-8 border border-gray-100 shadow-sm">
                    <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center gap-3">
                        <i data-lucide="list-checks" class="w-5 h-5 text-royal-600"></i>
                        Module Outline
                    </h3>
                    
                    <div class="space-y-4">
                        <p class="text-sm text-gray-500 italic">This section will show the module outline for the current class.</p>
                        
                        <div class="flex items-center gap-4 text-xs font-bold text-gray-400 border-t border-gray-50 pt-6">
                            <div class="flex items-center gap-1.5"><i data-lucide="calendar" class="w-4 h-4"></i> {{ $lesson->month ?? 'Current Month' }}</div>
                            <div class="flex items-center gap-1.5"><i data-lucide="lock" class="w-4 h-4"></i> {{ $lesson->is_paid ? 'Paid' : 'Free' }}</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>