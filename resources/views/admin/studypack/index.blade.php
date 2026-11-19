@extends('admin.layout')

@section('title', 'All Created Study Packs')
@section('header_title', 'Study Packs Management')
@section('header_subtitle', 'View all created study packs, update pricing and details, edit curriculum topics, and manage YouTube lecture links.')

@section('content')

    <!-- Breadcrumb & Top Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div class="flex items-center gap-3">
            <a href="{{ route('admindashboard') }}" 
               class="p-2 rounded-xl bg-white border border-slate-200 text-slate-500 hover:text-navy-900 hover:bg-slate-50 transition shadow-sm"
               title="Back to Admin Dashboard">
                <i data-lucide="arrow-left" class="w-4 h-4"></i>
            </a>
            <div>
                <h3 class="text-lg font-extrabold text-navy-950 flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-amber-500"></span>
                    All Created Study Packs (වීඩියෝ පාඩම් මාලා)
                </h3>
                <p class="text-xs text-slate-500">Comprehensive list of all published and draft video study packs.</p>
            </div>
        </div>

        <div class="flex items-center gap-2.5">
            <a href="{{ route('admin.studypack.create') }}" 
               class="px-5 py-2.5 bg-navy-900 hover:bg-navy-800 text-white rounded-xl text-xs font-bold transition flex items-center justify-center gap-2 shadow-sm active:scale-[0.98]">
                <i data-lucide="plus-circle" class="w-4 h-4"></i> Create New Study Pack
            </a>
        </div>
    </div>

    <!-- SUMMARY METRICS CARDS -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-1">Total Packs</p>
                <h3 class="text-2xl font-extrabold text-navy-950">{{ $studyPacks->count() }}</h3>
                <p class="text-[11px] text-amber-600 font-semibold mt-0.5">Created packs</p>
            </div>
            <div class="w-11 h-11 rounded-xl bg-amber-50 text-amber-700 flex items-center justify-center">
                <i data-lucide="layers" class="w-5 h-5"></i>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-1">Active in Portal</p>
                <h3 class="text-2xl font-extrabold text-emerald-600">{{ $studyPacks->where('is_published', true)->count() }}</h3>
                <p class="text-[11px] text-emerald-700 font-semibold mt-0.5">Student accessible</p>
            </div>
            <div class="w-11 h-11 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                <i data-lucide="check-circle" class="w-5 h-5"></i>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-1">Total Topics</p>
                <h3 class="text-2xl font-extrabold text-navy-950">{{ $studyPacks->sum(fn($p) => $p->topics_count) }}</h3>
                <p class="text-[11px] text-blue-600 font-semibold mt-0.5">Syllabus units</p>
            </div>
            <div class="w-11 h-11 rounded-xl bg-blue-50 text-blue-700 flex items-center justify-center">
                <i data-lucide="book-open" class="w-5 h-5"></i>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-[11px] font-bold uppercase tracking-wider text-slate-400 mb-1">Total Video Lessons</p>
                <h3 class="text-2xl font-extrabold text-indigo-700">{{ $studyPacks->sum(fn($p) => $p->subtopics_count) }}</h3>
                <p class="text-[11px] text-indigo-600 font-semibold mt-0.5">Recorded lessons</p>
            </div>
            <div class="w-11 h-11 rounded-xl bg-indigo-50 text-indigo-700 flex items-center justify-center">
                <i data-lucide="video" class="w-5 h-5"></i>
            </div>
        </div>
    </div>

    <!-- Search & Filter Controls -->
    <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm flex flex-col sm:flex-row items-center justify-between gap-3">
        <div class="relative flex-1 w-full sm:max-w-md">
            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                <i data-lucide="search" class="w-4 h-4"></i>
            </span>
            <input type="text" 
                   id="searchStudyPacks" 
                   onkeyup="filterStudyPacks()"
                   placeholder="Search by title, syllabus, or grade..." 
                   class="w-full pl-10 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-800 placeholder-slate-400 focus:outline-none focus:bg-white focus:border-navy-900 transition">
        </div>

        <div class="flex items-center gap-2 w-full sm:w-auto">
            <select id="gradeFilter" onchange="filterStudyPacks()" class="w-full sm:w-auto px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-700 font-semibold focus:outline-none focus:border-navy-900 transition">
                <option value="">All Target Grades</option>
                <option value="12">Grade 12</option>
                <option value="13">Grade 13</option>
            </select>
        </div>
    </div>

    <!-- Study Packs Table -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs border-collapse" id="studyPacksTable">
                <thead>
                    <tr class="bg-slate-50/75 text-slate-500 uppercase tracking-wider text-[10px] font-bold border-b border-slate-100">
                        <th class="px-6 py-4">Study Pack Title</th>
                        <th class="px-6 py-4">Target Grade</th>
                        <th class="px-6 py-4">Curriculum Content</th>
                        <th class="px-6 py-4">Fee (Rs.)</th>
                        <th class="px-6 py-4">Portal Status</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($studyPacks as $pack)
                    <tr class="hover:bg-slate-50/70 transition pack-row" 
                        data-title="{{ strtolower($pack->title . ' ' . $pack->subtitle) }}" 
                        data-grade="{{ strtolower($pack->grade) }}">
                        
                        <td class="px-6 py-4">
                            <div class="font-extrabold text-navy-950 text-sm flex items-center gap-2">
                                <span>{{ $pack->title }}</span>
                            </div>
                            <div class="text-[11px] text-slate-400 mt-0.5 line-clamp-1">
                                {{ $pack->subtitle ?: ($pack->description ?: 'Comprehensive video lecture series') }}
                            </div>
                            <div class="text-[10px] text-slate-400 font-mono mt-0.5">
                                slug: /studypack/{{ $pack->slug }}
                            </div>
                        </td>

                        <td class="px-6 py-4">
                            <span class="px-2.5 py-1 rounded-lg bg-slate-100 text-slate-700 font-bold text-[11px]">
                                {{ $pack->grade }}
                            </span>
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <span class="px-2.5 py-1 rounded-lg bg-blue-50 text-blue-700 font-bold text-xs">
                                    {{ $pack->topics_count }} Topics
                                </span>
                                <span class="px-2.5 py-1 rounded-lg bg-emerald-50 text-emerald-700 font-bold text-xs">
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
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Active in Portal
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-slate-100 text-slate-600 border border-slate-200">
                                    <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Draft (Hidden)
                                </span>
                            @endif
                        </td>

                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <!-- Edit Details -->
                                <a href="{{ route('admin.studypack.edit', $pack->id) }}" 
                                   class="px-3 py-1.5 bg-amber-50 hover:bg-amber-100 text-amber-800 font-bold rounded-lg text-xs transition flex items-center gap-1.5 border border-amber-200 shadow-sm"
                                   title="Edit Title, Price & Details">
                                    <i data-lucide="edit-3" class="w-3.5 h-3.5"></i>
                                    <span>Edit</span>
                                </a>

                                <!-- Manage Videos -->
                                <a href="{{ route('admin.studypack.curriculum', $pack->id) }}" 
                                   class="px-3 py-1.5 bg-blue-50 hover:bg-blue-100 text-blue-700 font-bold rounded-lg text-xs transition flex items-center gap-1.5 border border-blue-200 shadow-sm"
                                   title="Manage Topics & YouTube Videos">
                                    <i data-lucide="video" class="w-3.5 h-3.5"></i>
                                    <span>Videos</span>
                                </a>

                                <!-- Student Preview -->
                                <a href="{{ route('studypack.show', $pack->id) }}" 
                                   target="_blank"
                                   class="p-1.5 hover:bg-slate-100 text-slate-600 hover:text-navy-950 rounded-lg transition"
                                   title="Preview in Student Portal">
                                    <i data-lucide="external-link" class="w-4 h-4"></i>
                                </a>

                                <!-- Delete -->
                                <form action="{{ route('admin.studypack.delete', $pack->id) }}" 
                                      method="POST" 
                                      class="inline" 
                                      onsubmit="return confirm('Permanently delete study pack \'{{ addslashes($pack->title) }}\' and all its associated topics/videos?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="p-1.5 hover:bg-rose-50 text-rose-600 rounded-lg transition" 
                                            title="Delete Study Pack">
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
                            No study packs created yet. Click "Create New Study Pack" above to get started.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Quick Search Script -->
    <script>
        function filterStudyPacks() {
            const query = document.getElementById('searchStudyPacks').value.toLowerCase().trim();
            const gradeFilter = document.getElementById('gradeFilter').value.toLowerCase().trim();
            const rows = document.querySelectorAll('.pack-row');

            rows.forEach(row => {
                const title = row.getAttribute('data-title') || '';
                const grade = row.getAttribute('data-grade') || '';

                const matchesQuery = !query || title.includes(query) || grade.includes(query);
                const matchesGrade = !gradeFilter || grade.includes(gradeFilter);

                if (matchesQuery && matchesGrade) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }
    </script>

@endsection
