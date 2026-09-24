<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publications & Study Materials | Lasindu Senarath LMS</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('images/logo.jpeg') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Noto+Sans+Sinhala:wght@400;600;700&display=swap" rel="stylesheet">
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
    </style>
</head>

<body class="antialiased min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-white/90 backdrop-blur-md border-b border-slate-200/80 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <a href="{{ auth()->check() ? route('dashboard') : route('login') }}" class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-navy-900 to-blue-700 p-0.5 shadow-md shadow-blue-900/10">
                        <div class="w-full h-full bg-white rounded-[10px] flex items-center justify-center overflow-hidden">
                            <img src="{{ asset('images/logo.jpeg') }}" alt="AtoZ Logo" class="w-full h-full object-cover">
                        </div>
                    </div>
                    <div>
                        <span class="text-[9px] font-extrabold text-blue-700 uppercase tracking-widest block">AtoZ Business School</span>
                        <span class="text-base font-extrabold text-navy-950 tracking-tight leading-none">LASINDU SENARATH</span>
                    </div>
                </a>

                <div class="flex items-center space-x-2 sm:space-x-4">
                    @auth
                        <a href="{{ route('dashboard') }}" class="px-3.5 py-2 text-xs font-bold text-slate-600 hover:text-navy-900 transition flex items-center gap-1.5">
                            <i data-lucide="layout-dashboard" class="w-4 h-4 text-blue-700"></i> Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="px-3.5 py-2 text-xs font-bold text-slate-600 hover:text-navy-900 transition">
                            Login
                        </a>
                    @endauth

                    <a href="{{ route('cart.view') }}" class="p-2.5 rounded-xl bg-slate-100 hover:bg-blue-50 text-slate-700 hover:text-blue-700 transition flex items-center gap-1.5">
                        <i data-lucide="shopping-cart" class="w-4 h-4"></i>
                        <span class="text-xs font-bold hidden sm:inline">Cart</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 flex-1 w-full space-y-10">
        
        <!-- Header -->
        <div class="text-center max-w-2xl mx-auto space-y-3">
            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 text-blue-700 text-xs font-bold uppercase tracking-wider">
                <i data-lucide="book-marked" class="w-3.5 h-3.5"></i> Author Publications
            </span>
            <h1 class="text-3xl sm:text-4xl font-extrabold text-navy-950 tracking-tight">
                Official Books & Study Guides
            </h1>
            <p class="text-slate-500 text-sm sm:text-base leading-relaxed">
                Authored by Lasindu Senarath. Comprehensive Advanced Level Business Studies handbooks, past paper compendiums, and lesson audio podcasts.
            </p>
        </div>

        <!-- Books Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @php
                $sampleBooks = [
                    ['id' => 1, 'title' => 'Business Studies Vol. 1', 'tag' => 'Core Theory', 'price' => 1500, 'img' => 'https://images.unsplash.com/photo-1544947950-fa07a98d237f?auto=format&fit=crop&q=80&w=400'],
                    ['id' => 2, 'title' => 'Business Studies Vol. 2', 'tag' => 'Core Theory', 'price' => 1650, 'img' => 'https://images.unsplash.com/photo-1589829085413-56de8ae18c73?auto=format&fit=crop&q=80&w=400'],
                    ['id' => 3, 'title' => 'Top 50 Expected Exam Questions', 'tag' => 'Model Papers', 'price' => 950, 'img' => 'https://images.unsplash.com/photo-1553729459-efe14ef6055d?auto=format&fit=crop&q=80&w=400'],
                    ['id' => 4, 'title' => 'Past Paper Collection (10 Years)', 'tag' => 'Past Papers', 'price' => 1200, 'img' => 'https://images.unsplash.com/photo-1532012197267-da84d127e765?auto=format&fit=crop&q=80&w=400'],
                    ['id' => 5, 'title' => 'Quick Revision Short Notes', 'tag' => 'Revision', 'price' => 800, 'img' => 'https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&q=80&w=400'],
                    ['id' => 6, 'title' => 'Marketing Management Guide', 'tag' => 'Specialized', 'price' => 1800, 'img' => 'https://images.unsplash.com/photo-1495446815901-a7297e633e8d?auto=format&fit=crop&q=80&w=400'],
                    ['id' => 7, 'title' => 'Basic Financial Principles for A/L', 'tag' => 'Accounting & Finance', 'price' => 1400, 'img' => 'https://images.unsplash.com/photo-1610116306796-6fea9f4fae38?auto=format&fit=crop&q=80&w=400'],
                    ['id' => 8, 'title' => 'Lesson Audio Podcasts Full Set', 'tag' => 'Digital Audio', 'price' => 2000, 'img' => 'https://images.unsplash.com/photo-1481627834876-b7833e8f5570?auto=format&fit=crop&q=80&w=400'],
                ];
            @endphp

            @foreach($sampleBooks as $book)
            <div class="bg-white rounded-3xl p-5 border border-slate-200/90 shadow-sm hover:shadow-xl hover:border-blue-600/30 transition-all flex flex-col justify-between group">
                <div>
                    <div class="aspect-[4/5] rounded-2xl overflow-hidden mb-4 bg-slate-100">
                        <img src="{{ $book['img'] }}" alt="{{ $book['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    </div>
                    
                    <span class="text-[10px] font-extrabold uppercase tracking-widest text-blue-700 bg-blue-50 px-2.5 py-0.5 rounded-full inline-block mb-2">
                        {{ $book['tag'] }}
                    </span>

                    <h3 class="text-base font-bold text-navy-950 leading-snug mb-1 group-hover:text-blue-700 transition">
                        {{ $book['title'] }}
                    </h3>
                    <p class="text-xs text-slate-400 font-medium">By Lasindu Senarath</p>
                </div>

                <div class="pt-4 border-t border-slate-100 mt-4 flex items-center justify-between">
                    <div>
                        <span class="text-lg font-black text-navy-950">Rs. {{ number_format($book['price']) }}</span>
                    </div>

                    <a href="https://wa.me/94704870565?text={{ urlencode('I would like to order: ' . $book['title']) }}" 
                       target="_blank"
                       class="px-4 py-2 bg-navy-900 hover:bg-blue-700 text-white font-bold rounded-xl text-xs transition flex items-center gap-1.5 shadow-sm">
                        <i data-lucide="shopping-cart" class="w-3.5 h-3.5 text-sky-400"></i> Order
                    </a>
                </div>
            </div>
            @endforeach
        </div>

    </main>

    <footer class="bg-white border-t border-slate-200/80 py-8 px-4 text-center text-xs text-slate-400">
        &copy; 2026 Lasindu Senarath LMS • AtoZ Business School. All rights reserved.
    </footer>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>