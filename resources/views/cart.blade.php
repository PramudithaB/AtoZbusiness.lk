<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart | Lasindu Senarath LMS</title>
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
    </style>
</head>

<body class="antialiased min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-white border-b border-slate-200/80 sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 h-20 flex justify-between items-center">
            <a href="{{ route('buyclass') }}" class="flex items-center text-xs font-bold text-blue-700 hover:text-navy-950 transition gap-1.5">
                <i data-lucide="arrow-left" class="w-4 h-4"></i> Back to Courses
            </a>
            
            <div class="flex items-center gap-2">
                <span class="text-xs font-extrabold text-blue-700 uppercase tracking-widest">AtoZ LMS</span>
                <span class="text-base font-extrabold text-navy-950 tracking-tight">LASINDU SENARATH</span>
            </div>
        </div>
    </nav>

    <!-- Main -->
    <main class="max-w-6xl mx-auto px-4 sm:px-6 py-10 flex-1 w-full space-y-8">
        
        <div class="border-b border-slate-200 pb-4">
            <h1 class="text-2xl sm:text-3xl font-extrabold text-navy-950 tracking-tight">Shopping Cart</h1>
            <p class="text-xs text-slate-500 mt-1">Review your selected courses before proceeding to secure checkout.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- Cart Items List -->
            <div class="lg:col-span-8 space-y-4">
                <div id="cart-items" class="space-y-4"></div>

                <div id="empty-state" class="hidden text-center py-20 bg-white rounded-3xl border border-dashed border-slate-300 p-8">
                    <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4 text-slate-400">
                        <i data-lucide="shopping-bag" class="w-8 h-8"></i>
                    </div>
                    <h3 class="text-base font-bold text-navy-950 mb-1">Your cart is currently empty</h3>
                    <p class="text-xs text-slate-500 mb-6">Select a course module to start your learning journey.</p>
                    <a href="{{ route('buyclass') }}" class="px-6 py-3 bg-navy-900 text-white font-bold rounded-xl text-xs hover:bg-navy-800 transition inline-flex items-center gap-2">
                        <i data-lucide="book-open" class="w-4 h-4 text-sky-400"></i> Explore Courses
                    </a>
                </div>
            </div>

            <!-- Order Summary Card -->
            <div class="lg:col-span-4">
                <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/90 shadow-sm sticky top-28 space-y-6">
                    <h2 class="text-lg font-bold text-navy-950 pb-4 border-b border-slate-100">Order Summary</h2>

                    <div class="space-y-3 text-xs">
                        <div class="flex justify-between text-slate-500">
                            <span>Courses Subtotal</span>
                            <span id="subtotal" class="font-bold text-navy-950 text-sm">Rs. 0</span>
                        </div>
                        <div class="flex justify-between text-slate-500">
                            <span>Processing & Platform Fee</span>
                            <span class="font-bold text-emerald-600 text-xs">Free (Rs. 0)</span>
                        </div>
                    </div>

                    <div class="border-t border-slate-100 pt-4 flex justify-between items-baseline">
                        <span class="text-sm font-bold text-navy-950">Total Payable</span>
                        <span id="total-amount" class="text-2xl font-black text-blue-700">Rs. 0</span>
                    </div>

                    <a href="{{ route('checkout.page') }}" 
                       id="checkout-btn"
                       class="w-full py-4 bg-navy-900 hover:bg-blue-700 text-white font-bold rounded-xl transition shadow-lg shadow-navy-950/15 flex items-center justify-center gap-2 text-sm active:scale-[0.98]">
                        <span>Proceed to Checkout</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>

                    <div class="pt-4 border-t border-slate-100 text-center space-y-1 text-[11px] text-slate-400">
                        <p class="flex items-center justify-center gap-1.5 font-semibold text-slate-500">
                            <i data-lucide="shield-check" class="w-3.5 h-3.5 text-emerald-500"></i>
                            Official Bank Slip Verification
                        </p>
                        <p>Upload deposit slip on the next step to confirm payment.</p>
                    </div>
                </div>
            </div>

        </div>

    </main>

    <footer class="bg-white border-t border-slate-200/80 py-6 px-4 text-center text-xs text-slate-400">
        &copy; 2026 Lasindu Senarath LMS • AtoZ Business School
    </footer>

    <script>
        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        const container = document.getElementById("cart-items");
        const emptyState = document.getElementById("empty-state");
        const checkoutBtn = document.getElementById("checkout-btn");
        let total = 0;

        function renderCart() {
            container.innerHTML = "";
            total = 0;

            if (cart.length === 0) {
                emptyState.classList.remove('hidden');
                checkoutBtn.classList.add('opacity-50', 'pointer-events-none');
            } else {
                emptyState.classList.add('hidden');
                checkoutBtn.classList.remove('opacity-50', 'pointer-events-none');
                
                cart.forEach(item => {
                    container.innerHTML += `
                        <div class="bg-white p-5 sm:p-6 rounded-2xl border border-slate-200/90 shadow-sm flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 transition hover:border-blue-500">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-xl bg-navy-50 text-navy-800 flex items-center justify-center flex-shrink-0">
                                    <i data-lucide="book-open" class="w-6 h-6 text-blue-700"></i>
                                </div>
                                <div>
                                    <h3 class="text-base font-bold text-navy-950">${item.name}</h3>
                                    <p class="text-blue-700 font-extrabold text-sm mt-0.5">Rs. ${item.price.toLocaleString()}</p>
                                </div>
                            </div>
                            <button onclick="removeItem(${item.id})"
                                    class="text-rose-600 hover:text-rose-800 hover:bg-rose-50 px-3 py-1.5 rounded-lg text-xs font-bold transition flex items-center gap-1.5 ml-auto sm:ml-0">
                                <i data-lucide="trash-2" class="w-3.5 h-3.5"></i> Remove
                            </button>
                        </div>
                    `;
                    total += item.price;
                });
            }

            document.getElementById("subtotal").textContent = "Rs. " + total.toLocaleString();
            document.getElementById("total-amount").textContent = "Rs. " + total.toLocaleString();
            lucide.createIcons();
        }

        function removeItem(id) {
            cart = cart.filter(i => i.id !== id);
            localStorage.setItem("cart", JSON.stringify(cart));
            renderCart();
        }

        renderCart();
    </script>
</body>
</html>