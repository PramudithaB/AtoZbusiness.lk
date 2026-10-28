@extends('admin.layout')

@section('title', 'Manage Study Packs')
@section('header_title', 'Study Packs Management')
@section('header_subtitle', 'Create and manage competency-based video study packs, syllabus modules, and course fees.')

@section('content')

    <!-- Top Action Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-indigo-50 text-indigo-700 flex items-center justify-center shadow-sm">
                <i data-lucide="layers" class="w-5 h-5"></i>
            </div>
            <div>
                <h3 class="text-lg font-bold text-navy-950">Available Study Packs</h3>
                <p class="text-xs text-slate-500">Total of {{ $studyPacks->count() }} study pack{{ $studyPacks->count() === 1 ? '' : 's' }} published.</p>
            </div>
        </div>

        <a href="{{ route('admin.studypack.create') }}" 
           class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl text-xs font-bold transition flex items-center justify-center gap-2 shadow-md shadow-indigo-600/20 active:scale-[0.98]">
            <i data-lucide="plus-circle" class="w-4 h-4"></i> Create New Study Pack
        </a>
    </div>

    <!-- Study Packs Table -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs border-collapse">
                <thead>
                    <tr class="bg-slate-50/75 text-slate-500 uppercase tracking-wider text-[10px] font-bold border-b border-slate-100">
                        <th class="px-6 py-4">Study Pack Title</th>
                        <th class="px-6 py-4">Target Grade</th>
                        <th class="px-6 py-4">Curriculum Content</th>
                        <th class="px-6 py-4">Fee (Rs.)</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($studyPacks as $pack)
                    <tr class="hover:bg-slate-50/60 transition">
                        <td class="px-6 py-4">
                            <div class="font-bold text-navy-950 text-sm">{{ $pack->title }}</div>
                            <div class="text-[11px] text-slate-400 mt-0.5 line-clamp-1">{{ $pack->subtitle ?: 'Video lecture series' }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2.5 py-1 rounded-md bg-slate-100 text-slate-700 font-semibold text-[11px]">
                                {{ $pack->grade }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <span class="px-2 py-0.5 rounded bg-blue-50 text-blue-700 font-bold text-[11px]">
                                    {{ $pack->topics_count }} Topics
                                </span>
                                <span class="px-2 py-0.5 rounded bg-emerald-50 text-emerald-700 font-bold text-[11px]">
                                    {{ $pack->subtopics_count }} Video Lessons
                                </span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="font-extrabold text-navy-950 text-sm">Rs. {{ number_format($pack->price) }}</span>
                        </td>
                        <td class="px-6 py-4">
                            @if($pack->is_published)
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Active
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-slate-100 text-slate-600 border border-slate-200">
                                    <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Draft
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.studypack.curriculum', $pack->id) }}" 
                                   class="px-3 py-1.5 bg-blue-50 hover:bg-blue-100 text-blue-700 font-bold rounded-lg text-xs transition flex items-center gap-1.5"
                                   title="Manage Topics & YouTube Videos">
                                    <i data-lucide="video" class="w-3.5 h-3.5"></i> Manage Videos
                                </a>

                                <a href="{{ route('admin.studypack.edit', $pack->id) }}" 
                                   class="p-1.5 hover:bg-slate-100 text-slate-600 rounded-lg transition"
                                   title="Edit Details">
                                    <i data-lucide="edit-3" class="w-4 h-4"></i>
                                </a>

                                <a href="{{ route('studypack.show', $pack->id) }}" 
                                   target="_blank"
                                   class="p-1.5 hover:bg-slate-100 text-slate-600 rounded-lg transition"
                                   title="Preview in Portal">
                                    <i data-lucide="external-link" class="w-4 h-4"></i>
                                </a>

                                <form action="{{ route('admin.studypack.delete', $pack->id) }}" 
                                      method="POST" 
                                      class="inline" 
                                      onsubmit="return confirm('Permanently delete study pack \'{{ addslashes($pack->title) }}\'?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-1.5 hover:bg-rose-50 text-rose-600 rounded-lg transition" title="Delete">
                                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-slate-400 italic">
                            <i data-lucide="layers" class="w-10 h-10 mx-auto mb-2 text-slate-300"></i>
                            No study packs created yet. Click "Create New Study Pack" to get started.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
