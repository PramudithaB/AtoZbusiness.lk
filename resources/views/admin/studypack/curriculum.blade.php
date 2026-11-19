@extends('admin.layout')

@section('title', 'Manage Videos — ' . $studyPack->title)
@section('header_title', 'Curriculum & Video Links')
@section('header_subtitle', 'Manage topics, subtopics, and YouTube lecture links for ' . $studyPack->title)

@section('content')

    <div class="space-y-6">

        <!-- Breadcrumb & Top Tabs -->
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.studypack.index') }}" 
               class="p-2 rounded-xl bg-white border border-slate-200 text-slate-500 hover:text-navy-900 hover:bg-slate-50 transition shadow-sm"
               title="Back to Study Packs List">
                <i data-lucide="arrow-left" class="w-4 h-4"></i>
            </a>
            <div>
                <h3 class="text-lg font-extrabold text-navy-950">Curriculum & Video Lessons: {{ $studyPack->title }}</h3>
                <p class="text-xs text-slate-500">Target: {{ $studyPack->grade }} • Fee: Rs. {{ number_format($studyPack->price) }}</p>
            </div>
        </div>

        <!-- Navigation Tabs between Details and Videos -->
        <div class="flex items-center gap-2 border-b border-slate-200 pb-2">
            <a href="{{ route('admin.studypack.edit', $studyPack->id) }}" 
               class="px-4 py-2.5 rounded-xl text-xs font-bold bg-white hover:bg-slate-100 text-slate-700 border border-slate-200 flex items-center gap-2 transition">
                <i data-lucide="settings" class="w-4 h-4 text-slate-400"></i> 1. Basic Details &amp; Pricing
            </a>

            <span class="px-4 py-2.5 rounded-xl text-xs font-bold bg-navy-950 text-white flex items-center gap-2 shadow-sm">
                <i data-lucide="video" class="w-4 h-4 text-indigo-400"></i> 2. Topics &amp; Video Lessons
            </span>

            <a href="{{ route('studypack.show', $studyPack->id) }}" 
               target="_blank" 
               class="px-4 py-2.5 rounded-xl text-xs font-bold bg-white hover:bg-slate-100 text-slate-700 border border-slate-200 flex items-center gap-2 transition ml-auto">
                <i data-lucide="external-link" class="w-4 h-4 text-slate-400"></i> View as Student
            </a>
        </div>

        <!-- Top Header & Summary Bar -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div>
                <div class="flex items-center gap-2 mb-1">
                    <span class="px-2.5 py-0.5 rounded-md bg-indigo-50 text-indigo-700 font-bold text-[10px] uppercase tracking-wider">
                        {{ $studyPack->grade }}
                    </span>
                    <span class="text-xs font-bold text-slate-400">• Fee: Rs. {{ number_format($studyPack->price) }}</span>
                </div>
                <h2 class="text-xl font-extrabold text-navy-950">{{ $studyPack->title }}</h2>
                <p class="text-xs text-slate-500 mt-0.5">Edit syllabus units or paste YouTube video links for each subtopic.</p>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('studypack.show', $studyPack->id) }}" 
                   target="_blank" 
                   class="px-4 py-2.5 rounded-xl border border-slate-200 text-slate-700 font-bold text-xs hover:bg-slate-50 transition flex items-center gap-2">
                    <i data-lucide="external-link" class="w-4 h-4 text-slate-400"></i> View as Student
                </a>

                <button type="button" 
                        onclick="submitCurriculumForm()" 
                        class="px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-xs font-bold transition shadow-md shadow-emerald-600/20 active:scale-[0.98] flex items-center gap-2">
                    <i data-lucide="save" class="w-4 h-4"></i> Save All Changes
                </button>
            </div>
        </div>

        <!-- Grade Selector Tabs -->
        <div class="flex items-center gap-2 border-b border-slate-200 pb-2">
            <button type="button" 
                    id="tab-g12" 
                    onclick="switchGradeTab('g12')" 
                    class="px-5 py-2.5 rounded-xl text-xs font-bold bg-navy-950 text-white transition flex items-center gap-2 shadow-sm">
                <span>12 ශ්‍රේණිය (Grade 12)</span>
                <span id="badge-g12" class="px-2 py-0.5 rounded-full bg-white/20 text-[10px]">0</span>
            </button>

            <button type="button" 
                    id="tab-g13" 
                    onclick="switchGradeTab('g13')" 
                    class="px-5 py-2.5 rounded-xl text-xs font-bold bg-white text-slate-600 hover:text-navy-950 hover:bg-slate-100 transition flex items-center gap-2 border border-slate-200">
                <span>13 ශ්‍රේණිය (Grade 13)</span>
                <span id="badge-g13" class="px-2 py-0.5 rounded-full bg-slate-100 text-[10px]">0</span>
            </button>
        </div>

        <!-- Active Grade Topics Container -->
        <div id="topicsContainer" class="space-y-4">
            <!-- Rendered dynamically by JavaScript -->
        </div>

        <!-- Add Topic Button -->
        <div class="pt-2">
            <button type="button" 
                    onclick="addNewTopic()" 
                    class="w-full py-4 border-2 border-dashed border-indigo-200 hover:border-indigo-400 bg-indigo-50/50 hover:bg-indigo-50 rounded-2xl text-indigo-700 font-bold text-xs transition flex items-center justify-center gap-2">
                <i data-lucide="plus-circle" class="w-4 h-4"></i> Add New Main Topic (ප්‍රධාන මාතෘකාවක් එකතු කරන්න)
            </button>
        </div>

        <!-- Hidden Form to submit JSON -->
        <form id="curriculumForm" action="{{ route('admin.studypack.curriculum.update', $studyPack->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="curriculum_json" id="curriculum_json">
        </form>

    </div>

    <!-- Quick Video Test Modal -->
    <div id="testVideoModal" class="fixed inset-0 z-50 bg-black/80 backdrop-blur-sm hidden items-center justify-center p-4">
        <div class="bg-navy-950 border border-slate-700 rounded-2xl max-w-2xl w-full overflow-hidden shadow-2xl flex flex-col">
            <div class="p-4 border-b border-slate-800 flex items-center justify-between">
                <h4 class="text-white text-xs font-bold uppercase tracking-wider">Video Link Preview</h4>
                <button onclick="closeTestVideoModal()" class="text-slate-400 hover:text-white p-1">✕</button>
            </div>
            <div class="relative w-full pb-[56.25%] bg-black">
                <iframe id="testIframe" class="absolute inset-0 w-full h-full" src="" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>

    <script>
        // Load initial curriculum data from backend
        let CURRICULUM = @json($curriculum ?? ['g12' => [], 'g13' => []]);
        if (!CURRICULUM.g12) CURRICULUM.g12 = [];
        if (!CURRICULUM.g13) CURRICULUM.g13 = [];

        let currentGrade = 'g12';

        function switchGradeTab(grade) {
            currentGrade = grade;
            const btn12 = document.getElementById('tab-g12');
            const btn13 = document.getElementById('tab-g13');

            if (grade === 'g12') {
                btn12.className = "px-5 py-2.5 rounded-xl text-xs font-bold bg-navy-950 text-white transition flex items-center gap-2 shadow-sm";
                btn13.className = "px-5 py-2.5 rounded-xl text-xs font-bold bg-white text-slate-600 hover:text-navy-950 hover:bg-slate-100 transition flex items-center gap-2 border border-slate-200";
            } else {
                btn13.className = "px-5 py-2.5 rounded-xl text-xs font-bold bg-navy-950 text-white transition flex items-center gap-2 shadow-sm";
                btn12.className = "px-5 py-2.5 rounded-xl text-xs font-bold bg-white text-slate-600 hover:text-navy-950 hover:bg-slate-100 transition flex items-center gap-2 border border-slate-200";
            }
            renderCurriculum();
        }

        function updateTabBadges() {
            let count12 = 0;
            let count13 = 0;
            (CURRICULUM.g12 || []).forEach(t => { count12 += (t.subs ? t.subs.length : 0); });
            (CURRICULUM.g13 || []).forEach(t => { count13 += (t.subs ? t.subs.length : 0); });

            document.getElementById('badge-g12').textContent = (CURRICULUM.g12 ? CURRICULUM.g12.length : 0) + ' Topics (' + count12 + ' Videos)';
            document.getElementById('badge-g13').textContent = (CURRICULUM.g13 ? CURRICULUM.g13.length : 0) + ' Topics (' + count13 + ' Videos)';
        }

        function renderCurriculum() {
            updateTabBadges();
            const container = document.getElementById('topicsContainer');
            const topics = CURRICULUM[currentGrade] || [];

            if (topics.length === 0) {
                container.innerHTML = `
                    <div class="p-12 text-center bg-white rounded-2xl border border-dashed border-slate-300">
                        <i data-lucide="folder" class="w-8 h-8 text-slate-300 mx-auto mb-2"></i>
                        <p class="text-xs font-semibold text-slate-500">No topics added to this grade yet.</p>
                        <button type="button" onclick="addNewTopic()" class="mt-3 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-bold rounded-xl">
                            + Add First Topic
                        </button>
                    </div>`;
                lucide.createIcons();
                return;
            }

            let html = '';
            topics.forEach((topic, tIdx) => {
                let subsHtml = '';
                (topic.subs || []).forEach((sub, sIdx) => {
                    const hasUrl = sub.url && sub.url.trim().length > 0;
                    subsHtml += `
                        <div class="p-3.5 bg-slate-50 border border-slate-200/90 rounded-xl space-y-2.5 hover:border-blue-400 transition">
                            <div class="flex items-center justify-between gap-3">
                                <div class="flex items-center gap-2 flex-1">
                                    <input type="text" 
                                           value="${escapeHtml(sub.num || '')}" 
                                           onchange="updateSubField(${tIdx}, ${sIdx}, 'num', this.value)"
                                           placeholder="1.1" 
                                           class="w-16 px-2.5 py-1.5 bg-white border border-slate-200 rounded-lg text-xs font-mono font-bold text-indigo-700 text-center">
                                    <input type="text" 
                                           value="${escapeHtml(sub.desc || '')}" 
                                           onchange="updateSubField(${tIdx}, ${sIdx}, 'desc', this.value)"
                                           placeholder="උප මාතෘකාව හෝ පාඩමේ විස්තරය" 
                                           class="flex-1 px-3 py-1.5 bg-white border border-slate-200 rounded-lg text-xs font-semibold text-slate-900">
                                </div>
                                <button type="button" 
                                        onclick="removeSubtopic(${tIdx}, ${sIdx})" 
                                        class="text-rose-500 hover:text-rose-700 p-1.5 hover:bg-rose-50 rounded-lg transition" 
                                        title="Delete Subtopic">
                                    <i data-lucide="trash-2" class="w-3.5 h-3.5"></i>
                                </button>
                            </div>

                            <div class="flex items-center gap-2">
                                <span class="text-[10px] font-bold uppercase text-slate-400 w-16 text-right">YouTube:</span>
                                <input type="url" 
                                       value="${escapeHtml(sub.url || '')}" 
                                       onchange="updateSubField(${tIdx}, ${sIdx}, 'url', this.value)"
                                       placeholder="https://www.youtube.com/watch?v=..." 
                                       class="flex-1 px-3 py-1.5 bg-white border border-slate-200 rounded-lg text-xs font-mono text-blue-700">
                                ${hasUrl ? `
                                    <button type="button" 
                                            onclick="testVideo('${escapeHtml(sub.url)}')"
                                            class="px-2.5 py-1.5 rounded-lg bg-emerald-50 text-emerald-700 hover:bg-emerald-100 font-bold text-[11px] flex items-center gap-1">
                                        <i data-lucide="play" class="w-3 h-3"></i> Test
                                    </button>
                                ` : ''}
                            </div>
                        </div>`;
                });

                html += `
                    <div class="bg-white rounded-2xl border border-slate-200/90 shadow-sm overflow-hidden">
                        <div class="p-4 bg-slate-50/80 border-b border-slate-100 flex items-center justify-between gap-3">
                            <div class="flex items-center gap-3 flex-1">
                                <span class="w-8 h-8 rounded-lg bg-navy-950 text-white font-mono font-bold text-xs flex items-center justify-center flex-shrink-0">
                                    ${topic.num || (tIdx + 1)}
                                </span>
                                <input type="text" 
                                       value="${escapeHtml(topic.title || '')}" 
                                       onchange="updateTopicTitle(${tIdx}, this.value)"
                                       placeholder="ප්‍රධාන ඒකකයේ මාතෘකාව" 
                                       class="flex-1 px-3 py-2 bg-white border border-slate-200 rounded-xl text-xs sm:text-sm font-bold text-navy-950">
                            </div>

                            <div class="flex items-center gap-2">
                                <button type="button" 
                                        onclick="addSubtopic(${tIdx})" 
                                        class="px-3 py-1.5 bg-indigo-50 hover:bg-indigo-100 text-indigo-700 font-bold rounded-lg text-xs transition flex items-center gap-1">
                                    <i data-lucide="plus" class="w-3 h-3"></i> Add Subtopic
                                </button>
                                <button type="button" 
                                        onclick="deleteTopic(${tIdx})" 
                                        class="text-rose-500 hover:bg-rose-50 p-2 rounded-lg transition" 
                                        title="Delete Topic">
                                    <i data-lucide="trash" class="w-4 h-4"></i>
                                </button>
                            </div>
                        </div>

                        <div class="p-4 space-y-3">
                            ${subsHtml || '<p class="text-xs text-slate-400 italic">No subtopics yet. Click "Add Subtopic" above to add videos.</p>'}
                        </div>
                    </div>`;
            });

            container.innerHTML = html;
            lucide.createIcons();
        }

        function updateTopicTitle(tIdx, val) {
            CURRICULUM[currentGrade][tIdx].title = val;
        }

        function updateSubField(tIdx, sIdx, field, val) {
            CURRICULUM[currentGrade][tIdx].subs[sIdx][field] = val;
            if (field === 'url') updateTabBadges();
        }

        function addNewTopic() {
            const nextNum = (CURRICULUM[currentGrade].length || 0) + 1;
            CURRICULUM[currentGrade].push({
                num: nextNum,
                title: 'නව ප්‍රධාන මාතෘකාව ' + nextNum,
                subs: [
                    { num: nextNum + '.1', desc: 'පාඩම 1', url: '' }
                ]
            });
            renderCurriculum();
        }

        function deleteTopic(tIdx) {
            if (confirm('Delete this entire topic and all its video lessons?')) {
                CURRICULUM[currentGrade].splice(tIdx, 1);
                renderCurriculum();
            }
        }

        function addSubtopic(tIdx) {
            const topic = CURRICULUM[currentGrade][tIdx];
            if (!topic.subs) topic.subs = [];
            const nextSubNum = (topic.num || (tIdx + 1)) + '.' + (topic.subs.length + 1);
            topic.subs.push({
                num: nextSubNum,
                desc: 'නව උප මාතෘකාව',
                url: ''
            });
            renderCurriculum();
        }

        function removeSubtopic(tIdx, sIdx) {
            CURRICULUM[currentGrade][tIdx].subs.splice(sIdx, 1);
            renderCurriculum();
        }

        function escapeHtml(str) {
            return String(str || '').replace(/[&<>"']/g, c => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[c]));
        }

        function testVideo(url) {
            const modal = document.getElementById('testVideoModal');
            const iframe = document.getElementById('testIframe');
            const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
            const match = url.match(regExp);
            if (match && match[2].length === 11) {
                iframe.src = 'https://www.youtube.com/embed/' + match[2] + '?autoplay=1';
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            } else {
                window.open(url, '_blank');
            }
        }

        function closeTestVideoModal() {
            const modal = document.getElementById('testVideoModal');
            const iframe = document.getElementById('testIframe');
            iframe.src = '';
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        function submitCurriculumForm() {
            const input = document.getElementById('curriculum_json');
            input.value = JSON.stringify(CURRICULUM);
            document.getElementById('curriculumForm').submit();
        }

        // Initialize rendering on page load
        renderCurriculum();
    </script>

@endsection
