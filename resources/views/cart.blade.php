<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart | LTBio.lk</title>
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
                    },
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
    </style>
</head>
<body class="antialiased">

    <nav class="bg-white border-b border-gray-100 py-4">
        <div class="max-w-5xl mx-auto px-4 flex justify-between items-center">
            <a href="{{ route('buyclass') }}" class="flex items-center text-royal-600 font-bold text-sm">
                <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i> Continue Shopping
            </a>
            <span class="text-xl font-extrabold text-royal-900">LTBio</span>
        </div>
    </nav>

    <main class="max-w-5xl mx-auto px-4 py-10">
        <h1 class="text-3xl font-extrabold text-gray-900 mb-8">Shopping Cart</h1>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-2 space-y-4">
                <div id="cart-items" class="space-y-4">
                    </div>
                
                <div id="empty-state" class="hidden text-center py-20 bg-white rounded-[2rem] border border-dashed border-gray-200">
                    <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i data-lucide="shopping-basket" class="w-8 h-8 text-gray-300"></i>
                    </div>
                    <p class="text-gray-500 font-medium">Your cart is empty.</p>
                    <a href="{{ route('buyclass') }}" class="text-royal-600 font-bold text-sm mt-4 inline-block hover:underline">Explore Classes</a>
                </div>
            </div>

            <div class="lg:col-span-1">
                <div class="bg-white p-8 rounded-[2rem] border border-gray-100 shadow-sm sticky top-24">
                    <h2 class="text-xl font-bold text-gray-900 mb-6">Order Summary</h2>
                    
                    <div class="space-y-4 mb-6">
                        <div class="flex justify-between text-gray-500">
                            <span>Subtotal</span>
                            <span id="subtotal" class="font-semibold text-gray-900">Rs. 0</span>
                        </div>
                        <div class="flex justify-between text-gray-500">
                            <span>Tax</span>
                            <span class="font-semibold text-gray-900">Rs. 0</span>
                        </div>
                        <div class="border-t border-gray-50 pt-4 flex justify-between items-end">
                            <span class="text-gray-900 font-bold">Total</span>
                            <span id="total-amount" class="text-2xl font-black text-royal-600 tracking-tight">Rs. 0</span>
                        </div>
                    </div>

                    <a href="{{ route('checkout.page') }}" id="checkout-btn"
                       class="w-full py-4 bg-royal-600 text-white rounded-2xl font-bold flex items-center justify-center gap-2 hover:bg-royal-900 transition shadow-lg shadow-blue-100 active:scale-95">
                        Checkout Now
                        <i data-lucide="chevron-right" class="w-4 h-4"></i>
                    </a>
                    
                    <p class="text-[10px] text-gray-400 text-center mt-4 uppercase tracking-widest font-bold">
                        Secure SSL Checkout
                    </p>
                </div>
            </div>

        </div>
    </main>

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
                        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex flex-col sm:flex-row justify-between items-center gap-4 transition hover:border-royal-200">
                            <div class="flex items-center gap-4 text-center sm:text-left">
                                <div class="w-12 h-12 bg-royal-50 rounded-xl flex items-center justify-center text-royal-600">
                                    <i data-lucide="book-open" class="w-6 h-6"></i>
                                </div>
                                <div>
                                    <h2 class="text-base font-bold text-gray-900 leading-tight">${item.name}</h2>
                                    <p class="text-royal-600 font-bold text-sm">Rs. ${item.price.toLocaleString()}</p>
                                </div>
                            </div>
                            <button onclick="removeItem(${item.id})"
                                class="flex items-center gap-2 text-red-500 text-xs font-bold hover:bg-red-50 px-4 py-2 rounded-xl transition">
                                <i data-lucide="trash-2" class="w-4 h-4"></i> Remove
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