import React, { useState } from 'react';
import { useNavigate, Link } from 'react-router-dom';
import { useAuth } from '../context/AuthContext';
import { GraduationCap, Lock, Mail, ArrowLeft, Loader2 } from "lucide-react";

// Matches the Home page design tokens
const COLORS = {
  primary: "#2563EB",
  surface: "#FFFFFF",
  background: "#F8FAFC",
  textMain: "#1E293B",
  textMuted: "#64748B",
  border: "#E2E8F0",
  error: "#EF4444"
};

const Login = () => {
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [error, setError] = useState('');
  const [loading, setLoading] = useState(false);
  const navigate = useNavigate();
  const { login } = useAuth();

  const handleSubmit = async (e) => {
    e.preventDefault();
    setError('');
    setLoading(true);

    const result = await login(email, password);

    if (result.success) {
      const roleDashboards = {
        super_admin: '/super-admin/dashboard',
        admin: '/admin/dashboard',
        teacher: '/teacher/dashboard',
        student: '/student/dashboard',
      };
      navigate(roleDashboards[result.user.role] || '/');
    } else {
      setError(result.error || "Invalid credentials. Please try again.");
    }
    setLoading(false);
  };

  const quickLogin = (email, password) => {
    setEmail(email);
    setPassword(password);
  };

  return (
    <div style={styles.container}>
      {/* Back to Home Link */}
      <Link to="/" style={styles.backLink}>
        <ArrowLeft size={18} /> Back to website
      </Link>

      <div style={styles.loginCard}>
        {/* Logo Section */}
        <div style={styles.header}>
          <div style={styles.logoIcon}><GraduationCap color="#fff" size={28} /></div>
          <h1 style={styles.title}>Welcome Back</h1>
          <p style={styles.subtitle}>Log in to your ChemPro Academy account</p>
        </div>

        {error && <div style={styles.errorBox}>{error}</div>}

        <form onSubmit={handleSubmit} style={styles.form}>
          <div style={styles.inputGroup}>
            <label style={styles.label}>Email Address</label>
            <div style={styles.inputWrapper}>
              <Mail size={18} style={styles.inputIcon} />
              <input
                type="email"
                value={email}
                onChange={(e) => setEmail(e.target.value)}
                placeholder="name@example.com"
                style={styles.input}
                required
                disabled={loading}
              />
            </div>
          </div>

          <div style={styles.inputGroup}>
            <label style={styles.label}>Password</label>
            <div style={styles.inputWrapper}>
              <Lock size={18} style={styles.inputIcon} />
              <input
                type="password"
                value={password}
                onChange={(e) => setPassword(e.target.value)}
                placeholder="••••••••"
                style={styles.input}
                required
                disabled={loading}
              />
            </div>
          </div>

          <button type="submit" style={styles.loginButton} disabled={loading}>
            {loading ? <Loader2 style={styles.spinner} /> : 'Sign In'}
          </button>
        </form>

        <div style={styles.divider}>
          <span style={styles.dividerText}>Quick Access Demo</span>
        </div>

        <div style={styles.demoGrid}>
          <button onClick={() => quickLogin('admin@lms.com', 'password')} style={styles.demoBtn}>Admin</button>
          <button onClick={() => quickLogin('teacher@lms.com', 'password')} style={styles.demoBtn}>Teacher</button>
          <button onClick={() => quickLogin('student@lms.com', 'password')} style={styles.demoBtn}>Student</button>
        </div>
      </div>
    </div>
  );
};

const styles = {
  container: {
    minHeight: "100vh",
    display: "flex",
    flexDirection: "column",
    justifyContent: "center",
    alignItems: "center",
    backgroundColor: COLORS.background,
    padding: "20px",
    fontFamily: "'Inter', sans-serif",
  },
  backLink: {
    position: "absolute",
    top: 40,
    left: 40,
    display: "flex",
    alignItems: "center",
    gap: 8,
    color: COLORS.textMuted,
    textDecoration: "none",
    fontSize: 14,
    fontWeight: 500,
  },
  loginCard: {
    backgroundColor: COLORS.surface,
    padding: "48px",
    borderRadius: 24,
    boxShadow: "0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04)",
    width: "100%",
    maxWidth: 480,
  },
  header: {
    textAlign: "center",
    marginBottom: 32,
  },
  logoIcon: {
    backgroundColor: COLORS.primary,
    width: 56,
    height: 56,
    borderRadius: 16,
    display: "flex",
    alignItems: "center",
    justifyContent: "center",
    margin: "0 auto 20px auto",
  },
  title: {
    fontSize: 28,
    fontWeight: 800,
    color: COLORS.textMain,
    margin: "0 0 8px 0",
  },
  subtitle: {
    color: COLORS.textMuted,
    fontSize: 15,
    margin: 0,
  },
  errorBox: {
    backgroundColor: "#FEF2F2",
    color: COLORS.error,
    padding: "12px 16px",
    borderRadius: 12,
    fontSize: 14,
    marginBottom: 24,
    border: "1px solid #FEE2E2",
    textAlign: "center"
  },
  form: {
    display: "flex",
    flexDirection: "column",
    gap: 20,
  },
  inputGroup: {
    display: "flex",
    flexDirection: "column",
    gap: 8,
  },
  label: {
    fontSize: 14,
    fontWeight: 600,
    color: COLORS.textMain,
  },
  inputWrapper: {
    position: "relative",
    display: "flex",
    alignItems: "center",
  },
  inputIcon: {
    position: "absolute",
    left: 14,
    color: COLORS.textMuted,
  },
  input: {
    width: "100%",
    padding: "12px 12px 12px 42px",
    borderRadius: 12,
    border: `1px solid ${COLORS.border}`,
    fontSize: 15,
    outline: "none",
    transition: "border-color 0.2s",
    boxSizing: "border-box",
  },
  loginButton: {
    backgroundColor: COLORS.primary,
    color: "#fff",
    padding: "14px",
    borderRadius: 12,
    border: "none",
    fontSize: 16,
    fontWeight: 700,
    cursor: "pointer",
    marginTop: 10,
    transition: "transform 0.1s, opacity 0.2s",
    display: "flex",
    justifyContent: "center",
    alignItems: "center",
  },
  divider: {
    margin: "32px 0 20px 0",
    borderTop: `1px solid ${COLORS.border}`,
    position: "relative",
    textAlign: "center",
  },
  dividerText: {
    position: "absolute",
    top: "-10px",
    left: "50%",
    transform: "translateX(-50%)",
    backgroundColor: COLORS.surface,
    padding: "0 12px",
    fontSize: 12,
    color: COLORS.textMuted,
    textTransform: "uppercase",
    letterSpacing: "0.05em",
  },
  demoGrid: {
    display: "grid",
    gridTemplateColumns: "repeat(3, 1fr)",
    gap: 10,
  },
  demoBtn: {
    padding: "8px",
    borderRadius: 8,
    border: `1px solid ${COLORS.border}`,
    backgroundColor: "#fff",
    fontSize: 12,
    fontWeight: 600,
    color: COLORS.textMain,
    cursor: "pointer",
    transition: "all 0.2s",
  },
  spinner: {
    animation: "spin 1s linear infinite",
  }
};

export default Login;