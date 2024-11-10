import React from "react";
import { motion } from "framer-motion";

const SiswaCard = ({ siswa, index }) => {
    // Generate a random image URL
    const randomImageUrl = `https://picsum.photos/200/300?random=${siswa.id}`;

    return (
        <motion.div
            className="bg-white rounded-lg shadow-md overflow-hidden"
            initial={{ opacity: 0, y: 20 }} // initial state (hidden and slightly translated down)
            animate={{ opacity: 1, y: 0 }} // animate to full opacity and original position
            exit={{ opacity: 0, y: 20 }} // exit state (fade out and translate down)
            transition={{ duration: 0.5 }} // animation duration
        >
            {/* Image or Placeholder */}
            <img
                src={randomImageUrl}
                alt="Student"
                className="w-full h-40 object-cover"
            />

            <div className="p-4">
                {/* Student Info */}
                <h3 className="text-xl font-semibold text-gray-700">
                    {index + 1}. {siswa.nama_siswa}
                </h3>
                <p className="text-gray-600">Kelas: {siswa.kelas_siswa}</p>
                <p className="text-gray-500">Status: {siswa.status}</p>
            </div>
        </motion.div>
    );
};

export default SiswaCard;
