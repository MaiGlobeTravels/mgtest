import axios from 'axios';

const api = axios.create({
  baseURL: 'http://127.0.0.1:8000',
  timeout: 10000,
  headers: {
    'Content-Type': 'application/json',
  },
});

export const getTours = async () => {
  const response = await api.get('/api/tours');
  return response.data;
};

export const createTour = async (tourData) => {
  const response = await api.post('/api/tours', tourData);
  return response.data;
};