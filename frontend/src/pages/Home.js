import { useState, useEffect, useRef } from "react";

const NAVY = "#000080";
const WHITE = "#ffffff";
const LIGHT_BG = "#f4f6fb";
const ACCENT = "#e8eaf6";

const institutes = [
  "SyZyGy \u2013 \u0d9c\u0db8\u0dca\u0db4\u200b\u0dc4",
  "SyZyGy \u2013 \u0db1\u0dd4\u0d9c\u0dda\u0d9c\u0ddc\u200b\u0da9",
  "\u0dc3\u0dd2\u0dc3\u0dd4\u0dbd\u0dca\u0d9a\u0dcf \u2013 \u0dbb\u0dad\u0dca\u0db1\u0db4\u0dd4\u200b\u0dbb",
  "\u0db4\u0dca\u200d\u0dbb\u0dd2\u0db1\u0dca\u0dc3\u0dd2\u0db4\u0dd2\u0dba\u0dcf \u2013 \u0db6\u0dad\u0dca\u0da9\u0dcf\u0dbb\u0dc5\u0dda\u0dbd",
];

const testimonials = [
  {
    name: "Kasun Perera",
    text: "Chemistry classes with Charitha sir changed my life. I scored an A in the A/L exam and now I'm studying engineering at Moratuwa. His teaching method is truly unique and effective.",
    year: "2023 A/L Student",
  },
  {
    name: "Nimasha Fernando",
    text: "The way sir explains complex concepts with real-life examples is amazing. I improved from a C to an A in just one year. Highly recommend to all A/L chemistry students.",
    year: "2023 A/L Student",
  },
  {
    name: "Tharindu Silva",
    text: "Best chemistry teacher in Sri Lanka! The online platform is very user-friendly and the recordings helped me study at my own pace. Got an A and joined the medical faculty!",
    year: "2022 A/L Student",
  },
  {
    name: "Sachini Jayawardena",
    text: "From Rathnapura, I joined the Sisulka institute and it was the best decision. Sir's dedication to students goes far beyond the classroom. Truly inspiring.",
    year: "2023 A/L Student",
  },
];

const features = [
  {
    icon: "\uD83D\uDDA5\uFE0F",
    title: "Online Classes for Everyone",
    desc: "Access classes from anywhere in Sri Lanka via our modern online platform. Live and recorded sessions available 24/7.",
  },
  {
    icon: "\uD83D\uDCCA",
    title: "Proven Results",
    desc: "837 A passes in 2023 alone. Over 4500+ A passes since 2015 — the island's highest for a single lecturer.",
  },
  {
    icon: "\uD83C\uDFEB",
    title: "Multiple Institutes",
    desc: "Physical class centres in Gampaha, Nugegoda, Rathnapura and Bandarawela for personalised learning.",
  },
  {
    icon: "\uD83D\uDCF1",
    title: "Telegram & WhatsApp Support",
    desc: "Instant support and materials via our Telegram bot and WhatsApp chat to keep you on track.",
  },
];

export default function ChemistryHomePage() {
  const [dropdownOpen, setDropdownOpen] = useState(false);
  const [testimonialIndex, setTestimonialIndex] = useState(0);
  const [scrolled, setScrolled] = useState(false);
  const dropdownRef = useRef(null);

  useEffect(() => {
    const onScroll = () => setScrolled(window.scrollY > 60);
    window.addEventListener("scroll", onScroll);
    return () => window.removeEventListener("scroll", onScroll);
  }, []);

  useEffect(() => {
    const timer = setInterval(() => {
      setTestimonialIndex((i) => (i + 1) % testimonials.length);
    }, 4500);
    return () => clearInterval(timer);
  }, []);

  useEffect(() => {
    const handleClickOutside = (e) => {
      if (dropdownRef.current && !dropdownRef.current.contains(e.target)) {
        setDropdownOpen(false);
      }
    };
    document.addEventListener("mousedown", handleClickOutside);
    return () => document.removeEventListener("mousedown", handleClickOutside);
  }, []);

  const s = {
    page: {
      fontFamily: "'Segoe UI', 'Noto Sans Sinhala', Arial, sans-serif",
      background: WHITE,
      color: NAVY,
      margin: 0,
      padding: 0,
      overflowX: "hidden",
    },
    nav: {
      position: "fixed",
      top: 0,
      left: 0,
      right: 0,
      zIndex: 1000,
      background: scrolled ? WHITE : "rgba(255,255,255,0.97)",
      boxShadow: scrolled ? "0 2px 18px rgba(0,0,128,0.13)" : "none",
      transition: "box-shadow 0.3s",
    },
    navInner: {
      maxWidth: 1200,
      margin: "0 auto",
      padding: "0 24px",
      display: "flex",
      alignItems: "center",
      justifyContent: "space-between",
      height: 70,
    },
    logo: {
      display: "flex",
      alignItems: "center",
      gap: 10,
      textDecoration: "none",
    },
    logoCircle: {
      width: 46,
      height: 46,
      borderRadius: "50%",
      background: NAVY,
      display: "flex",
      alignItems: "center",
      justifyContent: "center",
      color: WHITE,
      fontWeight: 900,
      fontSize: 22,
    },
    logoText: {
      color: NAVY,
      fontWeight: 800,
      fontSize: 17,
      lineHeight: 1.2,
    },
    navLinks: {
      display: "flex",
      alignItems: "center",
      gap: 4,
      listStyle: "none",
      margin: 0,
      padding: 0,
    },
    navLink: {
      color: NAVY,
      textDecoration: "none",
      fontWeight: 600,
      fontSize: 14,
      padding: "8px 12px",
      borderRadius: 6,
      cursor: "pointer",
      whiteSpace: "nowrap",
      transition: "background 0.2s",
    },
    dropdownWrapper: {
      position: "relative",
    },
    dropdownToggle: {
      display: "flex",
      alignItems: "center",
      gap: 4,
      color: NAVY,
      fontWeight: 600,
      fontSize: 14,
      padding: "8px 12px",
      borderRadius: 6,
      cursor: "pointer",
      userSelect: "none",
    },
    dropdownMenu: {
      position: "absolute",
      top: "calc(100% + 8px)",
      left: 0,
      background: WHITE,
      border: `1.5px solid ${ACCENT}`,
      borderRadius: 10,
      boxShadow: "0 8px 32px rgba(0,0,128,0.13)",
      minWidth: 240,
      zIndex: 999,
      padding: "6px 0",
    },
    dropdownItem: {
      display: "block",
      padding: "10px 20px",
      color: NAVY,
      textDecoration: "none",
      fontSize: 14,
      fontWeight: 500,
    },
    phoneBtn: {
      background: NAVY,
      color: WHITE,
      borderRadius: 8,
      padding: "9px 18px",
      fontWeight: 700,
      fontSize: 14,
      cursor: "pointer",
      textDecoration: "none",
      letterSpacing: 0.3,
    },
    hero: {
      minHeight: "100vh",
      background: "linear-gradient(135deg, #eef0fb 0%, #dce0f5 50%, #f8f9ff 100%)",
      display: "flex",
      alignItems: "center",
      padding: "100px 24px 60px",
      position: "relative",
      overflow: "hidden",
    },
    heroInner: {
      maxWidth: 1200,
      margin: "0 auto",
      display: "flex",
      alignItems: "center",
      justifyContent: "space-between",
      gap: 40,
      width: "100%",
      flexWrap: "wrap",
    },
    heroLeft: {
      flex: "1 1 480px",
      zIndex: 1,
    },
    heroBadge: {
      display: "inline-block",
      background: NAVY,
      color: WHITE,
      fontWeight: 700,
      fontSize: 11,
      padding: "5px 16px",
      borderRadius: 20,
      letterSpacing: 2,
      marginBottom: 18,
      textTransform: "uppercase",
    },
    heroTitle: {
      fontSize: "clamp(38px, 6vw, 70px)",
      fontWeight: 900,
      color: NAVY,
      lineHeight: 1.05,
      margin: "0 0 4px",
    },
    heroTitleBlue: {
      display: "block",
      color: "#1a1aff",
    },
    heroDegree: {
      fontSize: 16,
      fontWeight: 600,
      color: "#444",
      marginTop: 10,
      marginBottom: 0,
    },
    heroSub: {
      fontSize: 16,
      color: "#444",
      marginTop: 14,
      lineHeight: 1.7,
      maxWidth: 500,
    },
    heroInstList: {
      listStyle: "none",
      padding: 0,
      margin: "22px 0",
      display: "flex",
      flexWrap: "wrap",
      gap: 10,
    },
    heroInstItem: {
      background: WHITE,
      border: `1.5px solid ${NAVY}`,
      color: NAVY,
      borderRadius: 20,
      padding: "5px 16px",
      fontSize: 13,
      fontWeight: 600,
    },
    heroCtas: {
      display: "flex",
      gap: 14,
      marginTop: 28,
      flexWrap: "wrap",
    },
    btnPrimary: {
      background: NAVY,
      color: WHITE,
      border: "none",
      borderRadius: 8,
      padding: "13px 28px",
      fontWeight: 700,
      fontSize: 15,
      cursor: "pointer",
      textDecoration: "none",
      display: "inline-block",
      boxShadow: "0 4px 18px rgba(0,0,128,0.25)",
    },
    btnSecondary: {
      background: WHITE,
      color: NAVY,
      border: `2px solid ${NAVY}`,
      borderRadius: 8,
      padding: "11px 28px",
      fontWeight: 700,
      fontSize: 15,
      cursor: "pointer",
      textDecoration: "none",
      display: "inline-block",
    },
    heroCounters: {
      display: "flex",
      gap: 24,
      marginTop: 36,
      flexWrap: "wrap",
    },
    counterBox: {
      background: WHITE,
      borderRadius: 14,
      padding: "16px 24px",
      boxShadow: "0 4px 20px rgba(0,0,128,0.10)",
      minWidth: 140,
      textAlign: "center",
    },
    counterNum: {
      fontSize: 36,
      fontWeight: 900,
      color: NAVY,
      lineHeight: 1,
    },
    counterLabel: {
      fontSize: 12,
      color: "#666",
      marginTop: 4,
      fontWeight: 500,
    },
    heroRight: {
      flex: "1 1 340px",
      display: "flex",
      justifyContent: "center",
    },
    heroImgBox: {
      width: 320,
      height: 400,
      borderRadius: 24,
      background: "linear-gradient(135deg, #000080 60%, #3a3ab0 100%)",
      display: "flex",
      alignItems: "center",
      justifyContent: "center",
      fontSize: 100,
      boxShadow: "0 20px 60px rgba(0,0,128,0.25)",
      position: "relative",
      overflow: "hidden",
    },
    section: {
      padding: "80px 24px",
    },
    sectionInner: {
      maxWidth: 1200,
      margin: "0 auto",
    },
    sectionTag: {
      display: "inline-block",
      color: NAVY,
      fontWeight: 700,
      fontSize: 12,
      letterSpacing: 2,
      textTransform: "uppercase",
      borderBottom: `2px solid ${NAVY}`,
      paddingBottom: 3,
      marginBottom: 12,
    },
    sectionTitle: {
      fontSize: "clamp(26px, 4vw, 42px)",
      fontWeight: 900,
      color: NAVY,
      margin: "0 0 18px",
    },
    aboutGrid: {
      display: "flex",
      gap: 50,
      alignItems: "center",
      flexWrap: "wrap",
    },
    aboutImgWrap: {
      flex: "1 1 300px",
      display: "flex",
      justifyContent: "center",
    },
    aboutImgBox: {
      width: 300,
      height: 370,
      borderRadius: 20,
      background: "linear-gradient(145deg, #dde0f8, #b8bef0)",
      display: "flex",
      flexDirection: "column",
      alignItems: "center",
      justifyContent: "center",
      boxShadow: "0 12px 40px rgba(0,0,128,0.15)",
      position: "relative",
    },
    aboutBadge: {
      position: "absolute",
      bottom: -16,
      right: -16,
      background: NAVY,
      color: WHITE,
      borderRadius: 12,
      padding: "12px 18px",
      fontWeight: 800,
      fontSize: 14,
      boxShadow: "0 6px 20px rgba(0,0,128,0.3)",
      textAlign: "center",
      lineHeight: 1.4,
    },
    aboutTextWrap: {
      flex: "1 1 400px",
    },
    aboutBody: {
      fontSize: 15,
      lineHeight: 1.85,
      color: "#333",
      marginBottom: 22,
    },
    aboutBullets: {
      listStyle: "none",
      padding: 0,
      margin: "0 0 28px",
    },
    aboutBulletItem: {
      padding: "8px 0",
      color: "#333",
      fontSize: 15,
      borderBottom: "1px solid #eee",
      display: "flex",
      alignItems: "flex-start",
      gap: 10,
    },
    check: {
      color: NAVY,
      fontWeight: 900,
      fontSize: 17,
      marginTop: 1,
    },
    galleryBg: {
      background: LIGHT_BG,
    },
    galleryGrid: {
      display: "grid",
      gridTemplateColumns: "repeat(auto-fill, minmax(280px, 1fr))",
      gap: 18,
      marginTop: 36,
    },
    galleryItem: {
      borderRadius: 14,
      overflow: "hidden",
      boxShadow: "0 4px 18px rgba(0,0,128,0.10)",
      aspectRatio: "5 / 3",
      display: "flex",
      alignItems: "center",
      justifyContent: "center",
      fontSize: 52,
      cursor: "pointer",
      position: "relative",
      transition: "transform 0.25s, box-shadow 0.25s",
    },
    galleryOverlay: {
      position: "absolute",
      inset: 0,
      background: "linear-gradient(to bottom, transparent 40%, rgba(0,0,128,0.55) 100%)",
      display: "flex",
      alignItems: "flex-end",
      padding: 14,
      transition: "opacity 0.25s",
    },
    galleryLabel: {
      color: WHITE,
      fontWeight: 700,
      fontSize: 14,
    },
    ctaBanner: {
      background: NAVY,
      padding: "70px 24px",
      textAlign: "center",
      position: "relative",
      overflow: "hidden",
    },
    ctaBannerInner: {
      position: "relative",
      zIndex: 1,
      maxWidth: 800,
      margin: "0 auto",
    },
    ctaBannerTag: {
      color: "rgba(255,255,255,0.7)",
      fontWeight: 700,
      fontSize: 12,
      letterSpacing: 2,
      marginBottom: 12,
      textTransform: "uppercase",
    },
    ctaBannerTitle: {
      color: WHITE,
      fontSize: "clamp(26px, 4vw, 44px)",
      fontWeight: 900,
      margin: "0 0 14px",
    },
    ctaBannerSub: {
      color: "rgba(255,255,255,0.8)",
      fontSize: 16,
      maxWidth: 680,
      margin: "0 auto 32px",
      lineHeight: 1.7,
    },
    ctaBannerBtn: {
      background: WHITE,
      color: NAVY,
      border: "none",
      borderRadius: 10,
      padding: "14px 36px",
      fontWeight: 800,
      fontSize: 16,
      cursor: "pointer",
      textDecoration: "none",
      display: "inline-block",
    },
    featuresGrid: {
      display: "grid",
      gridTemplateColumns: "repeat(auto-fill, minmax(260px, 1fr))",
      gap: 24,
      marginTop: 40,
    },
    featureCard: {
      background: WHITE,
      border: `1.5px solid ${ACCENT}`,
      borderRadius: 16,
      padding: "30px 24px",
      boxShadow: "0 4px 18px rgba(0,0,128,0.07)",
      cursor: "default",
      transition: "transform 0.2s, box-shadow 0.2s",
    },
    featureIcon: {
      fontSize: 38,
      marginBottom: 14,
    },
    featureTitle: {
      fontWeight: 800,
      fontSize: 17,
      color: NAVY,
      marginBottom: 10,
    },
    featureDesc: {
      fontSize: 14,
      color: "#555",
      lineHeight: 1.7,
    },
    testiSection: {
      background: LIGHT_BG,
    },
    testiCarousel: {
      maxWidth: 760,
      margin: "40px auto 0",
    },
    testiCard: {
      background: WHITE,
      borderRadius: 18,
      padding: "36px 40px",
      boxShadow: "0 6px 30px rgba(0,0,128,0.10)",
      textAlign: "center",
      minHeight: 180,
    },
    testiQuote: {
      fontSize: 16,
      lineHeight: 1.8,
      color: "#333",
      fontStyle: "italic",
      marginBottom: 26,
    },
    testiAvatar: {
      width: 54,
      height: 54,
      borderRadius: "50%",
      background: "linear-gradient(135deg, #000080, #3a3ab0)",
      display: "flex",
      alignItems: "center",
      justifyContent: "center",
      color: WHITE,
      fontWeight: 900,
      fontSize: 22,
      margin: "0 auto 10px",
    },
    testiName: {
      fontWeight: 800,
      color: NAVY,
      fontSize: 16,
    },
    testiYear: {
      color: "#888",
      fontSize: 13,
      marginTop: 3,
    },
    testiDots: {
      display: "flex",
      justifyContent: "center",
      gap: 8,
      marginTop: 20,
    },
    resultsSection: {
      background: "linear-gradient(135deg, #eef0fb 0%, #dce0f5 100%)",
    },
    resultsGrid: {
      display: "flex",
      gap: 28,
      marginTop: 40,
      flexWrap: "wrap",
      justifyContent: "center",
    },
    resultCard: {
      background: WHITE,
      borderRadius: 16,
      padding: "28px 36px",
      textAlign: "center",
      boxShadow: "0 4px 20px rgba(0,0,128,0.10)",
      minWidth: 170,
    },
    resultNum: {
      fontSize: 48,
      fontWeight: 900,
      color: NAVY,
      lineHeight: 1,
    },
    resultLabel: {
      fontSize: 13,
      color: "#555",
      marginTop: 8,
      fontWeight: 500,
    },
    contactGrid: {
      display: "flex",
      gap: 50,
      alignItems: "center",
      flexWrap: "wrap",
    },
    contactInfo: {
      flex: "1 1 320px",
    },
    contactItem: {
      display: "flex",
      alignItems: "center",
      gap: 14,
      marginBottom: 22,
    },
    contactIconBox: {
      width: 44,
      height: 44,
      borderRadius: 12,
      background: ACCENT,
      display: "flex",
      alignItems: "center",
      justifyContent: "center",
      fontSize: 20,
      flexShrink: 0,
    },
    contactLabel: {
      fontWeight: 700,
      fontSize: 12,
      color: "#888",
      marginBottom: 2,
      textTransform: "uppercase",
      letterSpacing: 1,
    },
    contactValue: {
      fontWeight: 600,
      color: NAVY,
      fontSize: 15,
    },
    contactFormBox: {
      flex: "1 1 370px",
      background: LIGHT_BG,
      borderRadius: 18,
      padding: "34px 30px",
      boxShadow: "0 4px 20px rgba(0,0,128,0.07)",
    },
    formTitle: {
      fontWeight: 800,
      fontSize: 20,
      color: NAVY,
      marginBottom: 22,
    },
    formRow: {
      marginBottom: 14,
    },
    formInput: {
      width: "100%",
      padding: "11px 16px",
      border: "1.5px solid #cdd2ee",
      borderRadius: 8,
      fontSize: 14,
      color: NAVY,
      background: WHITE,
      outline: "none",
      boxSizing: "border-box",
      fontFamily: "inherit",
    },
    formBtn: {
      width: "100%",
      background: NAVY,
      color: WHITE,
      border: "none",
      borderRadius: 10,
      padding: "13px 0",
      fontWeight: 700,
      fontSize: 15,
      cursor: "pointer",
      marginTop: 6,
      fontFamily: "inherit",
    },
    footer: {
      background: NAVY,
      color: WHITE,
      padding: "60px 24px 0",
    },
    footerInner: {
      maxWidth: 1200,
      margin: "0 auto",
      display: "grid",
      gridTemplateColumns: "repeat(auto-fill, minmax(210px, 1fr))",
      gap: 40,
    },
    footerCol: {
      paddingBottom: 40,
    },
    footerLogoRow: {
      display: "flex",
      alignItems: "center",
      gap: 10,
      marginBottom: 14,
    },
    footerLogoCircle: {
      width: 42,
      height: 42,
      borderRadius: "50%",
      background: WHITE,
      display: "flex",
      alignItems: "center",
      justifyContent: "center",
      color: NAVY,
      fontWeight: 900,
      fontSize: 20,
    },
    footerLogoText: {
      fontWeight: 800,
      fontSize: 17,
      color: WHITE,
    },
    footerDesc: {
      color: "rgba(255,255,255,0.7)",
      fontSize: 14,
      lineHeight: 1.7,
      marginBottom: 18,
    },
    socialRow: {
      display: "flex",
      gap: 10,
    },
    socialIcon: {
      width: 38,
      height: 38,
      borderRadius: 10,
      background: "rgba(255,255,255,0.12)",
      display: "flex",
      alignItems: "center",
      justifyContent: "center",
      fontSize: 16,
      cursor: "pointer",
      textDecoration: "none",
      color: WHITE,
    },
    footerHeading: {
      fontWeight: 800,
      fontSize: 15,
      color: WHITE,
      marginBottom: 16,
      borderBottom: "2px solid rgba(255,255,255,0.18)",
      paddingBottom: 10,
    },
    footerLink: {
      display: "block",
      color: "rgba(255,255,255,0.7)",
      textDecoration: "none",
      fontSize: 14,
      marginBottom: 9,
    },
    footerBottom: {
      maxWidth: 1200,
      margin: "0 auto",
      borderTop: "1px solid rgba(255,255,255,0.15)",
      padding: "18px 0",
      display: "flex",
      justifyContent: "space-between",
      alignItems: "center",
      flexWrap: "wrap",
      gap: 10,
    },
    footerCopy: {
      color: "rgba(255,255,255,0.5)",
      fontSize: 13,
    },
  };

  const galleryItems = [
    { emoji: "\uD83C\uDFEB", label: "SyZyGy Gampaha", bg: "#eef0fb" },
    { emoji: "\uD83D\uDCDA", label: "Chemistry Class", bg: "#dce0f5" },
    { emoji: "\uD83E\uDDEA", label: "Lab Session", bg: "#e8eaf6" },
    { emoji: "\uD83C\uDF93", label: "Award Ceremony", bg: "#d8dbf5" },
    { emoji: "\uD83D\uDC68\u200D\uD83C\uDFEB", label: "Charitha Sir", bg: "#e0e4f8" },
    { emoji: "\uD83C\uDFC6", label: "Island Results", bg: "#d0d5f3" },
  ];

  return (
    <div style={s.page}>

      {/* NAVBAR */}
      <nav style={s.nav}>
        <div style={s.navInner}>
          <a href="#" style={s.logo}>
            <div style={s.logoCircle}>A</div>
            <div style={s.logoText}>
              AtoZbusiness.lk<br />
              <span style={{ fontSize: 11, fontWeight: 500, color: "#666" }}>Lasindu Senarath</span>
            </div>
          </a>

          <ul style={s.navLinks}>
            {[
              ["Home", "#"],
              ["About", "#about"],
              ["Results", "#results"],
              ["All Island Paper Class", "#"],
              ["Check Your Marks", "#"],
            ].map(([label, href]) => (
              <li key={label}>
                <a
                  href={href}
                  style={s.navLink}
                  onMouseEnter={(e) => (e.target.style.background = ACCENT)}
                  onMouseLeave={(e) => (e.target.style.background = "transparent")}
                >
                  {label}
                </a>
              </li>
            ))}
            <li style={s.dropdownWrapper} ref={dropdownRef}>
              <div
                style={s.dropdownToggle}
                onClick={() => setDropdownOpen((o) => !o)}
                onMouseEnter={(e) => (e.currentTarget.style.background = ACCENT)}
                onMouseLeave={(e) => (e.currentTarget.style.background = "transparent")}
              >
                Institutes <span style={{ fontSize: 10 }}>▼</span>
              </div>
              {dropdownOpen && (
                <div style={s.dropdownMenu}>
                  {institutes.map((inst) => (
                    <a
                      key={inst}
                      href="#"
                      style={s.dropdownItem}
                      onMouseEnter={(e) => (e.target.style.background = ACCENT)}
                      onMouseLeave={(e) => (e.target.style.background = "transparent")}
                    >
                      {inst}
                    </a>
                  ))}
                </div>
              )}
            </li>
          </ul>

          <a href="tel:0777674747" style={s.phoneBtn}>
            📞 70 487 0565
          </a>
        </div>
      </nav>

      {/* HERO */}
      <section style={s.hero}>
        <div style={s.heroInner}>
          <div style={s.heroLeft}>
            <span style={s.heroBadge}>Advance Level BS</span>
            <h1 style={s.heroTitle}>
              Lasindu
              <span style={s.heroTitleBlue}>Kavinda Senarath</span>
            </h1>
            <p style={s.heroDegree}>BBA (Hons) in Marketing Management – SLIIT |

              
              
</p>
   <p style={s.heroDegree}>
    
               Reading Master Of Business Administration 
</p>
            <p style={s.heroSub}>
              Sri Lanka's most celebrated A/L Business Studies lecturer — 4+ years of experience
              and Founder & CEO – Lakro Global Holdings (Pvt) Ltd.
            </p>
            <ul style={s.heroInstList}>
              {["ශිල්ප-හොරණ", "රොටරි-නුගේගොඩ", "Online - ලංකාවටම"].map(
                (i) => (
                  <li key={i} style={s.heroInstItem}>{i}</li>
                )
              )}
            </ul>
            <div style={s.heroCtas}>
              <a href="https://t.me/CDchemBot" style={s.btnPrimary}>📨 Telegram Bot</a>
              <a href="http://wa.me/+94777184380" style={s.btnSecondary}>💬 Chat With Us</a>
            </div>
            <div style={s.heroCounters}>
              {[
                { num: "83", label: "2023 — A සාමාර්ථ" },
                { num: "250+", label: "2021 සිට A සාමාර්ථ" },
                { num: "4+", label: "Years Experience" },
              ].map((c) => (
                <div key={c.label} style={s.counterBox}>
                  <div style={s.counterNum}>{c.num}</div>
                  <div style={s.counterLabel}>{c.label}</div>
                </div>
              ))}
            </div>
          </div>
<div
  style={{
    flex: 1,
    display: "flex",
    justifyContent: "flex-end",
    alignItems: "center",
  }}
>
  <img
    src="/lasindu.jpeg"
    alt="Lasindu"
    style={{
      width: "800px",
      maxWidth: "150%",
      height: "auto",
    }}
  />
</div>


        </div>
      </section>

      {/* ABOUT */}
      <section style={s.section} id="about">
        <div style={s.sectionInner}>
          <div style={s.aboutGrid}>
            <div style={s.aboutImgWrap}>
              <div style={s.aboutImgBox}>
                <span style={{ fontSize: 90 }}>👨‍🏫</span>
                <div style={s.aboutBadge}>
                  24+ Years<br />Experience
                </div>
              </div>
            </div>
            <div style={s.aboutTextWrap}>
              <span style={s.sectionTag}>About Lasindu</span>
              <h2 style={s.sectionTitle}>අපි තමයි අහස</h2>
              <p style={s.aboutBody}>
                ඔබේ ගුරුවරයා
Ada Derana Education නාලිකාවේ දේශකවරයෙකි.
ශ්‍රි ලංකා තොරතුරු තාක්ෂණ විශ්වවිද්‍යාලයෙන් ව්‍යාපාර පරිපාලනවේදී (ගෞරව)අලෙවි කළමනාකරණ(විශේෂ)උපාධිය සම්පූර්ණ කර ඇත.
ශ්‍රී ජයවර්ධනපුර විශ්ව විද්‍යාලයේ පශ්චාත් උපාධි අධ්‍යයන ආයතනයේ ව්‍යාපාර පරිපාලන පශ්චාත් උපාධිය හදාරමින් සිටී.
අලෙවිකරණය,ආයෝජනය සහ ව්‍යාපාර කළමනාකරණය දේශීය මෙන්ම ජාත්‍යන්තරවද අත්දැකීම් ඇති Lakro Global Holdings (Pvt)Ltd ආයතනයේ නිර්මාතෘවරයා ය.
ඒ හැමදේටම වඩා Commerce සහ Business Studies ඉගැන්වීමට වසර ගණනාවක පළපුරුද්ද සහිත කෙටි කාලයක් තුල සිසුන් 500කට A/B සාමාර්ථ සඳහා මඟපෙන්වූ තරුණ ගුරුවරයෙකි.
              </p>
              <ul style={s.aboutBullets}>
                {[
                  "වසර 20කට අධික අත්දැකීම් සමගින් විෂය මාලාවේ පරතෙරටම ඉගැන්වීම",
                  "දිවයිනේ වැඩිම ඒ සංචිත ප්‍රමාණයක හිමිකරුවා",
                  "හුදු පන්ති කාමරට සීමා නොවූ අධ්‍යාපන රටාව",
                  "B.Sc. Engineering Honours – University of Moratuwa",
                ].map((point) => (
                  <li key={point} style={s.aboutBulletItem}>
                    <span style={s.check}>✓</span>
                    <span>{point}</span>
                  </li>
                ))}
              </ul>
              <a href="#" style={s.btnPrimary}>About More →</a>
            </div>
          </div>
        </div>
      </section>

      {/* GALLERY */}
      <section style={{ ...s.section, ...s.galleryBg }}>
        <div style={s.sectionInner}>
          <div style={{ textAlign: "center" }}>
            <span style={s.sectionTag}>Our Events Highlights</span>
            <h2 style={s.sectionTitle}>Photo Gallery</h2>
          </div>
          <div style={s.galleryGrid}>
            {galleryItems.map((item, idx) => (
              <div
                key={idx}
                style={{ ...s.galleryItem, background: `linear-gradient(135deg, ${item.bg} 0%, #f4f6fb 100%)` }}
                onMouseEnter={(e) => {
                  e.currentTarget.style.transform = "translateY(-6px)";
                  e.currentTarget.style.boxShadow = "0 14px 36px rgba(0,0,128,0.18)";
                  const overlay = e.currentTarget.querySelector("[data-overlay]");
                  if (overlay) overlay.style.opacity = "1";
                }}
                onMouseLeave={(e) => {
                  e.currentTarget.style.transform = "";
                  e.currentTarget.style.boxShadow = "";
                  const overlay = e.currentTarget.querySelector("[data-overlay]");
                  if (overlay) overlay.style.opacity = "0";
                }}
              >
                <span>{item.emoji}</span>
                <div data-overlay="true" style={{ ...s.galleryOverlay, opacity: 0 }}>
                  <span style={s.galleryLabel}>{item.label}</span>
                </div>
              </div>
            ))}
          </div>
          <div style={{ textAlign: "center", marginTop: 30 }}>
            <a href="#" style={s.btnPrimary}>View More Photos →</a>
          </div>
        </div>
      </section>

      {/* CTA BANNER */}
      <section style={s.ctaBanner}>
        <div style={s.ctaBannerInner}>
          <div style={s.ctaBannerTag}>Join in Your Favorite Courses Today</div>
          <h2 style={s.ctaBannerTitle}>2027 රසායනික විප්ලවයට එකතු වෙන්න</h2>
          <p style={s.ctaBannerSub}>
            2027 උසස්පෙළ සිසුන් වෙනුවෙන් අපගේ සූදානම පෙරනොවූ විරූ නවමු
            අධ්‍යාපනික ක්‍රමවේදයන් හා ප්‍රායෝගික භාවිතයන් තුළින් ඔබවෙත
            දැනුම ලබා දීමයි.
          </p>
          <a href="https://t.me/CD2027T" style={s.ctaBannerBtn}>Join Now →</a>
        </div>
        {[0, 1, 2].map((i) => (
          <div
            key={i}
            style={{
              position: "absolute",
              width: 200 + i * 90,
              height: 200 + i * 90,
              borderRadius: "50%",
              border: "1.5px solid rgba(255,255,255,0.06)",
              top: `${-30 + i * 20}%`,
              right: `${4 + i * 7}%`,
              pointerEvents: "none",
            }}
          />
        ))}
      </section>

      {/* FEATURES – ONLINE CLASSES */}
      <section style={s.section}>
        <div style={s.sectionInner}>
          <div style={{ textAlign: "center" }}>
            <span style={s.sectionTag}>Join in Your Live Course Today</span>
            <h2 style={s.sectionTitle}>Online Classes</h2>
            <p style={{ color: "#555", fontSize: 16, maxWidth: 600, margin: "0 auto" }}>
              Online Class for Everyone — ඔබේ ගෙදරට ශ්‍රී ලංකාවේ හොදම රසායන ගුරු ශිෂ්‍ය
              සම්බන්ධතාව.
            </p>
          </div>
          <div style={s.featuresGrid}>
            {features.map((f) => (
              <div
                key={f.title}
                style={s.featureCard}
                onMouseEnter={(e) => {
                  e.currentTarget.style.transform = "translateY(-4px)";
                  e.currentTarget.style.boxShadow = "0 12px 36px rgba(0,0,128,0.13)";
                }}
                onMouseLeave={(e) => {
                  e.currentTarget.style.transform = "";
                  e.currentTarget.style.boxShadow = "";
                }}
              >
                <div style={s.featureIcon}>{f.icon}</div>
                <div style={s.featureTitle}>{f.title}</div>
                <div style={s.featureDesc}>{f.desc}</div>
              </div>
            ))}
          </div>
          <div style={{ textAlign: "center", marginTop: 36 }}>
            <a href="https://chemistrywithcharitha.com/login" style={s.btnPrimary}>
              Register Now →
            </a>
          </div>
        </div>
      </section>

      {/* TESTIMONIALS */}
      <section style={{ ...s.section, ...s.testiSection }}>
        <div style={s.sectionInner}>
          <div style={{ textAlign: "center" }}>
            <span style={s.sectionTag}>Our Students Testimonials</span>
            <h2 style={s.sectionTitle}>ශිෂ්‍යයින්‌ගේ අදහ‌ස්</h2>
          </div>
          <div style={s.testiCarousel}>
            <div style={s.testiCard}>
              <p style={s.testiQuote}>"{testimonials[testimonialIndex].text}"</p>
              <div style={s.testiAvatar}>
                {testimonials[testimonialIndex].name[0]}
              </div>
              <div style={s.testiName}>{testimonials[testimonialIndex].name}</div>
              <div style={s.testiYear}>{testimonials[testimonialIndex].year}</div>
            </div>
            <div style={s.testiDots}>
              {testimonials.map((_, i) => (
                <button
                  key={i}
                  onClick={() => setTestimonialIndex(i)}
                  style={{
                    width: i === testimonialIndex ? 24 : 9,
                    height: 9,
                    borderRadius: 9,
                    background: i === testimonialIndex ? NAVY : "#c5c9e8",
                    border: "none",
                    cursor: "pointer",
                    transition: "width 0.3s, background 0.3s",
                    padding: 0,
                  }}
                />
              ))}
            </div>
          </div>
        </div>
      </section>

      {/* RESULTS */}
      <section style={{ ...s.section, ...s.resultsSection }} id="results">
        <div style={s.sectionInner}>
          <div style={{ textAlign: "center" }}>
            <span style={s.sectionTag}>Academic Excellence</span>
            <h2 style={s.sectionTitle}>Results</h2>
            <p style={{ color: "#555", fontSize: 16 }}>
              Consistently island-leading A passes for Advanced Level Chemistry.
            </p>
          </div>
          <div style={s.resultsGrid}>
            {[
              { num: "837", label: "A Passes — 2023" },
              { num: "4500+", label: "A Passes since 2015" },
              { num: "#1", label: "Island Ranking" },
              { num: "24+", label: "Years Teaching" },
            ].map((r) => (
              <div key={r.label} style={s.resultCard}>
                <div style={s.resultNum}>{r.num}</div>
                <div style={s.resultLabel}>{r.label}</div>
              </div>
            ))}
          </div>
          <div style={{ textAlign: "center", marginTop: 36 }}>
            <a
              href="https://chemistry.lk/results/"
              style={{
                ...s.btnPrimary,
                padding: "14px 38px",
                fontSize: 16,
              }}
            >
              View Results →
            </a>
          </div>
        </div>
      </section>

      {/* CONTACT */}
      <section style={s.section} id="contact">
        <div style={s.sectionInner}>
          <div style={{ textAlign: "center", marginBottom: 50 }}>
            <span style={s.sectionTag}>Get In Touch</span>
            <h2 style={s.sectionTitle}>Contact Us</h2>
          </div>
          <div style={s.contactGrid}>
            <div style={s.contactInfo}>
              {[
                { icon: "📞", label: "Phone", value: "0777 67 47 47" },
                { icon: "💬", label: "WhatsApp", value: "+94 777 184 380" },
                { icon: "📨", label: "Telegram", value: "@CDchemBot" },
                {
                  icon: "📍",
                  label: "Institutes",
                  value: "Gampaha | Nugegoda | Rathnapura | Bandarawela",
                },
              ].map((c) => (
                <div key={c.label} style={s.contactItem}>
                  <div style={s.contactIconBox}>{c.icon}</div>
                  <div>
                    <div style={s.contactLabel}>{c.label}</div>
                    <div style={s.contactValue}>{c.value}</div>
                  </div>
                </div>
              ))}
              <a href="http://wa.me/+94777184380" style={{ ...s.btnPrimary, marginTop: 10 }}>
                Book an Appointment →
              </a>
            </div>

            <div style={s.contactFormBox}>
              <div style={s.formTitle}>Send a Message</div>
              <div style={s.formRow}>
                <input placeholder="Your Name" style={s.formInput} />
              </div>
              <div style={s.formRow}>
                <input placeholder="Phone Number" style={s.formInput} />
              </div>
              <div style={s.formRow}>
                <textarea
                  placeholder="Your Message"
                  rows={4}
                  style={{ ...s.formInput, resize: "vertical" }}
                />
              </div>
              <button style={s.formBtn}>Send Message</button>
            </div>
          </div>
        </div>
      </section>

      {/* FOOTER */}
      <footer style={s.footer}>
        <div style={s.footerInner}>
          {/* Brand */}
          <div style={s.footerCol}>
            <div style={s.footerLogoRow}>
              <div style={s.footerLogoCircle}>C</div>
              <div style={s.footerLogoText}>Chemistry.lk</div>
            </div>
            <p style={s.footerDesc}>
              Sri Lanka's most trusted Advanced Level Chemistry lecturer.
              Island-best results since 2015. Teaching is not just a profession — it's a calling.
            </p>
            <div style={s.socialRow}>
              {[
                ["📘", "https://facebook.com"],
                ["📸", "https://instagram.com"],
                ["▶️", "https://youtube.com"],
                ["✈️", "https://t.me/CDchemBot"],
              ].map(([icon, href]) => (
                <a key={icon} href={href} style={s.socialIcon}>
                  {icon}
                </a>
              ))}
            </div>
          </div>

          {/* Quick Links */}
          <div style={s.footerCol}>
            <div style={s.footerHeading}>Quick Links</div>
            {["Home", "About", "Results", "All Island Paper Class", "Check Your Marks", "Gallery"].map(
              (l) => (
                <a key={l} href="#" style={s.footerLink}>
                  → {l}
                </a>
              )
            )}
          </div>

          {/* Institutes */}
          <div style={s.footerCol}>
            <div style={s.footerHeading}>Institutes</div>
            {institutes.map((inst) => (
              <a key={inst} href="#" style={s.footerLink}>
                → {inst}
              </a>
            ))}
            <a href="#" style={{ ...s.footerLink, marginTop: 4 }}>
              → දිවයිනටම Online
            </a>
          </div>

          {/* Contact */}
          <div style={s.footerCol}>
            <div style={s.footerHeading}>Contact Info</div>
            {[
              ["📞", "0777 67 47 47"],
              ["💬", "+94 777 184 380"],
              ["📨", "@CDchemBot (Telegram)"],
              ["🌐", "chemistry.lk"],
            ].map(([icon, val]) => (
              <div
                key={val}
                style={{ display: "flex", gap: 10, marginBottom: 12, alignItems: "flex-start" }}
              >
                <span style={{ fontSize: 15 }}>{icon}</span>
                <span style={{ color: "rgba(255,255,255,0.7)", fontSize: 14 }}>{val}</span>
              </div>
            ))}
          </div>
        </div>

        <div style={s.footerBottom}>
          <span style={s.footerCopy}>
            © {new Date().getFullYear()} Chemistry.lk — Charitha Dissanayake. All rights reserved.
          </span>
          <span style={s.footerCopy}>ISLANDWIDE BEST CHEMISTRY RESULTS</span>
        </div>
      </footer>
    </div>
  );
}