@extends('admin.layout')

@section('title', 'Edit Study Pack — ' . $studyPack->title)
@section('header_title', 'Edit Study Pack Details')
@section('header_subtitle', 'Update study pack title, enrollment fee, target grade, or visibility.')

@section('content')

    <div class="max-w-3xl mx-auto space-y-6">
        
        <!-- Breadcrumb & Top Tabs -->
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.studypack.index') }}" 
               class="p-2 rounded-xl bg-white border border-slate-200 text-slate-500 hover:text-navy-900 hover:bg-slate-50 transition shadow-sm"
               title="Back to Study Packs List">
                <i data-lucide="arrow-left" class="w-4 h-4"></i>
            </a>
            <div>
                <h3 class="text-lg font-extrabold text-navy-950">Editing: {{ $studyPack->title }}</h3>
                <p class="text-xs text-slate-500">Target: {{ $studyPack->grade }} • Fee: Rs. {{ number_format($studyPack->price) }}</p>
            </div>
        </div>

        <!-- Navigation Tabs between Details and Videos -->
        <div class="flex items-center gap-2 border-b border-slate-200 pb-2">
            <span class="px-4 py-2.5 rounded-xl text-xs font-bold bg-navy-950 text-white flex items-center gap-2 shadow-sm">
                <i data-lucide="settings" class="w-4 h-4"></i> 1. Basic Details &amp; Pricing
            </span>

            <a href="{{ route('admin.studypack.curriculum', $studyPack->id) }}" 
               class="px-4 py-2.5 rounded-xl text-xs font-bold bg-white hover:bg-slate-100 text-slate-700 border border-slate-200 flex items-center gap-2 transition">
                <i data-lucide="video" class="w-4 h-4 text-indigo-600"></i> 2. Topics &amp; Video Lessons ({{ $studyPack->subtopics_count }})
            </a>

            <a href="{{ route('studypack.show', $studyPack->id) }}" 
               target="_blank" 
               class="px-4 py-2.5 rounded-xl text-xs font-bold bg-white hover:bg-slate-100 text-slate-700 border border-slate-200 flex items-center gap-2 transition ml-auto">
                <i data-lucide="external-link" class="w-4 h-4 text-slate-400"></i> View as Student
            </a>
        </div>

        <!-- Edit Form Card -->
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm p-6 sm:p-8 space-y-6">
            
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
                           placeholder="e.g. A/L Business Studies Full Syllabus Video Pack"
                           class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:border-navy-950 focus:bg-white transition @error('title') border-rose-500 @enderror">
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
                           placeholder="e.g. NIE විෂය නිර්දේශයට අනුව සකසන ලද සම්පූර්ණ න්‍යායාත්මක වීඩියෝ පාඩම් එකතුව"
                           class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:border-navy-950 focus:bg-white transition">
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
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:border-navy-950 focus:bg-white transition">
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
                                   class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:border-navy-950 focus:bg-white transition @error('price') border-rose-500 @enderror">
                        </div>
                        @error('price')
                            <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Description <span class="text-slate-400">(Sinhala or English)</span>
                    </label>
                    <textarea id="description" 
                              name="description" 
                              rows="3" 
                              placeholder="Add detailed description of the study pack curriculum..."
                              class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:border-navy-950 focus:bg-white transition">{{ old('description', $studyPack->description) }}</textarea>
                </div>

                <!-- Published Toggle -->
                <div class="p-4 bg-slate-50 border border-slate-200/90 rounded-xl">
                    <label class="flex items-center gap-3 cursor-pointer select-none">
                        <input type="checkbox" 
                               name="is_published" 
                               value="1" 
                               {{ old('is_published', $studyPack->is_published) ? 'checked' : '' }}
                               class="w-4 h-4 rounded text-navy-900 focus:ring-navy-900 border-slate-300">
                        <div>
                            <span class="text-xs font-bold text-navy-950 block">Published in Student Portal</span>
                            <span class="text-[11px] text-slate-500">When enabled, students can see and purchase this study pack on the dashboard and catalog.</span>
                        </div>
                    </label>
                </div>

                <!-- Callout Box for Curriculum / Video Links -->
                <div class="p-4 bg-blue-50/70 border border-blue-200/80 rounded-xl flex items-center justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center flex-shrink-0">
                            <i data-lucide="video" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <h4 class="text-xs font-bold text-navy-950">Curriculum & Video Lessons</h4>
                            <p class="text-[11px] text-slate-600">
                                Currently contains <strong class="text-navy-900">{{ $studyPack->topics_count }} Topics</strong> and <strong class="text-navy-900">{{ $studyPack->subtopics_count }} Video Lessons</strong>.
                            </p>
                        </div>
                    </div>
                    <a href="{{ route('admin.studypack.curriculum', $studyPack->id) }}" 
                       class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-xl text-xs font-bold transition flex items-center gap-1.5 shadow-sm flex-shrink-0">
                        <span>Manage Videos</span>
                        <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                    </a>
                </div>

                <!-- Submit Buttons -->
                <div class="pt-4 flex flex-col sm:flex-row items-center justify-end gap-3 border-t border-slate-100">
                    <a href="{{ route('admin.studypack.index') }}" 
                       class="w-full sm:w-auto px-5 py-2.5 rounded-xl border border-slate-200 text-slate-600 text-xs font-bold hover:bg-slate-50 transition text-center">
                        Cancel
                    </a>
                    
                    <button type="submit" 
                            name="action" 
                            value="save"
                            class="w-full sm:w-auto px-6 py-2.5 bg-navy-900 hover:bg-navy-800 text-white rounded-xl text-xs font-bold transition shadow-sm active:scale-[0.98]">
                        Update Study Pack
                    </button>

                    <button type="submit" 
                            name="action" 
                            value="save_and_curriculum"
                            class="w-full sm:w-auto px-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl text-xs font-bold transition shadow-sm active:scale-[0.98] flex items-center justify-center gap-1.5">
                        <span>Save &amp; Manage Video Links</span>
                        <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                    </button>
                </div>

            </form>

        </div>

    </div>

@endsection
