import React, { useEffect, useState } from 'react';
import { useParams } from 'react-router-dom';
import axios from 'axios';

const LessonShow = () => {
  const { classId } = useParams();
  const [lessons, setLessons] = useState([]);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    setLoading(true);
    axios
      .get(`http://localhost:8000/api/classes/${classId}/lessons`)
      .then(res => {
        setLessons(res.data);
        setLoading(false);
      })
      .catch(() => setLoading(false));
  }, [classId]);

  return (
    <div style={styles.container}>
      <header style={styles.header}>
        <h2 style={styles.title}>Course Curriculum</h2>
        <p style={styles.subtitle}>Manage and view your class materials</p>
      </header>

      {loading ? (
        <p style={styles.message}>Loading lessons...</p>
      ) : lessons.length === 0 ? (
        <div style={styles.emptyState}>
          <p style={styles.message}>No lessons available yet.</p>
        </div>
      ) : (
        <div style={styles.grid}>
          {lessons.map(l => (
            <div key={l.id} style={styles.card} className="lesson-card">
              <div style={styles.badge(l.lesson_type)}>
                {l.lesson_type === 'paid' ? '🔒 Premium' : '✨ Free'}
              </div>
              
              <h3 style={styles.cardTitle}>{l.lesson_name || "Lesson Details"}</h3>
              <p style={styles.notice}>{l.notice}</p>

              {l.link ? (
                <a href={l.link} target="_blank" rel="noreferrer" style={styles.button}>
                  Watch Lesson
                </a>
              ) : (
                <span style={styles.disabledButton}>Link Unavailable</span>
              )}
            </div>
          ))}
        </div>
      )}
    </div>
  );
};

const styles = {
  container: {
    backgroundColor: '#f8fafc', // Modern off-white
    minHeight: '100vh',
    padding: '40px 20px',
    fontFamily: '"Inter", system-ui, sans-serif',
  },
  header: {
    maxWidth: '1200px',
    margin: '0 auto 40px auto',
  },
  title: {
    fontSize: '2rem',
    color: '#1e293b',
    margin: 0,
  },
  subtitle: {
    color: '#64748b',
    marginTop: '8px',
  },
  grid: {
    display: 'grid',
    gridTemplateColumns: 'repeat(auto-fill, minmax(300px, 1fr))',
    gap: '24px',
    maxWidth: '1200px',
    margin: '0 auto',
  },
  card: {
    background: '#ffffff',
    padding: '24px',
    borderRadius: '16px',
    boxShadow: '0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)',
    display: 'flex',
    flexDirection: 'column',
    transition: 'transform 0.2s ease',
    border: '1px solid #f1f5f9',
  },
  badge: (type) => ({
    alignSelf: 'flex-start',
    padding: '4px 12px',
    borderRadius: '20px',
    fontSize: '0.75rem',
    fontWeight: 'bold',
    marginBottom: '16px',
    backgroundColor: type === 'paid' ? '#fef3c7' : '#dcfce7',
    color: type === 'paid' ? '#92400e' : '#166534',
  }),
  cardTitle: {
    fontSize: '1.25rem',
    color: '#0f172a',
    margin: '0 0 12px 0',
  },
  notice: {
    color: '#475569',
    fontSize: '0.95rem',
    lineHeight: '1.5',
    marginBottom: '24px',
    flexGrow: 1,
  },
  button: {
    display: 'block',
    textAlign: 'center',
    backgroundColor: '#2563eb', // Primary Blue
    color: '#fff',
    padding: '12px',
    borderRadius: '8px',
    textDecoration: 'none',
    fontWeight: '600',
    transition: 'background 0.2s ease',
  },
  disabledButton: {
    textAlign: 'center',
    color: '#94a3b8',
    fontSize: '0.9rem',
    fontStyle: 'italic',
  },
  message: {
    textAlign: 'center',
    color: '#64748b',
    marginTop: '50px',
  }
};

export default LessonShow;