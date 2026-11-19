<!DOCTYPE html>
<html lang="si">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Study Pack ප්‍රවේශය සීමා කර ඇත | Lasindu Senarath LMS</title>
<link rel="icon" type="image/jpeg" href="{{ asset('images/logo.jpeg') }}" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Noto+Sans+Sinhala:wght@400;600;700&display=swap" rel="stylesheet">
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
        color: #0f2b4c;
    }
</style>
</head>
<body class="min-h-screen flex flex-col justify-between antialiased bg-[#f8fafc]">

    <!-- Navbar -->
    <header class="bg-white border-b border-slate-200/90 py-4 px-6 sticky top-0 z-50">
        <div class="max-w-4xl mx-auto flex items-center justify-between">
            <a href="{{ route('dashboard') }}" class="text-xs font-bold text-navy-800 hover:text-navy-950 flex items-center gap-1.5 transition">
                <i data-lucide="arrow-left" class="w-4 h-4"></i>
                <span>Dashboard වෙත ආපසු</span>
            </a>
            <span class="text-xs font-bold text-navy-800 bg-navy-50 border border-navy-100 px-3 py-1 rounded-full uppercase tracking-wider">
                Study Pack Access
            </span>
        </div>
    </header>

    <!-- Main Card -->
    <main class="max-w-xl mx-auto px-4 py-12 flex-1 flex items-center w-full">
        <div class="bg-white border border-slate-200/90 rounded-3xl p-6 sm:p-10 shadow-lg w-full text-center space-y-6">
            
            @if($hasPending)
                <!-- PENDING APPROVAL STATE -->
                <div class="space-y-4">
                    <div class="w-16 h-16 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center mx-auto border border-amber-200 shadow-sm">
                        <i data-lucide="clock" class="w-8 h-8"></i>
                    </div>

                    <span class="text-xs uppercase tracking-wider px-3.5 py-1 bg-amber-50 text-amber-800 font-extrabold rounded-full border border-amber-200 inline-block">
                        Payment Verification Pending
                    </span>

                    <h1 class="text-2xl sm:text-3xl font-extrabold text-navy-950 leading-tight">
                        ඔබගේ ගෙවීම් රිසිට්පත ලැබී ඇත!
                    </h1>

                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed max-w-md mx-auto">
                        ඔබ මෙම Study Pack එක සඳහා බැංකු ගෙවීම් රිසිට්පත (Bank Slip) ඉදිරිපත් කර ඇති අතර එය මේ වන විට අපගේ Admin මණ්ඩලය විසින් පරීක්ෂා කරමින් පවතී.
                    </p>

                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 text-xs text-left space-y-2">
                        <div class="flex justify-between items-center">
                            <span class="text-slate-400 font-bold uppercase text-[10px]">Study Pack:</span>
                            <span class="font-extrabold text-navy-950">{{ $studyPack->title }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-slate-400 font-bold uppercase text-[10px]">Status:</span>
                            <span class="font-extrabold text-amber-700 uppercase bg-amber-50 px-2 py-0.5 rounded border border-amber-200">Pending Approval</span>
                        </div>
                    </div>

                    <p class="text-xs text-slate-500 pt-1">
                        අනුමැතිය ලැබුණු වහාම ඔබගේ ගිණුමට මෙම Study Pack එකේ සියලුම වීඩියෝ පාඩම් ස්වයංක්‍රීයව විවෘත වේ.
                    </p>

                    <div class="pt-4 flex justify-center">
                        <a href="{{ route('dashboard') }}" class="px-6 py-3 rounded-xl bg-navy-900 hover:bg-navy-800 text-white font-bold text-xs transition shadow-sm">
                            Dashboard වෙත යන්න
                        </a>
                    </div>
                </div>

            @else
                <!-- LOCKED / NOT PURCHASED STATE -->
                <div class="space-y-5">
                    <div class="w-16 h-16 rounded-2xl bg-rose-50 text-rose-600 flex items-center justify-center mx-auto border border-rose-200 shadow-sm">
                        <i data-lucide="lock" class="w-8 h-8"></i>
                    </div>

                    <span class="text-xs uppercase tracking-wider px-3.5 py-1 bg-rose-50 text-rose-700 font-extrabold rounded-full border border-rose-200 inline-block">
                        Payment Required • Locked
                    </span>

                    <h1 class="text-2xl sm:text-3xl font-extrabold text-navy-950 leading-tight">
                        {{ $studyPack->title }}
                    </h1>

                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed max-w-md mx-auto">
                        මෙම වීඩියෝ පාඩම් මාලාව නැරඹිය හැක්කේ මෙය මිලදී ගෙන (Enroll වී) <strong>ගෙවීම් සිදු කළ සිසුන්ට පමණි</strong>.
                    </p>

                    <!-- Study Pack Features Box -->
                    <div class="p-5 rounded-2xl bg-slate-50 border border-slate-200 text-left space-y-3">
                        <h4 class="text-xs uppercase tracking-wider text-navy-800 font-extrabold">Study Pack ඇතුළත් දෑ:</h4>
                        <ul class="text-xs space-y-2 text-slate-700">
                            <li class="flex items-center gap-2">
                                <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600 flex-shrink-0"></i>
                                <span><strong>{{ $studyPack->grade ?? '12 සහ 13 ශ්‍රේණි' }}</strong> සම්පූර්ණ NIE විෂය නිර්දේශය</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600 flex-shrink-0"></i>
                                <span>ප්‍රධාන ඒකක <strong>{{ $studyPack->topics_count }}ක්</strong> යටතේ වීඩියෝ පාඩම් <strong>{{ $studyPack->subtopics_count }}ක්</strong></span>
                            </li>
                            <li class="flex items-center gap-2">
                                <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600 flex-shrink-0"></i>
                                <span>Full HD Lecture Recordings සහ Progress Tracking පහසුකම</span>
                            </li>
                        </ul>

                        <div class="pt-3 border-t border-slate-200 flex items-baseline justify-between">
                            <span class="text-xs text-slate-500 font-bold uppercase">පාඨමාලා ගාස්තුව:</span>
                            <span class="text-2xl font-extrabold text-navy-950">Rs. {{ number_format($studyPack->price) }}</span>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="pt-2 flex flex-col sm:flex-row gap-3 justify-center">
                        <button type="button"
                                onclick="buyStudyPack({{ $studyPack->class_id ?? 0 }}, '{{ addslashes($studyPack->title) }}', {{ $studyPack->price }})"
                                class="w-full sm:w-auto px-8 py-3.5 rounded-xl bg-navy-900 hover:bg-navy-800 text-white font-bold text-xs shadow-md transition active:scale-[0.98] flex items-center justify-center gap-2">
                            <i data-lucide="shopping-cart" class="w-4 h-4 text-amber-400"></i>
                            <span>Enroll &amp; Buy Study Pack</span>
                        </button>

                        <a href="{{ route('dashboard') }}" 
                           class="w-full sm:w-auto px-6 py-3.5 rounded-xl bg-white border border-slate-200 text-navy-950 font-bold text-xs hover:bg-slate-50 transition text-center flex items-center justify-center">
                            Dashboard වෙත ආපසු
                        </a>
                    </div>

                </div>
            @endif

        </div>
    </main>

    <footer class="text-center py-6 text-xs text-slate-400">
        &copy; 2026 Lasindu Senarath LMS • AtoZ Business School
    </footer>

    <script>
        lucide.createIcons();

        function buyStudyPack(classId, name, price) {
            if (!classId) {
                alert("Study pack class is not linked. Please contact admin.");
                return;
            }
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            const exists = cart.find(item => item.id === classId);
            if (!exists) {
                cart.push({ id: classId, name: name, price: price });
                localStorage.setItem("cart", JSON.stringify(cart));
            }
            window.location.href = "{{ route('checkout.page') }}";
        }
    </script>
</body>
</html>
