<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Checkout | Lasindu Senarath LMS</title>
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
        .input-ring:focus {
            outline: none;
            border-color: #1e5285;
            box-shadow: 0 0 0 3px rgba(30, 82, 133, 0.15);
        }
    </style>
</head>

<body class="antialiased min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-white border-b border-slate-200/80 sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 h-20 flex justify-between items-center">
            <a href="{{ route('cart.view') }}" class="flex items-center text-xs font-bold text-blue-700 hover:text-navy-950 transition gap-1.5">
                <i data-lucide="chevron-left" class="w-4 h-4"></i> Back to Cart
            </a>
            
            <div class="flex items-center gap-2">
                <i data-lucide="shield-check" class="w-4 h-4 text-emerald-500"></i>
                <span class="text-xs font-extrabold uppercase tracking-widest text-slate-500">Secure Enrollment</span>
            </div>
        </div>
    </nav>

    <!-- Main -->
    <main class="max-w-6xl mx-auto px-4 sm:px-6 py-10 flex-1 w-full space-y-8">

        @if(session('success'))
            <div id="checkout-success" class="p-5 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm flex items-start gap-3 shadow-sm">
                <i data-lucide="check-circle" class="w-6 h-6 text-emerald-600 flex-shrink-0 mt-0.5"></i>
                <div>
                    <h4 class="font-extrabold text-emerald-950">Payment Slip Submitted Successfully!</h4>
                    <p class="text-xs text-emerald-800 mt-1">{{ session('success') }}</p>
                    <p class="text-[11px] text-emerald-600 mt-2 font-bold">Redirecting to your dashboard in 3 seconds...</p>
                </div>
            </div>
            <script>
                localStorage.removeItem("cart");
                setTimeout(() => { window.location.href = "{{ route('dashboard') }}"; }, 3000);
            </script>
        @endif

        @if(session('error'))
            <div class="p-5 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 text-sm flex items-start gap-3 shadow-sm">
                <i data-lucide="alert-circle" class="w-6 h-6 text-rose-600 flex-shrink-0 mt-0.5"></i>
                <div>
                    <h4 class="font-extrabold text-rose-950">Notice</h4>
                    <p class="text-xs text-rose-800 mt-1">{{ session('error') }}</p>
                </div>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- Left Form & Bank Details -->
            <div class="lg:col-span-7 space-y-8">
                
                <div>
                    <span class="text-xs font-bold text-blue-700 uppercase tracking-widest block mb-1">Final Step</span>
                    <h1 class="text-3xl font-extrabold text-navy-950 tracking-tight">Finalize Course Enrollment</h1>
                    <p class="text-xs text-slate-500 mt-1">Please deposit the total course fee and attach the bank slip receipt below.</p>
                </div>

                <!-- Bank Account Card -->
                <div class="p-6 rounded-3xl bg-navy-950 text-white border border-navy-800 shadow-xl space-y-4">
                    <div class="flex items-center justify-between border-b border-white/10 pb-3">
                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center text-sky-400">
                                <i data-lucide="building" class="w-4 h-4"></i>
                            </div>
                            <span class="text-xs font-extrabold uppercase tracking-widest text-sky-400">Bank Deposit Details</span>
                        </div>
                        <span class="text-[10px] font-bold px-2.5 py-0.5 rounded-full bg-emerald-500/20 text-emerald-300 border border-emerald-400/20">
                            Verified Account
                        </span>
                    </div>

                    <div class="grid grid-cols-2 gap-4 text-xs">
                        <div>
                            <span class="text-slate-400 block text-[10px] uppercase">Bank Name</span>
                            <span class="font-bold text-white text-sm">Bank of Ceylon (BOC)</span>
                        </div>
                        <div>
                            <span class="text-slate-400 block text-[10px] uppercase">Branch</span>
                            <span class="font-bold text-white text-sm">Nugegoda / Colombo</span>
                        </div>
                        <div>
                            <span class="text-slate-400 block text-[10px] uppercase">Account Holder</span>
                            <span class="font-bold text-white text-sm">Lasindu Senarath</span>
                        </div>
                        <div>
                            <span class="text-slate-400 block text-[10px] uppercase">Account Number</span>
                            <span class="font-bold text-sky-300 text-sm tracking-wider font-mono">0000 0000 0000</span>
                        </div>
                    </div>

                    <div class="pt-2 text-[11px] text-slate-400 border-t border-white/10 flex items-center gap-1.5">
                        <i data-lucide="info" class="w-3.5 h-3.5 text-sky-400"></i>
                        Please include your student name or mobile number as the deposit reference.
                    </div>
                </div>

                <!-- Checkout Form -->
                <form action="{{ route('checkout.submit') }}" method="POST" enctype="multipart/form-data" class="space-y-5 bg-white p-6 sm:p-8 rounded-3xl border border-slate-200/90 shadow-sm">
                    @csrf

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                            Student Full Name <span class="text-rose-500">*</span>
                        </label>
                        <input type="text" 
                               name="student_name" 
                               value="{{ Auth::user()->name ?? '' }}" 
                               required 
                               placeholder="Enter your registered name"
                               class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm input-ring transition">
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                            Selected Courses
                        </label>
                        <input type="text" 
                               id="class_name_display" 
                               disabled 
                               class="w-full px-4 py-3 bg-slate-100 border border-slate-200 rounded-xl text-slate-600 text-sm font-semibold cursor-not-allowed">
                        <input type="hidden" id="class_name" name="class_name">
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                            Upload Bank Deposit Slip / Receipt (PDF, JPG, PNG - Max 2MB) <span class="text-rose-500">*</span>
                        </label>
                        <input type="file" 
                               name="file" 
                               accept="application/pdf,image/jpeg,image/png" 
                               required 
                               class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-600 text-sm input-ring file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer">
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                            Remarks / Reference <span class="text-slate-400">(Optional)</span>
                        </label>
                        <input type="text" 
                               name="remark" 
                               placeholder="e.g. Deposited via online banking at 10:30 AM"
                               class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm input-ring transition">
                    </div>

                    <input type="hidden" id="class_id" name="class_id">
                    <input type="hidden" id="lesson_id" name="lesson_id">

                    <button type="submit" 
                            class="w-full py-4 bg-navy-900 hover:bg-blue-700 text-white font-bold rounded-2xl shadow-xl shadow-navy-950/20 active:scale-[0.98] transition flex items-center justify-center gap-2 text-sm">
                        <i data-lucide="check-circle" class="w-4 h-4 text-sky-400"></i>
                        Submit Enrollment & Slip
                    </button>
                </form>

            </div>

            <!-- Right Summary -->
            <div class="lg:col-span-5">
                <div class="bg-white rounded-3xl border border-slate-200/90 shadow-sm p-6 sm:p-8 sticky top-28 space-y-6">
                    <h2 class="text-lg font-bold text-navy-950 pb-4 border-b border-slate-100">Course Summary</h2>
                    <div id="cart-summary" class="space-y-3"></div>

                    <div class="border-t border-slate-100 pt-4 flex justify-between items-baseline">
                        <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Total Amount</span>
                        <span id="total-display" class="text-3xl font-black text-blue-700">Rs. 0</span>
                    </div>

                    <div class="p-4 rounded-2xl bg-blue-50/70 border border-blue-100 text-xs text-blue-900 space-y-1">
                        <p class="font-bold flex items-center gap-1.5">
                            <i data-lucide="clock" class="w-3.5 h-3.5 text-blue-700"></i>
                            Verification Process
                        </p>
                        <p class="text-blue-800 leading-relaxed text-[11px]">
                            Once submitted, the admin verifies your slip and automatically activates your video lectures and class tutorials.
                        </p>
                    </div>
                </div>
            </div>

        </div>

    </main>

    <footer class="bg-white border-t border-slate-200/80 py-6 px-4 text-center text-xs text-slate-400">
        &copy; 2026 Lasindu Senarath LMS • AtoZ Business School
    </footer>

    <script>
        lucide.createIcons();

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
                <div class="flex justify-between items-center text-xs py-1 border-b border-slate-50">
                    <span class="font-bold text-navy-950">${item.name}</span>
                    <span class="font-extrabold text-slate-700">Rs. ${item.price.toLocaleString()}</span>
                </div>`;
        });

        document.getElementById("total-display").textContent = "Rs. " + total.toLocaleString();
        document.getElementById("class_name").value = selectedNames.join(", ");
        document.getElementById("class_name_display").value = selectedNames.join(", ") || "No courses in cart";
        document.getElementById("class_id").value = selectedIds.join(",");

        const form = document.querySelector('form[action="{{ route('checkout.submit') }}"]');
        if (form) {
            form.addEventListener('submit', function (event) {
                const fileInput = this.querySelector('input[name="file"]');
                const file = fileInput?.files?.[0];
                const classId = this.querySelector('input[name="class_id"]').value.trim();

                const errors = [];
                if (!classId) {
                    errors.push('Your cart is empty. Please add a course before checking out.');
                }
                if (!file) {
                    errors.push('Please select a payment slip receipt file to upload.');
                } else if (file.size > 2 * 1024 * 1024) {
                    errors.push('The payment slip must be smaller than 2MB.');
                }

                if (errors.length) {
                    event.preventDefault();
                    alert('Validation:\n' + errors.join('\n'));
                }
            });
        }
    </script>
</body>
</html>