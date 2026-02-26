<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AtoZ Business School | Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        // Royal Blue Palette
                        'royal-600': '#2563eb', // Primary
                        'royal-700': '#1d4ed8', // Hover
                        'royal-900': '#1e3a8a', // Text/Dark
                    },
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');
        
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: radial-gradient(circle at top right, #dbeafe, #f8fafc);
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.4);
        }

        .input-focus-effect:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
        }
    </style>
</head>
<body class="antialiased min-h-screen flex items-center justify-center p-4">

    <div class="fixed top-0 left-0 w-96 h-96 bg-royal-600/10 rounded-full -translate-x-1/2 -translate-y-1/2 blur-3xl"></div>
    <div class="fixed bottom-0 right-0 w-80 h-80 bg-blue-400/10 rounded-full translate-x-1/3 translate-y-1/3 blur-3xl"></div>

    <div class="w-full max-w-[1100px] grid lg:grid-cols-2 gap-0 overflow-hidden rounded-3xl shadow-2xl bg-white">
        
        <div class="hidden lg:flex flex-col justify-between p-12 bg-royal-900 text-white relative overflow-hidden">
            <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#fff 1px, transparent 1px); background-size: 30px 30px;"></div>
            
            <div class="relative z-10">
                <div class="flex items-center gap-3 mb-12">
                    <div class="w-10 h-10 bg-royal-600 rounded-lg flex items-center justify-center font-bold text-xl">A</div>
                    <span class="text-xl font-bold tracking-tight">AtoZ Business School</span>
                </div>
                
                <h2 class="text-5xl font-extrabold leading-tight mb-6">
                    Master the Art of <br/>
                    <span class="text-blue-400">Modern Business.</span>
                </h2>
                <p class="text-blue-100/70 text-lg max-w-md">
                    Access your courses, track your progress, and connect with global mentors in one seamless environment.
                </p>
            </div>

            <div class="relative z-10 mt-auto">
                <div class="p-6 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-md">
                    <p class="italic text-blue-200">"Education is the most powerful weapon which you can use to change the world."</p>
                </div>
            </div>
        </div>

        <div class="p-8 sm:p-16 flex flex-col justify-center">
            <div class="mb-10 text-center lg:text-left">
                <h1 class="text-3xl font-extrabold text-gray-900 mb-2">Welcome Back</h1>
                <p class="text-gray-500">Sign in to your student portal</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5 ml-1">Email Address</label>
                    <input type="email" name="email" required 
                        class="w-full px-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50/50 input-focus-effect transition-all" 
                        placeholder="name@company.com"
                        value="{{ old('email') }}">
                </div>

                <div>
                    <div class="flex justify-between mb-1.5 ml-1">
                        <label class="block text-sm font-semibold text-gray-700">Password</label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-sm font-bold text-royal-600 hover:text-royal-700">Forgot?</a>
                        @endif
                    </div>
                    <input type="password" name="password" required 
                        class="w-full px-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50/50 input-focus-effect transition-all" 
                        placeholder="••••••••">
                </div>

                <div class="flex items-center">
                    <input id="remember_me" type="checkbox" name="remember" class="w-4 h-4 text-royal-600 border-gray-300 rounded focus:ring-royal-600">
                    <label for="remember_me" class="ml-2 text-sm text-gray-600 font-medium">Keep me logged in</label>
                </div>

                <button type="submit" 
                    class="w-full py-4 bg-royal-600 hover:bg-royal-700 text-white font-bold rounded-xl shadow-lg shadow-blue-200 transition-all active:scale-[0.98] flex items-center justify-center gap-2">
                    Sign In
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>

                <p class="text-center text-gray-600 text-sm mt-8">
                    Don't have an account? 
                    <a href="{{ route('register') }}" class="text-royal-600 font-bold hover:underline">Create Account</a>
                </p>
            </form>
        </div>
    </div>

    <div class="fixed bottom-6 flex gap-6 text-xs text-gray-400 font-medium">
        <a href="#" class="hover:text-royal-600 uppercase tracking-widest">Support</a>
        <a href="#" class="hover:text-royal-600 uppercase tracking-widest">Privacy</a>
        <a href="#" class="hover:text-royal-600 uppercase tracking-widest">Legal</a>
    </div>

</body>
</html>