import axios from "axios";

const API_URL = "http://127.0.0.1:8000/api/payments";

// file upload
const axiosFile = axios.create({
  baseURL: "http://127.0.0.1:8000/api",
  headers: {
    "Content-Type": "multipart/form-data",
  },
});

export const submitPayment = (formData) =>
  axiosFile.post(`/payments`, formData);

export const getPayments = () => axios.get(API_URL);
export const approvePayment = (id) =>
  axios.put(`${API_URL}/${id}/approve`);
export const rejectPayment = (id) =>
  axios.put(`${API_URL}/${id}/reject`);
