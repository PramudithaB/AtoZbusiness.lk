<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server Error (500) | Lasindu Senarath LMS</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('images/logo.jpeg') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&family=Noto+Sans+Sinhala:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen flex items-center justify-center p-4">
    <div class="max-w-md w-full bg-white rounded-3xl p-8 border border-slate-200/90 shadow-xl text-center space-y-6">
        <div class="w-16 h-16 rounded-2xl bg-rose-50 text-rose-600 mx-auto flex items-center justify-center border border-rose-200">
            <i data-lucide="alert-triangle" class="w-8 h-8"></i>
        </div>

        <div class="space-y-2">
            <span class="text-[11px] font-extrabold uppercase tracking-widest text-rose-600 bg-rose-50 px-3 py-1 rounded-full">Error 500 • Server Error</span>
            <h1 class="text-2xl font-extrabold text-[#0a1d35]">පද්ධතියේ දෝෂයක් සිදු විය</h1>
            <p class="text-slate-500 text-sm leading-relaxed">
                සේවාදායකයේ තාවකාලික දෝෂයක් සිදුව ඇත. අපගේ තාක්ෂණික කණ්ඩායම දැනුවත් කර ඇති අතර කරුණාකර සුළු මොහොතකින් නැවත උත්සාහ කරන්න.
            </p>
        </div>

        <div class="pt-4 border-t border-slate-100 flex flex-col gap-2.5">
            <a href="{{ url('/') }}" 
               class="w-full py-3.5 bg-[#0a1d35] hover:bg-blue-900 text-white font-bold rounded-xl transition text-sm flex items-center justify-center gap-2 shadow-md shadow-navy-950/15">
                <i data-lucide="home" class="w-4 h-4"></i>
                <span>Go to Home Page (මුල් පිටුවට)</span>
            </a>
            <button onclick="window.history.back()" 
                    class="w-full py-3 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold rounded-xl transition text-xs flex items-center justify-center gap-2">
                <i data-lucide="arrow-left" class="w-3.5 h-3.5"></i>
                <span>Go Back (ආපසු යන්න)</span>
            </button>
        </div>
    </div>
    <script>lucide.createIcons();</script>
</body>
</html>
