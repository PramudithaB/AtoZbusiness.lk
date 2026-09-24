<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Lasindu Senarath LMS - AtoZ Business School</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('images/logo.jpeg') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Noto+Sans+Sinhala:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
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
        }
        .sinhala-text {
            font-family: 'Noto Sans Sinhala', 'Plus Jakarta Sans', sans-serif;
        }
        .bg-mesh-pattern {
            background-image: 
                radial-gradient(at 10% 20%, rgba(29, 78, 216, 0.25) 0px, transparent 50%),
                radial-gradient(at 90% 80%, rgba(56, 189, 248, 0.15) 0px, transparent 50%),
                radial-gradient(at 50% 50%, rgba(10, 29, 53, 0.95) 0px, transparent 100%);
        }
        .login-card-shadow {
            box-shadow: 0 25px 50px -12px rgba(6, 19, 37, 0.15);
        }
        .input-ring:focus {
            outline: none;
            border-color: #1e5285;
            box-shadow: 0 0 0 3px rgba(30, 82, 133, 0.15);
        }
    </style>
</head>
<body class="min-h-screen text-slate-800 antialiased flex items-center justify-center p-3 sm:p-6 lg:p-10 bg-slate-100">

    <div class="w-full max-w-[1240px] bg-white rounded-3xl lg:rounded-[2.5rem] overflow-hidden login-card-shadow grid lg:grid-cols-12 border border-slate-200/80 min-h-[680px]">
        
        <!-- LEFT SIDE: Branding, Teacher Credentials, Value Props -->
        <div class="lg:col-span-6 bg-navy-950 text-white p-8 sm:p-12 lg:p-14 flex flex-col justify-between relative overflow-hidden bg-mesh-pattern">
            
            <!-- Subtle Grid overlay -->
            <div class="absolute inset-0 opacity-[0.03] pointer-events-none" 
                 style="background-image: linear-gradient(#fff 1px, transparent 1px), linear-gradient(90deg, #fff 1px, transparent 1px); background-size: 32px 32px;"></div>
            
            <!-- Glow Sphere -->
            <div class="absolute -top-24 -left-24 w-80 h-80 bg-blue-600/20 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute -bottom-24 -right-24 w-80 h-80 bg-sky-500/20 rounded-full blur-3xl pointer-events-none"></div>

            <!-- Top Brand Header -->
            <div class="relative z-10">
                <div class="flex items-center gap-3.5 mb-8 sm:mb-12">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-blue-700 to-sky-500 p-0.5 shadow-lg shadow-blue-500/30">
                        <div class="w-full h-full bg-navy-950 rounded-[14px] flex items-center justify-center overflow-hidden">
                            <img src="{{ asset('images/logo.jpeg') }}" alt="AtoZ Logo" class="w-full h-full object-cover">
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <span class="text-xs font-extrabold tracking-widest text-sky-400 uppercase">AtoZ Business School</span>
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-500/20 text-blue-300 border border-blue-400/20">LMS PORTAL</span>
                        </div>
                        <h2 class="text-xl font-bold tracking-tight text-white">LASINDU SENARATH</h2>
                    </div>
                </div>

                <!-- Main Left Title -->
                <div class="space-y-4 max-w-lg">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 backdrop-blur-md border border-white/10 text-xs font-semibold text-blue-200">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        A/L Business Studies • Online & Physical
                    </div>

                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white leading-[1.15]">
                        Empowering Future <br/>
                        <span class="bg-gradient-to-r from-sky-400 via-blue-300 to-white bg-clip-text text-transparent">Business Leaders.</span>
                    </h1>

                    <p class="text-slate-300 text-sm sm:text-base leading-relaxed">
                        Access structured video lectures, downloadable tutorial modules, model paper discussions, and personalized academic guidance.
                    </p>

                    <p class="sinhala-text text-slate-300/90 text-sm leading-relaxed border-l-2 border-sky-400 pl-3 pt-1">
                        ව්‍යාපාර අධ්‍යයනය උසස් පෙළ විශිෂ්ට සාමාර්ථයක් සඳහා වන ශ්‍රී ලංකාවේ ප්‍රමුඛතම ඩිජිටල් ඉගෙනුම් පද්ධතිය.
                    </p>
                </div>
            </div>

            <!-- Credentials / Teacher Highlight Box -->
            <div class="relative z-10 mt-10 pt-8 border-t border-white/10">
                <div class="flex items-center gap-4 p-4 rounded-2xl bg-white/[0.06] backdrop-blur-md border border-white/10">
                    <img src="{{ asset('images/lasindu1.jpeg') }}" 
                         alt="Lasindu Senarath" 
                         class="w-14 h-14 rounded-xl object-cover border-2 border-white/20 shadow-md">
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2">
                            <h4 class="text-sm font-bold text-white truncate">Lasindu Senarath</h4>
                            <span class="text-[10px] px-2 py-0.5 rounded bg-sky-400/20 text-sky-300 font-semibold uppercase">Educator</span>
                        </div>
                        <p class="text-xs text-slate-300 truncate">BBA (Hons) Special • MBA (PIM-SJP)</p>
                        <p class="text-[11px] text-sky-300 font-medium">Ada Derana Education • Visiting Lecturer</p>
                    </div>
                </div>

                <!-- Fast Stats -->
                <div class="grid grid-cols-3 gap-2 mt-4 text-center">
                    <div class="p-2.5 rounded-xl bg-white/[0.04] border border-white/5">
                        <span class="block text-base font-extrabold text-white">500+</span>
                        <span class="text-[10px] text-slate-400 uppercase tracking-wider font-semibold">A/B Passes</span>
                    </div>
                    <div class="p-2.5 rounded-xl bg-white/[0.04] border border-white/5">
                        <span class="block text-base font-extrabold text-white">5+ Years</span>
                        <span class="text-[10px] text-slate-400 uppercase tracking-wider font-semibold">Experience</span>
                    </div>
                    <div class="p-2.5 rounded-xl bg-white/[0.04] border border-white/5">
                        <span class="block text-base font-extrabold text-sky-400">100%</span>
                        <span class="text-[10px] text-slate-400 uppercase tracking-wider font-semibold">Syllabus Covered</span>
                    </div>
                </div>
            </div>

        </div>

        <!-- RIGHT SIDE: Modern Login Form -->
        <div class="lg:col-span-6 p-8 sm:p-12 lg:p-14 flex flex-col justify-center bg-white relative">
            
            <div class="max-w-md w-full mx-auto">
                
                <!-- Card Header -->
                <div class="mb-8">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-slate-100 text-navy-800 text-xs font-bold tracking-wide uppercase mb-3">
                        <svg class="w-3.5 h-3.5 text-blue-700" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                        </svg>
                        Student & Admin Portal
                    </div>
                    <h2 class="text-3xl font-extrabold text-navy-950 tracking-tight">Sign In</h2>
                    <p class="text-slate-500 text-sm mt-1.5">
                        Enter your registered email and password to access your dashboard.
                    </p>
                </div>

                <!-- Session Alert -->
                @if (session('status'))
                    <div class="mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm flex items-start gap-3">
                        <svg class="w-5 h-5 text-emerald-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div>{{ session('status') }}</div>
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-6 p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-sm flex items-start gap-3">
                        <svg class="w-5 h-5 text-rose-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div>{{ session('error') }}</div>
                    </div>
                @endif

                @if (isset($errors) && $errors->any())
                    <div class="mb-6 p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-sm">
                        <div class="flex items-center gap-2 font-bold mb-1">
                            <svg class="w-4 h-4 text-rose-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            <span>Please check the errors below:</span>
                        </div>
                        <ul class="list-disc list-inside text-xs space-y-1 text-rose-700">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Login Form -->
                <form method="POST" action="{{ route('login') }}" id="loginForm" class="space-y-5">
                    @csrf

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                            Email Address <span class="text-rose-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                            </div>
                            <input id="email" 
                                   type="email" 
                                   name="email" 
                                   value="{{ old('email') }}" 
                                   required 
                                   autofocus 
                                   autocomplete="username"
                                   placeholder="e.g. student@atozbusiness.lk"
                                   class="w-full pl-11 pr-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm placeholder-slate-400 input-ring transition-all duration-200 @error('email') border-rose-500 bg-rose-50/30 @enderror">
                        </div>
                    </div>

                    <!-- Password Field -->
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <label for="password" class="block text-xs font-bold uppercase tracking-wider text-slate-700">
                                Password <span class="text-rose-500">*</span>
                            </label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" 
                                   class="text-xs font-semibold text-blue-700 hover:text-navy-900 transition-colors">
                                    Forgot Password?
                                </a>
                            @endif
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <input id="password" 
                                   type="password" 
                                   name="password" 
                                   required 
                                   autocomplete="current-password"
                                   placeholder="••••••••"
                                   class="w-full pl-11 pr-12 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm placeholder-slate-400 input-ring transition-all duration-200 @error('password') border-rose-500 bg-rose-50/30 @enderror">
                            
                            <!-- Show / Hide Password Button -->
                            <button type="button" 
                                    id="togglePassword" 
                                    aria-label="Toggle password visibility"
                                    class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-slate-700 transition">
                                <svg id="eyeOpenIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <svg id="eyeClosedIcon" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between pt-1">
                        <label class="flex items-center gap-2.5 cursor-pointer select-none">
                            <input type="checkbox" 
                                   name="remember" 
                                   id="remember_me"
                                   class="w-4 h-4 rounded border-slate-300 text-navy-800 focus:ring-navy-800 transition">
                            <span class="text-xs font-semibold text-slate-600">Keep me logged in</span>
                        </label>
                    </div>

                    <!-- Submit Button with Loading State -->
                    <div class="pt-2">
                        <button type="submit" 
                                id="submitBtn" 
                                class="w-full py-4 px-6 bg-navy-900 hover:bg-navy-800 text-white font-bold rounded-xl shadow-lg shadow-navy-950/20 active:scale-[0.99] transition-all flex items-center justify-center gap-2.5 group">
                            
                            <!-- Normal State Content -->
                            <span id="btnText" class="text-sm font-bold tracking-wide">Sign In to Account</span>
                            <svg id="btnArrow" class="w-4 h-4 text-sky-400 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>

                            <!-- Loading Spinner (Hidden by default) -->
                            <svg id="btnSpinner" class="w-5 h-5 animate-spin hidden text-white" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                            </svg>
                        </button>
                    </div>
                </form>

                <!-- Create Account Link -->
                <div class="mt-8 pt-6 border-t border-slate-100 text-center">
                    <p class="text-sm text-slate-500">
                        New student to our LMS? 
                        <a href="{{ route('register') }}" 
                           class="font-bold text-navy-900 hover:text-blue-700 underline decoration-sky-400 decoration-2 underline-offset-4 transition-colors">
                            Create Account
                        </a>
                    </p>
                </div>

                <!-- Footer Support Note -->
                <div class="mt-8 flex items-center justify-between text-[11px] text-slate-400 font-medium border-t border-slate-50 pt-4">
                    <span>AtoZ Business School &copy; 2026</span>
                    <a href="{{ route('about-teacher') }}" class="hover:text-navy-800 transition">About Teacher</a>
                    <span>Hotline: +94 70 487 0565</span>
                </div>

            </div>

        </div>

    </div>

    <!-- Password Visibility Toggle & Button Loading Handler -->
    <script>
        // Password toggle
        const toggleBtn = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const eyeOpen = document.getElementById('eyeOpenIcon');
        const eyeClosed = document.getElementById('eyeClosedIcon');

        if (toggleBtn && passwordInput) {
            toggleBtn.addEventListener('click', function () {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                eyeOpen.classList.toggle('hidden');
                eyeClosed.classList.toggle('hidden');
            });
        }

        // Form loading state
        const loginForm = document.getElementById('loginForm');
        const submitBtn = document.getElementById('submitBtn');
        const btnText = document.getElementById('btnText');
        const btnArrow = document.getElementById('btnArrow');
        const btnSpinner = document.getElementById('btnSpinner');

        if (loginForm && submitBtn) {
            loginForm.addEventListener('submit', function () {
                btnText.textContent = 'Authenticating...';
                btnArrow.classList.add('hidden');
                btnSpinner.classList.remove('hidden');
                submitBtn.classList.add('opacity-90', 'cursor-wait');
            });
        }
    </script>
</body>
</html>