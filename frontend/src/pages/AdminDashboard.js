import React, { useEffect, useState } from 'react';
import { useNavigate } from 'react-router-dom';
import { useAuth } from '../context/AuthContext';
import axios from 'axios';
import {
  LayoutDashboard,
  PlusCircle,
  BookOpen,
  Trash2,
  LogOut,
  Video,
  FileText,
  Calendar,
  User,
  Clock,
  Edit,
  ExternalLink,
  XCircle,
  Package,
  Layers
} from "lucide-react";

const API_BASE = 'http://127.0.0.1:8000/api';
const CLASS_API = `${API_BASE}/classes`;
const LESSON_API = `${API_BASE}/lessons`;
const PACKAGE_API = `${API_BASE}/packages`;

const COLORS = {
  primary: "#2563EB",
  surface: "#FFFFFF",
  background: "#F1F5F9",
  textMain: "#1E293B",
  textMuted: "#64748B",
  border: "#E2E8F0",
  error: "#EF4444",
  success: "#10B981"
};

const AdminDashboard = () => {
  const { user, logout } = useAuth();
  const navigate = useNavigate();

  /* ================= STATE ================= */
  const [classes, setClasses] = useState([]);
  const [lessons, setLessons] = useState([]);
  const [packages, setPackages] = useState([]);
  const [editingLessonId, setEditingLessonId] = useState(null);
  const [editPackageId, setEditPackageId] = useState(null);

  const [classForm, setClassForm] = useState({
    class_name: '', description: '', month: '', teacher_name: '', time: ''
  });

  const [lessonForm, setLessonForm] = useState({
    class_id: '', link: '', notice: '', lesson_type: 'nonpaid', tute: null
  });

  const [packageForm, setPackageForm] = useState({
    class_id: '', package_name: '', price: '', note: ''
  });

  /* ================= DATA LOADING ================= */
  const loadClasses = async () => {
    try {
      const res = await axios.get(CLASS_API);
      setClasses(res.data);
    } catch (err) { console.error("Failed to load classes"); }
  };

  const loadPackages = async () => {
    try {
      const res = await axios.get(PACKAGE_API);
      setPackages(res.data);
    } catch (err) { console.error("Failed to load packages"); }
  };

  const loadLessons = async () => {
    try {
      const res = await axios.get(LESSON_API);
      setLessons(res.data);
    } catch (err) { console.error("Failed to load lessons"); }
  };

  useEffect(() => {
    loadClasses();
    loadLessons();
    loadPackages();
  }, []);

  /* ================= ACTIONS ================= */
  const handleLogout = async () => {
    await logout();
    navigate('/login');
  };

  const handleClassSubmit = async (e) => {
    e.preventDefault();
    await axios.post(CLASS_API, classForm);
    loadClasses();
    setClassForm({ class_name: '', description: '', month: '', teacher_name: '', time: '' });
  };

  const handleDeleteClass = async (id) => {
    if (window.confirm("Delete this class?")) {
      await axios.delete(`${CLASS_API}/${id}`);
      loadClasses();
    }
  };

  const submitPackage = async (e) => {
    e.preventDefault();
    if (editPackageId) {
      await axios.put(`${PACKAGE_API}/${editPackageId}`, packageForm);
    } else {
      await axios.post(PACKAGE_API, packageForm);
    }
    loadPackages();
    setEditPackageId(null);
    setPackageForm({ class_id: '', package_name: '', price: '', note: '' });
  };

  const editPackage = (p) => {
    setEditPackageId(p.id);
    setPackageForm({
      class_id: p.class_id,
      package_name: p.package_name,
      price: p.price,
      note: p.note
    });
    window.scrollTo({ top: 0, behavior: 'smooth' });
  };

  const deletePackage = async (id) => {
    if (!window.confirm('Delete this package?')) return;
    await axios.delete(`${PACKAGE_API}/${id}`);
    loadPackages();
  };

  const submitLesson = async (e) => {
    e.preventDefault();
    const formData = new FormData();
    Object.keys(lessonForm).forEach(key => {
      if (lessonForm[key]) formData.append(key, lessonForm[key]);
    });

    try {
      if (editingLessonId) {
        await axios.post(`${LESSON_API}/${editingLessonId}?_method=PUT`, formData);
        alert('Lesson updated successfully');
      } else {
        await axios.post(LESSON_API, formData);
        alert('Lesson created successfully');
      }
      setLessonForm({ class_id: '', link: '', notice: '', lesson_type: 'nonpaid', tute: null });
      setEditingLessonId(null);
      loadLessons();
    } catch (error) {
      alert('Failed to save lesson');
    }
  };

  const deleteLesson = async (id) => {
    if (!window.confirm('Delete this lesson?')) return;
    await axios.delete(`${LESSON_API}/${id}`);
    loadLessons();
  };

  const startEditLesson = (lesson) => {
    setEditingLessonId(lesson.id);
    setLessonForm({
      class_id: lesson.class_id,
      link: lesson.link,
      notice: lesson.notice,
      lesson_type: lesson.lesson_type,
      tute: null
    });
    window.scrollTo({ top: 0, behavior: 'smooth' });
  };

  return (
    <div style={styles.dashboardContainer}>
      {/* --- SIDEBAR --- */}
      <aside style={styles.sidebar}>
        <div style={styles.logoArea}>
          <div style={styles.logoIcon}><LayoutDashboard size={20} color="#fff" /></div>
          <span style={styles.logoText}>AdminPanel</span>
        </div>

        <nav style={styles.sideNav}>
          <button style={styles.sideLinkActive}><Layers size={18} /> Management</button>
          <button style={styles.sideLink}><BookOpen size={18} /> Analytics</button>
          <button onClick={() => navigate("/payment-manage")}>
  Payments
</button>

        </nav>

        <button onClick={handleLogout} style={styles.logoutBtn}>
          <LogOut size={18} /> Logout
        </button>
      </aside>

      {/* --- MAIN CONTENT --- */}
      <main style={styles.mainContent}>
        <header style={styles.topHeader}>
          <div>
            <h2 style={{ margin: 0, color: COLORS.textMain }}>Portal Management</h2>
            <p style={{ margin: 0, color: COLORS.textMuted, fontSize: 14 }}>Manage your classes, lessons, and pricing packages</p>
          </div>
          <div style={styles.userInfo}>
            <div style={styles.avatar}>{user?.name?.charAt(0) || 'A'}</div>
            <span>{user?.role?.replace('_', ' ')}</span>
          </div>
        </header>

        {/* --- FORM GRID --- */}
        <div style={styles.grid}>
          {/* CLASS FORM */}
          <section style={styles.card}>
            <div style={styles.cardHeader}>
              <PlusCircle color={COLORS.primary} size={20} />
              <h3 style={styles.cardTitle}>Create New Class</h3>
            </div>
            <form onSubmit={handleClassSubmit} style={styles.form}>
              <input style={styles.input} placeholder="Class Name" value={classForm.class_name} onChange={(e) => setClassForm({ ...classForm, class_name: e.target.value })} required />
              <div style={styles.row}>
                <input style={styles.input} placeholder="Teacher" value={classForm.teacher_name} onChange={(e) => setClassForm({ ...classForm, teacher_name: e.target.value })} />
                <input style={styles.input} placeholder="Month" value={classForm.month} onChange={(e) => setClassForm({ ...classForm, month: e.target.value })} />
              </div>
              <input style={styles.input} placeholder="Time" value={classForm.time} onChange={(e) => setClassForm({ ...classForm, time: e.target.value })} />
              <textarea style={styles.textarea} placeholder="Description" value={classForm.description} onChange={(e) => setClassForm({ ...classForm, description: e.target.value })} />
              <button style={styles.primaryBtn}>Create Class</button>
            </form>
          </section>

          {/* LESSON FORM */}
          <section style={{ ...styles.card, border: editingLessonId ? `2px solid ${COLORS.primary}` : `1px solid ${COLORS.border}` }}>
            <div style={styles.cardHeader}>
              <Video color={COLORS.primary} size={20} />
              <h3 style={styles.cardTitle}>{editingLessonId ? "Edit Lesson" : "Upload Lesson"}</h3>
              {editingLessonId && (
                <button onClick={() => { setEditingLessonId(null); setLessonForm({ class_id: '', link: '', notice: '', lesson_type: 'nonpaid', tute: null }) }} style={styles.cancelBtn}>
                  <XCircle size={14} /> Cancel
                </button>
              )}
            </div>
            <form onSubmit={submitLesson} style={styles.form}>
              <select style={styles.input} value={lessonForm.class_id} onChange={e => setLessonForm({ ...lessonForm, class_id: e.target.value })} required>
                <option value="">Choose Class...</option>
                {classes.map(c => <option key={c.id} value={c.id}>{c.class_name}</option>)}
              </select>
              <input style={styles.input} placeholder="Video URL" value={lessonForm.link} onChange={e => setLessonForm({ ...lessonForm, link: e.target.value })} />
              <select style={styles.input} value={lessonForm.lesson_type} onChange={e => setLessonForm({ ...lessonForm, lesson_type: e.target.value })}>
                <option value="nonpaid">Free Lesson</option>
                <option value="paid">Paid (Locked)</option>
              </select>
              <div style={styles.fileInputContainer}>
                <FileText size={16} />
                <input type="file" style={styles.fileInput} onChange={e => setLessonForm({ ...lessonForm, tute: e.target.files[0] })} />
              </div>
              <button style={{ ...styles.primaryBtn, backgroundColor: editingLessonId ? COLORS.success : COLORS.textMain }}>
                {editingLessonId ? "Update Lesson" : "Post Lesson"}
              </button>
            </form>
          </section>

          {/* PACKAGE FORM (NEWLY INTEGRATED) */}
          <section style={{ ...styles.card, gridColumn: '1 / -1', border: editPackageId ? `2px solid ${COLORS.primary}` : `1px solid ${COLORS.border}` }}>
            <div style={styles.cardHeader}>
              <Package color={COLORS.primary} size={20} />
              <h3 style={styles.cardTitle}>{editPackageId ? "Edit Pricing Package" : "Create Pricing Package"}</h3>
              {editPackageId && (
                <button onClick={() => { setEditPackageId(null); setPackageForm({ class_id: '', package_name: '', price: '', note: '' }) }} style={styles.cancelBtn}>
                  <XCircle size={14} /> Cancel
                </button>
              )}
            </div>
            <form onSubmit={submitPackage} style={{ ...styles.form, flexDirection: 'row', alignItems: 'flex-end' }}>
              <div style={{ flex: 1, display: 'flex', flexDirection: 'column', gap: 10 }}>
                <select
                  style={styles.input}
                  value={packageForm.class_id}
                  onChange={(e) => {
                    const selectedClass = classes.find(c => c.id === parseInt(e.target.value));
                    setPackageForm({ ...packageForm, class_id: e.target.value, package_name: selectedClass ? selectedClass.class_name : '' });
                  }}
                  required
                >
                  <option value="">Select Class</option>
                  {classes.map(c => <option key={c.id} value={c.id}>{c.class_name}</option>)}
                </select>
                <input style={styles.input} type="number" placeholder="Price (LKR)" value={packageForm.price} onChange={e => setPackageForm({ ...packageForm, price: e.target.value })} required />
              </div>
              <div style={{ flex: 2, display: 'flex', flexDirection: 'column', gap: 10 }}>
                <textarea style={{ ...styles.textarea, minHeight: 85 }} placeholder="Package Notes/Description" value={packageForm.note} onChange={e => setPackageForm({ ...packageForm, note: e.target.value })} />
              </div>
              <button style={{ ...styles.primaryBtn, height: 45, padding: '0 30px' }}>
                {editPackageId ? 'Update' : 'Create'}
              </button>
            </form>
          </section>
        </div>

        {/* --- DATA TABLES --- */}
        <div style={{ marginTop: 40, display: 'flex', flexDirection: 'column', gap: 30 }}>
          
          {/* CLASSES TABLE */}
          <section style={styles.card}>
            <h3 style={{ ...styles.cardTitle, marginBottom: 20 }}>Active Classes</h3>
            <table style={styles.table}>
              <thead>
                <tr>
                  <th style={styles.th}>Class Name</th>
                  <th style={styles.th}>Teacher</th>
                  <th style={styles.th}>Schedule</th>
                  <th style={styles.th}>Action</th>
                </tr>
              </thead>
              <tbody>
                {classes.map(c => (
                  <tr key={c.id}>
                    <td style={styles.td}><strong>{c.class_name}</strong></td>
                    <td style={styles.td}>{c.teacher_name}</td>
                    <td style={styles.td}><div style={styles.badge}>{c.month}</div></td>
                    <td style={styles.td}>
                      <button onClick={() => handleDeleteClass(c.id)} style={styles.deleteAction}><Trash2 size={16} /></button>
                    </td>
                  </tr>
                ))}
              </tbody>
            </table>
          </section>

          {/* LESSONS TABLE */}
          <section style={styles.card}>
            <h3 style={{ ...styles.cardTitle, marginBottom: 20 }}>Uploaded Lessons</h3>
            <table style={styles.table}>
              <thead>
                <tr>
                  <th style={styles.th}>Class</th>
                  <th style={styles.th}>Type</th>
                  <th style={styles.th}>Resources</th>
                  <th style={styles.th}>Actions</th>
                </tr>
              </thead>
              <tbody>
                {lessons.length === 0 ? (
                  <tr><td colSpan="4" style={{ ...styles.td, textAlign: 'center' }}>No lessons found</td></tr>
                ) : (
                  lessons.map(l => (
                    <tr key={l.id}>
                      <td style={styles.td}>
                        <div style={{ fontWeight: 600 }}>{l.class_room?.class_name || 'General'}</div>
                        <div style={{ fontSize: 12, color: COLORS.textMuted }}>{l.notice}</div>
                      </td>
                      <td style={styles.td}>
                        <span style={{ ...styles.typeBadge, color: l.lesson_type === 'paid' ? COLORS.primary : COLORS.success }}>
                          {l.lesson_type}
                        </span>
                      </td>
                      <td style={styles.td}>
                        <div style={{ display: 'flex', gap: 10 }}>
                          {l.link && <a href={l.link} target="_blank" rel="noreferrer" style={styles.iconLink}><Video size={16} /></a>}
                          {l.tute && <a href={`http://localhost:8000/storage/${l.tute}`} target="_blank" rel="noreferrer" style={styles.iconLink}><FileText size={16} /></a>}
                        </div>
                      </td>
                      <td style={styles.td}>
                        <div style={{ display: 'flex', gap: 8 }}>
                          <button onClick={() => startEditLesson(l)} style={styles.editAction}><Edit size={16} /></button>
                          <button onClick={() => deleteLesson(l.id)} style={styles.deleteAction}><Trash2 size={16} /></button>
                        </div>
                      </td>
                    </tr>
                  ))
                )}
              </tbody>
            </table>
          </section>

          {/* PACKAGES TABLE */}
          <section style={styles.card}>
            <h3 style={{ ...styles.cardTitle, marginBottom: 20 }}>Pricing Packages</h3>
            <table style={styles.table}>
              <thead>
                <tr>
                  <th style={styles.th}>Class Reference</th>
                  <th style={styles.th}>Price</th>
                  <th style={styles.th}>Notes</th>
                  <th style={styles.th}>Actions</th>
                </tr>
              </thead>
              <tbody>
                {packages.map(p => (
                  <tr key={p.id}>
                    <td style={styles.td}><strong>{p.class_room?.class_name}</strong></td>
                    <td style={styles.td}><span style={{ color: COLORS.success, fontWeight: 700 }}>LKR {p.price}</span></td>
                    <td style={styles.td}>{p.note}</td>
                    <td style={styles.td}>
                      <div style={{ display: 'flex', gap: 8 }}>
                        <button onClick={() => editPackage(p)} style={styles.editAction}><Edit size={16} /></button>
                        <button onClick={() => deletePackage(p.id)} style={styles.deleteAction}><Trash2 size={16} /></button>
                      </div>
                    </td>
                  </tr>
                ))}
              </tbody>
            </table>
          </section>

        </div>
      </main>
    </div>
  );
};

const styles = {
  dashboardContainer: { display: 'flex', minHeight: '100vh', backgroundColor: COLORS.background, fontFamily: 'Inter, sans-serif' },
  sidebar: { width: 260, backgroundColor: COLORS.textMain, color: '#fff', display: 'flex', flexDirection: 'column', padding: '30px 20px', position: 'fixed', height: '100vh', zIndex: 10 },
  logoArea: { display: 'flex', alignItems: 'center', gap: 12, marginBottom: 40, padding: '0 10px' },
  logoIcon: { background: COLORS.primary, padding: 6, borderRadius: 8 },
  logoText: { fontSize: 20, fontWeight: 800, letterSpacing: -0.5 },
  sideNav: { display: 'flex', flexDirection: 'column', gap: 8, flex: 1 },
  sideLink: { background: 'transparent', border: 'none', color: '#94a3b8', display: 'flex', alignItems: 'center', gap: 12, padding: '12px 16px', borderRadius: 10, cursor: 'pointer', textAlign: 'left', fontSize: 15 },
  sideLinkActive: { background: 'rgba(255,255,255,0.1)', border: 'none', color: '#fff', display: 'flex', alignItems: 'center', gap: 12, padding: '12px 16px', borderRadius: 10, cursor: 'pointer', textAlign: 'left', fontSize: 15, fontWeight: 600 },
  logoutBtn: { background: 'rgba(239, 68, 68, 0.1)', color: '#f87171', border: 'none', padding: '12px', borderRadius: 10, cursor: 'pointer', display: 'flex', alignItems: 'center', justifyContent: 'center', gap: 10, fontWeight: 600 },
  mainContent: { flex: 1, marginLeft: 260, padding: '40px' },
  topHeader: { display: 'flex', justifyContent: 'space-between', alignItems: 'center', marginBottom: 30 },
  userInfo: { display: 'flex', alignItems: 'center', gap: 12, backgroundColor: '#fff', padding: '6px 16px 6px 6px', borderRadius: 50, border: `1px solid ${COLORS.border}`, fontSize: 14, fontWeight: 600 },
  avatar: { width: 32, height: 32, background: COLORS.primary, borderRadius: '50%', display: 'flex', alignItems: 'center', justifyContent: 'center', color: '#fff' },
  grid: { display: 'grid', gridTemplateColumns: '1fr 1fr', gap: 30 },
  card: { background: '#fff', padding: 25, borderRadius: 20, border: `1px solid ${COLORS.border}`, boxShadow: '0 4px 6px -1px rgba(0,0,0,0.05)' },
  cardHeader: { display: 'flex', alignItems: 'center', gap: 10, marginBottom: 20, position: 'relative' },
  cardTitle: { margin: 0, fontSize: 18, fontWeight: 700, color: COLORS.textMain },
  form: { display: 'flex', flexDirection: 'column', gap: 15 },
  row: { display: 'flex', gap: 15 },
  input: { padding: '12px', borderRadius: 10, border: `1px solid ${COLORS.border}`, outline: 'none', fontSize: 14, background: '#F8FAFC' },
  textarea: { padding: '12px', borderRadius: 10, border: `1px solid ${COLORS.border}`, outline: 'none', fontSize: 14, minHeight: 80, fontFamily: 'inherit', background: '#F8FAFC' },
  primaryBtn: { background: COLORS.primary, color: '#fff', border: 'none', padding: '14px', borderRadius: 10, fontWeight: 700, cursor: 'pointer', transition: '0.2s' },
  fileInputContainer: { border: `2px dashed ${COLORS.border}`, padding: '10px', borderRadius: 10, display: 'flex', alignItems: 'center', gap: 10, color: COLORS.textMuted },
  fileInput: { fontSize: 12 },
  table: { width: '100%', borderCollapse: 'collapse' },
  th: { textAlign: 'left', padding: '12px 15px', color: COLORS.textMuted, fontSize: 13, borderBottom: `1px solid ${COLORS.border}`, textTransform: 'uppercase' },
  td: { padding: '15px', borderBottom: `1px solid ${COLORS.border}`, fontSize: 14 },
  badge: { display: 'inline-flex', padding: '4px 10px', background: COLORS.background, borderRadius: 6, fontSize: 12, fontWeight: 600 },
  typeBadge: { textTransform: 'capitalize', fontWeight: 700, fontSize: 12 },
  iconLink: { color: COLORS.primary, display: 'flex', alignItems: 'center', justifyContent: 'center', width: 32, height: 32, borderRadius: 8, background: COLORS.background },
  editAction: { background: '#EFF6FF', color: COLORS.primary, border: 'none', padding: '8px', borderRadius: 8, cursor: 'pointer' },
  deleteAction: { background: '#FEF2F2', color: COLORS.error, border: 'none', padding: '8px', borderRadius: 8, cursor: 'pointer' },
  cancelBtn: { marginLeft: 'auto', background: 'none', border: 'none', color: COLORS.error, display: 'flex', alignItems: 'center', gap: 5, fontSize: 12, fontWeight: 600, cursor: 'pointer' }
};

export default AdminDashboard;