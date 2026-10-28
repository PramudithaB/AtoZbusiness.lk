<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A/L &amp; O/L Past Papers &amp; Marking Schemes | Lasindu Senarath LMS</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('images/logo.jpeg') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Noto+Sans+Sinhala:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        navy: {
                            50: '#f0f5fa',
                            100: '#e1ecf6',
                            200: '#c5dcee',
                            300: '#99c3e2',
                            400: '#64a3d2',
                            500: '#2c6aa3',
                            600: '#1e5285',
                            700: '#163f68',
                            800: '#0f2b4c',
                            900: '#0a1d35',
                            950: '#061325',
                        }
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        sinhala: ['"Noto Sans Sinhala"', '"Plus Jakarta Sans"', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
            color: #0f172a;
        }
        .hero-pattern {
            background-color: #0a1d35;
            background-image: 
                radial-gradient(at 10% 20%, rgba(30, 82, 133, 0.4) 0px, transparent 50%),
                radial-gradient(at 90% 80%, rgba(56, 189, 248, 0.2) 0px, transparent 50%),
                radial-gradient(at 50% 50%, rgba(6, 19, 37, 0.95) 0px, transparent 100%);
        }
    </style>
</head>

<body class="antialiased min-h-screen flex flex-col">

    <!-- Top Navigation -->
    <nav class="bg-white/95 backdrop-blur-md border-b border-slate-200/80 sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <a href="{{ url('/') }}" class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-navy-900 to-blue-700 p-0.5 shadow-md shadow-blue-900/10">
                        <div class="w-full h-full bg-white rounded-[10px] flex items-center justify-center overflow-hidden">
                            <img src="{{ asset('images/logo.jpeg') }}" alt="AtoZ Logo" class="w-full h-full object-cover">
                        </div>
                    </div>
                    <div>
                        <span class="text-[9px] font-extrabold text-blue-700 uppercase tracking-widest block">AtoZ Business School</span>
                        <span class="text-base font-extrabold text-navy-950 tracking-tight leading-none">LASINDU SENARATH</span>
                    </div>
                </a>

                <div class="flex items-center gap-2 sm:gap-3">
                    <a href="{{ route('login') }}" 
                       class="px-4 py-2 text-xs sm:text-sm font-bold text-navy-950 hover:bg-slate-100 rounded-xl transition">
                        Sign In
                    </a>
                    <a href="{{ route('register') }}" 
                       class="px-4 py-2 bg-navy-900 hover:bg-blue-800 text-white text-xs sm:text-sm font-bold rounded-xl shadow-md transition">
                        Register
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Header -->
    <header class="hero-pattern text-white py-14 sm:py-16 px-4 relative overflow-hidden">
        <div class="max-w-5xl mx-auto text-center space-y-4 relative z-10">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/15 text-xs font-bold text-sky-300">
                <i data-lucide="book-open" class="w-4 h-4 text-sky-400"></i>
                Free Educational Downloads • නොමිලේ බාගත කරන්න
            </span>

            <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight leading-tight">
                A/L &amp; O/L Past Papers &amp; Marking Schemes
            </h1>

            <p class="text-slate-300 text-sm sm:text-base max-w-2xl mx-auto leading-relaxed">
                ව්‍යාපාර අධ්‍යයනය, ගිණුම්කරණය, ආර්ථික විද්‍යාව සහ වාණිජ විෂයයන්හි පසුගිය විභාග ප්‍රශ්න පත්‍ර හා ලකුණු දීමේ පටිපාටි පහසුවෙන්ම PDF ලෙස නොමිලේ බාගත කරගන්න.
            </p>

            <!-- Quick Stats -->
            <div class="pt-4 flex items-center justify-center gap-6 sm:gap-10 text-xs font-semibold text-slate-300">
                <div class="flex items-center gap-1.5">
                    <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-400"></i>
                    <span>No Login Required</span>
                </div>
                <div class="flex items-center gap-1.5">
                    <i data-lucide="languages" class="w-4 h-4 text-sky-400"></i>
                    <span>Sinhala &amp; English Medium</span>
                </div>
                <div class="flex items-center gap-1.5">
                    <i data-lucide="file-check" class="w-4 h-4 text-amber-400"></i>
                    <span>Official Marking Schemes</span>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content & Filters -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 flex-1 w-full space-y-8">

        <!-- Controls Card -->
        <div class="bg-white rounded-3xl p-6 border border-slate-200/90 shadow-sm space-y-5">
            
            <!-- Top Controls Row -->
            <div class="flex flex-col lg:flex-row items-stretch lg:items-center justify-between gap-4">
                
                <!-- Exam Level Tabs (A/L vs O/L) -->
                <div class="inline-flex p-1.5 bg-slate-100 rounded-2xl border border-slate-200">
                    <button onclick="setExamLevel('al')" 
                            id="tab-al"
                            class="px-5 py-2.5 rounded-xl text-xs sm:text-sm font-extrabold transition-all flex items-center gap-2 bg-navy-900 text-white shadow-sm">
                        <i data-lucide="graduation-cap" class="w-4 h-4"></i>
                        <span>G.C.E. A/L (උසස් පෙළ)</span>
                    </button>
                    <button onclick="setExamLevel('ol')" 
                            id="tab-ol"
                            class="px-5 py-2.5 rounded-xl text-xs sm:text-sm font-extrabold text-slate-600 hover:text-navy-950 transition-all flex items-center gap-2">
                        <i data-lucide="school" class="w-4 h-4"></i>
                        <span>G.C.E. O/L (සාමාන්‍ය පෙළ)</span>
                    </button>
                </div>

                <!-- Medium Selector -->
                <div class="inline-flex p-1.5 bg-slate-100 rounded-2xl border border-slate-200">
                    <button onclick="setMedium('all')" 
                            id="med-all"
                            class="px-4 py-2 rounded-xl text-xs font-bold transition-all bg-white text-navy-950 shadow-sm">
                        All Mediums
                    </button>
                    <button onclick="setMedium('sinhala')" 
                            id="med-sinhala"
                            class="px-4 py-2 rounded-xl text-xs font-bold text-slate-600 hover:text-navy-950 transition-all">
                        සිංහල මාධ්‍යය
                    </button>
                    <button onclick="setMedium('english')" 
                            id="med-english"
                            class="px-4 py-2 rounded-xl text-xs font-bold text-slate-600 hover:text-navy-950 transition-all">
                        English Medium
                    </button>
                </div>

                <!-- Search Input -->
                <div class="relative flex-1 lg:max-w-xs">
                    <i data-lucide="search" class="w-4 h-4 text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2"></i>
                    <input type="text" 
                           id="searchInput" 
                           oninput="renderPapers()"
                           placeholder="Search by year or subject..." 
                           class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-navy-900 focus:bg-white transition">
                </div>

            </div>

            <!-- Subject Chips & Year Chips -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pt-4 border-t border-slate-100">
                <!-- Subject Filter -->
                <div class="flex items-center gap-2 overflow-x-auto pb-1 sm:pb-0" id="subjectFilterContainer">
                    <!-- dynamically populated based on A/L or O/L -->
                </div>

                <!-- Year Filter Dropdown -->
                <div class="flex items-center gap-2">
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Year:</span>
                    <select id="yearSelect" onchange="renderPapers()" class="px-3 py-1.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-bold text-navy-950 focus:outline-none focus:border-navy-900">
                        <option value="all">All Years (2024 - 2015)</option>
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                        <option value="2020">2020</option>
                        <option value="2019">2019</option>
                        <option value="2018">2018</option>
                        <option value="2017">2017</option>
                        <option value="2016">2016</option>
                        <option value="2015">2015</option>
                    </select>
                </div>
            </div>

        </div>

        <!-- Result Stats -->
        <div class="flex items-center justify-between text-xs font-semibold text-slate-500 px-1">
            <span id="resultsCount">Loading past papers...</span>
            <span class="text-slate-400">Click on download buttons to save PDFs directly</span>
        </div>

        <!-- Papers Grid -->
        <div id="papersGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Dynamically populated by JavaScript -->
        </div>

        <!-- Empty State -->
        <div id="emptyState" class="hidden text-center py-16 bg-white rounded-3xl border border-slate-200 p-8 space-y-3">
            <div class="w-14 h-14 bg-slate-100 rounded-2xl flex items-center justify-center mx-auto text-slate-400">
                <i data-lucide="file-question" class="w-7 h-7"></i>
            </div>
            <h3 class="text-lg font-bold text-navy-950">ප්‍රශ්න පත්‍ර හමු නොවීය</h3>
            <p class="text-slate-500 text-xs sm:text-sm">ඔබ සෙවූ කරුණුවලට අදාළ ප්‍රශ්න පත්‍ර නොමැත. කරුණාකර Filters වෙනස් කර නැවත සොයන්න.</p>
        </div>

    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-slate-200/80 py-8 px-4 text-center text-xs text-slate-500">
        <p>&copy; 2026 Lasindu Senarath LMS • AtoZ Business School. All past papers are provided free for educational use.</p>
    </footer>

    <!-- ==============================================================
         DATASET & JAVASCRIPT CONTROLLER
         ඔබට PDF links වෙනස් කිරීමට හෝ අලුතින් එක් කිරීමට පහත DATASET 
         එකෙහි paper_url සහ marking_url links update කරන්න.
    ============================================================== -->
    <script>
        // Default sample fallback link for testing downloads
        const SAMPLE_PDF = "https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf";

        /**
         * PAST PAPERS DATA REPOSITORY
         * Structure:
         * - level: 'al' | 'ol'
         * - year: string
         * - subject: string
         * - subject_si: string
         * - medium: 'sinhala' | 'english'
         * - paper_url: PDF download link for Question Paper
         * - marking_url: PDF download link for Marking Scheme
         * - size: File size estimate
         */
        const PAPERS = [
            // ==================== G.C.E. A/L PAPERS ====================
            // 2024 A/L
            {
                id: 1,
                level: 'al',
                year: '2024',
                subject: 'Business Studies',
                subject_si: 'ව්‍යාපාර අධ්‍යයනය',
                medium: 'sinhala',
                paper_name: '2024 A/L Business Studies (Paper I & II)',
                paper_url: SAMPLE_PDF,
                marking_url: SAMPLE_PDF,
                size: '3.2 MB'
            },
            {
                id: 2,
                level: 'al',
                year: '2024',
                subject: 'Business Studies',
                subject_si: 'Business Studies',
                medium: 'english',
                paper_name: '2024 A/L Business Studies (English Medium)',
                paper_url: SAMPLE_PDF,
                marking_url: SAMPLE_PDF,
                size: '2.9 MB'
            },
            {
                id: 3,
                level: 'al',
                year: '2024',
                subject: 'Accounting',
                subject_si: 'ගිණුම්කරණය',
                medium: 'sinhala',
                paper_name: '2024 A/L Accounting (Paper I & II)',
                paper_url: SAMPLE_PDF,
                marking_url: SAMPLE_PDF,
                size: '3.5 MB'
            },
            {
                id: 4,
                level: 'al',
                year: '2024',
                subject: 'Economics',
                subject_si: 'ආර්ථික විද්‍යාව',
                medium: 'sinhala',
                paper_name: '2024 A/L Economics (Paper I & II)',
                paper_url: SAMPLE_PDF,
                marking_url: SAMPLE_PDF,
                size: '3.1 MB'
            },

            // 2023 A/L
            {
                id: 5,
                level: 'al',
                year: '2023',
                subject: 'Business Studies',
                subject_si: 'ව්‍යාපාර අධ්‍යයනය',
                medium: 'sinhala',
                paper_name: '2023 A/L Business Studies (Paper I & II)',
                paper_url: SAMPLE_PDF,
                marking_url: SAMPLE_PDF,
                size: '2.8 MB'
            },
            {
                id: 6,
                level: 'al',
                year: '2023',
                subject: 'Business Studies',
                subject_si: 'Business Studies',
                medium: 'english',
                paper_name: '2023 A/L Business Studies (English Medium)',
                paper_url: SAMPLE_PDF,
                marking_url: SAMPLE_PDF,
                size: '2.7 MB'
            },
            {
                id: 7,
                level: 'al',
                year: '2023',
                subject: 'Accounting',
                subject_si: 'ගිණුම්කරණය',
                medium: 'sinhala',
                paper_name: '2023 A/L Accounting (Paper I & II)',
                paper_url: SAMPLE_PDF,
                marking_url: SAMPLE_PDF,
                size: '3.4 MB'
            },
            {
                id: 8,
                level: 'al',
                year: '2023',
                subject: 'Accounting',
                subject_si: 'Accounting',
                medium: 'english',
                paper_name: '2023 A/L Accounting (English Medium)',
                paper_url: SAMPLE_PDF,
                marking_url: SAMPLE_PDF,
                size: '3.2 MB'
            },
            {
                id: 9,
                level: 'al',
                year: '2023',
                subject: 'Economics',
                subject_si: 'ආර්ථික විද්‍යාව',
                medium: 'sinhala',
                paper_name: '2023 A/L Economics (Paper I & II)',
                paper_url: SAMPLE_PDF,
                marking_url: SAMPLE_PDF,
                size: '3.0 MB'
            },

            // 2022 A/L
            {
                id: 10,
                level: 'al',
                year: '2022',
                subject: 'Business Studies',
                subject_si: 'ව්‍යාපාර අධ්‍යයනය',
                medium: 'sinhala',
                paper_name: '2022 A/L Business Studies (Paper I & II)',
                paper_url: SAMPLE_PDF,
                marking_url: SAMPLE_PDF,
                size: '2.6 MB'
            },
            {
                id: 11,
                level: 'al',
                year: '2022',
                subject: 'Business Studies',
                subject_si: 'Business Studies',
                medium: 'english',
                paper_name: '2022 A/L Business Studies (English Medium)',
                paper_url: SAMPLE_PDF,
                marking_url: SAMPLE_PDF,
                size: '2.5 MB'
            },
            {
                id: 12,
                level: 'al',
                year: '2022',
                subject: 'Accounting',
                subject_si: 'ගිණුම්කරණය',
                medium: 'sinhala',
                paper_name: '2022 A/L Accounting (Paper I & II)',
                paper_url: SAMPLE_PDF,
                marking_url: SAMPLE_PDF,
                size: '3.1 MB'
            },
            {
                id: 13,
                level: 'al',
                year: '2022',
                subject: 'Economics',
                subject_si: 'ආර්ථික විද්‍යාව',
                medium: 'sinhala',
                paper_name: '2022 A/L Economics (Paper I & II)',
                paper_url: SAMPLE_PDF,
                marking_url: SAMPLE_PDF,
                size: '2.9 MB'
            },

            // 2021 A/L
            {
                id: 14,
                level: 'al',
                year: '2021',
                subject: 'Business Studies',
                subject_si: 'ව්‍යාපාර අධ්‍යයනය',
                medium: 'sinhala',
                paper_name: '2021 A/L Business Studies (Paper I & II)',
                paper_url: SAMPLE_PDF,
                marking_url: SAMPLE_PDF,
                size: '2.5 MB'
            },
            {
                id: 15,
                level: 'al',
                year: '2021',
                subject: 'Business Studies',
                subject_si: 'Business Studies',
                medium: 'english',
                paper_name: '2021 A/L Business Studies (English Medium)',
                paper_url: SAMPLE_PDF,
                marking_url: SAMPLE_PDF,
                size: '2.4 MB'
            },
            {
                id: 16,
                level: 'al',
                year: '2021',
                subject: 'Accounting',
                subject_si: 'ගිණුම්කරණය',
                medium: 'sinhala',
                paper_name: '2021 A/L Accounting (Paper I & II)',
                paper_url: SAMPLE_PDF,
                marking_url: SAMPLE_PDF,
                size: '3.0 MB'
            },
            {
                id: 17,
                level: 'al',
                year: '2021',
                subject: 'Economics',
                subject_si: 'ආර්ථික විද්‍යාව',
                medium: 'sinhala',
                paper_name: '2021 A/L Economics (Paper I & II)',
                paper_url: SAMPLE_PDF,
                marking_url: SAMPLE_PDF,
                size: '2.8 MB'
            },

            // 2020 A/L
            {
                id: 18,
                level: 'al',
                year: '2020',
                subject: 'Business Studies',
                subject_si: 'ව්‍යාපාර අධ්‍යයනය',
                medium: 'sinhala',
                paper_name: '2020 A/L Business Studies (Paper I & II)',
                paper_url: SAMPLE_PDF,
                marking_url: SAMPLE_PDF,
                size: '2.4 MB'
            },
            {
                id: 19,
                level: 'al',
                year: '2020',
                subject: 'Accounting',
                subject_si: 'ගිණුම්කරණය',
                medium: 'sinhala',
                paper_name: '2020 A/L Accounting (Paper I & II)',
                paper_url: SAMPLE_PDF,
                marking_url: SAMPLE_PDF,
                size: '2.9 MB'
            },

            // 2019 A/L
            {
                id: 20,
                level: 'al',
                year: '2019',
                subject: 'Business Studies',
                subject_si: 'ව්‍යාපාර අධ්‍යයනය',
                medium: 'sinhala',
                paper_name: '2019 A/L Business Studies (Paper I & II)',
                paper_url: SAMPLE_PDF,
                marking_url: SAMPLE_PDF,
                size: '2.3 MB'
            },
            {
                id: 21,
                level: 'al',
                year: '2019',
                subject: 'Accounting',
                subject_si: 'ගිණුම්කරණය',
                medium: 'sinhala',
                paper_name: '2019 A/L Accounting (Paper I & II)',
                paper_url: SAMPLE_PDF,
                marking_url: SAMPLE_PDF,
                size: '2.8 MB'
            },

            // 2018 A/L
            {
                id: 22,
                level: 'al',
                year: '2018',
                subject: 'Business Studies',
                subject_si: 'ව්‍යාපාර අධ්‍යයනය',
                medium: 'sinhala',
                paper_name: '2018 A/L Business Studies (Paper I & II)',
                paper_url: SAMPLE_PDF,
                marking_url: SAMPLE_PDF,
                size: '2.2 MB'
            },

            // ==================== G.C.E. O/L PAPERS ====================
            // 2023 O/L
            {
                id: 23,
                level: 'ol',
                year: '2023',
                subject: 'Commerce',
                subject_si: 'ව්‍යාපාර හා ගිණුම්කරණ අධ්‍යයනය',
                medium: 'sinhala',
                paper_name: '2023 O/L Commerce (Paper I & II)',
                paper_url: SAMPLE_PDF,
                marking_url: SAMPLE_PDF,
                size: '2.4 MB'
            },
            {
                id: 24,
                level: 'ol',
                year: '2023',
                subject: 'Commerce',
                subject_si: 'Business & Accounting Studies',
                medium: 'english',
                paper_name: '2023 O/L Commerce (English Medium)',
                paper_url: SAMPLE_PDF,
                marking_url: SAMPLE_PDF,
                size: '2.3 MB'
            },
            {
                id: 25,
                level: 'ol',
                year: '2023',
                subject: 'Mathematics',
                subject_si: 'ගණිතය',
                medium: 'sinhala',
                paper_name: '2023 O/L Mathematics (Paper I & II)',
                paper_url: SAMPLE_PDF,
                marking_url: SAMPLE_PDF,
                size: '3.1 MB'
            },

            // 2022 O/L
            {
                id: 26,
                level: 'ol',
                year: '2022',
                subject: 'Commerce',
                subject_si: 'ව්‍යාපාර හා ගිණුම්කරණ අධ්‍යයනය',
                medium: 'sinhala',
                paper_name: '2022 O/L Commerce (Paper I & II)',
                paper_url: SAMPLE_PDF,
                marking_url: SAMPLE_PDF,
                size: '2.3 MB'
            },
            {
                id: 27,
                level: 'ol',
                year: '2022',
                subject: 'Commerce',
                subject_si: 'Business & Accounting Studies',
                medium: 'english',
                paper_name: '2022 O/L Commerce (English Medium)',
                paper_url: SAMPLE_PDF,
                marking_url: SAMPLE_PDF,
                size: '2.2 MB'
            },

            // 2021 O/L
            {
                id: 28,
                level: 'ol',
                year: '2021',
                subject: 'Commerce',
                subject_si: 'ව්‍යාපාර හා ගිණුම්කරණ අධ්‍යයනය',
                medium: 'sinhala',
                paper_name: '2021 O/L Commerce (Paper I & II)',
                paper_url: SAMPLE_PDF,
                marking_url: SAMPLE_PDF,
                size: '2.2 MB'
            },
            {
                id: 29,
                level: 'ol',
                year: '2021',
                subject: 'Commerce',
                subject_si: 'Business & Accounting Studies',
                medium: 'english',
                paper_name: '2021 O/L Commerce (English Medium)',
                paper_url: SAMPLE_PDF,
                marking_url: SAMPLE_PDF,
                size: '2.1 MB'
            },

            // 2020 O/L
            {
                id: 30,
                level: 'ol',
                year: '2020',
                subject: 'Commerce',
                subject_si: 'ව්‍යාපාර හා ගිණුම්කරණ අධ්‍යයනය',
                medium: 'sinhala',
                paper_name: '2020 O/L Commerce (Paper I & II)',
                paper_url: SAMPLE_PDF,
                marking_url: SAMPLE_PDF,
                size: '2.1 MB'
            },

            // 2019 O/L
            {
                id: 31,
                level: 'ol',
                year: '2019',
                subject: 'Commerce',
                subject_si: 'ව්‍යාපාර හා ගිණුම්කරණ අධ්‍යයනය',
                medium: 'sinhala',
                paper_name: '2019 O/L Commerce (Paper I & II)',
                paper_url: SAMPLE_PDF,
                marking_url: SAMPLE_PDF,
                size: '2.0 MB'
            }
        ];

        // State
        let currentLevel = 'al';
        let currentMedium = 'all';
        let currentSubject = 'all';

        // Initialize
        document.addEventListener('DOMContentLoaded', () => {
            updateSubjectFilters();
            renderPapers();
        });

        function setExamLevel(level) {
            currentLevel = level;
            currentSubject = 'all';

            const tabAl = document.getElementById('tab-al');
            const tabOl = document.getElementById('tab-ol');

            if (level === 'al') {
                tabAl.className = 'px-5 py-2.5 rounded-xl text-xs sm:text-sm font-extrabold transition-all flex items-center gap-2 bg-navy-900 text-white shadow-sm';
                tabOl.className = 'px-5 py-2.5 rounded-xl text-xs sm:text-sm font-extrabold text-slate-600 hover:text-navy-950 transition-all flex items-center gap-2';
            } else {
                tabOl.className = 'px-5 py-2.5 rounded-xl text-xs sm:text-sm font-extrabold transition-all flex items-center gap-2 bg-navy-900 text-white shadow-sm';
                tabAl.className = 'px-5 py-2.5 rounded-xl text-xs sm:text-sm font-extrabold text-slate-600 hover:text-navy-950 transition-all flex items-center gap-2';
            }

            updateSubjectFilters();
            renderPapers();
        }

        function setMedium(med) {
            currentMedium = med;

            ['all', 'sinhala', 'english'].forEach(m => {
                const btn = document.getElementById(`med-${m}`);
                if (m === med) {
                    btn.className = 'px-4 py-2 rounded-xl text-xs font-bold transition-all bg-white text-navy-950 shadow-sm';
                } else {
                    btn.className = 'px-4 py-2 rounded-xl text-xs font-bold text-slate-600 hover:text-navy-950 transition-all';
                }
            });

            renderPapers();
        }

        function setSubject(sub) {
            currentSubject = sub;
            updateSubjectFilters();
            renderPapers();
        }

        function updateSubjectFilters() {
            const container = document.getElementById('subjectFilterContainer');
            let subjects = [];

            if (currentLevel === 'al') {
                subjects = [
                    { id: 'all', label: 'All Subjects (සියල්ල)' },
                    { id: 'Business Studies', label: 'Business Studies (ව්‍යාපාර අධ්‍යයනය)' },
                    { id: 'Accounting', label: 'Accounting (ගිණුම්කරණය)' },
                    { id: 'Economics', label: 'Economics (ආර්ථික විද්‍යාව)' },
                ];
            } else {
                subjects = [
                    { id: 'all', label: 'All Subjects (සියල්ල)' },
                    { id: 'Commerce', label: 'Commerce (වාණිජ)' },
                    { id: 'Mathematics', label: 'Mathematics (ගණිතය)' },
                ];
            }

            container.innerHTML = subjects.map(s => {
                const isActive = (currentSubject === s.id);
                return `
                    <button onclick="setSubject('${s.id}')"
                            class="px-3.5 py-1.5 rounded-xl text-xs font-bold whitespace-nowrap transition-all ${
                                isActive 
                                    ? 'bg-blue-600 text-white shadow-sm' 
                                    : 'bg-slate-100 hover:bg-slate-200 text-slate-600'
                            }">
                        ${s.label}
                    </button>
                `;
            }).join('');
        }

        function renderPapers() {
            const grid = document.getElementById('papersGrid');
            const empty = document.getElementById('emptyState');
            const countEl = document.getElementById('resultsCount');
            const search = document.getElementById('searchInput').value.trim().toLowerCase();
            const yearFilter = document.getElementById('yearSelect').value;

            const filtered = PAPERS.filter(p => {
                // Level filter
                if (p.level !== currentLevel) return false;

                // Medium filter
                if (currentMedium !== 'all' && p.medium !== currentMedium) return false;

                // Subject filter
                if (currentSubject !== 'all' && p.subject !== currentSubject) return false;

                // Year filter
                if (yearFilter !== 'all' && p.year !== yearFilter) return false;

                // Search query
                if (search) {
                    const matchText = `${p.year} ${p.subject} ${p.subject_si} ${p.medium} ${p.paper_name}`.toLowerCase();
                    if (!matchText.includes(search)) return false;
                }

                return true;
            });

            countEl.textContent = `Showing ${filtered.length} past paper${filtered.length === 1 ? '' : 's'}`;

            if (filtered.length === 0) {
                grid.innerHTML = '';
                empty.classList.remove('hidden');
                return;
            }

            empty.classList.add('hidden');

            grid.innerHTML = filtered.map(p => {
                const isSinhala = (p.medium === 'sinhala');
                const mediumBadge = isSinhala 
                    ? `<span class="px-2.5 py-0.5 rounded-full text-[10px] font-extrabold bg-blue-50 text-blue-700 border border-blue-200">සිංහල මාධ්‍යය</span>`
                    : `<span class="px-2.5 py-0.5 rounded-full text-[10px] font-extrabold bg-purple-50 text-purple-700 border border-purple-200">English Medium</span>`;

                return `
                    <div class="bg-white rounded-3xl p-6 border border-slate-200/90 shadow-sm hover:shadow-xl hover:border-blue-600/30 transition-all flex flex-col justify-between group">
                        
                        <div>
                            <!-- Top Info & Badges -->
                            <div class="flex items-center justify-between gap-2 mb-3">
                                <span class="px-3 py-1 bg-navy-950 text-white rounded-full text-xs font-extrabold tracking-wide">
                                    ${p.year} ${p.level.toUpperCase()}
                                </span>
                                ${mediumBadge}
                            </div>

                            <!-- Subject Title -->
                            <div class="mb-4">
                                <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block">Subject</span>
                                <h3 class="text-xl font-extrabold text-navy-950 leading-snug group-hover:text-blue-700 transition">
                                    ${p.subject_si}
                                </h3>
                                <p class="text-xs text-slate-500 font-semibold mt-0.5">${p.subject}</p>
                            </div>

                            <p class="text-xs text-slate-600 mb-6 bg-slate-50 p-3 rounded-xl border border-slate-100 flex items-center justify-between">
                                <span class="flex items-center gap-1.5 font-medium">
                                    <i data-lucide="file-text" class="w-3.5 h-3.5 text-blue-600"></i>
                                    Question Paper &amp; Marking
                                </span>
                                <span class="text-[10px] font-extrabold text-slate-400 uppercase">PDF • ${p.size}</span>
                            </p>
                        </div>

                        <!-- Action Buttons -->
                        <div class="space-y-2.5 pt-4 border-t border-slate-100">
                            <!-- Question Paper Download -->
                            <a href="${p.paper_url}" 
                               download="${p.year}_${p.subject}_Question_Paper.pdf"
                               target="_blank"
                               class="w-full py-3 px-4 bg-navy-900 hover:bg-blue-800 text-white font-bold rounded-xl transition text-xs flex items-center justify-center gap-2 shadow-sm group-hover:shadow active:scale-[0.98]">
                                <i data-lucide="download" class="w-4 h-4 text-sky-400"></i>
                                <span>Download Question Paper</span>
                            </a>

                            <!-- Marking Scheme Download -->
                            <a href="${p.marking_url}" 
                               download="${p.year}_${p.subject}_Marking_Scheme.pdf"
                               target="_blank"
                               class="w-full py-2.5 px-4 bg-slate-100 hover:bg-amber-50 hover:text-amber-900 hover:border-amber-300 border border-slate-200 text-slate-700 font-bold rounded-xl transition text-xs flex items-center justify-center gap-2 active:scale-[0.98]">
                                <i data-lucide="file-check" class="w-4 h-4 text-amber-600"></i>
                                <span>Download Marking Scheme</span>
                            </a>
                        </div>

                    </div>
                `;
            }).join('');

            lucide.createIcons();
        }
    </script>
</body>
</html>
