import React, { useEffect, useState } from "react";
import axios from "axios";
import { useNavigate } from "react-router-dom";

const BuyClass = () => {
  const navigate = useNavigate();

  const [packages, setPackages] = useState([]);
  const [cart, setCart] = useState([]);

  // LOAD PACKAGES
  const loadPackages = async () => {
    try {
      const res = await axios.get("http://127.0.0.1:8000/api/packages");
      setPackages(res.data);
    } catch (error) {
      console.log("Failed to load packages");
    }
  };

  useEffect(() => {
    loadPackages();
  }, []);

  // ADD TO CART
  const addToCart = (pkg) => {
    setCart((prev) => [...prev, pkg]);
  };

  // REMOVE FROM CART
  const removeItem = (index) => {
    setCart((prev) => prev.filter((_, i) => i !== index));
  };

  // TOTAL
  const total = cart.reduce((sum, p) => sum + parseFloat(p.price), 0);

  return (
    <div style={styles.container}>
      <h2 style={styles.title}>Buy a Class Package</h2>

      {/* PACKAGE LIST */}
      <div style={styles.grid}>
        {packages.map((p) => (
          <div key={p.id} style={styles.card}>
            <h3 style={styles.cardTitle}>{p.package_name}</h3>
            <p style={styles.className}>{p.class_room?.class_name}</p>
            <p style={styles.price}>Rs. {p.price}</p>
            <p style={styles.note}>{p.note}</p>

            <button style={styles.selectBtn} onClick={() => addToCart(p)}>
              Add to Cart
            </button>
          </div>
        ))}
      </div>

      {/* CART SECTION */}
      <div style={styles.cartSection}>
        <h2 style={styles.cartTitle}>Your Cart</h2>

        {cart.length === 0 ? (
          <p style={styles.emptyCart}>No items in cart</p>
        ) : (
          <table style={styles.table}>
            <thead>
              <tr>
                <th style={styles.th}>Package</th>
                <th style={styles.th}>Class</th>
                <th style={styles.th}>Price</th>
                <th style={styles.th}>Action</th>
              </tr>
            </thead>

            <tbody>
              {cart.map((item, index) => (
                <tr key={index}>
                  <td style={styles.td}>{item.package_name}</td>
                  <td style={styles.td}>{item.class_room?.class_name}</td>
                  <td style={styles.td}>Rs. {item.price}</td>
                  <td style={styles.td}>
                    <button
                      style={styles.removeBtn}
                      onClick={() => removeItem(index)}
                    >
                      Remove
                    </button>
                  </td>
                </tr>
              ))}
            </tbody>
          </table>
        )}

        {/* TOTAL */}
        {cart.length > 0 && (
          <h3 style={{ marginTop: 20 }}>Total Amount: Rs. {total}</h3>
        )}

        {/* CHECKOUT BUTTON */}
        <div style={{ marginTop: 30, textAlign: "center" }}>
          <button
            style={styles.checkoutBtn}
            disabled={cart.length === 0}
            onClick={() =>
              navigate("/checkout", {
                state: { cartItems: cart, totalAmount: total },
              })
            }
          >
            Proceed to Checkout
          </button>
        </div>
      </div>
    </div>
  );
};

const styles = {
  container: {
    padding: "40px",
    background: "#F8FAFC",
    minHeight: "100vh",
  },
  title: {
    fontSize: "28px",
    textAlign: "center",
    marginBottom: "30px",
    fontWeight: "700",
  },
  grid: {
    display: "grid",
    gridTemplateColumns: "repeat(auto-fill, minmax(260px, 1fr))",
    gap: "20px",
  },
  card: {
    background: "#fff",
    padding: "20px",
    borderRadius: "12px",
    boxShadow: "0 4px 10px rgba(0,0,0,0.08)",
  },
  cardTitle: {
    fontSize: "20px",
    fontWeight: "700",
  },
  className: {
    color: "#64748B",
  },
  price: {
    fontSize: "22px",
    fontWeight: "700",
    color: "#2563EB",
    marginTop: "10px",
  },
  note: { fontSize: "14px", color: "#475569" },
  selectBtn: {
    marginTop: "15px",
    width: "100%",
    padding: "12px",
    fontWeight: "600",
    background: "#2563EB",
    color: "#fff",
    borderRadius: "8px",
    border: "none",
    cursor: "pointer",
  },
  cartSection: {
    marginTop: "50px",
    padding: "20px",
    background: "#fff",
    borderRadius: "12px",
    boxShadow: "0 4px 10px rgba(0,0,0,0.06)",
  },
  cartTitle: { fontSize: "22px", fontWeight: "700", marginBottom: "20px" },
  emptyCart: { textAlign: "center", color: "#94A3B8" },
  table: { width: "100%", borderCollapse: "collapse" },
  th: { padding: "12px", borderBottom: "1px solid #E2E8F0", color: "#64748B" },
  td: { padding: "12px", borderBottom: "1px solid #E2E8F0" },
  removeBtn: {
    background: "#EF4444",
    color: "#fff",
    padding: "8px 12px",
    borderRadius: "6px",
    border: "none",
    cursor: "pointer",
  },
  checkoutBtn: {
    padding: "14px 40px",
    background: "#16A34A",
    color: "#fff",
    fontSize: "18px",
    border: "none",
    borderRadius: "10px",
    cursor: "pointer",
    fontWeight: "700",
  },
};

export default BuyClass;
