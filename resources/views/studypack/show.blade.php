<!DOCTYPE html>
<html lang="si">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $studyPack->title }} | Lasindu Senarath LMS</title>
<link rel="icon" type="image/jpeg" href="{{ asset('images/logo.jpeg') }}" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600;9..144,700&family=Noto+Sans+Sinhala:wght@400;500;600;700&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
  :root{
    --ink:#1B2A4A;
    --ink-soft:#3A4A6B;
    --paper:#F2EFE4;
    --card:#FBF9F2;
    --maroon:#7A1F3D;
    --maroon-deep:#5E1830;
    --gold:#C99A3B;
    --gold-deep:#A87E2A;
    --muted:#6B7280;
    --line:#E1DAC5;
    --done:#3F7A57;
    --done-bg:#E7F1EA;
  }
  *{box-sizing:border-box;}
  html{scroll-behavior:smooth;}
  body{
    margin:0;
    background:var(--paper);
    color:var(--ink);
    font-family:'Noto Sans Sinhala','Segoe UI',sans-serif;
    -webkit-font-smoothing:antialiased;
  }
  .num, .mono{ font-family:'IBM Plex Mono',monospace; }
  .display{ font-family:'Fraunces',serif; }

  /* ---------- Top Portal Bar ---------- */
  .portal-nav{
    max-width:920px;
    margin:0 auto;
    padding:0 0 24px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    flex-wrap:wrap;
    gap:10px;
  }
  .portal-nav a{
    display:inline-flex;
    align-items:center;
    gap:8px;
    color:#CBD3E1;
    text-decoration:none;
    font-family:'IBM Plex Mono',monospace;
    font-size:12px;
    letter-spacing:.05em;
    padding:6px 12px;
    border-radius:8px;
    background:rgba(255,255,255,0.06);
    border:1px solid rgba(255,255,255,0.12);
    transition:all .15s ease;
  }
  .portal-nav a:hover{
    color:#fff;
    background:rgba(255,255,255,0.12);
  }
  .enrolled-badge{
    font-family:'IBM Plex Mono',monospace;
    font-size:11px;
    color:var(--gold);
    border:1px solid rgba(201,154,59,0.4);
    padding:4px 10px;
    border-radius:999px;
    letter-spacing:.05em;
  }

  /* ---------- Hero ---------- */
  header.hero{
    position:relative;
    background:var(--ink);
    color:#F2EFE4;
    padding:40px 20px 40px;
    overflow:hidden;
  }
  header.hero::before{
    content:"";
    position:absolute; inset:0;
    background-image:
      repeating-linear-gradient(90deg, rgba(242,239,228,0.035) 0px, rgba(242,239,228,0.035) 1px, transparent 1px, transparent 64px);
    pointer-events:none;
  }
  .hero-inner{ max-width:920px; margin:0 auto; position:relative; }
  .eyebrow{
    display:inline-flex; align-items:center; gap:8px;
    font-family:'IBM Plex Mono',monospace;
    font-size:12px; letter-spacing:.12em; text-transform:uppercase;
    color:var(--gold);
    border:1px solid rgba(201,154,59,0.5);
    padding:5px 12px; border-radius:999px;
    margin-bottom:22px;
  }
  .eyebrow::before{ content:"●"; font-size:8px; color:var(--gold); }
  h1.title{
    font-family:'Fraunces',serif;
    font-weight:600;
    font-size:clamp(30px,5vw,46px);
    line-height:1.18;
    margin:0 0 14px;
    max-width:14ch;
  }
  p.subtitle{
    font-size:16px; line-height:1.7;
    color:#CBD3E1;
    max-width:56ch;
    margin:0 0 30px;
  }
  .stat-row{
    display:flex; flex-wrap:wrap; gap:0;
    border-top:1px solid rgba(242,239,228,0.18);
    margin-top:8px;
  }
  .stat{
    padding:18px 26px 0 0;
    margin-right:26px;
    border-right:1px solid rgba(242,239,228,0.18);
  }
  .stat:last-child{ border-right:none; }
  .stat .n{
    font-family:'Fraunces',serif; font-weight:600;
    font-size:30px; color:#fff; display:block;
  }
  .stat .l{ font-size:12.5px; color:#A9B3C6; margin-top:2px; }

  /* ---------- Controls ---------- */
  .controls{
    position:sticky; top:0; z-index:20;
    background:var(--paper);
    border-bottom:1px solid var(--line);
    padding:14px 20px;
  }
  .controls-inner{
    max-width:920px; margin:0 auto;
    display:flex; gap:12px; align-items:center; flex-wrap:wrap;
  }
  .tabs{
    display:flex; background:#fff; border:1px solid var(--line);
    border-radius:10px; padding:3px; gap:2px;
  }
  .tab-btn{
    font-family:'IBM Plex Mono',monospace;
    font-size:13px; font-weight:500;
    border:none; background:transparent; color:var(--ink-soft);
    padding:9px 16px; border-radius:7px; cursor:pointer;
    transition:background .15s, color .15s;
  }
  .tab-btn.active{ background:var(--ink); color:#fff; }
  .search-wrap{ flex:1; min-width:180px; position:relative; }
  .search-wrap input{
    width:100%;
    font-family:'Noto Sans Sinhala',sans-serif;
    font-size:14.5px;
    padding:10px 14px 10px 38px;
    border-radius:10px; border:1px solid var(--line);
    background:#fff; color:var(--ink);
    outline:none;
  }
  .search-wrap input:focus{ border-color:var(--maroon); }
  .search-wrap::before{
    content:"⌕";
    position:absolute; left:13px; top:50%; transform:translateY(-50%);
    color:var(--muted); font-size:16px;
  }
  .progress-pill{
    font-family:'IBM Plex Mono',monospace; font-size:12.5px;
    color:var(--muted); white-space:nowrap; padding:0 4px;
  }
  .progress-pill b{ color:var(--done); }

  /* ---------- Content ---------- */
  main{ max-width:920px; margin:0 auto; padding:34px 20px 80px; }
  .grade-note{
    font-size:13px; color:var(--muted); margin:0 0 24px;
    font-family:'IBM Plex Mono',monospace;
  }
  .topic{
    background:var(--card);
    border:1px solid var(--line);
    border-left:4px solid var(--maroon);
    border-radius:10px;
    margin-bottom:16px;
    overflow:hidden;
  }
  .topic-head{
    display:flex; align-items:flex-start; gap:16px;
    padding:18px 20px;
    cursor:pointer;
    user-select:none;
  }
  .topic-num{
    font-family:'Fraunces',serif; font-weight:600;
    font-size:26px; color:var(--maroon);
    min-width:46px;
    line-height:1;
    padding-top:2px;
  }
  .topic-num::before{ content:"["; color:var(--gold); margin-right:1px; }
  .topic-num::after{ content:"]"; color:var(--gold); margin-left:1px; }
  .topic-main{ flex:1; }
  .topic-title{
    font-size:15.5px; font-weight:600; line-height:1.5; color:var(--ink);
  }
  .topic-meta{
    font-family:'IBM Plex Mono',monospace; font-size:11.5px;
    color:var(--muted); margin-top:6px; letter-spacing:.02em;
  }
  .chevron{
    font-size:18px; color:var(--muted); transition:transform .2s;
    margin-top:4px;
  }
  .topic.open .chevron{ transform:rotate(90deg); color:var(--maroon); }

  .sub-list{ display:none; border-top:1px solid var(--line); }
  .topic.open .sub-list{ display:block; }
  .sub-row{
    display:flex; align-items:flex-start; gap:14px;
    padding:14px 20px;
    border-top:1px solid var(--line);
    transition:background-color .15s;
  }
  .sub-row:hover{
    background-color:rgba(201,154,59,0.06);
  }
  .sub-row:first-child{ border-top:none; }
  .sub-check{
    margin-top:3px; width:17px; height:17px; flex:none;
    accent-color:var(--done);
    cursor:pointer;
  }
  .sub-num{
    font-family:'IBM Plex Mono',monospace; font-size:13px;
    color:var(--maroon-deep); font-weight:500;
    min-width:40px; padding-top:1px;
  }
  .sub-desc{ flex:1; font-size:14.5px; line-height:1.6; color:var(--ink-soft); }
  .sub-row.done .sub-desc{ color:var(--muted); text-decoration:line-through; text-decoration-color:var(--line); }
  .watch-btn{
    flex:none; display:inline-flex; align-items:center; gap:6px;
    font-family:'IBM Plex Mono',monospace; font-size:12px; font-weight:500;
    padding:7px 13px; border-radius:7px; text-decoration:none;
    white-space:nowrap;
    cursor:pointer;
    transition:background .15s, transform .1s;
  }
  .watch-btn:active{ transform:scale(0.97); }
  .watch-btn.ready{
    background:var(--gold); color:var(--ink);
    font-weight:600;
    box-shadow:0 2px 6px rgba(201,154,59,0.25);
  }
  .watch-btn.ready:hover{ background:var(--gold-deep); color:#fff; }
  .watch-btn.soon{
    background:transparent; color:var(--muted);
    border:1px dashed var(--line); cursor:default;
  }

  mark{ background:rgba(201,154,59,0.35); color:inherit; border-radius:2px; }
  .no-results{
    text-align:center; padding:60px 20px; color:var(--muted);
    font-family:'IBM Plex Mono',monospace; font-size:13.5px;
  }

  footer{
    text-align:center; padding:30px 20px 50px;
    color:var(--muted); font-size:12.5px;
    font-family:'IBM Plex Mono',monospace;
  }

  /* ---------- Video Modal ---------- */
  .modal-overlay{
    position:fixed; inset:0; z-index:9999;
    background:rgba(6, 19, 37, 0.85);
    backdrop-filter:blur(6px);
    display:none;
    align-items:center;
    justify-content:center;
    padding:16px;
  }
  .modal-overlay.active{ display:flex; }
  .modal-card{
    background:#1B2A4A;
    border:1px solid rgba(201,154,59,0.4);
    border-radius:18px;
    width:100%; max-width:880px;
    overflow:hidden;
    box-shadow:0 25px 60px -15px rgba(0,0,0,0.6);
    display:flex; flex-direction:column;
    animation:modalPop .25s cubic-bezier(0.16, 1, 0.3, 1);
  }
  @keyframes modalPop{
    from{ opacity:0; transform:scale(0.95); }
    to{ opacity:1; transform:scale(1); }
  }
  .modal-header{
    display:flex; align-items:center; justify-content:space-between;
    padding:14px 20px;
    background:#111F38;
    border-bottom:1px solid rgba(255,255,255,0.08);
    gap:12px;
  }
  .modal-badge{
    font-family:'IBM Plex Mono',monospace; font-size:12px; font-weight:600;
    background:var(--gold); color:var(--ink);
    padding:3px 9px; border-radius:6px; flex-shrink:0;
  }
  .modal-title{
    color:#fff; font-size:14px; font-weight:600;
    flex:1; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;
  }
  .modal-actions{ display:flex; align-items:center; gap:8px; flex-shrink:0; }
  .yt-link-btn{
    font-family:'IBM Plex Mono',monospace; font-size:11.5px;
    color:#CBD3E1; text-decoration:none;
    padding:5px 10px; border-radius:6px;
    background:rgba(255,255,255,0.07);
    border:1px solid rgba(255,255,255,0.12);
    transition:all .15s;
  }
  .yt-link-btn:hover{ color:#fff; background:rgba(255,255,255,0.15); }
  .modal-close-btn{
    background:rgba(255,255,255,0.1); border:none;
    color:#fff; width:30px; height:30px; border-radius:8px;
    cursor:pointer; font-size:16px; line-height:1;
    display:flex; align-items:center; justify-content:center;
    transition:background .15s;
  }
  .modal-close-btn:hover{ background:rgba(255,255,255,0.22); }
  .video-frame-wrap{
    position:relative; width:100%; padding-bottom:56.25%;
    background:#000;
  }
  .video-frame-wrap iframe{
    position:absolute; inset:0; width:100%; height:100%; border:none;
  }

  @media (max-width:560px){
    .stat{ padding-right:0; margin-right:18px; }
    .topic-num{ font-size:22px; min-width:40px; }
    .watch-btn span.label{ display:none; }
  }
</style>
</head>
<body>

<header class="hero">
  <div class="hero-inner">
    
    <!-- Portal Navigation Bar -->
    <div class="portal-nav">
      <a href="{{ route('dashboard') }}">
        ← Dashboard වෙත ආපසු
      </a>
      <span class="enrolled-badge">
        ✓ Enrolled & Active Study Pack
      </span>
    </div>

    <div class="eyebrow">{{ $studyPack->subtitle ?: 'NIE විෂය නිර්දේශය — ' . $studyPack->grade }}</div>
    <h1 class="title">{{ $studyPack->title }}</h1>
    <p class="subtitle">{{ $studyPack->description ?: 'නිපුණතා මට්ටම අනුව සකසන ලද වීඩියෝ පාඩම් එකතුවකි. ඔබට අවශ්‍ය නිපුණතා මට්ටමට අදාළ පාඩම සොයාගෙන කෙළින්ම නරඹන්න.' }}</p>
    <div class="stat-row">
      <div class="stat"><span class="n num">{{ $studyPack->topics_count }}</span><span class="l">නිපුණතා (මාතෘකා)</span></div>
      <div class="stat"><span class="n num">{{ $studyPack->subtopics_count }}</span><span class="l">නිපුණතා මට්ටම් (උප මාතෘකා)</span></div>
      <div class="stat"><span class="n num" id="readyCount">0</span><span class="l">දැනට නරඹිය හැකි වීඩියෝ</span></div>
    </div>
  </div>
</header>

<div class="controls">
  <div class="controls-inner">
    <div class="tabs" role="tablist">
      <button class="tab-btn active" data-grade="g12">12 ශ්‍රේණිය</button>
      <button class="tab-btn" data-grade="g13">13 ශ්‍රේණිය</button>
    </div>
    <div class="search-wrap">
      <input type="text" id="searchBox" placeholder="මාතෘකාවක් හෝ අංකයක් සොයන්න... (උදා: 7.2)">
    </div>
    <div class="progress-pill" id="progressPill"></div>
  </div>
</div>

<main>
  <p class="grade-note" id="gradeNote"></p>
  <div id="content"></div>
  <div class="no-results" id="noResults" style="display:none;">ගැලපෙන ප්‍රතිඵල හමු නොවීය</div>
</main>

<footer>Lakro Global Holdings · Nova Pro — Business Studies Video Series • Lasindu Senarath LMS</footer>

<!-- ==========================================
     BUILT-IN RESPONSIVE VIDEO PLAYER MODAL
========================================== -->
<div id="videoModal" class="modal-overlay" aria-hidden="true">
  <div class="modal-card">
    <div class="modal-header">
      <span id="modalNum" class="modal-badge">1.1</span>
      <span id="modalTitle" class="modal-title">වීඩියෝ පාඩම</span>
      <div class="modal-actions">
        <a id="modalYtLink" href="#" target="_blank" rel="noopener" class="yt-link-btn">
          YouTube වෙතින් ↗
        </a>
        <button onclick="closeVideoModal()" class="modal-close-btn" title="Close (Esc)">✕</button>
      </div>
    </div>
    <div class="video-frame-wrap">
      <iframe id="modalIframe" src="" title="Video Player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>
  </div>
</div>

<script>
const DATA = @json($studyPack->curriculum_data ?? ['g12' => [], 'g13' => []]);
if (!DATA.g12) DATA.g12 = [];
if (!DATA.g13) DATA.g13 = [];

const STORAGE_KEY = 'sp-watched-{{ $studyPack->id }}';
function getWatched(){
  try { return JSON.parse(localStorage.getItem(STORAGE_KEY)) || {}; }
  catch(e){ return {}; }
}
function setWatched(map){
  try { localStorage.setItem(STORAGE_KEY, JSON.stringify(map)); } catch(e){}
}

let currentGrade = 'g12';
let watched = getWatched();

const contentEl = document.getElementById('content');
const noResultsEl = document.getElementById('noResults');
const gradeNoteEl = document.getElementById('gradeNote');
const progressPillEl = document.getElementById('progressPill');
const readyCountEl = document.getElementById('readyCount');

function countReady(){
  let n = 0;
  ['g12','g13'].forEach(g => DATA[g].forEach(t => t.subs.forEach(s => { if(s.url) n++; })));
  return n;
}
readyCountEl.textContent = countReady();

function escapeHtml(str){
  return str.replace(/[&<>"']/g, c => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[c]));
}

function highlight(text, q){
  if(!q) return escapeHtml(text);
  const esc = escapeHtml(text);
  const escQ = escapeHtml(q);
  const idx = esc.toLowerCase().indexOf(escQ.toLowerCase());
  if(idx === -1) return esc;
  return esc.slice(0,idx) + '<mark>' + esc.slice(idx, idx+escQ.length) + '</mark>' + esc.slice(idx+escQ.length);
}

// Convert normal YouTube URL (watch?v=, youtu.be/) to embeddable URL
function getYouTubeEmbedUrl(url) {
  if (!url) return '';
  const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
  const match = url.match(regExp);
  if (match && match[2].length === 11) {
    return 'https://www.youtube.com/embed/' + match[2] + '?autoplay=1&rel=0';
  }
  return url;
}

function openVideoModal(e, url, num, desc) {
  if (e) e.preventDefault();
  const modal = document.getElementById('videoModal');
  const iframe = document.getElementById('modalIframe');
  const title = document.getElementById('modalTitle');
  const numEl = document.getElementById('modalNum');
  const ytLink = document.getElementById('modalYtLink');

  if (!modal || !iframe) return;

  numEl.textContent = num;
  title.textContent = desc;
  ytLink.href = url;
  iframe.src = getYouTubeEmbedUrl(url);

  modal.classList.add('active');
  document.body.style.overflow = 'hidden';
}

function closeVideoModal() {
  const modal = document.getElementById('videoModal');
  const iframe = document.getElementById('modalIframe');
  if (!modal || !iframe) return;

  iframe.src = '';
  modal.classList.remove('active');
  document.body.style.overflow = '';
}

document.addEventListener('keydown', (e) => {
  if (e.key === 'Escape') closeVideoModal();
});

document.getElementById('videoModal')?.addEventListener('click', (e) => {
  if (e.target.id === 'videoModal') closeVideoModal();
});

function render(){
  const q = document.getElementById('searchBox').value.trim().toLowerCase();
  const topics = DATA[currentGrade];
  const gradeLabel = currentGrade === 'g12' ? '12 ශ්‍රේණිය' : '13 ශ්‍රේණිය';
  const topicRange = currentGrade === 'g12' ? '1–11' : '12–18';
  const subCount = currentGrade === 'g12' ? 53 : 63;
  gradeNoteEl.textContent = gradeLabel + ' — නිපුණතා ' + topicRange + ' (මට්ටම් ' + subCount + ')';

  let html = '';
  let anyMatch = false;
  let visibleSubsTotal = 0, visibleSubsDone = 0;

  topics.forEach(topic => {
    const subsMatched = topic.subs.filter(s =>
      !q || s.desc.toLowerCase().includes(q) || s.num.includes(q) || topic.title.toLowerCase().includes(q)
    );
    if(subsMatched.length === 0) return;
    anyMatch = true;
    const openClass = q ? 'open' : '';

    let subsHtml = '';
    subsMatched.forEach(s => {
      const isDone = !!watched[s.num];
      visibleSubsTotal++;
      if(isDone) visibleSubsDone++;
      const btn = s.url
        ? `<a class="watch-btn ready" href="${escapeHtml(s.url)}" onclick="openVideoModal(event, '${escapeHtml(s.url)}', '${s.num}', '${escapeHtml(s.desc)}')" target="_blank" rel="noopener">▶ <span class="label">නරඹන්න</span></a>`
        : `<span class="watch-btn soon">⏱ <span class="label">ළඟදීම</span></span>`;
      subsHtml += `
        <div class="sub-row ${isDone ? 'done':''}">
          <input type="checkbox" class="sub-check" data-num="${s.num}" ${isDone?'checked':''}>
          <div class="sub-num">${s.num}</div>
          <div class="sub-desc">${highlight(s.desc, q)}</div>
          ${btn}
        </div>`;
    });

    html += `
      <div class="topic ${openClass}" data-topic="${topic.num}">
        <div class="topic-head">
          <div class="topic-num">${String(topic.num).padStart(2,'0')}</div>
          <div class="topic-main">
            <div class="topic-title">${highlight(topic.title, q)}</div>
            <div class="topic-meta">නිපුණතා මට්ටම් ${topic.subs.length}ක්</div>
          </div>
          <div class="chevron">›</div>
        </div>
        <div class="sub-list">${subsHtml}</div>
      </div>`;
  });

  contentEl.innerHTML = html;
  noResultsEl.style.display = anyMatch ? 'none' : 'block';

  // total progress across current grade (unfiltered)
  let total = 0, done = 0;
  topics.forEach(t => t.subs.forEach(s => { total++; if(watched[s.num]) done++; }));
  progressPillEl.innerHTML = 'නරඹා ඇත: <b>' + done + '</b> / ' + total;

  attachHandlers();
}

function attachHandlers(){
  document.querySelectorAll('.topic-head').forEach(el => {
    el.addEventListener('click', () => {
      el.parentElement.classList.toggle('open');
    });
  });
  document.querySelectorAll('.sub-check').forEach(el => {
    el.addEventListener('click', (e) => {
      e.stopPropagation();
      const num = el.dataset.num;
      watched[num] = el.checked;
      setWatched(watched);
      render();
    });
  });
}

document.querySelectorAll('.tab-btn').forEach(btn => {
  btn.addEventListener('click', () => {
    document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    currentGrade = btn.dataset.grade;
    render();
  });
});

document.getElementById('searchBox').addEventListener('input', render);

render();
</script>

</body>
</html>
