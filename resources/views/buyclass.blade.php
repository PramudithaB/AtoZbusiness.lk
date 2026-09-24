<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Enrollments | Lasindu Senarath LMS</title>
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
        .cart-badge-animate {
            transform: scale(1.3);
            transition: transform 0.25s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
    </style>
</head>

<body class="antialiased min-h-screen flex flex-col">

    <!-- Top Navigation -->
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

                <div class="flex items-center space-x-3 sm:space-x-6 text-sm font-semibold">
                    @auth
                        <a href="{{ route('dashboard') }}" class="text-slate-600 hover:text-navy-900 flex items-center gap-1.5 transition">
                            <i data-lucide="layout-dashboard" class="w-4 h-4 text-blue-600"></i>
                            <span class="hidden sm:inline">Dashboard</span>
                        </a>
                    @endauth

                    <a href="{{ route('cart.view') }}" class="relative p-2.5 rounded-xl bg-slate-100 hover:bg-blue-50 text-slate-700 hover:text-blue-700 transition flex items-center gap-2">
                        <i data-lucide="shopping-cart" class="w-5 h-5"></i>
                        <span class="hidden sm:inline font-bold text-xs">Cart</span>
                        <span id="cart-count" class="bg-blue-600 text-white text-[10px] font-bold w-5 h-5 flex items-center justify-center rounded-full shadow-sm">
                            0
                        </span>
                    </a>
                </div>

            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 flex-1 w-full space-y-10">

        <!-- Header -->
        <div class="text-center max-w-2xl mx-auto space-y-3">
            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 text-blue-700 text-xs font-bold uppercase tracking-wider">
                <i data-lucide="sparkles" class="w-3.5 h-3.5"></i> Monthly Enrollments
            </span>
            <h1 class="text-3xl sm:text-4xl font-extrabold text-navy-950 tracking-tight">
                Select Your Course Package
            </h1>
            <p class="text-slate-500 text-sm sm:text-base leading-relaxed">
                Choose your monthly subscription plan to unlock full video lectures, revision modules, and student discussion rooms.
            </p>
        </div>

        <!-- Notification Toast on adding to cart -->
        <div id="cart-alert" class="hidden fixed bottom-6 right-6 z-50 bg-navy-950 text-white px-5 py-3.5 rounded-2xl shadow-2xl border border-navy-800 flex items-center gap-3 text-sm animate-bounce">
            <i data-lucide="check-circle" class="w-5 h-5 text-emerald-400"></i>
            <span id="cart-alert-msg" class="font-bold">Course added to your cart!</span>
            <a href="{{ route('cart.view') }}" class="underline font-bold text-sky-400 ml-2">Checkout Now →</a>
        </div>

        <!-- Packages Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($packages as $pkg)
            <div class="bg-white rounded-3xl p-8 border border-slate-200/90 shadow-sm hover:shadow-xl hover:border-blue-600/30 transition-all duration-300 flex flex-col justify-between group">
                
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <span class="px-3 py-1 bg-navy-50 text-navy-800 text-[10px] font-extrabold uppercase tracking-widest rounded-full">
                            Monthly Plan
                        </span>
                        <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-700 flex items-center justify-center">
                            <i data-lucide="book" class="w-4 h-4"></i>
                        </div>
                    </div>

                    <h2 class="text-2xl font-extrabold text-navy-950 leading-tight mb-3 group-hover:text-blue-700 transition">
                        {{ $pkg->package_name }}
                    </h2>

                    <p class="text-slate-500 text-sm leading-relaxed mb-6">
                        {{ $pkg->description ?: 'Full month access to all live and recorded Business Studies lectures, class handouts, and tutor assistance.' }}
                    </p>
                </div>

                <div class="pt-6 border-t border-slate-100">
                    <div class="flex items-baseline gap-1 mb-6">
                        <span class="text-3xl font-extrabold text-navy-950">Rs. {{ number_format($pkg->monthly_fee) }}</span>
                        <span class="text-slate-400 text-xs font-semibold">/ month</span>
                    </div>

                    <button onclick="addToCart({{ $pkg->class_id }}, '{{ addslashes($pkg->package_name) }}', {{ $pkg->monthly_fee }})"
                            class="w-full py-4 bg-navy-900 hover:bg-blue-700 text-white font-bold rounded-2xl shadow-lg shadow-navy-950/15 active:scale-[0.98] transition flex items-center justify-center gap-2 text-sm">
                        <i data-lucide="plus-circle" class="w-4 h-4 text-sky-400"></i>
                        Add to Cart & Enroll
                    </button>
                </div>

            </div>
            @empty
            <div class="col-span-full py-16 text-center bg-white rounded-3xl border border-dashed border-slate-300 p-8">
                <i data-lucide="package" class="w-12 h-12 text-slate-300 mx-auto mb-3"></i>
                <h3 class="text-base font-bold text-navy-950 mb-1">No course packages available at this time</h3>
                <p class="text-xs text-slate-500">Please check back soon or contact student support.</p>
            </div>
            @endforelse
        </div>

    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-slate-200/80 py-8 px-4 text-center text-xs text-slate-500">
        &copy; 2026 Lasindu Senarath LMS • AtoZ Business School. All rights reserved.
    </footer>

    <script>
        lucide.createIcons();

        // Cart Logic (Preserving backend compatibility)
        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        updateCartBadge();

        function addToCart(id, name, price) {
            const exists = cart.find(item => item.id === id);
            if (!exists) {
                cart.push({ id, name, price });
                localStorage.setItem("cart", JSON.stringify(cart));
            }
            updateCartBadge();
            
            // Show toast alert
            const alertBox = document.getElementById("cart-alert");
            if (alertBox) {
                alertBox.classList.remove("hidden");
                setTimeout(() => alertBox.classList.add("hidden"), 3500);
            }
        }

        function updateCartBadge() {
            const badge = document.getElementById("cart-count");
            if (badge) {
                badge.textContent = cart.length;
                badge.classList.add("cart-badge-animate");
                setTimeout(() => badge.classList.remove("cart-badge-animate"), 250);
            }
        }
    </script>
</body>
</html>