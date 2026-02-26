<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Class | LTBio Admin</title>
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
                        'admin-dark': '#0f172a',
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
                <div class="w-10 h-10 bg-royal-600 rounded-xl flex items-center justify-center text-white font-bold">L</div>
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
                <a href="{{ route('classmanage') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-royal-600 text-white font-semibold text-sm">
                    <i data-lucide="book-open" class="w-4 h-4"></i> Courses
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
                <h1 class="text-2xl font-bold text-white">Create New Course</h1>
                <p class="text-slate-500 text-sm mt-1">Fill in the details below to publish a new class to the student portal.</p>
            </div>
            <div class="flex items-center gap-4">
                <button class="w-10 h-10 rounded-xl bg-slate-800 flex items-center justify-center text-slate-400">
                    <i data-lucide="bell" class="w-5 h-5"></i>
                </button>
                <div class="w-10 h-10 rounded-xl bg-royal-600 flex items-center justify-center text-white font-bold">AD</div>
            </div>
        </header>

        <section class="max-w-4xl">
            <form action="{{route('classstore')}}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                
                <div class="bg-slate-900 border border-slate-800 rounded-[2rem] p-6 md:p-10 shadow-sm space-y-8">
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2 space-y-2">
                            <label class="text-xs font-bold text-slate-400 uppercase tracking-widest ml-1">Class Title</label>
                            <input type="text" name="className" required
                                class="w-full form-input p-4 rounded-2xl text-white placeholder-slate-600"
                                placeholder="e.g. Advanced Biology: Cell Theory Masterclass">
                        </div>

                        <div class="md:col-span-2 space-y-2">
                            <label class="text-xs font-bold text-slate-400 uppercase tracking-widest ml-1">Course Description</label>
                            <textarea name="description" required rows="4"
                                class="w-full form-input p-4 rounded-2xl text-white placeholder-slate-600 resize-none"
                                placeholder="Provide a detailed summary of what students will learn..."></textarea>
                        </div>

                        <div class="space-y-2">
                            <label class="text-xs font-bold text-slate-400 uppercase tracking-widest ml-1">Instructor Name</label>
                            <input type="text" name="teacherName" required
                                class="w-full form-input p-4 rounded-2xl text-white"
                                placeholder="e.g. Lakshitha Thennakoon">
                        </div>

                        <div class="space-y-2">
                            <label class="text-xs font-bold text-slate-400 uppercase tracking-widest ml-1">Schedule / Time</label>
                            <input type="text" name="classTime" required
                                class="w-full form-input p-4 rounded-2xl text-white"
                                placeholder="e.g. Tuesdays 7:00 PM - 9:00 PM">
                        </div>

                        <div class="space-y-2">
                            <label class="text-xs font-bold text-slate-400 uppercase tracking-widest ml-1">Total Sessions</label>
                            <input type="number" name="sessionCount" required min="1"
                                class="w-full form-input p-4 rounded-2xl text-white"
                                placeholder="e.g. 12">
                        </div>

                        <div class="space-y-2">
                            <label class="text-xs font-bold text-slate-400 uppercase tracking-widest ml-1">Assigned Month</label>
                            <select name="month" required
                                class="w-full form-input p-4 rounded-2xl text-white appearance-none cursor-pointer">
                                <option value="" disabled selected>Select Month</option>
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

                    <div class="pt-6 border-t border-slate-800 flex flex-col md:flex-row items-center justify-between gap-4">
                        <div class="flex items-center gap-2 text-slate-500 text-xs">
                            <i data-lucide="info" class="w-4 h-4"></i>
                            New courses are set to "Active" by default upon creation.
                        </div>
                        <button type="submit" 
                            class="w-full md:w-auto px-10 py-4 bg-royal-600 hover:bg-royal-700 text-white font-extrabold rounded-2xl transition-all shadow-lg shadow-blue-900/20 flex items-center justify-center gap-2 active:scale-95">
                            <i data-lucide="plus-circle" class="w-5 h-5"></i>
                            Publish Course
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