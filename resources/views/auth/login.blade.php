<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | AtoZ Business School</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('images/logo.jpeg') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
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
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .input-ring:focus {
            outline: none;
            border-color: #0a1d35;
            box-shadow: 0 0 0 3px rgba(10, 29, 53, 0.12);
        }
    </style>
</head>
<body class="min-h-screen bg-white text-slate-800 antialiased flex items-center justify-center p-4 sm:p-6 lg:p-8">

    <div class="w-full max-w-md">

        <!-- Logo & School Name -->
        <div class="text-center mb-8">
            <img src="{{ asset('images/logo.jpeg') }}" alt="AtoZ Logo"
                 class="w-16 h-16 rounded-2xl object-cover border border-slate-200 shadow-sm mx-auto mb-4">
            <span class="text-xs font-bold tracking-widest text-navy-900 uppercase block">AtoZ Business School</span>
            <span class="text-[11px] text-slate-500 font-medium">Student LMS Portal</span>
        </div>

        <!-- Card -->
        <div class="bg-white border border-slate-200 rounded-3xl shadow-lg p-8 sm:p-10">

            <!-- Heading -->
            <h1 class="text-3xl sm:text-4xl font-extrabold text-navy-900 tracking-tight mb-1">Sign In</h1>
            <p class="text-slate-500 text-sm mb-7">Enter your credentials to access your account.</p>

            <!-- Alerts -->
            @if (session('status'))
                <div class="mb-5 p-3.5 rounded-xl bg-slate-50 border border-navy-900/10 text-navy-900 text-xs flex items-center gap-2">
                    <span>{{ session('status') }}</span>
                </div>
            @endif

            @if (session('error'))
                <div class="mb-5 p-3.5 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-xs">
                    {{ session('error') }}
                </div>
            @endif

            @if (isset($errors) && $errors->any())
                <div class="mb-5 p-3.5 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-xs">
                    <ul class="list-disc list-inside space-y-0.5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}" id="loginForm" class="space-y-5">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-xs font-bold uppercase tracking-wider text-navy-950 mb-1.5">
                        Email Address
                    </label>
                    <input id="email"
                           type="email"
                           name="email"
                           value="{{ old('email') }}"
                           required
                           autofocus
                           autocomplete="username"
                           placeholder="name@example.com"
                           class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm placeholder-slate-400 input-ring transition @error('email') border-rose-500 @enderror">
                </div>

                <!-- Password -->
                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label for="password" class="block text-xs font-bold uppercase tracking-wider text-navy-950">
                            Password
                        </label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                               class="text-xs font-semibold text-navy-800 hover:text-navy-950 hover:underline transition">
                                Forgot Password?
                            </a>
                        @endif
                    </div>
                    <div class="relative">
                        <input id="password"
                               type="password"
                               name="password"
                               required
                               autocomplete="current-password"
                               placeholder="••••••••"
                               class="w-full px-4 pr-11 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm placeholder-slate-400 input-ring transition @error('password') border-rose-500 @enderror">
                        <button type="button"
                                id="togglePassword"
                                aria-label="Toggle password visibility"
                                class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-navy-900 transition">
                            <svg id="eyeOpenIcon" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <svg id="eyeClosedIcon" class="w-4 h-4 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <label class="flex items-center gap-2 cursor-pointer select-none">
                        <input type="checkbox"
                               name="remember"
                               id="remember_me"
                               class="w-4 h-4 rounded border-slate-300 text-navy-900 focus:ring-navy-900 transition">
                        <span class="text-xs font-semibold text-slate-600">Remember me</span>
                    </label>
                </div>

                <!-- Submit -->
                <button type="submit"
                        id="submitBtn"
                        class="w-full py-4 px-6 bg-navy-900 hover:bg-navy-800 text-white font-bold text-sm rounded-xl shadow-md transition-all flex items-center justify-center gap-2 group">
                    <span id="btnText">Sign In</span>
                    <svg id="btnArrow" class="w-4 h-4 text-white group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                    <svg id="btnSpinner" class="w-4 h-4 animate-spin hidden text-white" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                    </svg>
                </button>
            </form>

            <!-- Create Account -->
            <div class="mt-6 pt-5 border-t border-slate-100 text-center">
                <p class="text-xs text-slate-500">
                    Don't have an account?
                    <a href="{{ route('register') }}"
                       class="font-bold text-navy-950 hover:underline transition-colors">
                        Create Account
                    </a>
                </p>
            </div>

        </div>

        <!-- Past Papers Free Access -->
        <div class="mt-5">
            <a href="{{ route('pastpapers.index') }}"
               class="w-full py-3.5 px-4 bg-slate-50 hover:bg-blue-50/80 border border-slate-200/90 hover:border-blue-300 rounded-2xl flex items-center justify-between text-navy-950 transition-all group shadow-sm hover:shadow">
                <div class="flex items-center gap-3 text-left">
                    <div class="w-9 h-9 rounded-xl bg-navy-900 group-hover:bg-blue-700 text-white flex items-center justify-center flex-shrink-0 transition shadow-sm">
                        <svg class="w-4 h-4 text-sky-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <div>
                        <span class="text-[10px] font-extrabold text-blue-700 uppercase tracking-wider block">Free Download • නොමිලේ බාගත කරන්න</span>
                        <span class="text-xs font-bold text-navy-950">A/L &amp; O/L All Past Papers (ප්‍රශ්න පත්‍ර)</span>
                    </div>
                </div>
                <svg class="w-4 h-4 text-slate-400 group-hover:text-blue-700 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>

    </div>

    <!-- JS: Password toggle & submit loading -->
    <script>
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

        const loginForm = document.getElementById('loginForm');
        const submitBtn = document.getElementById('submitBtn');
        const btnText = document.getElementById('btnText');
        const btnArrow = document.getElementById('btnArrow');
        const btnSpinner = document.getElementById('btnSpinner');

        if (loginForm && submitBtn) {
            loginForm.addEventListener('submit', function () {
                btnText.textContent = 'Signing In...';
                btnArrow.classList.add('hidden');
                btnSpinner.classList.remove('hidden');
                submitBtn.classList.add('opacity-90', 'cursor-wait');
            });
        }
    </script>
</body>
</html>
