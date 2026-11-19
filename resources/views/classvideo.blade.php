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
        #classVideoWrap:fullscreen,
        #classVideoWrap:-webkit-full-screen {
            width: 100vw !important;
            height: 100vh !important;
            padding-bottom: 0 !important;
            border-radius: 0 !important;
            background: #000 !important;
        }
        #classVideoWrap:fullscreen iframe,
        #classVideoWrap:-webkit-full-screen iframe {
            top: -62px !important;
            height: calc(100% + 62px) !important;
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
                
                @php
                    $ytUrl = $lesson->link ?? '';
                    $ytEmbedUrl = '';
                    if (preg_match('/(?:youtube(?:-nocookie)?\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=|(?:shorts\/))|youtu\.be\/)([a-zA-Z0-9_-]{11})/i', $ytUrl, $matches)) {
                        $ytEmbedUrl = 'https://www.youtube-nocookie.com/embed/' . $matches[1] . '?autoplay=1&rel=0&modestbranding=1&playsinline=1&controls=1&fs=0&enablejsapi=1&origin=' . urlencode(url('/'));
                    }
                @endphp

                <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-xl border border-slate-200/90 relative overflow-hidden">
                    <div class="flex flex-wrap items-center justify-between gap-3 mb-5">
                        <div class="flex items-center gap-3">
                            <span class="px-3.5 py-1 rounded-full text-xs font-bold uppercase tracking-widest bg-blue-50 text-blue-700">
                                Lecture Hall Stream
                            </span>
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200/60">
                                <i data-lucide="shield-check" class="w-3.5 h-3.5"></i> In-Site Player
                            </span>
                        </div>
                        @if($ytEmbedUrl)
                        <button type="button" onclick="togglePlayerFullscreen()" class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl text-xs font-semibold bg-slate-100 hover:bg-slate-200 text-slate-700 transition cursor-pointer">
                            <i data-lucide="maximize" class="w-3.5 h-3.5"></i> Fullscreen
                        </button>
                        @endif
                    </div>

                    <h1 class="text-xl sm:text-3xl font-extrabold text-navy-950 tracking-tight mb-6">
                        {{ $lesson->name }}
                    </h1>

                    @if($ytEmbedUrl)
                    <!-- Secure In-Site Embedded Video Player (Cropped top bar to hide Copy Link icon) -->
                    <div id="classVideoWrap" class="relative w-full rounded-2xl overflow-hidden bg-black shadow-2xl border border-navy-900/10 mb-6 select-none" style="padding-bottom: 56.25%;" oncontextmenu="return false;">
                        <iframe src="{{ $ytEmbedUrl }}" 
                                class="absolute left-0 w-full border-0" 
                                style="top: -62px; height: calc(100% + 62px);"
                                title="{{ $lesson->name }}" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                sandbox="allow-scripts allow-same-origin allow-presentation allow-forms"
                                allowfullscreen>
                        </iframe>
                    </div>
                    @elseif($lesson->link)
                    <!-- Fallback Player Button -->
                    <div class="text-center py-8">
                        <a href="{{ $lesson->link }}" target="_blank" 
                           class="inline-flex items-center justify-center gap-3 px-8 py-4 bg-navy-900 hover:bg-blue-700 text-white font-extrabold text-base rounded-2xl shadow-xl shadow-navy-950/20 active:scale-[0.98] transition">
                            <i data-lucide="play-circle" class="w-6 h-6 text-sky-400"></i>
                            <span>Launch Video Stream</span>
                        </a>
                    </div>
                    @else
                    <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200 text-slate-500 text-sm font-medium text-center max-w-md mx-auto my-6">
                        <i data-lucide="clock" class="w-8 h-8 text-slate-400 mx-auto mb-2"></i>
                        වීඩියෝ පාඩම ඉක්මනින් සක්‍රීය කෙරේ. කරුණාකර රැඳී සිටින්න.
                    </div>
                    @endif

                    <div class="pt-4 border-t border-slate-100 flex flex-wrap items-center justify-between gap-4 text-[11px] font-bold uppercase tracking-wider text-slate-400">
                        <span class="flex items-center gap-1.5"><i data-lucide="shield-check" class="w-4 h-4 text-emerald-500"></i> Secure LMS Player</span>
                        <span class="flex items-center gap-1.5"><i data-lucide="check-circle" class="w-4 h-4 text-blue-500"></i> Authenticated Student Access</span>
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
        function togglePlayerFullscreen() {
            const wrap = document.getElementById('classVideoWrap');
            if (!wrap) return;
            if (!document.fullscreenElement) {
                if (wrap.requestFullscreen) wrap.requestFullscreen();
                else if (wrap.webkitRequestFullscreen) wrap.webkitRequestFullscreen();
            } else {
                if (document.exitFullscreen) document.exitFullscreen();
                else if (document.webkitExitFullscreen) document.webkitExitFullscreen();
            }
        }
        lucide.createIcons();
    </script>
</body>
</html>