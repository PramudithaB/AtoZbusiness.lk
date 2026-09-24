@extends('admin.layout')

@section('title', 'Edit Lesson - ' . $lesson->name)
@section('header_title', 'Edit Lesson')
@section('header_subtitle', 'Update lecture details, replace study tutorial file, or change video streaming URL.')

@section('content')

    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-3xl border border-slate-200/90 shadow-sm p-6 sm:p-10">
            
            <div class="flex items-center gap-3 pb-6 border-b border-slate-100 mb-8">
                <div class="w-10 h-10 rounded-xl bg-indigo-50 text-indigo-700 flex items-center justify-center">
                    <i data-lucide="edit" class="w-5 h-5"></i>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-navy-950">Update Lesson</h2>
                    <p class="text-xs text-slate-400">Editing: {{ $lesson->name }}</p>
                </div>
            </div>

            <form action="{{ route('lesson.update', $lesson->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                            Select Parent Course <span class="text-rose-500">*</span>
                        </label>
                        <select name="class_id" required 
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:border-blue-700 focus:bg-white focus:ring-2 focus:ring-blue-700/10 transition cursor-pointer">
                            <option value="">Choose a Course</option>
                            @foreach($classes as $c)
                                <option value="{{ $c->id }}" {{ old('class_id', $lesson->class_id) == $c->id ? 'selected' : '' }}>
                                    {{ $c->className }} @if($c->month) ({{ $c->month }}) @endif
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                            Access Level <span class="text-rose-500">*</span>
                        </label>
                        <div class="flex items-center gap-6 py-3">
                            <label class="flex items-center gap-2 cursor-pointer text-xs font-bold text-slate-700">
                                <input type="radio" name="is_paid" value="0" {{ old('is_paid', $lesson->is_paid) == 0 ? 'checked' : '' }} required
                                       class="text-blue-700 focus:ring-blue-700">
                                Free Access
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer text-xs font-bold text-slate-700">
                                <input type="radio" name="is_paid" value="1" {{ old('is_paid', $lesson->is_paid) == 1 ? 'checked' : '' }} required
                                       class="text-blue-700 focus:ring-blue-700">
                                Paid (Requires Enrollment)
                            </label>
                        </div>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                            Lesson Name / Title <span class="text-rose-500">*</span>
                        </label>
                        <input type="text" 
                               name="name" 
                               value="{{ old('name', $lesson->name) }}" 
                               required
                               class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:border-blue-700 focus:bg-white focus:ring-2 focus:ring-blue-700/10 transition">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                            Video Stream Link
                        </label>
                        <div class="relative">
                            <i data-lucide="link" class="w-4 h-4 text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2"></i>
                            <input type="text" 
                                   name="link" 
                                   value="{{ old('link', $lesson->link) }}"
                                   placeholder="https://www.youtube.com/..."
                                   class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:border-blue-700 focus:bg-white focus:ring-2 focus:ring-blue-700/10 transition">
                        </div>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                            Description
                        </label>
                        <textarea name="description" 
                                  rows="3"
                                  class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:border-blue-700 focus:bg-white focus:ring-2 focus:ring-blue-700/10 transition resize-none">{{ old('description', $lesson->description) }}</textarea>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                            Study File (PDF, JPG, PNG - Max 4MB)
                        </label>
                        <input type="file" 
                               name="file" 
                               accept=".pdf,.jpg,.jpeg,.png"
                               class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-600 text-sm focus:outline-none focus:border-blue-700 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer">
                        @if($lesson->file_path)
                            <div class="mt-2.5 flex items-center gap-2 p-3 bg-slate-100 rounded-xl text-xs text-slate-700">
                                <i data-lucide="file-text" class="w-4 h-4 text-blue-700"></i>
                                <span>Current Attached File:</span>
                                <a href="{{ route('storage.file', ['encoded' => base64_encode($lesson->file_path)]) }}" 
                                   target="_blank" 
                                   class="font-bold text-blue-700 hover:underline">
                                    View Attached File
                                </a>
                                <span class="text-slate-400">(Upload a new file above to replace it)</span>
                            </div>
                        @endif
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
                            Notice / Special Instructions
                        </label>
                        <textarea name="notice" 
                                  rows="2"
                                  class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:border-blue-700 focus:bg-white focus:ring-2 focus:ring-blue-700/10 transition resize-none">{{ old('notice', $lesson->notice) }}</textarea>
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
                        Update Lesson
                    </button>
                </div>
            </form>

        </div>
    </div>

@endsection
