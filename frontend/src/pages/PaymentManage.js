import React, { useEffect, useState } from "react";
import axios from "axios";

const PaymentManage = () => {
  const [payments, setPayments] = useState([]);

  const loadPayments = async () => {
    const res = await axios.get("http://127.0.0.1:8000/api/payments");
    setPayments(res.data);
  };

  const approve = async (id) => {
    await axios.post(`http://127.0.0.1:8000/api/payments/${id}/approve`);
    loadPayments();
  };

  const reject = async (id) => {
    await axios.post(`http://127.0.0.1:8000/api/payments/${id}/reject`);
    loadPayments();
  };

  useEffect(() => {
    loadPayments();
  }, []);

  return (
    <div style={{ padding: 30 }}>
      <h2>Payment Management</h2>

      <table border="1" cellPadding="10">
        <thead>
          <tr>
            <th>User</th>
            <th>Packages</th>
            <th>Total</th>
            <th>Slip</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody>
          {payments.map((p) => (
            <tr key={p.id}>
              <td>{p.full_name}</td>

              {/* FIXED PACKAGE DISPLAY */}
              <td>
                {Array.isArray(p.packages)
                  ? p.packages.map(pkg => pkg.package_name).join(", ")
                  : "Invalid format"}
              </td>

              <td>Rs. {p.total}</td>

              <td>
                <a
                  href={`http://127.0.0.1:8000/storage/${p.slip}`}
                  target="_blank"
                >
                  View Slip
                </a>
              </td>
              <td>{p.status}</td>

              <td>
                <button onClick={() => approve(p.id)}>Approve</button>
                <button onClick={() => reject(p.id)}>Reject</button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>

    </div>
  );
};

export default PaymentManage;
