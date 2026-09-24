<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Student Account | Lasindu Senarath LMS</title>
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
        .bg-mesh-pattern {
            background-image: 
                radial-gradient(at 10% 20%, rgba(29, 78, 216, 0.25) 0px, transparent 50%),
                radial-gradient(at 90% 80%, rgba(56, 189, 248, 0.15) 0px, transparent 50%),
                radial-gradient(at 50% 50%, rgba(10, 29, 53, 0.95) 0px, transparent 100%);
        }
        .card-shadow {
            box-shadow: 0 25px 50px -12px rgba(6, 19, 37, 0.15);
        }
        .input-ring:focus {
            outline: none;
            border-color: #1e5285;
            box-shadow: 0 0 0 3px rgba(30, 82, 133, 0.15);
        }
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background-color: #e2e8f0;
            border-radius: 999px;
        }
    </style>
</head>
<body class="min-h-screen text-slate-800 antialiased flex items-center justify-center p-3 sm:p-6 lg:p-10 bg-slate-100">

    <div class="w-full max-w-[1240px] bg-white rounded-3xl lg:rounded-[2.5rem] overflow-hidden card-shadow grid lg:grid-cols-12 border border-slate-200/80 min-h-[720px]">
        
        <!-- LEFT SIDE: Branding -->
        <div class="hidden lg:flex lg:col-span-5 bg-navy-950 text-white p-10 lg:p-12 flex-col justify-between relative overflow-hidden bg-mesh-pattern">
            
            <div class="relative z-10">
                <div class="flex items-center gap-3.5 mb-10">
                    <div class="w-11 h-11 rounded-xl bg-gradient-to-tr from-blue-700 to-sky-500 p-0.5 shadow-md">
                        <div class="w-full h-full bg-navy-950 rounded-[10px] flex items-center justify-center overflow-hidden">
                            <img src="{{ asset('images/logo.jpeg') }}" alt="AtoZ Logo" class="w-full h-full object-cover">
                        </div>
                    </div>
                    <div>
                        <span class="text-xs font-extrabold tracking-widest text-sky-400 uppercase block">AtoZ Business School</span>
                        <h2 class="text-lg font-bold tracking-tight text-white leading-tight">LASINDU SENARATH LMS</h2>
                    </div>
                </div>

                <div class="space-y-4">
                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 text-xs font-bold text-sky-300">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        Student Registration
                    </span>

                    <h1 class="text-3xl lg:text-4xl font-extrabold text-white leading-tight">
                        Start Your A/L Success Journey Today.
                    </h1>

                    <p class="text-slate-300 text-sm leading-relaxed">
                        Create your student account to enroll in live classes, stream recordings, download tutorial handbooks, and track your examination readiness.
                    </p>

                    <div class="p-4 rounded-2xl bg-white/[0.05] border border-white/10 space-y-2 mt-6">
                        <div class="flex items-center gap-2 text-xs font-semibold text-sky-200">
                            <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Instant portal access upon registration
                        </div>
                        <div class="flex items-center gap-2 text-xs font-semibold text-sky-200">
                            <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            WhatsApp lecture reminders and notices
                        </div>
                        <div class="flex items-center gap-2 text-xs font-semibold text-sky-200">
                            <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Full curriculum theory & paper discussions
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative z-10 pt-8 border-t border-white/10 flex items-center gap-3">
                <img src="{{ asset('images/lasindu1.jpeg') }}" alt="Lasindu Senarath" class="w-12 h-12 rounded-xl object-cover border border-white/20">
                <div class="text-xs">
                    <p class="font-bold text-white">Lasindu Senarath</p>
                    <p class="text-slate-400">Lecturer in Business Studies • Ada Derana</p>
                </div>
            </div>

        </div>

        <!-- RIGHT SIDE: Registration Form -->
        <div class="lg:col-span-7 p-8 sm:p-12 lg:p-14 flex flex-col justify-center bg-white overflow-y-auto custom-scrollbar">
            
            <div class="max-w-xl w-full mx-auto">
                
                <div class="mb-8">
                    <span class="text-xs font-bold text-blue-700 uppercase tracking-widest block mb-1">New Enrollment</span>
                    <h2 class="text-3xl font-extrabold text-navy-950 tracking-tight">Create Account</h2>
                    <p class="text-slate-500 text-sm mt-1">Please enter your accurate details for class coordination.</p>
                </div>

                @if (isset($errors) && $errors->any())
                    <div class="mb-6 p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-sm">
                        <strong class="block font-bold mb-1">Please fix the following issues:</strong>
                        <ul class="list-disc list-inside text-xs space-y-1 text-rose-700">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        
                        <div class="md:col-span-1">
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                                Full Name <span class="text-rose-500">*</span>
                            </label>
                            <input type="text" name="name" value="{{ old('name') }}" required 
                                   placeholder="Kasun Perera"
                                   class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm placeholder-slate-400 input-ring transition">
                        </div>

                        <div class="md:col-span-1">
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                                Email Address <span class="text-rose-500">*</span>
                            </label>
                            <input type="email" name="email" value="{{ old('email') }}" required 
                                   placeholder="kasun@example.com"
                                   class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm placeholder-slate-400 input-ring transition">
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                                WhatsApp Number <span class="text-rose-500">*</span>
                            </label>
                            <input type="text" name="whatsapp_number" value="{{ old('whatsapp_number') }}" required 
                                   placeholder="+94 77 123 4567"
                                   class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm placeholder-slate-400 input-ring transition">
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                                Student ID / NIC <span class="text-rose-500">*</span>
                            </label>
                            <input type="text" name="id_number" value="{{ old('id_number') }}" required 
                                   placeholder="200512345678"
                                   class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm placeholder-slate-400 input-ring transition">
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                                Residential / Delivery Address <span class="text-rose-500">*</span>
                            </label>
                            <input type="text" name="address" value="{{ old('address') }}" required 
                                   placeholder="No. 12, Main Street, Nugegoda"
                                   class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm placeholder-slate-400 input-ring transition">
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                                Target A/L Exam Year <span class="text-rose-500">*</span>
                            </label>
                            <input type="number" name="exam_year" value="{{ old('exam_year', '2026') }}" min="2024" max="2030" required 
                                   class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm placeholder-slate-400 input-ring transition">
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                                Password <span class="text-rose-500">*</span>
                            </label>
                            <input type="password" name="password" required 
                                   placeholder="••••••••"
                                   class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm placeholder-slate-400 input-ring transition">
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                                Confirm Password <span class="text-rose-500">*</span>
                            </label>
                            <input type="password" name="password_confirmation" required 
                                   placeholder="••••••••"
                                   class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm placeholder-slate-400 input-ring transition">
                        </div>

                    </div>

                    <div class="pt-4">
                        <button type="submit" 
                                class="w-full py-4 px-6 bg-navy-900 hover:bg-navy-800 text-white font-bold rounded-xl shadow-lg shadow-navy-950/20 active:scale-[0.99] transition text-sm flex items-center justify-center gap-2">
                            <span>Register & Access LMS</span>
                            <svg class="w-4 h-4 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </button>
                    </div>

                    <div class="text-center pt-4 border-t border-slate-100">
                        <p class="text-sm text-slate-500">
                            Already have an account? 
                            <a href="{{ route('login') }}" class="font-bold text-blue-700 hover:underline">
                                Sign In here
                            </a>
                        </p>
                    </div>
                </form>

            </div>

        </div>

    </div>

</body>
</html>