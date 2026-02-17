import axios from 'axios';

const API_URL = 'http://127.0.0.1:8000/api/classes';

export const getClasses = () => axios.get(API_URL);
export const createClass = (data) => axios.post(API_URL, data);
export const updateClass = (id, data) => axios.put(`${API_URL}/${id}`, data);
export const deleteClass = (id) => axios.delete(`${API_URL}/${id}`);
