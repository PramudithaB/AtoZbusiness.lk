<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LTBio.lk | Create Account</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
            background: radial-gradient(circle at top right, #dbeafe, #f8fafc);
        }

        .input-focus-effect:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
        }

        /* Custom scrollbar for the form area if needed */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background-color: #e2e8f0;
            border-radius: 10px;
        }
    </style>
</head>
<body class="antialiased min-h-screen flex items-center justify-center p-4 lg:p-8">

    <div class="fixed top-0 right-0 w-96 h-96 bg-royal-600/10 rounded-full blur-3xl -z-10"></div>
    <div class="fixed bottom-0 left-0 w-96 h-96 bg-blue-400/10 rounded-full blur-3xl -z-10"></div>

    <div class="w-full max-w-[1200px] grid lg:grid-cols-12 overflow-hidden rounded-[2.5rem] shadow-2xl bg-white min-h-[85vh]">
        
        <div class="hidden lg:flex lg:col-span-5 flex-col justify-between p-12 bg-royal-900 text-white relative">
            <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#fff 1px, transparent 1px); background-size: 30px 30px;"></div>
            
            <div class="relative z-10">
                <div class="flex items-center gap-3 mb-16">
                    <div class="w-12 h-12 bg-royal-600 rounded-xl flex items-center justify-center font-bold text-2xl shadow-lg shadow-blue-500/20">L</div>
                    <span class="text-2xl font-extrabold tracking-tight">AtoZ Business School</span>
                </div>
                
                <h2 class="text-5xl font-extrabold leading-tight mb-6">
                    Start Your <br/>
                    <span class="text-blue-400">Success Story.</span>
                </h2>
                <p class="text-blue-100/70 text-lg leading-relaxed">
                    Join thousands of students excelling in their exams with our structured online learning paths.
                </p>
            </div>

            <div class="relative z-10">
                <div class="w-full aspect-video bg-white/5 rounded-3xl border border-white/10 backdrop-blur-md flex items-center justify-center overflow-hidden">
                     <img src="{{ asset('images/logo.jpeg') }}" class="w-32 h-32 rounded-2xl shadow-2xl object-cover" alt="Logo">
                </div>
                <p class="mt-6 text-sm text-blue-300/60 text-center font-medium uppercase tracking-widest">Official Education Partner</p>
            </div>
        </div>

        <div class="lg:col-span-7 p-8 sm:p-12 lg:p-16 flex flex-col justify-center bg-white overflow-y-auto custom-scrollbar">
            
            <div class="mb-10">
                <h1 class="text-4xl font-extrabold text-gray-900 mb-2">Create Account</h1>
                <p class="text-gray-500">Please fill in your details to register.</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="md:col-span-1">
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5 ml-1">Full Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" required 
                            class="w-full px-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50/50 input-focus-effect transition-all" 
                            placeholder="John Doe">
                    </div>

                    <div class="md:col-span-1">
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5 ml-1">Email Address</label>
                        <input type="email" name="email" value="{{ old('email') }}" required 
                            class="w-full px-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50/50 input-focus-effect transition-all" 
                            placeholder="name@example.com">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5 ml-1">WhatsApp Number</label>
                        <input type="text" name="whatsapp_number" value="{{ old('whatsapp_number') }}" required 
                            class="w-full px-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50/50 input-focus-effect transition-all" 
                            placeholder="+94 71 234 5678">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5 ml-1">ID Number</label>
                        <input type="text" name="id_number" value="{{ old('id_number') }}" required 
                            class="w-full px-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50/50 input-focus-effect transition-all" 
                            placeholder="NIC or Student ID">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5 ml-1">Home Address</label>
                        <input type="text" name="address" value="{{ old('address') }}" required 
                            class="w-full px-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50/50 input-focus-effect transition-all" 
                            placeholder="Your permanent address">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5 ml-1">Expected Exam Year</label>
                        <input type="number" name="exam_year" value="{{ old('exam_year') }}" min="2024" max="2030" required 
                            class="w-full px-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50/50 input-focus-effect transition-all" 
                            placeholder="2026">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5 ml-1">Password</label>
                        <input type="password" name="password" required 
                            class="w-full px-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50/50 input-focus-effect transition-all" 
                            placeholder="••••••••">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5 ml-1">Confirm Password</label>
                        <input type="password" name="password_confirmation" required 
                            class="w-full px-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50/50 input-focus-effect transition-all" 
                            placeholder="••••••••">
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" 
                        class="w-full py-4 bg-royal-600 hover:bg-royal-700 text-white font-bold rounded-2xl shadow-xl shadow-blue-200 transition-all active:scale-[0.98] flex items-center justify-center gap-2 text-lg">
                        Create My Account
                    </button>
                </div>

                <p class="text-center text-gray-500 text-sm mt-6">
                    Already have an account? 
                    <a href="{{ route('login') }}" class="text-royal-600 font-bold hover:underline">Sign In</a>
                </p>
            </form>
        </div>
    </div>

    <div class="fixed bottom-4 flex gap-6 text-[10px] text-gray-400 font-bold uppercase tracking-[0.2em]">
        <a href="#" class="hover:text-royal-600">Privacy</a>
        <a href="#" class="hover:text-royal-600">Terms</a>
        <a href="#" class="hover:text-royal-600">Help</a>
    </div>

</body>
</html>