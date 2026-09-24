<!DOCTYPE html>
<html lang="si">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Lasindu Senarath | AtoZ Business School</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('images/logo.jpeg') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Noto+Sans+Sinhala:wght@400;500;600;700&display=swap" rel="stylesheet">
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
        .sinhala-font {
            font-family: 'Noto Sans Sinhala', 'Plus Jakarta Sans', sans-serif;
        }
        .hero-pattern {
            background-image: 
                radial-gradient(circle at 80% 20%, rgba(56, 189, 248, 0.18) 0%, transparent 50%),
                radial-gradient(circle at 20% 80%, rgba(29, 78, 216, 0.22) 0%, transparent 50%),
                linear-gradient(135deg, #061325 0%, #0a1d35 100%);
        }
    </style>
</head>

<body class="antialiased min-h-screen flex flex-col">

    <!-- ==============================================================
         NAVIGATION BAR
    ============================================================== -->
    <nav class="bg-white/90 backdrop-blur-md border-b border-slate-200/80 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                
                <a href="{{ auth()->check() ? route('dashboard') : route('login') }}" class="flex items-center gap-3 group">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-navy-900 to-blue-700 p-0.5 shadow-md shadow-blue-900/10">
                        <div class="w-full h-full bg-white rounded-[10px] flex items-center justify-center overflow-hidden">
                            <img src="{{ asset('images/logo.jpeg') }}" alt="AtoZ Logo" class="w-full h-full object-cover">
                        </div>
                    </div>
                    <div>
                        <span class="text-[10px] font-extrabold text-blue-700 uppercase tracking-widest block">AtoZ Business School</span>
                        <span class="text-base font-extrabold text-navy-950 tracking-tight leading-none">LASINDU SENARATH</span>
                    </div>
                </a>

                <div class="flex items-center gap-3">
                    @auth
                        <a href="{{ route('dashboard') }}" 
                           class="px-4 py-2.5 rounded-xl bg-navy-50 text-navy-900 font-bold text-xs hover:bg-navy-100 transition flex items-center gap-2">
                            <i data-lucide="layout-dashboard" class="w-4 h-4 text-blue-700"></i>
                            Back to Student Portal
                        </a>
                    @else
                        <a href="{{ route('login') }}" 
                           class="px-5 py-2.5 rounded-xl bg-navy-900 hover:bg-navy-800 text-white font-bold text-xs transition shadow-md flex items-center gap-2">
                            <i data-lucide="log-in" class="w-4 h-4"></i>
                            Student Login
                        </a>
                    @endauth
                </div>

            </div>
        </div>
    </nav>

    <!-- ==============================================================
         TEACHER HERO SECTION
    ============================================================== -->
    <header class="hero-pattern text-white py-16 lg:py-24 px-4 sm:px-6 lg:px-8 relative overflow-hidden border-b border-navy-900">
        <div class="max-w-7xl mx-auto relative z-10 grid lg:grid-cols-12 gap-10 items-center">
            
            <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 backdrop-blur-md border border-white/10 text-xs font-bold text-sky-300">
                    <span class="w-2 h-2 rounded-full bg-sky-400"></span>
                    ADVANCED LEVEL BUSINESS STUDIES
                </div>

                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-white leading-tight">
                    About <br/>
                    <span class="bg-gradient-to-r from-sky-400 via-blue-200 to-white bg-clip-text text-transparent">
                        Lasindu Senarath
                    </span>
                </h1>

                <!-- Qualifications list -->
                <ul class="space-y-2.5 text-slate-300 text-sm sm:text-base max-w-xl text-left mx-auto lg:mx-0">
                    <li class="flex items-start gap-3">
                        <i data-lucide="check-circle" class="w-5 h-5 text-sky-400 flex-shrink-0 mt-0.5"></i>
                        <span>BBA (Hons) Specialized in Marketing Management (Sri Lanka Institute of Information Technology - SLIIT)</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i data-lucide="check-circle" class="w-5 h-5 text-sky-400 flex-shrink-0 mt-0.5"></i>
                        <span>Reading Master of Business Administration (PIM – University of Sri Jayewardenepura)</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i data-lucide="check-circle" class="w-5 h-5 text-sky-400 flex-shrink-0 mt-0.5"></i>
                        <span>Teacher at Ada Derana Education</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i data-lucide="check-circle" class="w-5 h-5 text-sky-400 flex-shrink-0 mt-0.5"></i>
                        <span>University Visiting Lecturer</span>
                    </li>
                </ul>

                <!-- Physical Class Centers -->
                <div class="pt-4 flex flex-wrap justify-center lg:justify-start gap-2.5">
                    <span class="px-3.5 py-1.5 rounded-full bg-white/10 backdrop-blur-sm border border-white/10 text-xs font-semibold text-sky-200">
                        📍 හොරණ - ශිල්ප
                    </span>
                    <span class="px-3.5 py-1.5 rounded-full bg-white/10 backdrop-blur-sm border border-white/10 text-xs font-semibold text-sky-200">
                        📍 නුගේගොඩ - රොටරි
                    </span>
                    <span class="px-3.5 py-1.5 rounded-full bg-sky-500/20 backdrop-blur-sm border border-sky-400/30 text-xs font-bold text-sky-300">
                        🌐 Online - ලංකාවටම
                    </span>
                </div>
            </div>

            <!-- Teacher Portrait Photo Card -->
            <div class="lg:col-span-5 flex justify-center">
                <div class="relative group">
                    <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-sky-400 rounded-3xl blur-xl opacity-50 group-hover:opacity-75 transition duration-500"></div>
                    <div class="relative rounded-3xl overflow-hidden border-2 border-white/20 shadow-2xl bg-navy-950 max-w-sm">
                        <img src="{{ asset('images/lasindu1.jpeg') }}" 
                             alt="Lasindu Senarath" 
                             class="w-full h-auto object-cover transform group-hover:scale-105 transition duration-500">
                        <div class="p-5 bg-navy-950/90 backdrop-blur-md border-t border-white/10 text-center">
                            <h3 class="text-lg font-extrabold text-white">Lasindu Senarath</h3>
                            <p class="text-xs text-sky-300 font-semibold">Lecturer & Mentor • Business Studies</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </header>

    <!-- ==============================================================
         DETAILED BIOGRAPHY SECTION (Exact Existing Sinhala Content)
    ============================================================== -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-16 flex-1 w-full">

        <!-- Who We Are / About Section -->
        <section class="bg-white rounded-3xl p-8 sm:p-12 border border-slate-200/90 shadow-sm space-y-8">
            <div class="border-b border-slate-100 pb-5">
                <span class="text-xs font-extrabold text-blue-700 uppercase tracking-widest block mb-1">WHO WE ARE</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-navy-950">About Lasindu Senarath</h2>
            </div>

            <div class="grid lg:grid-cols-12 gap-8 items-start">
                
                <!-- Sinhala Biography Text (Exact Content Preserved) -->
                <div class="lg:col-span-8 space-y-4">
                    <p class="sinhala-font text-slate-700 text-base sm:text-lg leading-relaxed text-justify">
                        ඔබේ ගුරුවරයා Ada Derana Education නාලිකාවේ දේශකවරයෙකි. ශ්‍රි ලංකා තොරතුරු තාක්ෂණ විශ්වවිද්‍යාලයෙන් ව්‍යාපාර පරිපාලනවේදී (ගෞරව) අලෙවි කළමනාකරණ (විශේෂ) උපාධිය සම්පූර්ණ කර ඇත. ශ්‍රී ජයවර්ධනපුර විශ්ව විද්‍යාලයේ පශ්චාත් උපාධි අධ්‍යයන ආයතනයේ ව්‍යාපාර පරිපාලන පශ්චාත් උපාධිය හදාරමින් සිටී. අලෙවිකරණය, ආයෝජනය සහ ව්‍යාපාර කළමනාකරණය දේශීය මෙන්ම ජාත්‍යන්තරවද අත්දැකීම් ඇති Lakro Global Holdings (Pvt) Ltd ආයතනයේ නිර්මාතෘවරයා ය. ඒ හැමදේටම වඩා Commerce සහ Business Studies ඉගැන්වීමට වසර ගණනාවක පළපුරුද්ද සහිත කෙටි කාලයක් තුල සිසුන් 500කට A/B සාමාර්ථ සඳහා මඟපෙන්වූ තරුණ ගුරුවරයෙකි.
                    </p>
                </div>

                <!-- Highlight Cards -->
                <div class="lg:col-span-4 space-y-3">
                    <div class="p-5 rounded-2xl bg-navy-50 border-l-4 border-navy-900 shadow-sm">
                        <strong class="sinhala-font text-base text-navy-950 block font-bold">
                            විශිෂ්ට අධ්‍යාපන සුදුසුකම්
                        </strong>
                        <p class="text-xs text-slate-500 mt-1">SLIIT BBA (Hons) & PIM-SJP MBA</p>
                    </div>

                    <div class="p-5 rounded-2xl bg-blue-50 border-l-4 border-blue-700 shadow-sm">
                        <strong class="sinhala-font text-base text-blue-950 block font-bold">
                            වසර ගණනාවක පළපුරුද්ද
                        </strong>
                        <p class="text-xs text-blue-700 mt-1">5+ Years of teaching & mentoring</p>
                    </div>

                    <div class="p-5 rounded-2xl bg-sky-50 border-l-4 border-sky-500 shadow-sm">
                        <strong class="sinhala-font text-base text-navy-950 block font-bold">
                            නවීන ඩිජිටල් ඉගැන්වීම් ක්‍රම
                        </strong>
                        <p class="text-xs text-slate-500 mt-1">Interactive LMS & Derana Media</p>
                    </div>
                </div>

            </div>
        </section>

        <!-- ==============================================================
             FEATURED VIDEO LECTURE (Ada Derana Video)
        ============================================================== -->
        <section class="bg-gradient-to-br from-navy-950 to-blue-950 rounded-3xl p-8 sm:p-12 text-white shadow-xl grid lg:grid-cols-12 gap-8 items-center border border-navy-800">
            <div class="lg:col-span-6 space-y-5">
                <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 border border-white/10 text-xs font-bold text-sky-300 uppercase tracking-wider">
                    <i data-lucide="video" class="w-3.5 h-3.5"></i> JOIN YOUR LIVE CLASS TODAY
                </span>

                <h2 class="sinhala-font text-2xl sm:text-3xl lg:text-4xl font-extrabold text-white leading-tight">
                    Online අධ්‍යාපනයේ නූතන <br/>අත්දැකීම වෙත පිවිසෙන්න
                </h2>

                <p class="sinhala-font text-slate-300 text-sm sm:text-base leading-relaxed">
                    අපගේ අති නවීන Online අධ්‍යාපනික වේදිකාවත් සමග නිමක් නැති ඉගෙනුම් හැකියාවන් ඔබ වෙත විවෘත කර ඇත.
                </p>

                <ul class="sinhala-font space-y-3 text-sm text-slate-200">
                    <li class="flex items-center gap-3">
                        <span class="w-5 h-5 rounded-full bg-emerald-500 text-white flex items-center justify-center text-xs font-bold">✓</span>
                        පහසුවෙන් පිවිසීමට ඇති හැකියාව
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="w-5 h-5 rounded-full bg-emerald-500 text-white flex items-center justify-center text-xs font-bold">✓</span>
                        ශ්‍රී ලංකාවේ හොඳම BS දේශකයා
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="w-5 h-5 rounded-full bg-emerald-500 text-white flex items-center justify-center text-xs font-bold">✓</span>
                        ඔබට පහසුම ගාස්තු
                    </li>
                </ul>

                <div class="pt-2">
                    <a href="{{ route('buyclass') }}" 
                       class="px-6 py-3.5 bg-sky-400 hover:bg-sky-300 text-navy-950 font-black rounded-xl transition inline-flex items-center gap-2 text-sm shadow-lg shadow-sky-500/20">
                        Join Class Online Now <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                </div>
            </div>

            <!-- YouTube Iframe -->
            <div class="lg:col-span-6">
                <div class="bg-navy-900 p-2 sm:p-3 rounded-2xl border border-white/10 shadow-2xl overflow-hidden">
                    <div class="relative w-full aspect-video rounded-xl overflow-hidden">
                        <iframe 
                            class="absolute inset-0 w-full h-full"
                            src="https://www.youtube.com/embed/pWPh2DJ21lQ" 
                            title="Ada Derana Education - Lasindu Senarath"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </div>
        </section>

        <!-- ==============================================================
             GALLERY SECTION (gl1.jpeg - gl12.jpeg)
        ============================================================== -->
        <section class="space-y-6">
            <div class="text-center max-w-xl mx-auto">
                <span class="text-xs font-extrabold text-blue-700 uppercase tracking-widest block mb-1">CAMPUS MOMENTS</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-navy-950">Our Classroom Gallery</h2>
                <p class="text-xs sm:text-sm text-slate-500 mt-1">
                    Memorable moments from physical and online lectures, revision seminars, and student milestones.
                </p>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-3">
                @for($i = 1; $i <= 12; $i++)
                <div class="group relative rounded-2xl overflow-hidden bg-slate-200 aspect-square shadow-sm hover:shadow-md transition duration-300">
                    <img src="{{ asset('images/gl'.$i.'.jpeg') }}" 
                         alt="Class Gallery {{ $i }}" 
                         class="w-full h-full object-cover group-hover:scale-110 transition duration-300"
                         loading="lazy">
                    <div class="absolute inset-0 bg-navy-950/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                        <i data-lucide="zoom-in" class="w-6 h-6 text-white"></i>
                    </div>
                </div>
                @endfor
            </div>
        </section>

        <!-- ==============================================================
             STUDENT FEEDBACK & TESTIMONIAL FORM
        ============================================================== -->
        <section class="bg-white rounded-3xl p-8 sm:p-12 border border-slate-200/90 shadow-sm space-y-8">
            <div class="text-center max-w-xl mx-auto">
                <span class="text-xs font-extrabold text-blue-700 uppercase tracking-widest block mb-1">STUDENT EXPERIENCE</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-navy-950">Share Your Feedback</h2>
                <p class="text-xs sm:text-sm text-slate-500 mt-1">
                    Your feedback helps us continuously elevate our teaching methods.
                </p>
            </div>

            @if(session('success'))
                <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm text-center font-bold">
                    ✓ {{ session('success') }}
                </div>
            @endif

            @if(isset($errors) && $errors->any())
                <div class="p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 text-sm">
                    <strong>Please check the following issues:</strong>
                    <ul class="list-disc list-inside mt-2 text-xs space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="teacherFeedbackForm" action="{{ route('feedbackstore') }}" method="POST" class="max-w-2xl mx-auto space-y-4">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Your Name *</label>
                        <input type="text" name="name" required placeholder="Kasun Perera"
                               class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-navy-900 focus:ring-2 focus:ring-blue-900/10">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Email Address *</label>
                        <input type="email" name="email" required placeholder="kasun@example.com"
                               class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-navy-900 focus:ring-2 focus:ring-blue-900/10">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Phone / WhatsApp Number *</label>
                    <input type="text" name="phone_number" required placeholder="+94 77 123 4567"
                           class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-navy-900 focus:ring-2 focus:ring-blue-900/10">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Your Feedback / Experience *</label>
                    <textarea name="message" rows="4" required placeholder="Share your experience studying Business Studies with Lasindu Senarath..."
                              class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-navy-900 focus:ring-2 focus:ring-blue-900/10 resize-none"></textarea>
                </div>

                <button type="submit" 
                        class="w-full py-4 bg-navy-900 hover:bg-navy-800 text-white font-bold rounded-xl shadow-lg shadow-navy-950/15 transition flex items-center justify-center gap-2">
                    <i data-lucide="send" class="w-4 h-4 text-sky-400"></i>
                    Submit Student Feedback
                </button>
            </form>

            <!-- Stats -->
            <div class="grid grid-cols-2 max-w-md mx-auto gap-4 pt-6 border-t border-slate-100 text-center">
                <div class="p-4 bg-slate-50 rounded-2xl">
                    <span class="text-3xl font-extrabold text-blue-700 block">500+</span>
                    <span class="text-xs font-bold text-slate-500 uppercase">A/B Results</span>
                </div>
                <div class="p-4 bg-slate-50 rounded-2xl">
                    <span class="text-3xl font-extrabold text-blue-700 block">5+</span>
                    <span class="text-xs font-bold text-slate-500 uppercase">Years Journey</span>
                </div>
            </div>
        </section>

    </main>

    <!-- ==============================================================
         FOOTER & FLOATING WHATSAPP
    ============================================================== -->
    <footer class="bg-navy-950 text-white border-t border-navy-900 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 pb-8 border-b border-white/10">
            <div>
                <h3 class="text-lg font-extrabold text-white mb-2">Lasindu Senarath</h3>
                <p class="text-xs text-slate-400 leading-relaxed">
                    Providing excellence in Business Studies education across Sri Lanka. Empowering the next generation of leaders.
                </p>
            </div>

            <div>
                <h4 class="text-xs font-bold uppercase tracking-widest text-sky-400 mb-3">Contact Info</h4>
                <div class="space-y-2 text-xs text-slate-300">
                    <p class="flex items-center gap-2"><i data-lucide="phone" class="w-3.5 h-3.5 text-sky-400"></i> +94 70 487 0565</p>
                    <p class="flex items-center gap-2"><i data-lucide="mail" class="w-3.5 h-3.5 text-sky-400"></i> info@atozbusiness.lk</p>
                    <p class="flex items-center gap-2"><i data-lucide="globe" class="w-3.5 h-3.5 text-sky-400"></i> www.atozbusiness.lk</p>
                </div>
            </div>

            <div>
                <h4 class="text-xs font-bold uppercase tracking-widest text-sky-400 mb-3">Social & Community</h4>
                <div class="flex items-center gap-3">
                    <a href="https://wa.me/94704870565" target="_blank" 
                       class="w-10 h-10 rounded-xl bg-white/10 hover:bg-emerald-600 transition flex items-center justify-center">
                        <i data-lucide="message-circle" class="w-5 h-5 text-white"></i>
                    </a>
                    <a href="#" target="_blank" 
                       class="w-10 h-10 rounded-xl bg-white/10 hover:bg-rose-600 transition flex items-center justify-center">
                        <i data-lucide="youtube" class="w-5 h-5 text-white"></i>
                    </a>
                    <a href="#" target="_blank" 
                       class="w-10 h-10 rounded-xl bg-white/10 hover:bg-blue-600 transition flex items-center justify-center">
                        <i data-lucide="facebook" class="w-5 h-5 text-white"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto pt-6 text-center text-xs text-slate-500">
            &copy; 2026 atozbusiness.lk | Lasindu Senarath LMS
        </div>
    </footer>

    <!-- Floating WhatsApp -->
    <a href="https://wa.me/94704870565" target="_blank" 
       class="fixed bottom-6 right-6 w-14 h-14 bg-emerald-500 hover:bg-emerald-600 text-white rounded-full flex items-center justify-center shadow-2xl transition z-50 group hover:scale-110"
       title="Chat on WhatsApp">
        <i data-lucide="message-circle" class="w-7 h-7"></i>
    </a>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
