<!DOCTYPE html>
<html lang="si">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>AtoZ - Lasindu Senarath</title>
  <link rel="icon" type="image/jpeg" href="{{ asset('images/logo.jpeg') }}" />
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700,800,900" rel="stylesheet" />

  <style>
    /* ---------------- Design tokens (Royal Blue + White Modern) ---------------- */
    :root {
      --bg-deep: #001a4d;      /* Deep Royal Navy */
      --bg-bright: #002366;    /* Classic Royal Blue */
      --surface: rgba(255, 255, 255, 0.08);
      --glass: rgba(255, 255, 255, 0.05);
      --text: #ffffff;
      --muted: #cbd5e1;

      --accent-primary: #ffffff;     /* White */
      --accent-secondary: #00d4ff;   /* Electric Cyan for accents */

      --shadow-sm: 0 6px 18px rgba(0, 0, 0, 0.2);
      --shadow-md: 0 16px 40px rgba(0, 0, 0, 0.4);
      --shadow-strong: 0 30px 80px rgba(0, 0, 0, 0.6);

      --radius-lg: 24px;
      --radius-md: 14px;
      --glass-blur: 16px;
      --transition: 420ms cubic-bezier(.2, .9, .3, 1);
    }

    /* ---------------- Global Reset ---------------- */
    * { box-sizing: border-box; margin: 0; padding: 0; -webkit-font-smoothing: antialiased; }
    html, body { 
      height: 100%; 
      font-family: 'Instrument Sans', sans-serif; 
      color: var(--text); 
      background: var(--bg-deep);
      background-attachment: fixed;
      overflow-x: hidden;
    }
    
    /* Radial Glow Background Effect */
    body::before {
      content: "";
      position: fixed;
      top: 0; left: 0; width: 100%; height: 100%;
      background: radial-gradient(circle at 80% 20%, #003399 0%, transparent 50%),
                  radial-gradient(circle at 20% 80%, #001133 0%, transparent 50%);
      z-index: -1;
    }

    img { display: block; max-width: 100%; height: auto; }
    a { color: inherit; text-decoration: none; transition: var(--transition); }
    button { font-family: inherit; }

    /* ---------------- Navigation ---------------- */
    nav {
      position: fixed; top: 12px; left: 50%; transform: translateX(-50%); width: calc(100% - 48px);
      max-width: 1200px; z-index: 1200;
      border-radius: 16px; padding: 10px 18px;
      background: rgba(255, 255, 255, 0.05);
      backdrop-filter: blur(var(--glass-blur));
      border: 1px solid rgba(255, 255, 255, 0.1);
      box-shadow: var(--shadow-sm);
    }

    nav .container { display: flex; align-items: center; justify-content: space-between; gap: 12px; }
    .logo { display: flex; align-items: center; gap: 12px; }
    .logo img { width: 44px; height: 44px; border-radius: 50%; border: 2px solid rgba(255,255,255,0.2); }
    .logo span { font-weight: 800; color: var(--accent-primary); font-size: 1.1rem; letter-spacing: -0.5px; }

    nav ul { display: flex; gap: 8px; align-items: center; list-style: none; }
    nav ul li a { padding: 8px 16px; border-radius: 10px; font-weight: 600; font-size: 0.95rem; }
    nav ul li a:hover { background: rgba(255, 255, 255, 0.1); color: var(--accent-secondary); }

    .nav-toggle { display: none; background: none; border: 0; color: white; cursor: pointer; }

    /* ---------------- Hero Section ---------------- */
    .hero {
      margin-top: 100px;
      padding: 60px 22px;
      max-width: 1200px; margin-left: auto; margin-right: auto;
      perspective: 2000px;
    }
    .hero-inner { display: grid; grid-template-columns: 1fr 520px; gap: 40px; align-items: center; }

    .card-hero {
      background: rgba(255, 255, 255, 0.06);
      padding: 45px; border-radius: var(--radius-lg);
      box-shadow: var(--shadow-strong);
      border: 1px solid rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(20px);
      transform-style: preserve-3d;
    }

    .hero-subtitle { font-weight: 800; color: var(--accent-secondary); letter-spacing: 0.2em; font-size: .8rem; margin-bottom: 12px; }
    .hero-title { font-size: 3.8rem; font-weight: 900; color: var(--accent-primary); line-height: 1; margin-bottom: 8px; text-shadow: 0 10px 30px rgba(0,0,0,0.3); }
    .hero-name { font-size: 2.2rem; font-weight: 700; opacity: 0.9; margin-bottom: 15px; }
    .hero-description { color: var(--muted); font-weight: 500; font-size: 1.1rem; line-height: 1.6; margin-bottom: 25px; }

    .badge {
      background: rgba(255, 255, 255, 0.08); 
      padding: 8px 16px; border-radius: 999px; font-weight: 700; font-size: 0.85rem;
      border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .btn-primary { 
      background: #ffffff; color: #001a4d; 
      padding: 14px 28px; border-radius: 14px; font-weight: 800;
      box-shadow: 0 10px 25px rgba(255,255,255,0.2);
    }
    .btn-primary:hover { transform: translateY(-3px); box-shadow: 0 15px 30px rgba(255,255,255,0.3); }

    /* ---------------- 3D Stage ---------------- */
    .hero-stage {
      position: relative; height: 500px; display: flex; align-items: center; justify-content: center;
      transform-style: preserve-3d;
    }

    .hero-image-wrap { position: relative; width: 440px; transform-style: preserve-3d; z-index: 10; }
    .hero-image {
      border-radius: 24px; overflow: hidden; 
      border: 1px solid rgba(255, 255, 255, 0.2);
      box-shadow: 0 60px 100px rgba(0, 0, 0, 0.5);
      background: #000;
    }

    .hero-bg-number {
      position: absolute; bottom: -20px; left: -20px; font-size: 120px; font-weight: 900; 
      color: rgba(255, 255, 255, 0.03); transform: translateZ(-100px);
    }

    .stats-badge {
      position: absolute; right: -20px; bottom: 40px; z-index: 20; transform: translateZ(50px);
    }
    .stats-badge .icon {
      width: 70px; height: 70px; border-radius: 50%; display: flex; flex-direction: column;
      align-items: center; justify-content: center;
      background: #ffffff; color: #001a4d; font-weight: 900; 
      box-shadow: 0 20px 40px rgba(0,0,0,0.3);
    }

    /* ---------------- Sections ---------------- */
    section { max-width: 1200px; margin: 0 auto; padding: 80px 22px; }
    .section-title { font-size: 2.5rem; font-weight: 900; margin-bottom: 25px; }
    
    .about-text, .feature-card, .institute-card, .stat-card, .feedback-panel {
      background: rgba(255, 255, 255, 0.04);
      border: 1px solid rgba(255, 255, 255, 0.08);
      backdrop-filter: blur(var(--glass-blur));
      border-radius: var(--radius-md);
      padding: 25px;
    }

    .feature-card { border-left: 5px solid var(--accent-secondary); }
    .stat-number { font-size: 2.5rem; font-weight: 900; color: var(--accent-secondary); }

    /* ---------------- Forms ---------------- */
    .feedback-grid input, .feedback-grid textarea {
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(255, 255, 255, 0.1);
      color: white; padding: 14px; border-radius: 10px;
    }
    .feedback-grid input:focus { border-color: var(--accent-secondary); outline: none; }
    .feedback-grid button { background: white; color: #001a4d; font-weight: 800; border-radius: 10px; }

    /* ---------------- Gallery ---------------- */
    .gallery-item {
      background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);
      height: 120px; border-radius: var(--radius-md); display: flex; align-items: center; justify-content: center;
      font-weight: 800; color: var(--accent-secondary);
    }

    /* ---------------- Footer ---------------- */
    footer { background: #000a1a; padding: 60px 22px; border-top: 1px solid rgba(255,255,255,0.05); }
    .footer-section h3 { color: var(--accent-secondary); margin-bottom: 15px; }
    .float-wa { 
      position: fixed; bottom: 30px; right: 30px; width: 65px; height: 65px; 
      background: #25D366; border-radius: 50%; display: flex; align-items: center; justify-content: center;
      box-shadow: 0 15px 30px rgba(37, 211, 102, 0.3); z-index: 1000;
    }

    /* ---------------- Animations ---------------- */
    .fadeInUp { opacity: 0; transform: translateY(30px); transition: 0.8s ease-out; }
    .in-view { opacity: 1; transform: translateY(0); }

    @media (max-width: 980px) {
      .hero-inner { grid-template-columns: 1fr; text-align: center; }
      .hero-title { font-size: 2.8rem; }
      .badges, .hero-actions { justify-content: center; }
      .hero-image-wrap { width: 100%; max-width: 380px; }
      nav ul { display: none; }
      .nav-toggle { display: block; }
    }
  </style>
</head>

<body>
  <nav>
    <div class="container">
      <a class="logo" href="#">
        <img src="{{ asset('images/logo.jpeg') }}" alt="AtoZ" />
        <span>AtoZbusiness.lk</span>
      </a>
      <button class="nav-toggle" id="navToggle">
        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
      </button>
      <ul id="mainNav">
        <li><a href="#home">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#institutes">Feedback</a></li>
        <li><a href="{{ route('login') }}" style="background: white; color: #001a4d;">Login</a></li>
      </ul>
    </div>
  </nav>

  <main class="hero" id="home">
    <div class="hero-inner">
      <div class="card-hero fadeInUp">
        <div class="hero-subtitle">ADVANCED LEVEL BUSINESS STUDIES</div>
        <h1 class="hero-title">Lasindu Kavinda</h1>
        <h2 class="hero-name">Senarath</h2>
        <p class="hero-description">
          BBA(Hons) Specialized in Marketing Management (SLIIT)<br>
          Reading Master Of Business Administration (SJP)
        </p>
        <div class="badges">
          <div class="badge">ශිල්ප - හොරණ</div>
          <div class="badge">රොටරි - නුගේගොඩ</div>
          <div class="badge">Online - ලංකාවටම</div>
        </div>
        <div class="hero-actions" style="margin-top: 30px;">
          <a href="{{ route('login') }}" class="btn btn-primary">Student Login →</a>
        </div>
      </div>

      <div class="hero-stage">
        <div class="hero-image-wrap" id="heroImageCard">
          <div class="hero-bg-number">837</div>
          <div class="hero-image">
            <img src="{{ asset('images/lasindu1.jpeg') }}" alt="Lasindu Senarath" />
          </div>
          <div class="stats-badge">
            <div class="icon">
              <span>10+</span>
              <small style="font-size: 10px; font-weight: 700;">DISTRICT RANKS</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <section id="about">
    <div class="section-subtitle" style="color: var(--accent-secondary); font-weight: 800; letter-spacing: 2px;">WHO WE ARE</div>
    <h2 class="section-title">About Lasindu Senarath</h2>
    <div style="display: grid; grid-template-columns: 1fr 400px; gap: 30px;" class="about-grid-mobile">
      <div class="about-text fadeInUp">
        <p style="line-height: 1.8; font-size: 1.05rem;">
          Ada Derana Education නාලිකාවේ දේශකවරයෙකි. ශ්‍රි ලංකා තොරතුරු තාක්ෂණ විශ්වවිද්‍යාලයෙන් (SLIIT) අලෙවි කළමනාකරණ විශේෂ උපාධිය සම්පූර්ණ කර ඇත. 
          ශ්‍රී ජයවර්ධනපුර විශ්ව විද්‍යාලයේ (SJP) ව්‍යාපාර පරිපාලන පශ්චාත් උපාධිය හදාරමින් සිටී. 
          Lakro Global Holdings හි නිර්මාතෘවරයා වන මොහු, වසර ගණනාවක පළපුරුද්ද සහිතව සිසුන් දහස් ගණනකට A/B සාමාර්ථ සඳහා මඟපෙන්වූ ප්‍රමුඛ පෙළේ තරුණ ගුරුවරයෙකි.
        </p>
      </div>
      <div style="display: flex; flex-direction: column; gap: 15px;">
        <div class="feature-card fadeInUp"><strong>විශිෂ්ට අධ්‍යාපන සුදුසුකම්</strong></div>
        <div class="feature-card fadeInUp"><strong>වසර ගණනාවක පළපුරුද්ද</strong></div>
        <div class="feature-card fadeInUp"><strong>නවීන ඩිජිටල් ඉගැන්වීම් ක්‍රම</strong></div>
      </div>
    </div>
  </section>

  <section id="institutes">
    <h2 class="section-title">Student Feedback</h2>
    <div class="feedback-panel fadeInUp">
        <form action="{{ route('feedbackstore') }}" method="POST">
            @csrf
            <div class="feedback-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Email Address" required>
                <input type="text" name="phone_number" placeholder="Phone Number" required style="grid-column: span 2;">
                <textarea name="message" placeholder="Share your experience..." required style="grid-column: span 2; height: 120px;"></textarea>
                <button type="submit" style="grid-column: span 2; padding: 15px; cursor: pointer; border: none;">Submit Feedback</button>
            </div>
        </form>
    </div>

    <div style="margin-top: 50px; display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px;">
        <div class="stat-card fadeInUp" style="text-align: center;">
            <div class="stat-number">4500+</div>
            <div style="font-weight: 700;">A/B Results</div>
        </div>
        <div class="stat-card fadeInUp" style="text-align: center;">
            <div class="stat-number">837</div>
            <div style="font-weight: 700;">Island Ranks</div>
        </div>
        <div class="stat-card fadeInUp" style="text-align: center;">
            <div class="stat-number">20+</div>
            <div style="font-weight: 700;">Years Journey</div>
        </div>
    </div>
  </section>

  <footer>
    <div style="max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 40px;">
      <div class="footer-section">
        <h3>Lasindu Senarath</h3>
        <p>Providing excellence in Business Studies education across Sri Lanka.</p>
      </div>
      <div class="footer-section">
        <h3>Contact</h3>
        <p>📞 +94 70 487 0565</p>
        <p>✉️ info@atozbusiness.lk</p>
      </div>
      <div class="footer-section">
        <h3>Follow Us</h3>
        <div style="display: flex; gap: 15px; margin-top: 10px;">
            <a href="#">FB</a> <a href="#">YT</a> <a href="#">TG</a> <a href="#">WA</a>
        </div>
      </div>
    </div>
    <div style="text-align: center; margin-top: 50px; opacity: 0.5; font-size: 0.9rem;">
        &copy; 2026 atozbusiness.lk | Designed by Pramuditha Bandara
    </div>
  </footer>

  <a class="float-wa" href="https://wa.me/94704870565" target="_blank">
    <svg width="35" height="35" viewBox="0 0 24 24" fill="white"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.414 0 0 5.414 0 12.05c0 2.123.552 4.197 1.603 6.02L0 24l6.135-1.61a11.8 11.8 0 005.911 1.603h.005c6.634 0 12.048-5.414 12.048-12.05a11.778 11.778 0 00-3.489-8.412z"/></svg>
  </a>

  <script>
    // Smooth scroll
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        const href = this.getAttribute('href');
        if (!href.startsWith('#')) return;
        e.preventDefault();
        const target = document.querySelector(href);
        if (target) target.scrollIntoView({ behavior: 'smooth' });
      });
    });

    // 3D Tilt Effect
    const card = document.getElementById('heroImageCard');
    if (card) {
        document.addEventListener('mousemove', (e) => {
            const xAxis = (window.innerWidth / 2 - e.pageX) / 25;
            const yAxis = (window.innerHeight / 2 - e.pageY) / 25;
            card.style.transform = `rotateY(${xAxis}deg) rotateX(${yAxis}deg)`;
        });
    }

    // Scroll Reveal
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) entry.target.classList.add('in-view');
      });
    }, { threshold: 0.1 });

    document.querySelectorAll('.fadeInUp').forEach(el => observer.observe(el));

    // Mobile Nav
    const toggle = document.getElementById('navToggle');
    const nav = document.getElementById('mainNav');
    toggle.addEventListener('click', () => {
        nav.style.display = nav.style.display === 'flex' ? 'none' : 'flex';
        nav.style.flexDirection = 'column';
        nav.style.position = 'absolute';
        nav.style.top = '60px';
        nav.style.width = '100%';
        nav.style.background = 'rgba(0,26,77,0.95)';
    });
  </script>
</body>
</html>