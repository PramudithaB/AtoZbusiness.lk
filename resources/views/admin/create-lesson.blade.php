<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Lesson | Admin Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'royal-600': '#2563eb',
                        'royal-700': '#1d4ed8',
                        'royal-900': '#1e3a8a',
                    },
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #0f172a; color: #f8fafc; }
        
        .form-input {
            background-color: #1e293b;
            border: 1px solid #334155;
            transition: all 0.2s ease;
        }
        .form-input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
            outline: none;
        }
        .custom-scrollbar::-webkit-scrollbar { width: 4px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #334155; border-radius: 10px; }
    </style>
</head>

<body class="antialiased">

    <aside id="sidebar" class="fixed top-0 left-0 h-full w-64 bg-slate-900 border-r border-slate-800 z-50 transition-transform -translate-x-full lg:translate-x-0 overflow-y-auto custom-scrollbar">
        <div class="p-6">
            <div class="flex items-center gap-3 mb-10">
                <div class="w-10 h-10 bg-royal-600 rounded-xl flex items-center justify-center text-white font-bold shadow-lg shadow-blue-500/20">L</div>
                <span class="text-xl font-extrabold text-white tracking-tight">LTBio Admin</span>
            </div>

            <nav class="space-y-1">
                <p class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-4 ml-2">Main Menu</p>
                <a href="{{ route('admindashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white transition font-semibold text-sm">
                    <i data-lucide="layout-dashboard" class="w-4 h-4"></i> Dashboard
                </a>
                <a href="{{ route('usermanagement') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white transition font-semibold text-sm">
                    <i data-lucide="users" class="w-4 h-4"></i> User Management
                </a>
                <a href="{{ route('classmanage') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white transition font-semibold text-sm">
                    <i data-lucide="book-open" class="w-4 h-4"></i> Courses
                </a>
                <a href="{{ route('lesson.lessoncreate') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-royal-600 text-white font-semibold text-sm shadow-lg shadow-blue-500/20">
                    <i data-lucide="play-circle" class="w-4 h-4"></i> Lessons
                </a>
                <a href="{{ route('paymentmanage') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white transition font-semibold text-sm">
                    <i data-lucide="credit-card" class="w-4 h-4"></i> Payments
                </a>
            </nav>

            <div class="mt-20 pt-10 border-t border-slate-800">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-red-400 hover:bg-red-500/10 transition font-bold text-sm">
                        <i data-lucide="log-out" class="w-4 h-4"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <main class="lg:ml-64 p-4 lg:p-8">
        
        <header class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10">
            <div>
                <h1 class="text-2xl font-bold text-white">Create New Lesson</h1>
                <p class="text-slate-500 text-sm mt-1">Add video content and study materials to an existing class.</p>
            </div>
        </header>

        <section class="max-w-4xl">
            <form action="{{ route('lesson.lessonstore') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="bg-slate-900 border border-slate-800 rounded-[2.5rem] p-6 md:p-10 shadow-sm space-y-8">
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-1 space-y-2">
                            <label class="text-xs font-bold text-slate-400 uppercase tracking-widest ml-1">Parent Class</label>
                            <select name="class_id" required class="w-full form-input p-4 rounded-2xl text-white appearance-none cursor-pointer">
                                <option value="" disabled selected>Choose a Class</option>
                                @foreach($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->className }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="md:col-span-1 space-y-2">
                            <label class="text-xs font-bold text-slate-400 uppercase tracking-widest ml-1">Access Level</label>
                            <select name="is_paid" required class="w-full form-input p-4 rounded-2xl text-white appearance-none cursor-pointer">
                                <option value="0">Free Access</option>
                                <option value="1">Paid (Requires Enrollment)</option>
                            </select>
                        </div>

                        <div class="md:col-span-2 space-y-2">
                            <label class="text-xs font-bold text-slate-400 uppercase tracking-widest ml-1">Lesson Title</label>
                            <input type="text" name="name" required class="w-full form-input p-4 rounded-2xl text-white placeholder-slate-600" placeholder="e.g. Introduction to Organic Chemistry Part I">
                        </div>

                        <div class="md:col-span-2 space-y-2">
                            <label class="text-xs font-bold text-slate-400 uppercase tracking-widest ml-1">Video Link</label>
                            <div class="relative">
                                <input type="text" name="link" class="w-full form-input p-4 pl-12 rounded-2xl text-white placeholder-slate-600" placeholder="YouTube, Drive, or Vimeo URL">
                                <i data-lucide="link" class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-500"></i>
                            </div>
                        </div>

                        <div class="md:col-span-2 space-y-2">
                            <label class="text-xs font-bold text-slate-400 uppercase tracking-widest ml-1">Description</label>
                            <textarea name="description" rows="3" class="w-full form-input p-4 rounded-2xl text-white placeholder-slate-600 resize-none" placeholder="Briefly explain what this lesson covers..."></textarea>
                        </div>

                        <div class="md:col-span-2 space-y-2">
                            <label class="text-xs font-bold text-slate-400 uppercase tracking-widest ml-1">Study Material (PDF/Image)</label>
                            <div class="relative group">
                                <input type="file" name="file" class="w-full form-input p-8 rounded-2xl text-slate-400 border-dashed border-2 text-center cursor-pointer hover:border-royal-600 transition-all">
                                <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none opacity-50">
                                    <i data-lucide="upload-cloud" class="w-6 h-6 mb-1"></i>
                                    <span class="text-[10px] font-bold uppercase">Click to browse or drag file</span>
                                </div>
                            </div>
                        </div>

                        <div class="md:col-span-2 space-y-2">
                            <label class="text-xs font-bold text-slate-400 uppercase tracking-widest ml-1">Important Notice</label>
                            <textarea name="notice" rows="2" class="w-full form-input p-4 rounded-2xl text-white placeholder-slate-600 resize-none" placeholder="Optional: Any special instructions for students..."></textarea>
                        </div>
                    </div>

                    <div class="pt-6 border-t border-slate-800 flex flex-col md:flex-row items-center justify-between gap-4">
                        <div class="flex items-center gap-2 text-slate-500 text-[10px] font-bold uppercase tracking-wider">
                            <i data-lucide="shield-check" class="w-4 h-4 text-emerald-500"></i>
                            Changes will be live instantly
                        </div>
                        <button type="submit" class="w-full md:w-auto px-10 py-4 bg-royal-600 hover:bg-royal-700 text-white font-extrabold rounded-2xl transition-all shadow-lg shadow-blue-900/20 flex items-center justify-center gap-2 active:scale-95">
                            <i data-lucide="plus-circle" class="w-5 h-5"></i>
                            Publish Lesson
                        </button>
                    </div>
                </div>
            </form>
        </section>
    </main>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>