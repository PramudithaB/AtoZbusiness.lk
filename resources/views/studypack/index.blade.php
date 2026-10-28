<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Study Packs | Lasindu Senarath LMS - AtoZ Business School</title>
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

    <!-- Top Navigation -->
    <nav class="bg-white/90 backdrop-blur-md border-b border-slate-200/80 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-navy-900 to-blue-700 p-0.5 shadow-md shadow-blue-900/10">
                        <div class="w-full h-full bg-white rounded-[10px] flex items-center justify-center overflow-hidden">
                            <img src="{{ asset('images/logo.jpeg') }}" alt="AtoZ Logo" class="w-full h-full object-cover">
                        </div>
                    </div>
                    <div>
                        <span class="text-[9px] font-extrabold text-blue-700 uppercase tracking-widest block">AtoZ LMS</span>
                        <span class="text-base font-extrabold text-navy-950 tracking-tight leading-none">LASINDU SENARATH</span>
                    </div>
                </a>

                <div class="flex items-center space-x-2 sm:space-x-4 text-sm font-semibold">
                    <a href="{{ route('dashboard') }}" class="px-3.5 py-2 text-slate-600 hover:text-navy-900 flex items-center gap-1.5 transition">
                        <i data-lucide="layout-dashboard" class="w-4 h-4 text-slate-400"></i>
                        <span>Dashboard</span>
                    </a>

                    <a href="{{ route('cart.view') }}" class="relative p-2.5 rounded-xl bg-slate-100 hover:bg-blue-50 text-slate-700 hover:text-blue-700 transition flex items-center gap-2">
                        <i data-lucide="shopping-cart" class="w-4 h-4"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 flex-1 w-full space-y-10">

        <!-- Page Header -->
        <div class="text-center max-w-2xl mx-auto space-y-3">
            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 text-blue-700 text-xs font-bold uppercase tracking-wider">
                <i data-lucide="package" class="w-3.5 h-3.5"></i> Comprehensive Study Packs
            </span>
            <h1 class="text-3xl sm:text-4xl font-extrabold text-navy-950 tracking-tight">
                වීඩියෝ පාඩම් මාලා &amp; Study Packs
            </h1>
            <p class="text-slate-500 text-sm sm:text-base leading-relaxed">
                NIE විෂය නිර්දේශයට අනුව සකසන ලද නිපුණතා මට්ටම් අනුව වීඩියෝ පාඩම් මාලා සහ ස්වයං අධ්‍යයන පැකේජ.
            </p>
        </div>

        <!-- Study Packs Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            @forelse($studyPacks as $pack)
                @php
                    $isApproved = $userApprovals[$pack->id] ?? false;
                    $isPending = $userPendings[$pack->id] ?? false;
                    $pkgPrice = $pack->price ?? ($pack->package->monthly_fee ?? 2500);
                @endphp
                <div class="bg-white rounded-3xl p-8 border border-slate-200/90 shadow-sm hover:shadow-xl hover:border-blue-600/30 transition-all flex flex-col justify-between group relative overflow-hidden">
                    <div class="absolute top-0 left-0 right-0 h-1.5 bg-gradient-to-r from-blue-700 via-sky-500 to-indigo-600"></div>

                    <div>
                        <!-- Top Status Badge -->
                        <div class="flex items-center justify-between mb-4">
                            <span class="px-3 py-1 bg-navy-50 text-navy-900 text-[10px] font-extrabold uppercase tracking-widest rounded-full">
                                {{ $pack->grade ?? 'Grade 12 & 13' }}
                            </span>
                            
                            @if($isApproved)
                                <span class="px-2.5 py-0.5 rounded-full text-[10px] font-extrabold bg-emerald-50 text-emerald-700 border border-emerald-200 flex items-center gap-1">
                                    <i data-lucide="check-circle-2" class="w-3 h-3"></i> Enrolled &amp; Active
                                </span>
                            @elseif($isPending)
                                <span class="px-2.5 py-0.5 rounded-full text-[10px] font-extrabold bg-amber-50 text-amber-700 border border-amber-200 flex items-center gap-1">
                                    <i data-lucide="clock" class="w-3 h-3"></i> Pending Approval
                                </span>
                            @else
                                <span class="px-2.5 py-0.5 rounded-full text-[10px] font-extrabold bg-slate-100 text-slate-600 flex items-center gap-1">
                                    <i data-lucide="lock" class="w-3 h-3 text-slate-400"></i> Locked
                                </span>
                            @endif
                        </div>

                        <h2 class="text-2xl font-extrabold text-navy-950 leading-tight mb-3 group-hover:text-blue-700 transition">
                            {{ $pack->title }}
                        </h2>

                        @if($pack->subtitle)
                            <p class="text-xs font-semibold text-blue-600 mb-2">{{ $pack->subtitle }}</p>
                        @endif

                        <p class="text-slate-500 text-sm leading-relaxed mb-6">
                            {{ $pack->description ?? 'NIE විෂය නිර්දේශයට අනුව සකසන ලද සම්පූර්ණ න්‍යායාත්මක වීඩියෝ පාඩම් එකතුව.' }}
                        </p>

                        <!-- Feature pills -->
                        <div class="grid grid-cols-2 gap-2 mb-6">
                            <div class="p-2.5 rounded-xl bg-slate-50 border border-slate-100 text-center">
                                <span class="block text-base font-extrabold text-navy-900">{{ $pack->topics_count }}</span>
                                <span class="text-[10px] font-semibold text-slate-500 uppercase">නිපුණතා / මාතෘකා</span>
                            </div>
                            <div class="p-2.5 rounded-xl bg-slate-50 border border-slate-100 text-center">
                                <span class="block text-base font-extrabold text-blue-700">{{ $pack->subtopics_count }}</span>
                                <span class="text-[10px] font-semibold text-slate-500 uppercase">වීඩියෝ පාඩම්</span>
                            </div>
                        </div>
                    </div>

                    <div class="pt-6 border-t border-slate-100 space-y-4">
                        <div class="flex items-baseline justify-between">
                            <span class="text-xs text-slate-400 font-semibold uppercase">Course Fee</span>
                            <span class="text-2xl font-extrabold text-navy-950">Rs. {{ number_format($pkgPrice) }}</span>
                        </div>

                        @if($isApproved)
                            <a href="{{ route('studypack.show', $pack->id) }}"
                               class="w-full py-4 bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-2xl shadow-lg shadow-emerald-600/20 active:scale-[0.98] transition flex items-center justify-center gap-2 text-sm">
                                <i data-lucide="play-circle" class="w-5 h-5"></i>
                                පාඩම් මාලාවට පිවිසෙන්න →
                            </a>
                        @elseif($isPending)
                            <a href="{{ route('studypack.show', $pack->id) }}"
                               class="w-full py-4 bg-amber-500 hover:bg-amber-600 text-white font-bold rounded-2xl shadow-lg shadow-amber-500/20 active:scale-[0.98] transition flex items-center justify-center gap-2 text-sm">
                                <i data-lucide="clock" class="w-5 h-5"></i>
                                Payment Verification Pending
                            </a>
                        @else
                            <button onclick="buyPack({{ $pack->class_id ?? $pack->id }}, '{{ addslashes($pack->title) }}', {{ $pkgPrice }})"
                                    class="w-full py-4 bg-navy-900 hover:bg-blue-700 text-white font-bold rounded-2xl shadow-lg shadow-navy-950/15 active:scale-[0.98] transition flex items-center justify-center gap-2 text-sm">
                                <i data-lucide="shopping-cart" class="w-4 h-4 text-sky-400"></i>
                                Enroll &amp; Buy Study Pack
                            </button>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-span-full py-16 text-center text-slate-400 bg-white rounded-3xl border border-slate-200">
                    <i data-lucide="package" class="w-12 h-12 mx-auto text-slate-300 mb-3"></i>
                    <p class="font-bold text-slate-600">තවමත් Study Packs පළ කර නොමැත.</p>
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

        function buyPack(id, name, price) {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            const exists = cart.find(item => item.id === id);
            if (!exists) {
                cart.push({ id, name, price });
                localStorage.setItem("cart", JSON.stringify(cart));
            }
            window.location.href = "{{ route('checkout.page') }}";
        }
    </script>
</body>
</html>
