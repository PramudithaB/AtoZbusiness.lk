import React, { useEffect, useState } from 'react';
import { useNavigate } from 'react-router-dom';
import { useAuth } from '../context/AuthContext';
import axios from 'axios';
import { 
  BookOpen, 
  Video, 
  FileText, 
  LogOut, 
  Layout, 
  GraduationCap, 
  Clock, 
  PlayCircle,
  Download,
  Search
} from "lucide-react";


const CLASS_API = 'http://localhost:8000/api/classes';

const COLORS = {
  primary: "#2563EB",
  surface: "#FFFFFF",
  background: "#F8FAFC",
  textMain: "#1E293B",
  textMuted: "#64748B",
  border: "#E2E8F0",
  accent: "#DBEAFE"
};

const StudentDashboard = () => {
  const navigate = useNavigate();
  const { user, logout } = useAuth();
  const [classes, setClasses] = useState([]);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    const fetchClasses = async () => {
      try {
        const res = await axios.get(CLASS_API);
        setClasses(res.data);
      } catch (err) {
        console.error("Failed to load courses");
      } finally {
        setLoading(false);
      }
    };
    fetchClasses();
  }, []);

  const handleLogout = async () => {
    await logout();
    navigate('/login');
  };

  return (
    <div style={styles.container}>
      {/* --- SIDEBAR --- */}
      <aside style={styles.sidebar}>
        <div style={styles.logoSection}>
          <div style={styles.logoIcon}><GraduationCap size={22} color="#fff" /></div>
          <span style={styles.logoText}>ChemPro</span>
        </div>
        
        <nav style={styles.nav}>
          <button style={styles.navItemActive}><Layout size={18} /> Dashboard</button>
          <button style={styles.navItem}><BookOpen size={18} /> My Courses</button>
<button 
  style={styles.navItem} 
  onClick={() => navigate('/buy-class')}
>
  <Clock size={18} /> Buy Class
</button>
        </nav>

        <button onClick={handleLogout} style={styles.logoutBtn}>
          <LogOut size={18} /> Logout
        </button>
      </aside>

      {/* --- MAIN CONTENT --- */}
      <main style={styles.main}>
        <header style={styles.header}>
          <div>
            <h1 style={styles.welcomeText}>Hello, {user?.name || 'Student'}! 👋</h1>
            <p style={styles.subText}>Welcome back to your learning portal.</p>
          </div>
          
          <div style={styles.searchBar}>
            <Search size={18} color={COLORS.textMuted} />
            <input type="text" placeholder="Search courses..." style={styles.searchInput} />
          </div>
        </header>

        {/* --- STATS SUMMARY --- */}
        <div style={styles.statsRow}>
          <div style={styles.statBox}>
            <span style={styles.statLabel}>Enrolled Classes</span>
            <span style={styles.statValue}>{classes.length}</span>
          </div>
          <div style={styles.statBox}>
            <span style={styles.statLabel}>Completed Lessons</span>
            <span style={styles.statValue}>12</span>
          </div>
        </div>

        <h3 style={styles.sectionTitle}>Enrolled Classes</h3>
        
        {loading ? (
          <p>Loading your courses...</p>
        ) : (
          <div style={styles.courseGrid}>
            {classes.map((item) => (
              <div key={item.id} style={styles.courseCard}>
                <div style={styles.cardHeader}>
                  <div style={styles.classBadge}>{item.month || 'Active'}</div>
                  <h4 style={styles.courseTitle}>{item.class_name}</h4>
                  <p style={styles.teacherName}>By {item.teacher_name}</p>
                </div>
                
                <div style={styles.cardBody}>
                  <p style={styles.description}>
                    {item.description || 'Access all video lessons and tutes for this class month.'}
                  </p>
                  <div style={styles.timeInfo}>
                    <Clock size={14} /> <span>{item.time || 'Weekly Sessions'}</span>
                  </div>
                </div>

                <div style={styles.cardFooter}>
                  {/* FIXED: Single button per card that navigates to the specific class lessons */}
                  <button 
                    style={styles.watchBtn} 
                    onClick={() => navigate(`/lessons/${item.id}`)}
                  >
                    <PlayCircle size={16} /> Watch Lessons
                  </button>
                  <button style={styles.tuteBtn} title="Download Tute">
                    <Download size={16} />
                  </button>
                </div>
              </div>
            ))}
          </div>
        )}
      </main>
    </div>
  );
};

/* ================= STYLES ================= */

const styles = {
  container: { display: 'flex', minHeight: '100vh', backgroundColor: COLORS.background, fontFamily: "'Inter', sans-serif" },
  sidebar: { width: 260, backgroundColor: COLORS.surface, borderRight: `1px solid ${COLORS.border}`, display: 'flex', flexDirection: 'column', padding: '30px 20px', position: 'fixed', height: '100vh' },
  logoSection: { display: 'flex', alignItems: 'center', gap: 12, marginBottom: 40 },
  logoIcon: { backgroundColor: COLORS.primary, padding: 6, borderRadius: 8, display: 'flex' },
  logoText: { fontSize: 20, fontWeight: 800, color: COLORS.textMain },
  nav: { display: 'flex', flexDirection: 'column', gap: 10, flex: 1 },
  navItem: { display: 'flex', alignItems: 'center', gap: 12, padding: '12px 16px', borderRadius: 12, border: 'none', backgroundColor: 'transparent', color: COLORS.textMuted, fontSize: 15, fontWeight: 500, cursor: 'pointer', textAlign: 'left', transition: '0.2s' },
  navItemActive: { display: 'flex', alignItems: 'center', gap: 12, padding: '12px 16px', borderRadius: 12, border: 'none', backgroundColor: COLORS.accent, color: COLORS.primary, fontSize: 15, fontWeight: 600, cursor: 'pointer', textAlign: 'left' },
  logoutBtn: { display: 'flex', alignItems: 'center', gap: 12, padding: '12px 16px', borderRadius: 12, border: 'none', backgroundColor: '#FFF1F2', color: '#E11D48', fontSize: 15, fontWeight: 600, cursor: 'pointer' },
  main: { flex: 1, marginLeft: 260, padding: '40px 60px' },
  header: { display: 'flex', justifyContent: 'space-between', alignItems: 'flex-start', marginBottom: 40 },
  welcomeText: { fontSize: 28, fontWeight: 800, color: COLORS.textMain, margin: 0 },
  subText: { color: COLORS.textMuted, marginTop: 4 },
  searchBar: { display: 'flex', alignItems: 'center', gap: 10, backgroundColor: COLORS.surface, padding: '10px 18px', borderRadius: 12, border: `1px solid ${COLORS.border}`, width: 300 },
  searchInput: { border: 'none', outline: 'none', width: '100%', fontSize: 14 },
  statsRow: { display: 'flex', gap: 20, marginBottom: 40 },
  statBox: { backgroundColor: COLORS.surface, padding: '20px 30px', borderRadius: 16, border: `1px solid ${COLORS.border}`, display: 'flex', flexDirection: 'column', minWidth: 160 },
  statLabel: { fontSize: 13, color: COLORS.textMuted, fontWeight: 500 },
  statValue: { fontSize: 24, fontWeight: 800, color: COLORS.primary, marginTop: 4 },
  sectionTitle: { fontSize: 20, fontWeight: 700, color: COLORS.textMain, marginBottom: 20 },
  courseGrid: { display: 'grid', gridTemplateColumns: 'repeat(auto-fill, minmax(320px, 1fr))', gap: 25 },
  courseCard: { backgroundColor: COLORS.surface, borderRadius: 20, border: `1px solid ${COLORS.border}`, overflow: 'hidden', display: 'flex', flexDirection: 'column', transition: 'transform 0.2s, box-shadow 0.2s' },
  cardHeader: { padding: '25px 25px 15px 25px', background: `linear-gradient(135deg, #EFF6FF 0%, #FFFFFF 100%)` },
  classBadge: { display: 'inline-block', padding: '4px 10px', backgroundColor: COLORS.primary, color: '#fff', borderRadius: 6, fontSize: 11, fontWeight: 700, textTransform: 'uppercase', marginBottom: 12 },
  courseTitle: { fontSize: 19, fontWeight: 700, color: COLORS.textMain, margin: 0 },
  teacherName: { fontSize: 14, color: COLORS.textMuted, marginTop: 4 },
  cardBody: { padding: '0 25px 20px 25px', flex: 1 },
  description: { fontSize: 14, color: COLORS.textMuted, lineHeight: 1.5 },
  timeInfo: { display: 'flex', alignItems: 'center', gap: 6, fontSize: 13, color: COLORS.textMain, marginTop: 15, fontWeight: 500 },
  cardFooter: { padding: '20px 25px', borderTop: `1px solid ${COLORS.border}`, display: 'flex', gap: 12 },
  watchBtn: { flex: 1, display: 'flex', alignItems: 'center', justifyContent: 'center', gap: 8, padding: '10px', backgroundColor: COLORS.primary, color: '#fff', border: 'none', borderRadius: 10, fontSize: 14, fontWeight: 600, cursor: 'pointer' },
  tuteBtn: { padding: '10px', backgroundColor: COLORS.background, color: COLORS.textMain, border: `1px solid ${COLORS.border}`, borderRadius: 10, cursor: 'pointer', display: 'flex', alignItems: 'center' }
};

export default StudentDashboard;