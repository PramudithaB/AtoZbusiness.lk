import React, { useState, useEffect } from "react";
import {
  GraduationCap,
  ChevronLeft,
  ChevronRight,
  Star,
  Send,
  Phone,
  Mail,
  MapPin,
  CheckCircle2,
  Users,
  Award,
  BookOpen
} from "lucide-react";

// --- Design Tokens ---
const COLORS = {
  primary: "#2563EB",
  primaryDark: "#1E40AF",
  secondary: "#60A5FA",      // changed to blue accent
  surface: "#FFFFFF",
  background: "#EAF4FF",     // light blue background
  textMain: "#0B1B3A",       // slightly blue-tinted text
  textMuted: "#6B7AA8",      // muted blue-gray
  accentLight: "#E6F3FF",    // very light blue accent
  border: "#D6E7FF",         // pale blue border
};

export default function Home() {
  const [currentBanner, setCurrentBanner] = useState(0);
  const [scrolled, setScrolled] = useState(false);

  // Handle Navbar Background on Scroll
  useEffect(() => {
    const handleScroll = () => setScrolled(window.scrollY > 50);
    window.addEventListener("scroll", handleScroll);
    return () => window.removeEventListener("scroll", handleScroll);
  }, []);

  const banners = [
    {
      title: "Master Chemistry with Excellence",
      subtitle: "Sri Lanka's leading institute for A/L & O/L Chemistry. We turn complex theories into simple concepts.",
      // Use public folder path so the image is served correctly after build
      // Place the file at: public/lms1.avif
      image: process.env.PUBLIC_URL + "/lms1.avif",
    },
    {
      title: "Interactive Online & Physical Learning",
      subtitle: "Access high-quality HD recordings, comprehensive tutes, and 24/7 doubt-clearing sessions.",
      image: "https://images.unsplash.com/photo-1509062522246-3755977927d7?w=1200",
    },
  ];

  const nextBanner = () => setCurrentBanner((prev) => (prev + 1) % banners.length);
  const prevBanner = () => setCurrentBanner((prev) => (prev - 1 + banners.length) % banners.length);

  return (
    <div style={{ backgroundColor: COLORS.background, minHeight: "100vh", fontFamily: 'Inter, system-ui, sans-serif' }}>
      
      {/* ================= NAVIGATION ================= */}
      <nav style={{
        ...styles.navbar,
        backgroundColor: scrolled ? "rgba(255, 255, 255, 0.9)" : "transparent",
        backdropFilter: scrolled ? "blur(10px)" : "none",
        borderBottom: scrolled ? `1px solid ${COLORS.border}` : "none",
      }}>
        <div style={styles.navContainer}>
          <div style={{ display: "flex", alignItems: "center", gap: 12 }}>
            <div style={styles.logoIcon}><GraduationCap color="#ffffffff" size={24} /></div>
            <h2 style={{ margin: 0, fontSize: 24, fontWeight: 800, color: scrolled ? COLORS.primary : "#1a25ffff" }}>
              ChemPro<span style={{ color: COLORS.secondary }}>.</span>
            </h2>
          </div>

          <div style={styles.navLinks}>
            <a href="#about" style={{ ...(scrolled ? styles.navLinkDark : styles.navLink), color: "#033EFF" }}>About</a>
            <a href="#features" style={{ ...(scrolled ? styles.navLinkDark : styles.navLink), color: "#033EFF" }}>Features</a>
            <a href="#contact" style={{ ...(scrolled ? styles.navLinkDark : styles.navLink), color: "#033EFF" }}>Contact</a>
            <a href="/login" style={styles.loginBtn}>Student Portal</a>
          </div>
        </div>
      </nav>

      {/* ================= HERO SECTION ================= */}
      <section style={styles.hero}>
        <div style={styles.heroImageContainer}>
          <img
            src={banners[currentBanner].image}
            alt="banner"
            style={styles.heroImage}
            onError={(e) => {
              // If loading the banner fails, use a reliable fallback image
              e.currentTarget.onerror = null;
              e.currentTarget.src = "https://images.unsplash.com/photo-1509062522246-3755977927d7?w=1200";
            }}
          />
          <div style={styles.heroOverlay} />
        </div>

        <div style={styles.heroContent}>
          <div style={styles.badge}>2026 Admissions Open</div>
          <h1 style={styles.heroTitle}>{banners[currentBanner].title}</h1>
          <p style={styles.heroSubtitle}>{banners[currentBanner].subtitle}</p>
          <div style={{ display: "flex", gap: 15 }}>
            <button style={styles.primaryBtn}>Get Started Today</button>
            <button style={styles.primaryBtn}>View Courses</button>
          </div>
        </div>

        <button onClick={prevBanner} style={{ ...styles.arrowBtn, left: 30 }}><ChevronLeft /></button>
        <button onClick={nextBanner} style={{ ...styles.arrowBtn, right: 30 }}><ChevronRight /></button>
      </section>

      {/* ================= STATS SECTION ================= */}
      <section style={styles.sectionWhite}>
        <div style={styles.statsGrid}>
          <StatCard icon={<Users color={COLORS.primary}/>} value="10k+" label="Happy Students" />
          <StatCard icon={<Award color={COLORS.primary}/>} value="95%" label="Exam Pass Rate" />
          <StatCard icon={<BookOpen color={COLORS.primary}/>} value="500+" label="Video Lessons" />
        </div>
      </section>

      {/* ================= FEATURES ================= */}
      <section id="features" style={styles.section}>
        <div style={{ textAlign: 'center', marginBottom: 60 }}>
          <h2 style={styles.sectionTitle}>Why Choose ChemPro?</h2>
          <p style={styles.sectionSubtitle}>We provide more than just lessons; we provide a pathway to your medical or engineering career.</p>
        </div>
        
        <div style={styles.featuresGrid}>
          <FeatureCard 
            title="Expert Instruction" 
            desc="Learn from industry veterans with over 15 years of paper marking experience." 
          />
          <FeatureCard 
            title="Hybrid Learning" 
            desc="Switch seamlessly between physical classes and our high-end LMS platform." 
          />
          <FeatureCard 
            title="Personalized Feedback" 
            desc="Weekly quizzes and mock exams with detailed individual performance reports." 
          />
        </div>
      </section>

      {/* ================= CONTACT SECTION ================= */}
      <section id="contact" style={styles.sectionWhite}>
        <div style={styles.contactContainer}>
          <div style={styles.contactInfo}>
            <h2 style={{ fontSize: 36, marginBottom: 20 }}>Ready to Start?</h2>
            <p style={{ color: COLORS.textMuted, marginBottom: 40 }}>Have questions about our syllabus or schedules? Our team is here to help you.</p>
            
            <div style={styles.contactList}>
              <ContactRow icon={<MapPin size={20}/>} title="Visit Us" detail="No. 45, Education Lane, Colombo 07" />
              <ContactRow icon={<Phone size={20}/>} title="Call Us" detail="+94 77 123 4567" />
              <ContactRow icon={<Mail size={20}/>} title="Email Us" detail="admissions@chempro.lk" />
            </div>
          </div>

          <div style={styles.contactForm}>
            <input type="text" placeholder="Your Name" style={styles.input} />
            <input type="email" placeholder="Email Address" style={styles.input} />
            <textarea placeholder="How can we help?" style={{ ...styles.input, height: 120, paddingTop: 12 }}></textarea>
            <button style={{ ...styles.primaryBtn, width: '100%' }}>Send Message <Send size={18} style={{ marginLeft: 8 }} /></button>
          </div>
        </div>
      </section>

      {/* ================= FOOTER ================= */}
      <footer style={styles.footer}>
        <div style={{ maxWidth: 1200, margin: '0 auto', display: 'flex', justifyContent: 'space-between', alignItems: 'center', flexWrap: 'wrap', gap: 20 }}>
          <div>
            <h3 style={{ color: COLORS.primary, marginBottom: 10 }}>ChemPro Academy</h3>
            <p style={{ fontSize: 14 }}>The ultimate destination for Chemistry excellence.</p>
          </div>
          <p style={{ fontSize: 14 }}>© 2026 ChemPro Academy. Designed for excellence.</p>
        </div>
      </footer>
    </div>
  );
}

/* ================= COMPONENT WRAPPERS ================= */

function StatCard({ icon, value, label }) {
  return (
    <div style={styles.statCard}>
      <div style={styles.statIcon}>{icon}</div>
      <h3 style={{ fontSize: 32, margin: "10px 0", color: COLORS.textMain }}>{value}</h3>
      <p style={{ color: COLORS.textMuted, fontWeight: 500 }}>{label}</p>
    </div>
  );
}

function FeatureCard({ title, desc }) {
  return (
    <div style={styles.featureCard}>
      <CheckCircle2 color={COLORS.primary} size={32} style={{ marginBottom: 20 }} />
      <h4 style={{ fontSize: 20, marginBottom: 12 }}>{title}</h4>
      <p style={{ color: COLORS.textMuted, lineHeight: 1.6 }}>{desc}</p>
    </div>
  );
}

function ContactRow({ icon, title, detail }) {
  return (
    <div style={{ display: 'flex', gap: 15, marginBottom: 25 }}>
      <div style={styles.smallIcon}>{icon}</div>
      <div>
        <div style={{ fontWeight: 700, fontSize: 14, color: COLORS.textMain }}>{title}</div>
        <div style={{ color: COLORS.textMuted }}>{detail}</div>
      </div>
    </div>
  );
}

/* ================= STYLES ================= */

const styles = {
  navbar: {
    position: "fixed",
    top: 0,
    width: "100%",
    zIndex: 1000,
    transition: "all 0.3s ease",
    height: 80,
    display: "flex",
    alignItems: "center",
  },
  navContainer: {
    width: "100%",
    maxWidth: 1200,
    margin: "0 auto",
    display: "flex",
    justifyContent: "space-between",
    alignItems: "center",
    padding: "0 20px",
  },
  navLinks: { display: "flex", alignItems: "center", gap: 35 },
  navLink: { textDecoration: "none", color: "#fff", fontWeight: 500, fontSize: 15, transition: '0.2s' },
  navLinkDark: { textDecoration: "none", color: COLORS.textMain, fontWeight: 500, fontSize: 15 },
  
  logoIcon: {
    background: COLORS.primary,
    padding: 8,
    borderRadius: 10,
    display: "flex",
    alignItems: "center",
    justifyContent: "center",
  },

  loginBtn: {
    padding: "10px 24px",
    backgroundColor: COLORS.primary,
    borderRadius: 12,
    color: "#fff",
    textDecoration: "none",
    fontWeight: 600,
    boxShadow: '0 4px 14px rgba(37, 99, 235, 0.4)',
  },

  hero: { position: "relative", height: "90vh", display: "flex", alignItems: "center", overflow: "hidden" },
  heroImageContainer: { position: "absolute", inset: 0, zIndex: -1 },
  heroImage: { width: "100%", height: "100%", objectFit: "cover" },
  heroOverlay: { position: "absolute", inset: 0, background: "linear-gradient(to right, rgba(37,99,235,0.9), rgba(37,99,235,0.3))" },
  
  heroContent: { maxWidth: 800, padding: "0 60px", color: "#fff" },
  badge: { display: 'inline-block', padding: '6px 16px', background: 'rgba(37,99,235,0.08)', borderRadius: 50, fontSize: 13, fontWeight: 600, border: '1px solid rgba(37,99,235,0.15)', marginBottom: 20 },
  heroTitle: { fontSize: 64, fontWeight: 800, lineHeight: 1.1, marginBottom: 20, color: COLORS.primary },
  heroSubtitle: { fontSize: 20, opacity: 0.95, marginBottom: 40, lineHeight: 1.6, color: COLORS.primaryDark },

  primaryBtn: {
    backgroundColor: COLORS.primary,
    color: "#fff",
    padding: "16px 32px",
    borderRadius: 12,
    border: 'none',
    fontWeight: 700,
    fontSize: 16,
    cursor: 'pointer',
    display: 'flex',
    alignItems: 'center',
    transition: 'transform 0.2s',
  },
  secondaryBtn: {
    backgroundColor: 'rgba(230,242,255,0.12)',
    backdropFilter: 'blur(5px)',
    color: "#fff",
    padding: "16px 32px",
    borderRadius: 12,
    border: '1px solid rgba(37,99,235,0.12)',
    fontWeight: 700,
    fontSize: 16,
    cursor: 'pointer',
  },

  arrowBtn: {
    position: "absolute",
    top: "50%",
    transform: "translateY(-50%)",
    background: "rgba(255,255,255,0.1)",
    border: "1px solid rgba(255,255,255,0.2)",
    color: '#fff',
    borderRadius: "50%",
    width: 50,
    height: 50,
    display: 'flex',
    alignItems: 'center',
    justifyContent: 'center',
    cursor: "pointer",
    backdropFilter: 'blur(10px)'
  },

  section: { padding: "100px 20px", maxWidth: 1200, margin: "0 auto" },
  sectionWhite: { padding: "100px 20px", backgroundColor: "#fff" },
  sectionTitle: { fontSize: 42, fontWeight: 800, color: COLORS.textMain, marginBottom: 15 },
  sectionSubtitle: { fontSize: 18, color: COLORS.textMuted, maxWidth: 600, margin: '0 auto' },

  statsGrid: { display: "flex", justifyContent: "space-between", gap: 30, maxWidth: 1000, margin: "0 auto" },
  statCard: { textAlign: 'center', flex: 1 },
  statIcon: { width: 60, height: 60, background: COLORS.accentLight, borderRadius: 20, display: 'flex', alignItems: 'center', justifyCenter: 'center', margin: '0 auto', display: 'flex', justifyContent: 'center' },

  featuresGrid: { display: 'grid', gridTemplateColumns: 'repeat(auto-fit, minmax(300px, 1fr))', gap: 30 },
  featureCard: { padding: 40, background: '#fff', borderRadius: 24, border: `1px solid ${COLORS.border}`, transition: '0.3s' },

  contactContainer: { display: 'grid', gridTemplateColumns: '1fr 1fr', gap: 80, maxWidth: 1100, margin: '0 auto', alignItems: 'center' },
  contactList: { marginTop: 30 },
  smallIcon: { width: 40, height: 40, background: COLORS.accentLight, borderRadius: 10, display: 'flex', alignItems: 'center', justifyContent: 'center', color: COLORS.primary },
  
  contactForm: { background: COLORS.background, padding: 40, borderRadius: 24, border: `1px solid ${COLORS.border}` },
  input: { width: '100%', padding: '14px 20px', borderRadius: 12, border: `1px solid ${COLORS.border}`, marginBottom: 20, outline: 'none', fontSize: 15, boxSizing: 'border-box' },

  footer: { padding: "60px 20px", borderTop: `1px solid ${COLORS.border}`, color: COLORS.textMuted, background: '#fff' }
};