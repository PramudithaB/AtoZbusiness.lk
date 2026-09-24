@extends('admin.layout')

@section('title', 'User Management')
@section('header_title', 'Registered Students & Users')
@section('header_subtitle', 'Review enrolled student profiles, WhatsApp contacts, examination batches, and registration history.')

@section('content')

    @php
        $grouped = collect($users)->groupBy(function($u){
            $y = $u->exam_year ?? 'Unspecified';
            return $y === '' ? 'Unspecified' : $y;
        })->sortKeysDesc();
    @endphp

    <!-- Stats summary -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
        <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-1">Total Users</p>
                <h3 class="text-3xl font-extrabold text-navy-950">{{ count($users) }}</h3>
                <p class="text-[11px] text-blue-600 font-semibold mt-1">Platform accounts</p>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-blue-50 text-blue-700 flex items-center justify-center">
                <i data-lucide="users" class="w-6 h-6"></i>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-1">Exam Batches</p>
                <h3 class="text-3xl font-extrabold text-navy-950">{{ $grouped->count() }}</h3>
                <p class="text-[11px] text-emerald-600 font-semibold mt-1">Year groupings</p>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-700 flex items-center justify-center">
                <i data-lucide="calendar" class="w-6 h-6"></i>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-1">New Registration</p>
                <a href="{{ route('register') }}" target="_blank" class="text-sm font-bold text-blue-600 hover:underline block mt-2">
                    Open Register Form →
                </a>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-sky-50 text-sky-700 flex items-center justify-center">
                <i data-lucide="user-plus" class="w-6 h-6"></i>
            </div>
        </div>
    </div>

    @if($grouped->isEmpty())
        <div class="bg-white p-12 text-center rounded-2xl border border-dashed border-slate-300">
            <i data-lucide="users" class="w-12 h-12 text-slate-300 mx-auto mb-3"></i>
            <p class="text-slate-500 font-medium text-sm">No registered users found in database.</p>
        </div>
    @else
        <div class="space-y-6">
            @foreach($grouped as $year => $usersInYear)
            <section class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-navy-50 text-navy-900 flex items-center justify-center font-bold text-xs">
                            {{ $year !== 'Unspecified' ? substr($year, -2) : '?' }}
                        </div>
                        <div>
                            <h3 class="text-base font-extrabold text-navy-950">
                                Exam Batch: {{ $year }}
                            </h3>
                            <p class="text-xs text-slate-400">{{ $usersInYear->count() }} Registered Student{{ $usersInYear->count() === 1 ? '' : 's' }}</p>
                        </div>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs border-collapse">
                        <thead>
                            <tr class="bg-slate-50/75 text-slate-500 uppercase tracking-wider text-[10px] font-bold border-b border-slate-100">
                                <th class="px-5 py-3.5 w-12">#</th>
                                <th class="px-5 py-3.5">Student Name</th>
                                <th class="px-5 py-3.5">Email</th>
                                <th class="px-5 py-3.5">WhatsApp</th>
                                <th class="px-5 py-3.5">ID / NIC</th>
                                <th class="px-5 py-3.5">Address</th>
                                <th class="px-5 py-3.5">Registered</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @foreach($usersInYear as $u)
                            <tr class="hover:bg-slate-50/70 transition">
                                <td class="px-5 py-3.5 text-slate-400 font-semibold">{{ $u->id }}</td>
                                <td class="px-5 py-3.5 font-bold text-navy-950 text-sm">
                                    {{ $u->name }}
                                </td>
                                <td class="px-5 py-3.5 text-slate-600 font-medium">{{ $u->email }}</td>
                                <td class="px-5 py-3.5">
                                    @if($u->whatsapp_number)
                                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $u->whatsapp_number) }}" 
                                           target="_blank" 
                                           class="text-emerald-700 font-bold hover:underline inline-flex items-center gap-1">
                                            <i data-lucide="message-circle" class="w-3.5 h-3.5 text-emerald-500"></i>
                                            {{ $u->whatsapp_number }}
                                        </a>
                                    @else
                                        <span class="text-slate-400">-</span>
                                    @endif
                                </td>
                                <td class="px-5 py-3.5 text-slate-600 font-medium">{{ $u->id_number ?: '-' }}</td>
                                <td class="px-5 py-3.5 text-slate-500 max-w-xs truncate" title="{{ $u->address }}">
                                    {{ $u->address ?: '-' }}
                                </td>
                                <td class="px-5 py-3.5 text-slate-400 font-medium">
                                    {{ optional($u->created_at)->format('Y-m-d') ?: '-' }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
            @endforeach
        </div>
    @endif

@endsection
