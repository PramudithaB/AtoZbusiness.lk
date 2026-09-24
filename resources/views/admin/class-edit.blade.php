@extends('admin.layout')

@section('title', 'Edit Course - ' . $class->className)
@section('header_title', 'Edit Course')
@section('header_subtitle', 'Update course title, scheduling, teacher assignment, and sessions.')

@section('content')

    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-3xl border border-slate-200/90 shadow-sm p-6 sm:p-10">
            
            <div class="flex items-center gap-3 pb-6 border-b border-slate-100 mb-8">
                <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-700 flex items-center justify-center">
                    <i data-lucide="edit-3" class="w-5 h-5"></i>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-navy-950">Update Course Details</h2>
                    <p class="text-xs text-slate-400">Editing: {{ $class->className }}</p>
                </div>
            </div>

            <form action="{{ route('class.update', $class->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                            Class Name / Title <span class="text-rose-500">*</span>
                        </label>
                        <input type="text" 
                               name="className" 
                               value="{{ old('className', $class->className) }}" 
                               required
                               class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:border-blue-700 focus:bg-white focus:ring-2 focus:ring-blue-700/10 transition">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                            Description
                        </label>
                        <textarea name="description" 
                                  rows="3"
                                  class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:border-blue-700 focus:bg-white focus:ring-2 focus:ring-blue-700/10 transition resize-none">{{ old('description', $class->description) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                            Teacher Name
                        </label>
                        <input type="text" 
                               name="teacherName" 
                               value="{{ old('teacherName', $class->teacherName) }}"
                               class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:border-blue-700 focus:bg-white focus:ring-2 focus:ring-blue-700/10 transition">
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                            Class Schedule / Time
                        </label>
                        <input type="text" 
                               name="classTime" 
                               value="{{ old('classTime', $class->classTime) }}"
                               placeholder="e.g. Saturdays 8:00 AM"
                               class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:border-blue-700 focus:bg-white focus:ring-2 focus:ring-blue-700/10 transition">
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                            Session Count
                        </label>
                        <input type="number" 
                               name="sessionCount" 
                               value="{{ old('sessionCount', $class->sessionCount) }}" 
                               min="1"
                               class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:border-blue-700 focus:bg-white focus:ring-2 focus:ring-blue-700/10 transition">
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                            Assigned Month
                        </label>
                        <input type="text" 
                               name="month" 
                               value="{{ old('month', $class->month) }}"
                               placeholder="e.g. January 2026"
                               class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:border-blue-700 focus:bg-white focus:ring-2 focus:ring-blue-700/10 transition">
                    </div>

                </div>

                <div class="pt-6 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <a href="{{ route('admindashboard') }}" 
                       class="text-xs font-bold text-slate-500 hover:text-navy-950 transition flex items-center gap-1">
                        <i data-lucide="arrow-left" class="w-3.5 h-3.5"></i> Back to Dashboard
                    </a>

                    <button type="submit" 
                            class="w-full sm:w-auto px-8 py-3.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl text-sm transition shadow-md shadow-blue-600/20 flex items-center justify-center gap-2">
                        <i data-lucide="save" class="w-4 h-4"></i>
                        Update Course
                    </button>
                </div>
            </form>

        </div>
    </div>

@endsection
