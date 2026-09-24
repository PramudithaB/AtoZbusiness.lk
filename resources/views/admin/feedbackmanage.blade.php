@extends('admin.layout')

@section('title', 'Feedback Moderation')
@section('header_title', 'Student Testimonials & Feedback')
@section('header_subtitle', 'Review, moderate, and approve student reviews to feature on public teacher pages.')

@section('content')

    <section class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
        <div class="p-5 border-b border-slate-100 flex items-center justify-between">
            <div class="flex items-center gap-2.5">
                <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-700 flex items-center justify-center">
                    <i data-lucide="message-square" class="w-4 h-4"></i>
                </div>
                <div>
                    <h2 class="text-base font-bold text-navy-950">Submitted Reviews</h2>
                    <p class="text-xs text-slate-400">Total: {{ count($feedbacks) }} feedback submission{{ count($feedbacks) === 1 ? '' : 's' }}</p>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs border-collapse">
                <thead>
                    <tr class="bg-slate-50/75 text-slate-500 uppercase tracking-wider text-[10px] font-bold border-b border-slate-100">
                        <th class="px-5 py-4">Sender Details</th>
                        <th class="px-5 py-4">Student Message</th>
                        <th class="px-5 py-4 text-center">Status</th>
                        <th class="px-5 py-4 text-right">Moderation Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($feedbacks as $fb)
                    <tr class="hover:bg-slate-50/70 transition">
                        <td class="px-5 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-xl bg-navy-50 text-navy-900 flex items-center justify-center font-bold text-xs flex-shrink-0">
                                    {{ strtoupper(substr($fb->name, 0, 1)) }}
                                </div>
                                <div>
                                    <span class="font-bold text-navy-950 text-sm block">{{ $fb->name }}</span>
                                    <span class="text-slate-500 text-xs block">{{ $fb->email }}</span>
                                    <span class="text-[11px] text-blue-700 font-semibold block mt-0.5">{{ $fb->phone_number }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-5 py-4 text-slate-600 max-w-md">
                            <p class="leading-relaxed text-xs italic bg-slate-50 p-3 rounded-xl border border-slate-100">
                                "{{ $fb->message }}"
                            </p>
                        </td>
                        <td class="px-5 py-4 text-center">
                            @if($fb->status === 'approved')
                                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-[10px] font-extrabold uppercase bg-emerald-50 text-emerald-700 border border-emerald-200">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Approved
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-[10px] font-extrabold uppercase bg-amber-50 text-amber-700 border border-amber-200">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> Pending Review
                                </span>
                            @endif
                        </td>
                        <td class="px-5 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                @if($fb->status !== 'approved')
                                <form action="{{ route('feedbackapprove', $fb->id) }}" method="POST">
                                    @csrf 
                                    @method('PUT')
                                    <button type="submit" 
                                            class="p-2 rounded-lg bg-emerald-50 hover:bg-emerald-600 text-emerald-700 hover:text-white transition shadow-sm" 
                                            title="Approve Review">
                                        <i data-lucide="check" class="w-4 h-4"></i>
                                    </button>
                                </form>
                                @endif

                                <form action="{{ route('feedbackdelete', $fb->id) }}" method="POST" onsubmit="return confirm('Permanently delete feedback from {{ $fb->name }}?');">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="p-2 rounded-lg bg-rose-50 hover:bg-rose-600 text-rose-700 hover:text-white transition shadow-sm" 
                                            title="Delete Review">
                                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-5 py-8 text-center text-slate-400 italic">No student feedback entries found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

@endsection