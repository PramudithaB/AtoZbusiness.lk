<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Checkout | LTBio.lk</title>
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
        .input-focus:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
        }
    </style>
</head>

<body class="antialiased pb-12">

    <header class="bg-white border-b border-gray-100 py-6 mb-8">
        <div class="max-w-6xl mx-auto px-4 flex items-center justify-between">
            <a href="{{ route('cart.view') }}" class="flex items-center text-royal-600 font-bold text-sm">
                <i data-lucide="chevron-left" class="w-4 h-4 mr-1"></i> Back to Cart
            </a>
            <div class="flex items-center gap-2">
                <i data-lucide="shield-check" class="w-5 h-5 text-green-500"></i>
                <span class="text-xs font-bold uppercase tracking-widest text-gray-400">Secure Checkout</span>
            </div>
        </div>
    </header>

    <main class="max-w-6xl mx-auto px-4">

        @if(session('success'))
        <div id="notification" class="mb-8 flex items-center p-4 bg-green-50 border border-green-200 text-green-800 rounded-2xl shadow-sm">
            <i data-lucide="check-circle" class="w-6 h-6 mr-3"></i>
            <div class="text-sm font-bold">{{ session('success') }}</div>
            <button onclick="document.getElementById('notification').remove()" class="ml-auto text-green-600 hover:text-green-800">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>
        <script>
            // Automatically clear local cart if checkout was successful
            localStorage.removeItem("cart");
            // Redirect to dashboard after 3 seconds
            setTimeout(() => { window.location.href = "{{ route('dashboard') }}"; }, 3000);
        </script>
        @endif

        @if(session('error'))
        <div id="notification-error" class="mb-8 flex items-center p-4 bg-red-50 border border-red-200 text-red-800 rounded-2xl shadow-sm">
            <i data-lucide="alert-circle" class="w-6 h-6 mr-3"></i>
            <div class="text-sm font-bold">{{ session('error') }}</div>
            <button onclick="document.getElementById('notification-error').remove()" class="ml-auto text-red-600 hover:text-red-800">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

            <div class="lg:col-span-7 space-y-8">
                <section>
                    <h1 class="text-3xl font-extrabold text-gray-900 mb-2">Finalize Enrollment</h1>
                    <p class="text-gray-500">Please provide your details and upload the payment slip to gain access.</p>
                </section>

                <div class="bg-royal-50 border border-royal-100 rounded-3xl p-6">
                    <h3 class="text-royal-900 font-bold mb-3 flex items-center gap-2">
                        <i data-lucide="info" class="w-5 h-5"></i> Bank Details for Deposit
                    </h3>
                    <div class="text-sm text-royal-800 space-y-1">
                        <p><strong>Bank:</strong> Bank of Ceylon (BOC)</p>
                        <p><strong>Account Name:</strong> Lasindu Senarath</p>
                        <p><strong>Account Number:</strong> 0000 0000 0000</p>
                        <p><strong>Branch:</strong> Galle</p>
                    </div>
                </div>

                <form action="{{ route('checkout.submit') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700 ml-1">Full Name</label>
                        <input type="text" name="student_name" class="w-full bg-white border border-gray-200 p-4 rounded-2xl input-focus transition-all" placeholder="Enter registered name" required>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700 ml-1">Enrolling Classes</label>
                        <input type="text" id="class_name_display" class="w-full bg-gray-50 border border-gray-200 p-4 rounded-2xl text-gray-500 font-medium cursor-not-allowed" disabled>
                        <input type="hidden" id="class_name" name="class_name">
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700 ml-1">Payment Slip</label>
                        <input type="file" name="file" accept="application/pdf,image/*" required class="w-full bg-white border border-gray-200 p-4 rounded-2xl input-focus">
                    </div>

                    <input type="hidden" id="class_id" name="class_id">
                    <input type="hidden" id="lesson_id" name="lesson_id">

                    <button class="w-full bg-royal-600 text-white py-5 rounded-[2rem] font-black text-lg shadow-xl shadow-blue-100 hover:bg-royal-900 transition-all active:scale-[0.98]">
                        Complete My Enrollment
                    </button>
                </form>
            </div>

            <div class="lg:col-span-5">
                <div class="bg-white rounded-[2.5rem] border border-gray-100 shadow-sm p-8 sticky top-28">
                    <h2 class="text-xl font-bold text-gray-900 mb-6">Payment Summary</h2>
                    <div id="cart-summary" class="space-y-4 mb-8"></div>
                    <div class="border-t border-gray-100 pt-6 flex justify-between items-center">
                        <span class="text-gray-500 font-bold uppercase tracking-widest text-xs">Total Amount</span>
                        <span id="total-display" class="text-3xl font-black text-royal-600">Rs. 0</span>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        lucide.createIcons();

        // Standard Cart Loading
        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        let summaryContainer = document.getElementById("cart-summary");
        let total = 0;
        let selectedNames = [];
        let selectedIds = [];

        cart.forEach(item => {
            total += item.price;
            selectedNames.push(item.name);
            selectedIds.push(item.id);
            summaryContainer.innerHTML += `
                <div class="flex justify-between items-center">
                    <p class="text-sm font-bold text-gray-900">${item.name}</p>
                    <span class="text-sm font-black text-gray-700">Rs. ${item.price.toLocaleString()}</span>
                </div>`;
        });

        document.getElementById("total-display").textContent = "Rs. " + total.toLocaleString();
        document.getElementById("class_name").value = selectedNames.join(", ");
        document.getElementById("class_name_display").value = selectedNames.join(", ");
        document.getElementById("class_id").value = selectedIds.join(",");
    </script>
</body>
</html>