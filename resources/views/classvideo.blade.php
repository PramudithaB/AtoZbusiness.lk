<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $lesson->name }} | Lasindu Senarath Lecture Hall</title>
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

    <!-- Navbar -->
    <nav class="bg-white/90 backdrop-blur-md border-b border-slate-200/80 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <a href="{{ url()->previous() }}" class="flex items-center text-xs font-bold text-blue-700 hover:text-navy-950 transition gap-2">
                    <i data-lucide="arrow-left" class="w-4 h-4"></i> Back to Course Modules
                </a>
                
                <div class="flex items-center gap-3">
                    <span class="text-xs font-bold text-slate-500 hidden sm:block">AtoZ Business School</span>
                    <div class="w-9 h-9 rounded-xl bg-navy-900 flex items-center justify-center text-white font-bold text-xs">
                        {{ strtoupper(substr(Auth::user()->name ?? 'ST', 0, 2)) }}
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Player Area -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12 flex-1 w-full">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- Video Player Card -->
            <div class="lg:col-span-8 space-y-6">
                
                <div class="bg-white rounded-3xl p-8 sm:p-12 shadow-xl border border-slate-200/90 relative overflow-hidden text-center">
                    <div class="w-20 h-20 bg-blue-50 text-blue-700 rounded-3xl flex items-center justify-center mx-auto mb-6 shadow-sm">
                        <i data-lucide="video" class="w-10 h-10"></i>
                    </div>

                    <span class="px-4 py-1 rounded-full text-xs font-bold uppercase tracking-widest bg-blue-50 text-blue-700 inline-block mb-3">
                        Lecture Hall Stream
                    </span>

                    <h1 class="text-2xl sm:text-4xl font-extrabold text-navy-950 tracking-tight mb-4">
                        {{ $lesson->name }}
                    </h1>

                    <p class="text-slate-500 text-sm sm:text-base max-w-lg mx-auto mb-8 leading-relaxed">
                        Welcome to your online lecture session. Click the button below to launch the video player in high definition.
                    </p>

                    @if($lesson->link)
                    <a href="{{ $lesson->link }}" target="_blank" 
                       class="inline-flex items-center justify-center gap-3 px-8 py-4 bg-navy-900 hover:bg-blue-700 text-white font-extrabold text-base rounded-2xl shadow-xl shadow-navy-950/20 active:scale-[0.98] transition">
                        <i data-lucide="play-circle" class="w-6 h-6 text-sky-400"></i>
                        <span>Launch Lecture Player</span>
                    </a>
                    @else
                    <div class="p-4 rounded-xl bg-slate-100 text-slate-500 text-xs font-medium max-w-xs mx-auto">
                        Video link is being processed by the teacher.
                    </div>
                    @endif

                    <div class="mt-8 pt-6 border-t border-slate-100 flex items-center justify-center gap-6 text-[11px] font-bold uppercase tracking-wider text-slate-400">
                        <span class="flex items-center gap-1.5"><i data-lucide="shield-check" class="w-4 h-4 text-emerald-500"></i> Secure Stream</span>
                        <span class="flex items-center gap-1.5"><i data-lucide="check-circle" class="w-4 h-4 text-blue-500"></i> Authenticated Access</span>
                    </div>
                </div>

                <!-- Lecture Overview & Notice -->
                <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/90 shadow-sm space-y-6">
                    <div>
                        <h2 class="text-lg font-bold text-navy-950 mb-2">Lecture Overview</h2>
                        <p class="text-slate-600 text-sm leading-relaxed">
                            {{ $lesson->description ?: 'No detailed syllabus summary provided for this individual lecture.' }}
                        </p>
                    </div>

                    @if($lesson->notice)
                    <div class="p-5 rounded-2xl bg-amber-50/80 border border-amber-200 flex items-start gap-4">
                        <i data-lucide="alert-circle" class="w-5 h-5 text-amber-600 flex-shrink-0 mt-0.5"></i>
                        <div>
                            <h4 class="text-xs font-bold text-amber-900 uppercase tracking-wider">Teacher's Note</h4>
                            <p class="text-xs text-amber-800 mt-1 leading-relaxed">{{ $lesson->notice }}</p>
                        </div>
                    </div>
                    @endif
                </div>

            </div>

            <!-- Sidebar Resources -->
            <div class="lg:col-span-4 space-y-6">
                
                <!-- Lecture Tute Attachment -->
                <div class="bg-navy-950 rounded-3xl p-6 sm:p-8 text-white shadow-xl space-y-4 border border-navy-800">
                    <h3 class="text-base font-bold flex items-center gap-2 text-white">
                        <i data-lucide="folder-down" class="w-5 h-5 text-sky-400"></i>
                        Study Material
                    </h3>

                    @if($lesson->file_path)
                    <a href="{{ route('storage.file', ['encoded' => base64_encode($lesson->file_path)]) }}" 
                       target="_blank"
                       class="flex items-center justify-between p-4 bg-white/10 hover:bg-white/20 border border-white/10 rounded-2xl transition group text-xs font-semibold">
                        <div class="flex items-center gap-3">
                            <i data-lucide="file-text" class="w-5 h-5 text-sky-300"></i>
                            <span class="truncate">Lecture Handout PDF</span>
                        </div>
                        <i data-lucide="download" class="w-4 h-4 text-sky-400 group-hover:translate-y-0.5 transition-transform"></i>
                    </a>
                    @else
                    <div class="py-6 text-center border-2 border-dashed border-white/10 rounded-2xl text-xs text-slate-400 font-medium">
                        No tutorial document attached for this lecture
                    </div>
                    @endif
                </div>

                <!-- Instructor Card -->
                <div class="bg-white rounded-3xl p-6 border border-slate-200/90 shadow-sm space-y-4">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400">Instructor</h3>
                    <div class="flex items-center gap-3.5">
                        <img src="{{ asset('images/lasindu1.jpeg') }}" alt="Lasindu Senarath" class="w-12 h-12 rounded-xl object-cover">
                        <div>
                            <h4 class="text-sm font-bold text-navy-950">Lasindu Senarath</h4>
                            <p class="text-[11px] text-slate-400">BBA (Hons), MBA (PIM-SJP)</p>
                            <p class="text-[11px] text-blue-700 font-semibold">Ada Derana Education</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </main>

    <footer class="bg-white border-t border-slate-200/80 py-8 px-4 text-center text-xs text-slate-400">
        &copy; 2026 Lasindu Senarath LMS • AtoZ Business School
    </footer>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>