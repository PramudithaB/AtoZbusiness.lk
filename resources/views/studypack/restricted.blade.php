<!DOCTYPE html>
<html lang="si">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Study Pack ප්‍රවේශය සීමා කර ඇත | Lasindu Senarath LMS</title>
<link rel="icon" type="image/jpeg" href="{{ asset('images/logo.jpeg') }}" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,600;9..144,700&family=Noto+Sans+Sinhala:wght@400;500;600;700&family=IBM+Plex+Mono:wght@400;500;600&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://unpkg.com/lucide@latest"></script>

<style>
  :root{
    --ink:#1B2A4A;
    --paper:#F2EFE4;
    --card:#FBF9F2;
    --maroon:#7A1F3D;
    --gold:#C99A3B;
  }
  body{
    margin:0;
    background:var(--paper);
    color:var(--ink);
    font-family:'Noto Sans Sinhala','Segoe UI',sans-serif;
  }
  .mono{ font-family:'IBM Plex Mono',monospace; }
  .display{ font-family:'Fraunces',serif; }
</style>
</head>
<body class="min-h-screen flex flex-col justify-between antialiased">

  <!-- Navbar -->
  <header class="bg-[#1B2A4A] text-[#F2EFE4] py-4 px-6 border-b border-[#2C3F6B]">
    <div class="max-w-4xl mx-auto flex items-center justify-between">
      <a href="{{ route('dashboard') }}" class="mono text-xs text-[#CBD3E1] hover:text-white flex items-center gap-1.5 transition">
        ← Dashboard වෙත ආපසු
      </a>
      <span class="mono text-xs text-[#C99A3B] font-bold uppercase tracking-widest border border-[#C99A3B]/40 px-3 py-1 rounded-full">
        Study Pack Access
      </span>
    </div>
  </header>

  <!-- Main Card -->
  <main class="max-w-2xl mx-auto px-4 py-12 flex-1 flex items-center">
    <div class="bg-[#FBF9F2] border-2 border-[#E1DAC5] rounded-3xl p-8 sm:p-12 shadow-xl w-full border-t-8 border-t-[#7A1F3D]">
      
      @if($hasPending)
        <!-- PENDING APPROVAL STATE -->
        <div class="text-center space-y-4">
          <div class="w-16 h-16 rounded-2xl bg-amber-100 text-amber-700 flex items-center justify-center mx-auto shadow-sm">
            <i data-lucide="clock" class="w-8 h-8"></i>
          </div>

          <span class="mono text-xs uppercase tracking-wider px-3 py-1 bg-amber-50 text-amber-800 font-bold rounded-full border border-amber-200 inline-block">
            Payment Verification Pending
          </span>

          <h1 class="display text-2xl sm:text-3xl font-bold text-[#1B2A4A] leading-tight">
            ඔබගේ ගෙවීම් රිසිට්පත ලැබී ඇත!
          </h1>

          <p class="text-sm text-slate-600 leading-relaxed max-w-lg mx-auto">
            ඔබ මෙම Study Pack එක සඳහා බැංකු ගෙවීම් රිසිට්පත (Bank Slip) ඉදිරිපත් කර ඇති අතර එය මේ වන විට අපගේ Admin මණ්ඩලය විසින් පරීක්ෂා කරමින් පවතී.
          </p>

          <div class="p-4 rounded-xl bg-amber-50/60 border border-amber-200 text-xs text-amber-900 text-left mono space-y-1">
            <div class="flex justify-between">
              <span>Study Pack:</span>
              <span class="font-bold">ව්‍යාපාර අධ්‍යයනය වීඩියෝ පාඩම් මාලාව</span>
            </div>
            <div class="flex justify-between">
              <span>Status:</span>
              <span class="font-bold text-amber-700 uppercase">Pending Approval</span>
            </div>
          </div>

          <p class="text-xs text-slate-500 pt-2">
            සාමාන්‍යයෙන් පැය කිහිපයක් ඇතුළත ගෙවීම තහවුරු කෙරේ. අනුමැතිය ලැබුණු වහාම වීඩියෝ සියල්ල ස්වයංක්‍රීයව විවෘත වේ.
          </p>

          <div class="pt-4 flex flex-col sm:flex-row gap-3 justify-center">
            <a href="{{ route('dashboard') }}" class="px-6 py-3 rounded-xl bg-[#1B2A4A] text-white font-bold text-xs hover:bg-[#2C3F6B] transition text-center mono">
              Dashboard වෙත යන්න
            </a>
          </div>
        </div>

      @else
        <!-- LOCKED / NOT PURCHASED STATE -->
        <div class="text-center space-y-5">
          <div class="w-16 h-16 rounded-2xl bg-rose-100 text-[#7A1F3D] flex items-center justify-center mx-auto shadow-sm">
            <i data-lucide="lock" class="w-8 h-8"></i>
          </div>

          <span class="mono text-xs uppercase tracking-widest px-3.5 py-1 bg-[#7A1F3D]/10 text-[#7A1F3D] font-bold rounded-full border border-[#7A1F3D]/20 inline-block">
            Premium Study Pack • Locked
          </span>

          <h1 class="display text-2xl sm:text-3xl font-bold text-[#1B2A4A] leading-tight">
            ව්‍යාපාර අධ්‍යයනය<br>වීඩියෝ පාඩම් මාලාව
          </h1>

          <p class="text-sm text-slate-600 leading-relaxed max-w-lg mx-auto">
            මෙම වීඩියෝ පාඩම් මාලාව නැරඹිය හැක්කේ මෙය මිලදී ගෙන (Enroll වී) ගෙවීම් තහවුරු කළ සිසුන්ට පමණි.
          </p>

          <!-- Study Pack Features Box -->
          <div class="p-5 rounded-2xl bg-white border border-[#E1DAC5] text-left space-y-3">
            <h4 class="mono text-xs uppercase tracking-wider text-[#C99A3B] font-bold">Study Pack ඇතුළත් දෑ:</h4>
            <ul class="text-xs space-y-2 text-slate-700">
              <li class="flex items-center gap-2">
                <i data-lucide="check-circle-2" class="w-4 h-4 text-[#3F7A57]"></i>
                <strong>12 සහ 13 ශ්‍රේණි</strong> සම්පූර්ණ NIE විෂය නිර්දේශය
              </li>
              <li class="flex items-center gap-2">
                <i data-lucide="check-circle-2" class="w-4 h-4 text-[#3F7A57]"></i>
                <strong>නිපුණතා 18</strong> යටතේ <strong>නිපුණතා මට්ටම් 116ක්</strong>
              </li>
              <li class="flex items-center gap-2">
                <i data-lucide="check-circle-2" class="w-4 h-4 text-[#3F7A57]"></i>
                කෙළින්ම නිපුණතා මට්ටමට අදාළ වීඩියෝ නැරඹීම හා Progress Tracker පහසුකම
              </li>
            </ul>

            <div class="pt-3 border-t border-slate-100 flex items-baseline justify-between">
              <span class="mono text-xs text-slate-500 uppercase">පාඨමාලා ගාස්තුව:</span>
              <span class="display text-2xl font-bold text-[#1B2A4A]">Rs. {{ number_format($package->monthly_fee ?? 2500) }}</span>
            </div>
          </div>

          <!-- Actions -->
          <div class="pt-4 flex flex-col sm:flex-row gap-3 justify-center">
            <button onclick="buyStudyPack({{ $class->id }}, '{{ addslashes($package->package_name ?? $class->className) }}', {{ $package->monthly_fee ?? 2500 }})"
                    class="px-8 py-3.5 rounded-xl bg-[#7A1F3D] hover:bg-[#5E1830] text-white font-bold text-sm shadow-lg shadow-[#7A1F3D]/25 transition active:scale-[0.98] flex items-center justify-center gap-2 mono">
              <i data-lucide="shopping-cart" class="w-4 h-4 text-[#C99A3B]"></i>
              Enroll &amp; Buy Study Pack
            </button>

            <a href="{{ route('dashboard') }}" class="px-6 py-3.5 rounded-xl bg-white border border-[#E1DAC5] text-[#1B2A4A] font-bold text-xs hover:bg-slate-50 transition text-center mono flex items-center justify-center">
              Dashboard වෙත ආපසු
            </a>
          </div>

        </div>
      @endif

    </div>
  </main>

  <footer class="text-center py-6 text-xs text-slate-400 mono">
    &copy; 2026 Lasindu Senarath LMS • AtoZ Business School
  </footer>

  <script>
    lucide.createIcons();

    function buyStudyPack(id, name, price) {
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
