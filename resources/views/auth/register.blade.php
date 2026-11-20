<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account | AtoZ Business School</title>
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
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .input-ring:focus {
            outline: none;
            border-color: #0a1d35;
            box-shadow: 0 0 0 3px rgba(10, 29, 53, 0.12);
        }
    </style>
</head>
<body class="min-h-screen bg-white text-slate-800 antialiased flex items-center justify-center p-4 sm:p-6 lg:p-8">

    <div class="w-full max-w-2xl">

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
            <h1 class="text-3xl sm:text-4xl font-extrabold text-navy-900 tracking-tight mb-1">Create Account</h1>
            <p class="text-slate-500 text-sm mb-7">Please enter your accurate details for class coordination.</p>

            <!-- Error Block -->
            @if (isset($errors) && $errors->any())
                <div class="mb-6 p-4 sm:p-5 rounded-2xl bg-rose-50 border border-rose-200 text-rose-900 text-sm space-y-3">
                    <div class="flex items-center gap-2.5 font-bold text-rose-800">
                        <svg class="w-5 h-5 text-rose-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                        <span>කරුණාකර පහත කරුණු නිවැරදි කරන්න (Please fix issues):</span>
                    </div>
                    <ul class="list-disc list-inside text-xs space-y-1 text-rose-700 font-medium">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                    @if ($errors->has('id_number') || $errors->has('email'))
                        <div class="pt-2 border-t border-rose-200/80 flex items-center justify-between flex-wrap gap-2">
                            <span class="text-xs text-rose-800 font-semibold">ඔබ දැනටමත් ලියාපදිංචි වී ඇත්නම්:</span>
                            <a href="{{ route('login') }}" class="px-3 py-1.5 bg-rose-600 hover:bg-rose-700 text-white rounded-lg text-xs font-bold transition inline-flex items-center gap-1 shadow-sm">
                                <span>Sign In to Your Account</span> →
                            </a>
                        </div>
                    @endif
                </div>
            @endif

            <!-- Registration Form -->
            <form method="POST" action="{{ route('register') }}" class="space-y-4" id="registerForm" onsubmit="handleRegisterSubmit(event)">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <!-- Full Name -->
                    <div class="md:col-span-1">
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                            Full Name (සම්පූර්ණ නම) <span class="text-rose-500">*</span>
                        </label>
                        <input type="text" name="name" value="{{ old('name') }}" required
                               placeholder="Kasun Perera"
                               class="w-full px-4 py-3 rounded-xl text-slate-900 text-sm placeholder-slate-400 input-ring transition @error('name') border-rose-400 bg-rose-50/20 ring-1 ring-rose-400 @else bg-slate-50 border border-slate-200 @enderror">
                        @error('name')
                            <p class="text-xs font-semibold text-rose-600 mt-1 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
                    </div>

                    <!-- Email Address -->
                    <div class="md:col-span-1">
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                            Email Address <span class="text-rose-500">*</span>
                        </label>
                        <input type="email" name="email" value="{{ old('email') }}" required
                               placeholder="kasun@example.com"
                               class="w-full px-4 py-3 rounded-xl text-slate-900 text-sm placeholder-slate-400 input-ring transition @error('email') border-rose-400 bg-rose-50/20 ring-1 ring-rose-400 @else bg-slate-50 border border-slate-200 @enderror">
                        @error('email')
                            <p class="text-xs font-semibold text-rose-600 mt-1 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
                    </div>

                    <!-- WhatsApp Number -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                            WhatsApp Number <span class="text-rose-500">*</span>
                        </label>
                        <input type="text" name="whatsapp_number" value="{{ old('whatsapp_number') }}" required
                               placeholder="0771234567"
                               class="w-full px-4 py-3 rounded-xl text-slate-900 text-sm placeholder-slate-400 input-ring transition @error('whatsapp_number') border-rose-400 bg-rose-50/20 ring-1 ring-rose-400 @else bg-slate-50 border border-slate-200 @enderror">
                        <p class="text-[11px] text-slate-400 mt-1">උදා: 0771234567 හෝ +94771234567</p>
                        @error('whatsapp_number')
                            <p class="text-xs font-semibold text-rose-600 mt-1 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
                    </div>

                    <!-- Student ID / NIC -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                            Student ID / NIC <span class="text-rose-500">*</span>
                        </label>
                        <input type="text" name="id_number" value="{{ old('id_number') }}" required
                               placeholder="200512345678 හෝ 200212345V"
                               class="w-full px-4 py-3 rounded-xl text-slate-900 text-sm placeholder-slate-400 input-ring transition uppercase @error('id_number') border-rose-400 bg-rose-50/20 ring-1 ring-rose-400 @else bg-slate-50 border border-slate-200 @enderror">
                        <p class="text-[11px] text-slate-400 mt-1">ජාතික හැඳුනුම්පත් (NIC) හෝ ශිෂ්‍ය අංකය</p>
                        @error('id_number')
                            <p class="text-xs font-semibold text-rose-600 mt-1 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
                    </div>

                    <!-- Residential / Delivery Address -->
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                            Residential / Delivery Address (නිබන්ධන එවිය යුතු ලිපිනය) <span class="text-rose-500">*</span>
                        </label>
                        <input type="text" name="address" value="{{ old('address') }}" required
                               placeholder="No. 12, Main Street, Nugegoda"
                               class="w-full px-4 py-3 rounded-xl text-slate-900 text-sm placeholder-slate-400 input-ring transition @error('address') border-rose-400 bg-rose-50/20 ring-1 ring-rose-400 @else bg-slate-50 border border-slate-200 @enderror">
                        @error('address')
                            <p class="text-xs font-semibold text-rose-600 mt-1 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
                    </div>

                    <!-- Target A/L Exam Year -->
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                            Target A/L Exam Year (විභාග වර්ෂය) <span class="text-rose-500">*</span>
                        </label>
                        <select name="exam_year" required
                                class="w-full px-4 py-3 rounded-xl text-slate-900 text-sm input-ring transition @error('exam_year') border-rose-400 bg-rose-50/20 ring-1 ring-rose-400 @else bg-slate-50 border border-slate-200 @enderror">
                            @php $selectedYear = old('exam_year', '2026'); @endphp
                            <option value="2025" {{ $selectedYear == '2025' ? 'selected' : '' }}>2025 A/L Batch</option>
                            <option value="2026" {{ $selectedYear == '2026' ? 'selected' : '' }}>2026 A/L Batch</option>
                            <option value="2027" {{ $selectedYear == '2027' ? 'selected' : '' }}>2027 A/L Batch</option>
                            <option value="2028" {{ $selectedYear == '2028' ? 'selected' : '' }}>2028 A/L Batch</option>
                        </select>
                        @error('exam_year')
                            <p class="text-xs font-semibold text-rose-600 mt-1 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                            Password (මුරපදය) <span class="text-rose-500">*</span>
                        </label>
                        <input type="password" name="password" id="password" required
                               placeholder="අවම අකුරු 6ක්"
                               class="w-full px-4 py-3 rounded-xl text-slate-900 text-sm placeholder-slate-400 input-ring transition @error('password') border-rose-400 bg-rose-50/20 ring-1 ring-rose-400 @else bg-slate-50 border border-slate-200 @enderror">
                        @error('password')
                            <p class="text-xs font-semibold text-rose-600 mt-1 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                            Confirm Password <span class="text-rose-500">*</span>
                        </label>
                        <input type="password" name="password_confirmation" id="password_confirmation" required
                               placeholder="මුරපදය නැවත ඇතුළත් කරන්න"
                               class="w-full px-4 py-3 rounded-xl text-slate-900 text-sm placeholder-slate-400 input-ring transition bg-slate-50 border border-slate-200">
                    </div>

                </div>

                <!-- Submit -->
                <div class="pt-4">
                    <button type="submit" id="submitBtn"
                            class="w-full py-4 px-6 bg-navy-900 hover:bg-navy-800 text-white font-bold rounded-xl shadow-lg active:scale-[0.99] transition text-sm flex items-center justify-center gap-2">
                        <span id="btnText">Register &amp; Access LMS</span>
                        <svg id="btnIcon" class="w-4 h-4 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </button>
                </div>

                <!-- Sign In Link -->
                <div class="text-center pt-4 border-t border-slate-100">
                    <p class="text-sm text-slate-500">
                        Already have an account?
                        <a href="{{ route('login') }}" class="font-bold text-navy-900 hover:underline">
                            Sign In here
                        </a>
                    </p>
                </div>

            </form>

        </div>

    </div>

    <script>
        function handleRegisterSubmit(e) {
            const btn = document.getElementById('submitBtn');
            const btnText = document.getElementById('btnText');
            const p1 = document.getElementById('password').value;
            const p2 = document.getElementById('password_confirmation').value;

            if (p1 !== p2) {
                e.preventDefault();
                alert('තහවුරු කිරීමේ මුරපදය නොගැළපේ! කරුණාකර මුරපද දෙකම එක හා සමානව ඇතුළත් කරන්න. (Passwords do not match)');
                return false;
            }

            btn.disabled = true;
            btn.classList.add('opacity-75', 'cursor-not-allowed');
            btnText.innerText = 'Creating Account... කරුණාකර රැඳී සිටින්න...';
            return true;
        }
    </script>

</body>
</html>
