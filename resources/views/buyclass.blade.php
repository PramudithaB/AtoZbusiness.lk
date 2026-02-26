<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Class | LTBio.lk</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'royal-600': '#2563eb',
                        'royal-700': '#1d4ed8',
                        'royal-900': '#1e3a8a',
                    }
                }
            }
        }
    </script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
        }
        .cart-badge-animate {
            transform: scale(1.25);
            transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
    </style>
</head>

<body class="antialiased">

    <nav class="bg-white/80 backdrop-blur-md border-b border-gray-100 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">

                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-royal-600 rounded-lg flex items-center justify-center text-white font-bold text-sm">L</div>
                    <span class="text-xl font-extrabold text-royal-900 tracking-tight">LTBio</span>
                </div>

                <div class="hidden md:flex items-center space-x-8 text-sm font-bold">
                    <a href="{{ route('dashboard') }}" class="text-gray-500 hover:text-royal-600 flex items-center gap-2 transition">
                        <i data-lucide="layout-grid" class="w-4 h-4"></i> Dashboard
                    </a>

                    <a href="{{ route('buyclass') }}" class="text-royal-600 flex items-center gap-2">
                        <i data-lucide="shopping-bag" class="w-4 h-4"></i> Buy Class
                    </a>

                    <a href="{{ route('cart.view') }}" class="relative group p-2 bg-gray-50 rounded-full hover:bg-royal-50 transition">
                        <i data-lucide="shopping-cart" class="w-5 h-5 text-gray-600 group-hover:text-royal-600"></i>
                        <span id="cart-count" class="absolute -top-1 -right-1 bg-royal-600 text-white text-[10px] font-bold w-4 h-4 flex items-center justify-center rounded-full shadow-lg shadow-blue-200">
                            0
                        </span>
                    </a>
                </div>

                <div class="flex items-center gap-3">
                    <a href="{{ route('cart.view') }}" class="md:hidden relative p-2 mr-2">
                        <i data-lucide="shopping-cart" class="w-6 h-6 text-gray-600"></i>
                        <span id="cart-count-mobile" class="absolute top-0 right-0 bg-royal-600 text-white text-[10px] font-bold w-4 h-4 flex items-center justify-center rounded-full">0</span>
                    </a>

                    <div class="relative">
                        <button id="profile-menu-button" class="flex items-center gap-2 p-1 hover:bg-gray-50 rounded-xl transition">
                            <div class="w-9 h-9 bg-royal-900 rounded-lg flex items-center justify-center text-white font-bold text-xs uppercase">
                                {{ substr(Auth::user()->name, 0, 2) }}
                            </div>
                            <i data-lucide="chevron-down" class="w-4 h-4 text-gray-400"></i>
                        </button>

                        <div id="profile-dropdown" class="absolute right-0 mt-2 w-48 bg-white border border-gray-100 rounded-2xl shadow-xl py-2 hidden">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 font-medium">Profile</a>
                            <div class="border-t border-gray-50 my-1"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 font-medium">Log Out</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        <header class="mb-10">
            <h1 class="text-3xl font-extrabold text-gray-900 flex items-center gap-3">
                <i data-lucide="sparkles" class="w-8 h-8 text-royal-600"></i>
                Choose Your Course
            </h1>
            <p class="text-gray-500 mt-2">Enroll in premium classes and take your learning to the next level.</p>
        </header>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

            @foreach($packages as $pkg)
            <div class="group bg-white p-8 rounded-[2rem] border border-gray-100 shadow-sm hover:shadow-2xl hover:border-royal-600/20 transition-all duration-300 flex flex-col">
                
                <div class="mb-6">
                    <div class="inline-block px-3 py-1 bg-royal-50 text-royal-600 text-[10px] font-bold uppercase tracking-widest rounded-full mb-4">
                        Monthly Subscription
                    </div>
                    <h2 class="text-2xl font-extrabold text-gray-900 leading-tight">
                        {{ $pkg->package_name }}
                    </h2>
                </div>

                <p class="text-gray-500 text-sm mb-8 leading-relaxed flex-grow">
                    {{ $pkg->description }}
                </p>

                <div class="mb-8">
                    <span class="text-4xl font-black text-royal-900">Rs. {{ number_format($pkg->monthly_fee) }}</span>
                    <span class="text-gray-400 text-sm font-medium">/ month</span>
                </div>

                <button
                    onclick="addToCart({{ $pkg->class_id }}, '{{ $pkg->package_name }}', {{ $pkg->monthly_fee }})"
                    class="w-full bg-royal-600 text-white py-4 rounded-2xl font-bold shadow-lg shadow-blue-100 hover:bg-royal-900 active:scale-95 transition-all flex items-center justify-center gap-2">
                    <i data-lucide="plus-circle" class="w-5 h-5"></i>
                    Add to Cart
                </button>
            </div>
            @endforeach

        </div>

    </main>

    <script>
        lucide.createIcons();

        // Profile Dropdown
        const profBtn = document.getElementById('profile-menu-button');
        const profDrop = document.getElementById('profile-dropdown');
        profBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            profDrop.classList.toggle('hidden');
        });
        document.addEventListener('click', () => profDrop.classList.add('hidden'));

        // Cart Logic (Unchanged Backend Logic)
        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        updateCartBadge();

        function addToCart(id, name, price) {
            const exists = cart.find(item => item.id === id);
            if (!exists) {
                cart.push({ id, name, price });
                localStorage.setItem("cart", JSON.stringify(cart));
            }
            updateCartBadge();
            animateCart();
        }

        function updateCartBadge() {
            const count = cart.length;
            const desktop = document.getElementById("cart-count");
            const mobile = document.getElementById("cart-count-mobile");
            if (desktop) desktop.textContent = count;
            if (mobile) mobile.textContent = count;
        }

        function animateCart() {
            const badges = [document.getElementById("cart-count"), document.getElementById("cart-count-mobile")].filter(Boolean);
            badges.forEach(b => b.classList.add("cart-badge-animate"));
            setTimeout(() => {
                badges.forEach(b => b.classList.remove("cart-badge-animate"));
            }, 300);
        }
    </script>

</body>
</html>