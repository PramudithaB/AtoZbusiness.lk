@extends('admin.layout')

@section('title', 'Create New Course')
@section('header_title', 'Create Course')
@section('header_subtitle', 'Publish a new academic class module to the student LMS portal.')

@section('content')

    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-3xl border border-slate-200/90 shadow-sm p-6 sm:p-10">
            
            <div class="flex items-center gap-3 pb-6 border-b border-slate-100 mb-8">
                <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-700 flex items-center justify-center">
                    <i data-lucide="book-plus" class="w-5 h-5"></i>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-navy-950">Course Specification</h2>
                    <p class="text-xs text-slate-400">Provide details for the class title, schedule, session count, and monthly assignment.</p>
                </div>
            </div>

            <form action="{{ route('classstore') }}" method="POST" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                            Course / Class Title <span class="text-rose-500">*</span>
                        </label>
                        <input type="text" 
                               name="className" 
                               required
                               placeholder="e.g. 2026 A/L Business Studies: Marketing Management Masterclass"
                               class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:border-blue-700 focus:bg-white focus:ring-2 focus:ring-blue-700/10 transition">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                            Course Description <span class="text-slate-400">(Optional)</span>
                        </label>
                        <textarea name="description" 
                                  rows="3"
                                  placeholder="Provide an overview of syllabus topics covered in this course..."
                                  class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:border-blue-700 focus:bg-white focus:ring-2 focus:ring-blue-700/10 transition resize-none"></textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                            Instructor / Teacher Name
                        </label>
                        <input type="text" 
                               name="teacherName" 
                               value="Lasindu Senarath"
                               class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:border-blue-700 focus:bg-white focus:ring-2 focus:ring-blue-700/10 transition">
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                            Class Schedule / Time
                        </label>
                        <input type="text" 
                               name="classTime" 
                               placeholder="e.g. Saturdays 8:00 AM - 12:00 PM"
                               class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:border-blue-700 focus:bg-white focus:ring-2 focus:ring-blue-700/10 transition">
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                            Total Planned Sessions
                        </label>
                        <input type="number" 
                               name="sessionCount" 
                               min="1" 
                               placeholder="e.g. 8"
                               class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:border-blue-700 focus:bg-white focus:ring-2 focus:ring-blue-700/10 transition">
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                            Assigned Month
                        </label>
                        <select name="month" 
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:border-blue-700 focus:bg-white focus:ring-2 focus:ring-blue-700/10 transition cursor-pointer">
                            <option value="">Select Month</option>
                            <option>January</option>
                            <option>February</option>
                            <option>March</option>
                            <option>April</option>
                            <option>May</option>
                            <option>June</option>
                            <option>July</option>
                            <option>August</option>
                            <option>September</option>
                            <option>October</option>
                            <option>November</option>
                            <option>December</option>
                        </select>
                    </div>

                </div>

                <div class="pt-6 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <a href="{{ route('admindashboard') }}" 
                       class="text-xs font-bold text-slate-500 hover:text-navy-950 transition flex items-center gap-1">
                        <i data-lucide="arrow-left" class="w-3.5 h-3.5"></i> Back to Dashboard
                    </a>

                    <button type="submit" 
                            class="w-full sm:w-auto px-8 py-3.5 bg-navy-900 hover:bg-navy-800 text-white font-bold rounded-xl text-sm transition shadow-md shadow-navy-950/15 flex items-center justify-center gap-2">
                        <i data-lucide="plus-circle" class="w-4 h-4"></i>
                        Publish New Course
                    </button>
                </div>
            </form>

        </div>
    </div>

@endsection