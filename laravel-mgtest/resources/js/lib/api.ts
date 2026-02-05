import axios from 'axios';

const api = axios.create({
    baseURL: '/api',
    headers: {
        'Content-Type': 'application/json',
    },
});

export type Tour = {
    id: string;
    title: string;
    description?: string;
    price?: number;
    date?: string;
    created_at?: string;
    updated_at?: string;
};

export const listTours = async (): Promise<Tour[]> => {
    const res = await api.get('/tours');
    return res.data;
};

export const createTour = async (payload: Partial<Tour>): Promise<Tour> => {
    const res = await api.post('api/tours', payload);
    return res.data;
};



export default api;
