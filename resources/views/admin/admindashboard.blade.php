@extends('admin.layout')

@section('title', 'Admin Dashboard Overview')
@section('header_title', 'Management Dashboard')
@section('header_subtitle', 'Monitor courses, registered students, subscription packages, and study materials.')

@section('content')

    <!-- SUMMARY CARDS -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
        
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-1">Active Courses</p>
                <h3 class="text-2xl font-extrabold text-navy-950">{{ $classes->count() }}</h3>
                <p class="text-[11px] text-blue-600 font-semibold mt-1">Available in portal</p>
            </div>
            <div class="w-11 h-11 rounded-2xl bg-blue-50 text-blue-700 flex items-center justify-center">
                <i data-lucide="book-open" class="w-5 h-5"></i>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-1">Course Packages</p>
                <h3 class="text-2xl font-extrabold text-navy-950">{{ $packages->count() }}</h3>
                <p class="text-[11px] text-indigo-600 font-semibold mt-1">Monthly subscriptions</p>
            </div>
            <div class="w-11 h-11 rounded-2xl bg-indigo-50 text-indigo-700 flex items-center justify-center">
                <i data-lucide="package" class="w-5 h-5"></i>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-1">Study Packs</p>
                <h3 class="text-2xl font-extrabold text-navy-950">{{ $studyPacks->count() }}</h3>
                <a href="{{ route('admin.studypack.index') }}" class="text-[11px] text-amber-600 font-bold hover:underline mt-1 inline-flex items-center gap-0.5">
                    View Packs &rarr;
                </a>
            </div>
            <div class="w-11 h-11 rounded-2xl bg-amber-50 text-amber-700 flex items-center justify-center">
                <i data-lucide="layers" class="w-5 h-5"></i>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-1">Total Lessons</p>
                <h3 class="text-2xl font-extrabold text-navy-950">
                    {{ $classes->sum(function($c) { return $c->lessons ? $c->lessons->count() : 0; }) }}
                </h3>
                <p class="text-[11px] text-emerald-600 font-semibold mt-1">Video lectures</p>
            </div>
            <div class="w-11 h-11 rounded-2xl bg-emerald-50 text-emerald-700 flex items-center justify-center">
                <i data-lucide="video" class="w-5 h-5"></i>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-1">Registered Users</p>
                <h3 class="text-2xl font-extrabold text-navy-950">{{ $users->count() }}</h3>
                <p class="text-[11px] text-slate-500 font-semibold mt-1">Student accounts</p>
            </div>
            <div class="w-11 h-11 rounded-2xl bg-slate-100 text-slate-700 flex items-center justify-center">
                <i data-lucide="users" class="w-5 h-5"></i>
            </div>
        </div>

    </div>

    <!-- QUICK ACTIONS -->
    <div class="flex flex-wrap items-center gap-3">
        <a href="{{ route('admin.studypack.index') }}" class="px-4 py-2.5 bg-amber-600 hover:bg-amber-700 text-white rounded-xl text-xs font-bold transition flex items-center gap-2 shadow-sm">
            <i data-lucide="layers" class="w-4 h-4"></i> View Study Packs ({{ $studyPacks->count() }})
        </a>
        <a href="{{ route('admin.studypack.create') }}" class="px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl text-xs font-bold transition flex items-center gap-2 shadow-sm">
            <i data-lucide="plus-circle" class="w-4 h-4"></i> New Study Pack
        </a>
        <a href="{{ route('classmanage') }}" class="px-4 py-2.5 bg-navy-900 hover:bg-navy-800 text-white rounded-xl text-xs font-bold transition flex items-center gap-2 shadow-sm">
            <i data-lucide="folder-plus" class="w-4 h-4"></i> New Course
        </a>
        <a href="{{ route('lesson.lessoncreate') }}" class="px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-xl text-xs font-bold transition flex items-center gap-2 shadow-sm">
            <i data-lucide="video" class="w-4 h-4"></i> Add Lesson
        </a>
        <a href="{{ route('package.create') }}" class="px-4 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-xs font-bold transition flex items-center gap-2 shadow-sm">
            <i data-lucide="package" class="w-4 h-4"></i> Create Package
        </a>
        <a href="{{ route('paymentmanage') }}" class="px-4 py-2.5 bg-white hover:bg-slate-50 border border-slate-200 text-slate-700 rounded-xl text-xs font-bold transition flex items-center gap-2 shadow-sm">
            <i data-lucide="credit-card" class="w-4 h-4 text-blue-600"></i> View Payment Slips
        </a>
    </div>

    <!-- SECTION 1: ACTIVE COURSES TABLE -->
    <section class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
        <div class="p-5 border-b border-slate-100 flex items-center justify-between">
            <div class="flex items-center gap-2.5">
                <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-700 flex items-center justify-center">
                    <i data-lucide="folder" class="w-4 h-4"></i>
                </div>
                <div>
                    <h2 class="text-base font-bold text-navy-950">Active Courses</h2>
                    <p class="text-xs text-slate-400">Published subjects and classroom batches.</p>
                </div>
            </div>
            <a href="{{ route('classmanage') }}" class="text-xs font-bold text-blue-600 hover:underline flex items-center gap-1">
                Add Course <i data-lucide="plus" class="w-3.5 h-3.5"></i>
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs border-collapse">
                <thead>
                    <tr class="bg-slate-50/75 text-slate-500 uppercase tracking-wider text-[10px] font-bold border-b border-slate-100">
                        <th class="px-6 py-4">Class Title</th>
                        <th class="px-6 py-4">Instructor</th>
                        <th class="px-6 py-4">Sessions</th>
                        <th class="px-6 py-4">Month</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($classes as $c)
                    <tr class="hover:bg-slate-50/70 transition">
                        <td class="px-6 py-4">
                            <span class="font-bold text-navy-950 text-sm block">{{ $c->className }}</span>
                            <span class="text-[11px] text-slate-400 line-clamp-1">{{ $c->description ?: 'No description' }}</span>
                        </td>
                        <td class="px-6 py-4 text-slate-600 font-medium">
                            {{ $c->teacherName ?: 'Lasindu Senarath' }}
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2.5 py-1 bg-blue-50 text-blue-700 rounded-lg text-xs font-bold">
                                {{ $c->sessionCount ?: 0 }} Sessions
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2.5 py-1 bg-slate-100 text-slate-700 rounded-lg text-xs font-semibold">
                                {{ $c->month ?: 'General' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-1.5">
                                <a href="{{ route('class.edit', $c->id) }}" 
                                   class="p-2 rounded-lg text-slate-500 hover:text-blue-600 hover:bg-blue-50 transition" 
                                   title="Edit Class">
                                    <i data-lucide="edit-3" class="w-4 h-4"></i>
                                </a>
                                <form action="{{ route('class.delete', $c->id) }}" method="POST" class="inline" onsubmit="return confirm('Permanently delete course \'{{ $c->className }}\'?');">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="p-2 rounded-lg text-slate-500 hover:text-rose-600 hover:bg-rose-50 transition" 
                                            title="Delete Class">
                                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-slate-400 italic">No courses found. Click "Add Course" above.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    <!-- SECTION 2: CREATED STUDY PACKS (වීඩියෝ පාඩම් මාලා) -->
    <section class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
        <div class="p-5 border-b border-slate-100 flex items-center justify-between flex-wrap gap-3">
            <div class="flex items-center gap-2.5">
                <div class="w-8 h-8 rounded-lg bg-amber-50 text-amber-700 flex items-center justify-center">
                    <i data-lucide="layers" class="w-4 h-4"></i>
                </div>
                <div>
                    <h2 class="text-base font-bold text-navy-950">Created Study Packs (වීඩියෝ පාඩම් මාලා)</h2>
                    <p class="text-xs text-slate-400">Competency-based video modules, pricing, and curriculum syllabus.</p>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <a href="{{ route('admin.studypack.create') }}" class="px-3.5 py-1.5 bg-amber-50 hover:bg-amber-100 text-amber-800 font-bold rounded-xl text-xs transition flex items-center gap-1.5 border border-amber-200">
                    <i data-lucide="plus" class="w-3.5 h-3.5"></i> New Study Pack
                </a>
                <a href="{{ route('admin.studypack.index') }}" class="px-3.5 py-1.5 bg-navy-900 hover:bg-navy-800 text-white font-bold rounded-xl text-xs transition flex items-center gap-1.5 shadow-sm">
                    View All Study Packs Page <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                </a>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs border-collapse">
                <thead>
                    <tr class="bg-slate-50/75 text-slate-500 uppercase tracking-wider text-[10px] font-bold border-b border-slate-100">
                        <th class="px-6 py-4">Study Pack Title</th>
                        <th class="px-6 py-4">Grade</th>
                        <th class="px-6 py-4">Curriculum Overview</th>
                        <th class="px-6 py-4">Fee (Rs.)</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($studyPacks as $pack)
                    <tr class="hover:bg-slate-50/70 transition">
                        <td class="px-6 py-4">
                            <span class="font-bold text-navy-950 text-sm block">{{ $pack->title }}</span>
                            <span class="text-[11px] text-slate-400 line-clamp-1">{{ $pack->subtitle ?: 'Video lecture series' }}</span>
                        </td>
                        <td class="px-6 py-4 text-slate-600 font-medium">
                            <span class="px-2.5 py-1 bg-slate-100 text-slate-700 rounded-lg text-xs font-semibold">
                                {{ $pack->grade }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <span class="px-2.5 py-1 bg-blue-50 text-blue-700 rounded-lg text-xs font-bold">
                                    {{ $pack->topics_count }} Topics
                                </span>
                                <span class="px-2.5 py-1 bg-emerald-50 text-emerald-700 rounded-lg text-xs font-bold">
                                    {{ $pack->subtopics_count }} Lessons
                                </span>
                            </div>
                        </td>
                        <td class="px-6 py-4 font-extrabold text-navy-950 text-sm">
                            Rs. {{ number_format($pack->price) }}
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
                            <div class="flex items-center justify-end gap-1.5">
                                <a href="{{ route('admin.studypack.curriculum', $pack->id) }}" 
                                   class="px-2.5 py-1.5 rounded-lg bg-blue-50 text-blue-700 hover:bg-blue-100 font-bold text-xs transition flex items-center gap-1" 
                                   title="Manage Topics & YouTube Videos">
                                    <i data-lucide="video" class="w-3.5 h-3.5"></i>
                                    <span>Videos</span>
                                </a>
                                <a href="{{ route('admin.studypack.edit', $pack->id) }}" 
                                   class="px-2.5 py-1.5 rounded-lg bg-amber-50 text-amber-800 hover:bg-amber-100 font-bold text-xs transition flex items-center gap-1 border border-amber-200" 
                                   title="Edit Study Pack Details">
                                    <i data-lucide="edit-3" class="w-3.5 h-3.5"></i>
                                    <span>Edit</span>
                                </a>
                                <a href="{{ route('studypack.show', $pack->id) }}" 
                                   target="_blank"
                                   class="p-2 rounded-lg text-slate-500 hover:text-navy-900 hover:bg-slate-100 transition" 
                                   title="Preview in Student Portal">
                                    <i data-lucide="external-link" class="w-4 h-4"></i>
                                </a>
                                <form action="{{ route('admin.studypack.delete', $pack->id) }}" method="POST" class="inline" onsubmit="return confirm('Permanently delete study pack \'{{ addslashes($pack->title) }}\'?');">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="p-2 rounded-lg text-slate-500 hover:text-rose-600 hover:bg-rose-50 transition" 
                                            title="Delete Study Pack">
                                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-8 text-center text-slate-400 italic">No study packs created yet. Click "New Study Pack" above to create one.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    <!-- SECTION 3: SUBSCRIPTION PACKAGES -->
    <section class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
        <div class="p-5 border-b border-slate-100 flex items-center justify-between">
            <div class="flex items-center gap-2.5">
                <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-700 flex items-center justify-center">
                    <i data-lucide="package" class="w-4 h-4"></i>
                </div>
                <div>
                    <h2 class="text-base font-bold text-navy-950">Subscription Packages</h2>
                    <p class="text-xs text-slate-400">Monthly pricing packages tied to course enrollments.</p>
                </div>
            </div>
            <a href="{{ route('package.create') }}" class="text-xs font-bold text-emerald-600 hover:underline flex items-center gap-1">
                New Package <i data-lucide="plus" class="w-3.5 h-3.5"></i>
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs border-collapse">
                <thead>
                    <tr class="bg-slate-50/75 text-slate-500 uppercase tracking-wider text-[10px] font-bold border-b border-slate-100">
                        <th class="px-6 py-4">Package Name</th>
                        <th class="px-6 py-4">Monthly Fee</th>
                        <th class="px-6 py-4">Linked Course</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($packages as $pkg)
                    <tr class="hover:bg-slate-50/70 transition">
                        <td class="px-6 py-4 font-bold text-navy-950 text-sm">
                            {{ $pkg->package_name }}
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 bg-emerald-50 text-emerald-700 font-extrabold rounded-lg text-xs">
                                LKR {{ number_format($pkg->monthly_fee) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-slate-600 font-medium">
                            {{ $pkg->classModel->className ?? 'Direct Package' }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-1.5">
                                <a href="{{ route('package.edit', $pkg->id) }}" 
                                   class="p-2 rounded-lg text-slate-500 hover:text-emerald-600 hover:bg-emerald-50 transition" 
                                   title="Edit Package">
                                    <i data-lucide="edit-3" class="w-4 h-4"></i>
                                </a>
                                <form action="{{ route('package.delete', $pkg->id) }}" method="POST" class="inline" onsubmit="return confirm('Permanently delete package \'{{ $pkg->package_name }}\'?');">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="p-2 rounded-lg text-slate-500 hover:text-rose-600 hover:bg-rose-50 transition" 
                                            title="Delete Package">
                                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-8 text-center text-slate-400 italic">No packages created yet.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    <!-- SECTION 4: LESSONS BY COURSE -->
    @foreach($classes as $class)
    <section class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
        <div class="p-5 border-b border-slate-100 flex items-center justify-between">
            <div class="flex items-center gap-2.5">
                <div class="w-8 h-8 rounded-lg bg-indigo-50 text-indigo-700 flex items-center justify-center">
                    <i data-lucide="play-circle" class="w-4 h-4"></i>
                </div>
                <div>
                    <h2 class="text-base font-bold text-navy-950">{{ $class->className }}</h2>
                    <p class="text-xs text-slate-400">Class Video Lectures & Tutes ({{ $class->lessons ? $class->lessons->count() : 0 }} total)</p>
                </div>
            </div>
            <a href="{{ route('lesson.lessoncreate') }}" class="text-xs font-bold text-indigo-600 hover:underline flex items-center gap-1">
                Add Lesson <i data-lucide="plus" class="w-3.5 h-3.5"></i>
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs border-collapse">
                <thead>
                    <tr class="bg-slate-50/75 text-slate-500 uppercase tracking-wider text-[10px] font-bold border-b border-slate-100">
                        <th class="px-6 py-4">Lesson Name</th>
                        <th class="px-6 py-4">Access Level</th>
                        <th class="px-6 py-4">Study Resource</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($class->lessons as $lesson)
                    <tr class="hover:bg-slate-50/70 transition">
                        <td class="px-6 py-4 font-bold text-navy-950 text-sm">
                            {{ $lesson->name }}
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider {{ $lesson->is_paid ? 'bg-amber-50 text-amber-700 border border-amber-200' : 'bg-emerald-50 text-emerald-700 border border-emerald-200' }}">
                                {{ $lesson->is_paid ? 'Paid Lesson' : 'Free Access' }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            @if($lesson->file_path)
                                <a href="{{ route('storage.file', ['encoded' => base64_encode($lesson->file_path)]) }}" 
                                   target="_blank" 
                                   class="inline-flex items-center gap-1.5 px-3 py-1 bg-slate-100 hover:bg-blue-50 text-slate-700 hover:text-blue-700 rounded-lg text-xs font-semibold transition">
                                    <i data-lucide="file-text" class="w-3.5 h-3.5"></i>
                                    Download Attachment
                                </a>
                            @else
                                <span class="text-slate-400 italic">No attachment</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-1.5">
                                <a href="{{ route('lesson.edit', $lesson->id) }}" 
                                   class="p-2 rounded-lg text-slate-500 hover:text-blue-600 hover:bg-blue-50 transition" 
                                   title="Edit Lesson">
                                    <i data-lucide="edit-3" class="w-4 h-4"></i>
                                </a>
                                <form action="{{ route('lesson.delete', $lesson->id) }}" method="POST" class="inline" onsubmit="return confirm('Delete lesson \'{{ $lesson->name }}\'?');">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="p-2 rounded-lg text-slate-500 hover:text-rose-600 hover:bg-rose-50 transition" 
                                            title="Delete Lesson">
                                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-6 text-center text-slate-400 italic">No lessons added to this course yet.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
    @endforeach

@endsection
