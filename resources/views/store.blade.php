<!DOCTYPE html>
<html lang="si">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Store - AtoZbusiness.lk</title>
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

    /* ---------------- Navigation (Oyage parana eka) ---------------- */
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

    /* ---------------- Store Specific CSS ---------------- */
    .store-header {
      margin-top: 120px;
      text-align: center;
      padding: 40px 20px;
    }
    .store-title {
      font-size: 3rem;
      font-weight: 900;
      color: var(--accent-primary);
      margin-bottom: 10px;
      text-shadow: 0 10px 30px rgba(0,0,0,0.3);
    }
    .store-subtitle {
      color: var(--muted);
      font-size: 1.1rem;
    }

    .store-container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
      gap: 30px;
      padding-bottom: 80px;
    }

    .product-card {
      background: rgba(255, 255, 255, 0.06);
      border: 1px solid rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(16px);
      border-radius: var(--radius-md);
      padding: 20px;
      text-align: center;
      transition: all 0.3s ease;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .product-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 20px 40px rgba(0,0,0,0.4);
      border-color: rgba(255, 255, 255, 0.3);
    }

    .product-img {
      width: 100%;
      height: 280px;
      object-fit: cover;
      border-radius: 10px;
      margin-bottom: 15px;
      box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }

    .product-category {
      font-size: 0.8rem;
      color: var(--accent-secondary);
      text-transform: uppercase;
      font-weight: 700;
      letter-spacing: 1px;
      margin-bottom: 5px;
    }

    .product-title {
      font-size: 1.25rem;
      font-weight: 700;
      color: var(--text);
      margin-bottom: 10px;
      line-height: 1.3;
    }

    .product-price {
      font-size: 1.4rem;
      font-weight: 900;
      margin-bottom: 20px;
    }

    .btn-buy {
      background: var(--accent-primary);
      color: var(--bg-deep);
      padding: 12px 20px;
      border: none;
      border-radius: 10px;
      font-weight: 800;
      font-size: 1rem;
      cursor: pointer;
      transition: all 0.3s ease;
      width: 100%;
    }

    .btn-buy:hover {
      background: var(--accent-secondary);
      color: #000;
      box-shadow: 0 8px 20px rgba(0, 212, 255, 0.3);
    }

    /* Footer Styles */
    footer { background: #000a1a; padding: 60px 22px; border-top: 1px solid rgba(255,255,255,0.05); }

    @media (max-width: 768px) {
      .store-title { font-size: 2.2rem; }
      nav ul { display: none; }
      .nav-toggle { display: block; }
    }
  </style>
</head>

<body>
  <nav>
    <div class="container">
      <a class="logo" href="/">
        <img src="{{ asset('images/logo.jpeg') }}" alt="AtoZ" onerror="this.src='https://via.placeholder.com/44'" />
        <span>AtoZbusiness.lk</span>
      </a>
      <button class="nav-toggle" id="navToggle">
        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
      </button>
      <ul id="mainNav">
        <li><a href="/">Home</a></li>
        <li><a href="/#about">About</a></li>
        <li><a href="{{ route('store') }}" style="color: var(--accent-secondary);">Store</a></li>
        <li><a href="/#institutes">Feedback</a></li>
        <li><a href="{{ route('login') }}" style="background: white; color: #001a4d;">Login</a></li>
      </ul>
    </div>
  </nav>

  <div class="store-header">
    <h1 class="store-title">Premium Study Materials</h1>
    <p class="store-subtitle">Discover the best books and resources to ace your exams.</p>
  </div>

  <main class="store-container">
    
    <div class="product-card">
      <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?auto=format&fit=crop&q=80&w=400" alt="Book 1" class="product-img">
      <div>
        <div class="product-category">A/L Business Studies</div>
        <h3 class="product-title">Business Studies Part 1</h3>
        <div class="product-price">Rs. 1,500</div>
      </div>
      <button class="btn-buy">Add to Cart</button>
    </div>

    <div class="product-card">
      <img src="https://images.unsplash.com/photo-1589829085413-56de8ae18c73?auto=format&fit=crop&q=80&w=400" alt="Book 2" class="product-img">
      <div>
        <div class="product-category">A/L Business Studies</div>
        <h3 class="product-title">Business Studies Part 2</h3>
        <div class="product-price">Rs. 1,650</div>
      </div>
      <button class="btn-buy">Add to Cart</button>
    </div>

    <div class="product-card">
      <img src="https://images.unsplash.com/photo-1553729459-efe14ef6055d?auto=format&fit=crop&q=80&w=400" alt="Book 3" class="product-img">
      <div>
        <div class="product-category">Model Papers</div>
        <h3 class="product-title">Top 50 Expected Questions</h3>
        <div class="product-price">Rs. 950</div>
      </div>
      <button class="btn-buy">Add to Cart</button>
    </div>

    <div class="product-card">
      <img src="https://images.unsplash.com/photo-1532012197267-da84d127e765?auto=format&fit=crop&q=80&w=400" alt="Book 4" class="product-img">
      <div>
        <div class="product-category">Past Papers</div>
        <h3 class="product-title">Past Paper Collection (2015-2025)</h3>
        <div class="product-price">Rs. 1,200</div>
      </div>
      <button class="btn-buy">Add to Cart</button>
    </div>

    <div class="product-card">
      <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&q=80&w=400" alt="Book 5" class="product-img">
      <div>
        <div class="product-category">Short Notes</div>
        <h3 class="product-title">Quick Revision Notes</h3>
        <div class="product-price">Rs. 800</div>
      </div>
      <button class="btn-buy">Add to Cart</button>
    </div>

    <div class="product-card">
      <img src="https://images.unsplash.com/photo-1495446815901-a7297e633e8d?auto=format&fit=crop&q=80&w=400" alt="Book 6" class="product-img">
      <div>
        <div class="product-category">Marketing</div>
        <h3 class="product-title">Marketing Management Guide</h3>
        <div class="product-price">Rs. 1,800</div>
      </div>
      <button class="btn-buy">Add to Cart</button>
    </div>

    <div class="product-card">
      <img src="https://images.unsplash.com/photo-1610116306796-6fea9f4fae38?auto=format&fit=crop&q=80&w=400" alt="Book 7" class="product-img">
      <div>
        <div class="product-category">Accounting</div>
        <h3 class="product-title">Basic Financial Principles</h3>
        <div class="product-price">Rs. 1,400</div>
      </div>
      <button class="btn-buy">Add to Cart</button>
    </div>

    <div class="product-card">
      <img src="https://images.unsplash.com/photo-1589998059171-988d887df646?auto=format&fit=crop&q=80&w=400" alt="Book 8" class="product-img">
      <div>
        <div class="product-category">Economics</div>
        <h3 class="product-title">Economics For Beginners</h3>
        <div class="product-price">Rs. 1,550</div>
      </div>
      <button class="btn-buy">Add to Cart</button>
    </div>

    <div class="product-card">
      <img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?auto=format&fit=crop&q=80&w=400" alt="Book 9" class="product-img">
      <div>
        <div class="product-category">Digital Asset</div>
        <h3 class="product-title">Lesson Audio Podcasts</h3>
        <div class="product-price">Rs. 2,000</div>
      </div>
      <button class="btn-buy">Add to Cart</button>
    </div>

    <div class="product-card">
      <img src="https://images.unsplash.com/photo-1456953180671-730de08edaa7?auto=format&fit=crop&q=80&w=400" alt="Book 10" class="product-img">
      <div>
        <div class="product-category">Bundle</div>
        <h3 class="product-title">Complete Subject Bundle</h3>
        <div class="product-price">Rs. 5,500</div>
      </div>
      <button class="btn-buy">Add to Cart</button>
    </div>

  </main>

  <footer style="background-color: transparent; color: #ffffff; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; padding: 60px 20px 20px 20px;">
      <div style="max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 40px; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 40px;">
          
          <div style="display: flex; flex-direction: column; gap: 15px;">
              <h3 style="font-size: 24px; margin: 0; letter-spacing: 1px;">Lasindu Senarath</h3>
              <p style="font-size: 15px; line-height: 1.6; color: rgba(255,255,255,0.8); margin: 0;">
                  Providing excellence in Business Studies education across Sri Lanka. Empowering the next generation of leaders.
              </p>
          </div>

          <div style="display: flex; flex-direction: column; gap: 15px;">
              <h4 style="font-size: 18px; margin: 0; color: #ffffff;">Contact Info</h4>
              <div style="font-size: 15px; display: flex; flex-direction: column; gap: 10px;">
                  <span style="display: flex; align-items: center; gap: 10px;">📞 +94 70 487 0565</span>
                  <span style="display: flex; align-items: center; gap: 10px;">✉️ info@atozbusiness.lk</span>
              </div>
          </div>

          <div style="display: flex; flex-direction: column; gap: 15px;">
              <h4 style="font-size: 18px; margin: 0;">Follow Us</h4>
              <div style="display: flex; gap: 15px;">
                  <a href="https://wa.me/94704870565" target="_blank" style="text-decoration: none; background: rgba(255,255,255,0.1); width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; border-radius: 50%; transition: 0.3s;">
                      <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png" alt="WhatsApp" style="width: 20px; height: 20px; filter: brightness(0) invert(1);">
                  </a>
                  </div>
          </div>
      </div>

      <div style="text-align: center; margin-top: 30px; font-size: 14px; color: rgba(255,255,255,0.6);">
          <p style="margin: 0;">&copy; 2026 atozbusiness.lk | Designed by **Pramuditha Bandara**</p>
      </div>
  </footer>

  <script>
    // Mobile Nav Toggle Script
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