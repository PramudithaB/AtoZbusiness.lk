import React, { useState } from "react";
import { useLocation } from "react-router-dom";
import axios from "axios";

const Checkout = () => {
  const location = useLocation();
  const { cartItems = [], totalAmount = 0 } = location.state || {};

  const [form, setForm] = useState({
    name: "",
    address: "",
    remark: "",
  });

  const [slip, setSlip] = useState(null);
  const [loading, setLoading] = useState(false);
  const [errors, setErrors] = useState({});

 const handleSubmit = async (e) => {
  e.preventDefault();
  setErrors({});

  const formData = new FormData();
  formData.append("full_name", form.full_name);
  formData.append("address", form.address);
  formData.append("remarks", form.remarks);
  formData.append("total", totalAmount);
  formData.append("packages", JSON.stringify(cartItems)); // ✔ FIXED
  formData.append("slip", slip);

  try {
    setLoading(true);

    await axios.post("http://127.0.0.1:8000/api/payments", formData, {
      headers: { "Content-Type": "multipart/form-data" },
    });

    alert("Payment submitted successfully!");
  } catch (error) {
    console.log("VALIDATION ERROR:", error.response.data);

    if (error.response?.data?.errors) {
      setErrors(error.response.data.errors);
    } else {
      alert("Payment failed!");
    }
  } finally {
    setLoading(false);
  }
};



  return (
    <div style={styles.container}>
      <h2 style={styles.title}>Checkout</h2>

      {/* SUMMARY */}
      <div style={styles.card}>
        <h3>Your Order</h3>

        <table style={styles.table}>
          <thead>
            <tr>
              <th style={styles.th}>Package</th>
              <th style={styles.th}>Class</th>
              <th style={styles.th}>Price</th>
            </tr>
          </thead>
          <tbody>
            {cartItems.map((item, i) => (
              <tr key={i}>
                <td style={styles.td}>{item.package_name}</td>
                <td style={styles.td}>{item.class_room?.class_name}</td>
                <td style={styles.td}>Rs. {item.price}</td>
              </tr>
            ))}
          </tbody>
        </table>

        <h3 style={{ marginTop: 20 }}>Total: Rs. {totalAmount}</h3>
      </div>

      {/* FORM */}
      <div style={styles.card}>
        <h3>Payment Details</h3>

        <form style={styles.form} onSubmit={handleSubmit}>
          {/* NAME */}
          <input
            style={styles.input}
            placeholder="Full Name"
            value={form.name}
            onChange={(e) => setForm({ ...form, name: e.target.value })}
            required
          />
          {errors.name && <p style={styles.error}>{errors.name[0]}</p>}

          {/* ADDRESS */}
          <input
            style={styles.input}
            placeholder="Address"
            value={form.address}
            onChange={(e) => setForm({ ...form, address: e.target.value })}
            required
          />
          {errors.address && <p style={styles.error}>{errors.address[0]}</p>}

          {/* PACKAGE NAME */}
          <input
            style={styles.input}
            readOnly
            value={cartItems.map((i) => i.package_name).join(", ")}
          />

          {/* REMARK */}
          <textarea
            style={styles.textarea}
            placeholder="Remarks"
            value={form.remark}
            onChange={(e) => setForm({ ...form, remark: e.target.value })}
          ></textarea>

          {/* SLIP */}
          <label style={styles.label}>Upload Payment Slip</label>
          <input
            type="file"
            accept="image/*"
            style={styles.input}
            onChange={(e) => setSlip(e.target.files[0])}
            required
          />
          {errors.slip && <p style={styles.error}>{errors.slip[0]}</p>}

          <button style={styles.submitBtn} disabled={loading}>
            {loading ? "Submitting..." : "Submit Payment"}
          </button>
        </form>
      </div>
    </div>
  );
};

const styles = {
  container: { padding: "40px", minHeight: "100vh", background: "#F8FAFC" },
  title: { fontSize: 30, fontWeight: "700", marginBottom: 30 },
  card: {
    background: "#fff",
    padding: 25,
    borderRadius: 12,
    marginBottom: 30,
    boxShadow: "0 4px 10px rgba(0,0,0,0.08)",
  },
  table: { width: "100%", borderCollapse: "collapse" },
  th: { padding: 12, borderBottom: "1px solid #E2E8F0" },
  td: { padding: 12, borderBottom: "1px solid #E2E8F0" },
  form: { display: "flex", flexDirection: "column", gap: 15 },
  input: {
    padding: 12,
    borderRadius: 8,
    border: "1px solid #CBD5E1",
  },
  textarea: {
    padding: 12,
    borderRadius: 8,
    border: "1px solid #CBD5E1",
    minHeight: 90,
  },
  submitBtn: {
    padding: 14,
    background: "#2563EB",
    border: "none",
    borderRadius: 8,
    color: "#fff",
    fontWeight: 700,
    cursor: "pointer",
  },
  label: { fontWeight: 600 },
  error: { color: "red", fontSize: 13, marginTop: -10 },
};

export default Checkout;
