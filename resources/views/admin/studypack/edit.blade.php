@extends('admin.layout')

@section('title', 'Edit Study Pack')
@section('header_title', 'Edit Study Pack Details')
@section('header_subtitle', 'Update study pack title, enrollment fee, target grade, or visibility.')

@section('content')

    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm p-6 sm:p-8 space-y-6">
            
            <div class="flex items-center justify-between pb-5 border-b border-slate-100">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-700 flex items-center justify-center">
                        <i data-lucide="edit-3" class="w-5 h-5"></i>
                    </div>
                    <div>
                        <h3 class="text-base font-bold text-navy-950">{{ $studyPack->title }}</h3>
                        <p class="text-xs text-slate-400">Editing study pack settings</p>
                    </div>
                </div>

                <a href="{{ route('admin.studypack.curriculum', $studyPack->id) }}" 
                   class="px-3.5 py-2 bg-indigo-50 hover:bg-indigo-100 text-indigo-700 font-bold rounded-xl text-xs transition flex items-center gap-1.5">
                    <i data-lucide="video" class="w-4 h-4"></i> Edit Video Links
                </a>
            </div>

            <form action="{{ route('admin.studypack.update', $studyPack->id) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                <!-- Title -->
                <div>
                    <label for="title" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Study Pack Title <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" 
                           id="title" 
                           name="title" 
                           value="{{ old('title', $studyPack->title) }}" 
                           required 
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
                           value="{{ old('subtitle', $studyPack->subtitle) }}" 
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
                            <option value="12 & 13 ශ්‍රේණි" {{ old('grade', $studyPack->grade) == '12 & 13 ශ්‍රේණි' ? 'selected' : '' }}>12 &amp; 13 ශ්‍රේණි (Full Syllabus)</option>
                            <option value="12 ශ්‍රේණිය" {{ old('grade', $studyPack->grade) == '12 ශ්‍රේණිය' ? 'selected' : '' }}>12 ශ්‍රේණිය පමණක්</option>
                            <option value="13 ශ්‍රේණිය" {{ old('grade', $studyPack->grade) == '13 ශ්‍රේණිය' ? 'selected' : '' }}>13 ශ්‍රේණිය පමණක්</option>
                            <option value="Revision & Paper" {{ old('grade', $studyPack->grade) == 'Revision & Paper' ? 'selected' : '' }}>Revision &amp; Model Papers</option>
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
                                   value="{{ old('price', $studyPack->price) }}" 
                                   required 
                                   min="0"
                                   step="50"
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
                              class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:border-indigo-600 focus:bg-white transition">{{ old('description', $studyPack->description) }}</textarea>
                </div>

                <!-- Published Toggle -->
                <div class="pt-2">
                    <label class="flex items-center gap-3 cursor-pointer select-none">
                        <input type="checkbox" 
                               name="is_published" 
                               value="1" 
                               {{ old('is_published', $studyPack->is_published) ? 'checked' : '' }}
                               class="w-4 h-4 rounded text-indigo-600 focus:ring-indigo-500 border-slate-300">
                        <div>
                            <span class="text-xs font-bold text-navy-950 block">Published in Student Portal</span>
                            <span class="text-[11px] text-slate-400">When checked, this study pack is visible on the dashboard and catalog.</span>
                        </div>
                    </label>
                </div>

                <!-- Submit Button -->
                <div class="pt-4 flex items-center justify-end gap-3 border-t border-slate-100">
                    <a href="{{ route('admin.studypack.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-200 text-slate-600 text-xs font-bold hover:bg-slate-50 transition">
                        Cancel
                    </a>
                    <button type="submit" class="px-6 py-2.5 bg-navy-900 hover:bg-navy-800 text-white rounded-xl text-xs font-bold transition shadow-md shadow-navy-950/20 active:scale-[0.98]">
                        Update Study Pack
                    </button>
                </div>

            </form>

        </div>
    </div>

@endsection
