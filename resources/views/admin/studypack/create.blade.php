@extends('admin.layout')

@section('title', 'Create Study Pack')
@section('header_title', 'Create New Study Pack')
@section('header_subtitle', 'Add a new subject study pack with automatic enrollment package creation.')

@section('content')

    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm p-6 sm:p-8 space-y-6">
            
            <div class="flex items-center gap-3 pb-5 border-b border-slate-100">
                <div class="w-10 h-10 rounded-xl bg-indigo-50 text-indigo-700 flex items-center justify-center">
                    <i data-lucide="plus-circle" class="w-5 h-5"></i>
                </div>
                <div>
                    <h3 class="text-base font-bold text-navy-950">Study Pack Information</h3>
                    <p class="text-xs text-slate-400">Fill in the basic course details to initialize the study pack.</p>
                </div>
            </div>

            <form action="{{ route('admin.studypack.store') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Title -->
                <div>
                    <label for="title" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Study Pack Title <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" 
                           id="title" 
                           name="title" 
                           value="{{ old('title') }}" 
                           required 
                           placeholder="e.g. ආර්ථික විද්‍යාව — සම්පූර්ණ වීඩියෝ පාඩම් මාලාව"
                           class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:border-indigo-600 focus:bg-white transition @error('title') border-rose-500 @enderror">
                    @error('title')
                        <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Subtitle -->
                <div>
                    <label for="subtitle" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Subtitle / Tagline <span class="text-slate-400">(Optional)</span>
                    </label>
                    <input type="text" 
                           id="subtitle" 
                           name="subtitle" 
                           value="{{ old('subtitle', 'NIE විෂය නිර්දේශය — 12 & 13 ශ්‍රේණි') }}" 
                           placeholder="e.g. NIE විෂය නිර්දේශය — 12 & 13 ශ්‍රේණි"
                           class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:border-indigo-600 focus:bg-white transition">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Target Grade -->
                    <div>
                        <label for="grade" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                            Target Grade <span class="text-rose-500">*</span>
                        </label>
                        <select id="grade" 
                                name="grade" 
                                required 
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:border-indigo-600 focus:bg-white transition">
                            <option value="12 & 13 ශ්‍රේණි" {{ old('grade') == '12 & 13 ශ්‍රේණි' ? 'selected' : '' }}>12 &amp; 13 ශ්‍රේණි (Full Syllabus)</option>
                            <option value="12 ශ්‍රේණිය" {{ old('grade') == '12 ශ්‍රේණිය' ? 'selected' : '' }}>12 ශ්‍රේණිය පමණක්</option>
                            <option value="13 ශ්‍රේණිය" {{ old('grade') == '13 ශ්‍රේණිය' ? 'selected' : '' }}>13 ශ්‍රේණිය පමණක්</option>
                            <option value="Revision & Paper" {{ old('grade') == 'Revision & Paper' ? 'selected' : '' }}>Revision &amp; Model Papers</option>
                        </select>
                    </div>

                    <!-- Price -->
                    <div>
                        <label for="price" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                            Enrollment Fee (Rs.) <span class="text-rose-500">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-xs font-bold text-slate-400">Rs.</span>
                            <input type="number" 
                                   id="price" 
                                   name="price" 
                                   value="{{ old('price', 2500) }}" 
                                   required 
                                   min="0"
                                   step="50"
                                   placeholder="2500"
                                   class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:border-indigo-600 focus:bg-white transition @error('price') border-rose-500 @enderror">
                        </div>
                        @error('price')
                            <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Description <span class="text-slate-400">(Optional)</span>
                    </label>
                    <textarea id="description" 
                              name="description" 
                              rows="3" 
                              placeholder="Brief overview of what the student will learn in this video study pack..."
                              class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:border-indigo-600 focus:bg-white transition">{{ old('description') }}</textarea>
                </div>

                <!-- Starter Template Option -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Starter Topics Template
                    </label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <label class="p-3.5 rounded-xl border border-slate-200 bg-slate-50 cursor-pointer flex items-start gap-3 hover:bg-slate-100 transition">
                            <input type="radio" name="starter_template" value="empty" checked class="mt-1 text-indigo-600 focus:ring-indigo-500">
                            <div>
                                <span class="block text-xs font-bold text-navy-950">Blank Starter</span>
                                <span class="text-[11px] text-slate-500">Start with 1 blank topic to build your own syllabus.</span>
                            </div>
                        </label>

                        <label class="p-3.5 rounded-xl border border-slate-200 bg-slate-50 cursor-pointer flex items-start gap-3 hover:bg-slate-100 transition">
                            <input type="radio" name="starter_template" value="business_studies" class="mt-1 text-indigo-600 focus:ring-indigo-500">
                            <div>
                                <span class="block text-xs font-bold text-navy-950">Duplicate 18 Topics Structure</span>
                                <span class="text-[11px] text-slate-500">Pre-fill with the full 18-unit competency skeleton.</span>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="pt-4 flex items-center justify-end gap-3 border-t border-slate-100">
                    <a href="{{ route('admin.studypack.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-200 text-slate-600 text-xs font-bold hover:bg-slate-50 transition">
                        Cancel
                    </a>
                    <button type="submit" class="px-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl text-xs font-bold transition shadow-md shadow-indigo-600/20 active:scale-[0.98] flex items-center gap-2">
                        <span>Save &amp; Continue to Videos</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </button>
                </div>

            </form>

        </div>
    </div>

@endsection
