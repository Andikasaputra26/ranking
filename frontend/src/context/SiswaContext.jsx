import React, { createContext, useState, useEffect } from "react";
import axios from "axios";

// Membuat context
const SiswaContext = createContext();

// Menyediakan context dengan provider
export const SiswaProvider = ({ children }) => {
    const [siswa, setSiswa] = useState([]);
    const [loading, setLoading] = useState(false);
    const [error, setError] = useState(null);

    const fetchSiswa = async () => {
        setLoading(true);
        try {
            const response = await axios.get("http://127.0.0.1:8000/api/siswa");
            setSiswa(response.data.data);
            setLoading(false);
        } catch (err) {
            setError("Gagal mengambil data");
            setLoading(false);
        }
    };

    useEffect(() => {
        fetchSiswa();
    }, []);

    return (
        <SiswaContext.Provider value={{ siswa, loading, error }}>
            {children}
        </SiswaContext.Provider>
    );
};

export default SiswaContext;
