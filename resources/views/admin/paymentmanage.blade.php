@extends('admin.layout')

@section('title', 'Payment Verification')
@section('header_title', 'Payment Verification & Slips')
@section('header_subtitle', 'Review uploaded bank deposit slips, verify course purchases, and unlock student access.')

@section('content')

    <!-- Status Metric Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
        <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-1">Pending Verification</p>
                <h3 class="text-3xl font-extrabold text-amber-600">{{ $checkouts->where('status', 'pending')->count() }}</h3>
                <p class="text-[11px] text-amber-700 font-semibold mt-1">Requires approval</p>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center">
                <i data-lucide="clock" class="w-6 h-6"></i>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-1">Approved Payments</p>
                <h3 class="text-3xl font-extrabold text-emerald-600">{{ $checkouts->where('status', 'approved')->count() }}</h3>
                <p class="text-[11px] text-emerald-700 font-semibold mt-1">Active enrollments</p>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                <i data-lucide="check-circle-2" class="w-6 h-6"></i>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-1">Total Requests</p>
                <h3 class="text-3xl font-extrabold text-navy-950">{{ $checkouts->count() }}</h3>
                <p class="text-[11px] text-slate-400 font-semibold mt-1">Lifetime checkouts</p>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-slate-100 text-slate-700 flex items-center justify-center">
                <i data-lucide="file-text" class="w-6 h-6"></i>
            </div>
        </div>
    </div>

    <!-- Payment Requests Table -->
    <section class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
        <div class="p-5 border-b border-slate-100 flex items-center justify-between">
            <div class="flex items-center gap-2.5">
                <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-700 flex items-center justify-center">
                    <i data-lucide="receipt" class="w-4 h-4"></i>
                </div>
                <div>
                    <h2 class="text-base font-bold text-navy-950">Student Deposit Slips</h2>
                    <p class="text-xs text-slate-400">Click view slip to inspect bank slip proof before approving access.</p>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs border-collapse">
                <thead>
                    <tr class="bg-slate-50/75 text-slate-500 uppercase tracking-wider text-[10px] font-bold border-b border-slate-100">
                        <th class="px-5 py-4">Student & Enrolling Class</th>
                        <th class="px-5 py-4">Remarks</th>
                        <th class="px-5 py-4">Bank Slip</th>
                        <th class="px-5 py-4">Date</th>
                        <th class="px-5 py-4 text-center">Status</th>
                        <th class="px-5 py-4 text-right">Verification Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($checkouts as $checkout)
                    <tr class="hover:bg-slate-50/70 transition">
                        <td class="px-5 py-4">
                            <span class="font-bold text-navy-950 text-sm block">{{ $checkout->student_name }}</span>
                            <span class="text-xs font-semibold text-blue-700 block mt-0.5">{{ $checkout->class_name }}</span>
                        </td>
                        <td class="px-5 py-4 text-slate-500 max-w-xs truncate" title="{{ $checkout->remark }}">
                            {{ $checkout->remark ?: '-' }}
                        </td>
                        <td class="px-5 py-4">
                            @if($checkout->file_path)
                                <a href="{{ route('storage.file', ['encoded' => base64_encode($checkout->file_path)]) }}" 
                                   target="_blank" 
                                   class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-blue-50 hover:bg-blue-100 text-blue-700 font-bold text-xs transition">
                                    <i data-lucide="eye" class="w-3.5 h-3.5"></i> View Slip
                                </a>
                            @else
                                <span class="text-slate-400 italic">No slip attached</span>
                            @endif
                        </td>
                        <td class="px-5 py-4 text-slate-500 font-medium">
                            {{ optional($checkout->created_at)->format('M d, Y • h:i A') ?: '-' }}
                        </td>
                        <td class="px-5 py-4 text-center">
                            @php $status = $checkout->status ?? 'pending'; @endphp
                            @if($status === 'approved')
                                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-[10px] font-extrabold uppercase bg-emerald-50 text-emerald-700 border border-emerald-200">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Approved
                                </span>
                            @elseif($status === 'rejected')
                                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-[10px] font-extrabold uppercase bg-rose-50 text-rose-700 border border-rose-200">
                                    <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span> Rejected
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-[10px] font-extrabold uppercase bg-amber-50 text-amber-700 border border-amber-200 animate-pulse">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> Pending
                                </span>
                            @endif
                        </td>
                        <td class="px-5 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <form action="{{ route('payment.approve', $checkout->id) }}" method="POST" onsubmit="return confirm('Confirm and approve enrollment for {{ $checkout->student_name }}?');">
                                    @csrf 
                                    @method('PUT')
                                    <button type="submit" 
                                            class="p-2 rounded-lg bg-emerald-50 hover:bg-emerald-600 text-emerald-700 hover:text-white transition shadow-sm" 
                                            title="Approve Payment">
                                        <i data-lucide="check" class="w-4 h-4"></i>
                                    </button>
                                </form>

                                <form action="{{ route('payment.reject', $checkout->id) }}" method="POST" onsubmit="return confirm('Reject this payment request?');">
                                    @csrf 
                                    @method('PUT')
                                    <button type="submit" 
                                            class="p-2 rounded-lg bg-rose-50 hover:bg-rose-600 text-rose-700 hover:text-white transition shadow-sm" 
                                            title="Reject Payment">
                                        <i data-lucide="x" class="w-4 h-4"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-5 py-8 text-center text-slate-400 italic">No payment checkout requests recorded yet.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

@endsection