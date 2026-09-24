@extends('admin.layout')

@section('title', 'Add New Lesson')
@section('header_title', 'Create Lesson')
@section('header_subtitle', 'Upload video lecture link, study tutorial PDF, and assignment instructions.')

@section('content')

    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-3xl border border-slate-200/90 shadow-sm p-6 sm:p-10">
            
            <div class="flex items-center gap-3 pb-6 border-b border-slate-100 mb-8">
                <div class="w-10 h-10 rounded-xl bg-indigo-50 text-indigo-700 flex items-center justify-center">
                    <i data-lucide="video" class="w-5 h-5"></i>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-navy-950">Lesson Parameters</h2>
                    <p class="text-xs text-slate-400">Select target course, specify video link, and attach learning resources.</p>
                </div>
            </div>

            <form action="{{ route('lesson.lessonstore') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                            Select Parent Course <span class="text-rose-500">*</span>
                        </label>
                        <select name="class_id" required 
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:border-blue-700 focus:bg-white focus:ring-2 focus:ring-blue-700/10 transition cursor-pointer">
                            <option value="" disabled selected>Choose a Course</option>
                            @foreach($classes as $c)
                                <option value="{{ $c->id }}">{{ $c->className }} @if($c->month) ({{ $c->month }}) @endif</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                            Access Level <span class="text-rose-500">*</span>
                        </label>
                        <select name="is_paid" required 
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:border-blue-700 focus:bg-white focus:ring-2 focus:ring-blue-700/10 transition cursor-pointer">
                            <option value="0">Free Public Access</option>
                            <option value="1" selected>Paid (Requires Approved Slip Enrollment)</option>
                        </select>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                            Lesson Name / Title <span class="text-rose-500">*</span>
                        </label>
                        <input type="text" 
                               name="name" 
                               required
                               placeholder="e.g. Unit 04: Consumer Behavior & Market Segmentation Part 1"
                               class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:border-blue-700 focus:bg-white focus:ring-2 focus:ring-blue-700/10 transition">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                            Video Lecture Stream Link (YouTube, Vimeo, Google Drive)
                        </label>
                        <div class="relative">
                            <i data-lucide="link" class="w-4 h-4 text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2"></i>
                            <input type="text" 
                                   name="link" 
                                   placeholder="https://www.youtube.com/watch?v=..."
                                   class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:border-blue-700 focus:bg-white focus:ring-2 focus:ring-blue-700/10 transition">
                        </div>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                            Lesson Description
                        </label>
                        <textarea name="description" 
                                  rows="3"
                                  placeholder="Overview of lecture topics and guidance for students..."
                                  class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:border-blue-700 focus:bg-white focus:ring-2 focus:ring-blue-700/10 transition resize-none"></textarea>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                            Tutorial Material Attachment (PDF, JPG, PNG - Max 4MB)
                        </label>
                        <input type="file" 
                               name="file" 
                               accept=".pdf,.jpg,.jpeg,.png"
                               class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-600 text-sm focus:outline-none focus:border-blue-700 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                            Teacher's Special Notice / Instruction
                        </label>
                        <textarea name="notice" 
                                  rows="2"
                                  placeholder="Optional special instructions (e.g. Please complete Tute Exercise 03 before watching)..."
                                  class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:border-blue-700 focus:bg-white focus:ring-2 focus:ring-blue-700/10 transition resize-none"></textarea>
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
                        Publish Lesson
                    </button>
                </div>
            </form>

        </div>
    </div>

@endsection