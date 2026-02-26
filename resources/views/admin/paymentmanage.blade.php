<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Management | LTBio Admin</title>
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
                        'admin-dark': '#0f172a',
                    },
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #0f172a; color: #f8fafc; }
        .custom-scrollbar::-webkit-scrollbar { width: 4px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #334155; border-radius: 10px; }
    </style>
</head>

<body class="antialiased">

    <aside id="sidebar" class="fixed top-0 left-0 h-full w-64 bg-slate-900 border-r border-slate-800 z-50 transition-transform -translate-x-full lg:translate-x-0 overflow-y-auto custom-scrollbar">
        <div class="p-6">
            <div class="flex items-center gap-3 mb-10">
                <div class="w-10 h-10 bg-royal-600 rounded-xl flex items-center justify-center text-white font-bold">L</div>
                <span class="text-xl font-extrabold text-white tracking-tight">LTBio Admin</span>
            </div>

            <nav class="space-y-1">
                <p class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-4 ml-2">Main Menu</p>
                <a href="{{ route('admindashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white transition font-semibold text-sm">
                    <i data-lucide="layout-dashboard" class="w-4 h-4"></i> Dashboard
                </a>
                <a href="{{ route('usermanagement') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white transition font-semibold text-sm">
                    <i data-lucide="users" class="w-4 h-4"></i> User Management
                </a>
                <a href="{{ route('classmanage') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white transition font-semibold text-sm">
                    <i data-lucide="book-open" class="w-4 h-4"></i> Courses
                </a>
                <a href="{{ route('paymentmanage') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-royal-600 text-white font-semibold text-sm shadow-lg shadow-blue-500/20">
                    <i data-lucide="credit-card" class="w-4 h-4"></i> Payment Management
                </a>
            </nav>

            <div class="mt-20 pt-10 border-t border-slate-800">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-red-400 hover:bg-red-500/10 transition font-bold text-sm">
                        <i data-lucide="log-out" class="w-4 h-4"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <main class="lg:ml-64 p-4 lg:p-8">
        
        <header class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10">
            <div>
                <h1 class="text-2xl font-bold text-white">Payment Requests</h1>
                <p class="text-slate-500 text-sm mt-1">Verify student payment slips and approve enrollments.</p>
            </div>
            <div class="flex items-center gap-3">
                <div class="flex flex-col items-end">
                    <span class="text-xs font-bold text-slate-500 uppercase">Verification Queue</span>
                    <span class="text-sm font-black text-royal-600">{{ $checkouts->where('status', 'pending')->count() }} Pending</span>
                </div>
            </div>
        </header>

        <div class="bg-slate-900 border border-slate-800 rounded-[2rem] overflow-hidden shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm border-collapse">
                    <thead>
                        <tr class="bg-slate-800/50 text-slate-400 text-[10px] font-bold uppercase tracking-widest">
                            <th class="px-6 py-5">Student & Class</th>
                            <th class="px-6 py-5">Remarks</th>
                            <th class="px-6 py-5">Slip Attachment</th>
                            <th class="px-6 py-5">Submission Date</th>
                            <th class="px-6 py-5 text-center">Status</th>
                            <th class="px-6 py-5 text-right">Verification Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800">
                        @foreach($checkouts as $checkout)
                        <tr class="hover:bg-slate-800/30 transition-colors group">
                            <td class="px-6 py-5">
                                <p class="font-bold text-white text-sm leading-none">{{ $checkout->student_name }}</p>
                                <p class="text-[11px] text-royal-600 font-bold mt-2 uppercase tracking-tight">{{ $checkout->class_name }}</p>
                            </td>
                            <td class="px-6 py-5">
                                <p class="text-slate-400 text-xs max-w-[150px] truncate italic" title="{{ $checkout->remark }}">
                                    {{ $checkout->remark ?: 'No remark' }}
                                </p>
                            </td>
                            <td class="px-6 py-5">
                                @if($checkout->file_path)
                                    <a href="{{ route('storage.file', ['encoded' => base64_encode($checkout->file_path)]) }}" 
                                       target="_blank" class="inline-flex items-center gap-2 px-3 py-2 bg-slate-800 hover:bg-royal-600 text-slate-300 hover:text-white rounded-xl transition text-xs font-bold">
                                        <i data-lucide="eye" class="w-4 h-4"></i> View Slip
                                    </a>
                                @else
                                    <span class="text-slate-600 text-xs italic">No file attached</span>
                                @endif
                            </td>
                            <td class="px-6 py-5 text-slate-500 text-xs font-medium">
                                {{ $checkout->created_at->format('M d, Y') }}
                            </td>
                            <td class="px-6 py-5 text-center">
                                @php $status = $checkout->status ?? 'pending'; @endphp
                                @if($status === 'approved')
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-emerald-500/10 text-emerald-500 rounded-full text-[10px] font-black uppercase">
                                        <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></span> Approved
                                    </span>
                                @elseif($status === 'rejected')
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-red-500/10 text-red-500 rounded-full text-[10px] font-black uppercase">
                                        <span class="w-1.5 h-1.5 bg-red-500 rounded-full"></span> Rejected
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-amber-500/10 text-amber-500 rounded-full text-[10px] font-black uppercase">
                                        <span class="w-1.5 h-1.5 bg-amber-500 rounded-full animate-pulse"></span> Pending
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-5">
                                <div class="flex justify-end gap-2">
                                    <form action="{{ route('payment.approve', $checkout->id) }}" method="POST" onsubmit="return confirm('Confirm payment and unlock classes?');">
                                        @csrf @method('PUT')
                                        <button type="submit" class="p-2.5 bg-emerald-600/10 hover:bg-emerald-600 text-emerald-500 hover:text-white rounded-xl transition-all" title="Approve">
                                            <i data-lucide="check-check" class="w-4 h-4"></i>
                                        </button>
                                    </form>

                                    <form action="{{ route('payment.reject', $checkout->id) }}" method="POST" onsubmit="return confirm('Reject this payment request?');">
                                        @csrf @method('PUT')
                                        <button type="submit" class="p-2.5 bg-red-600/10 hover:bg-red-600 text-red-500 hover:text-white rounded-xl transition-all" title="Reject">
                                            <i data-lucide="x" class="w-4 h-4"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>