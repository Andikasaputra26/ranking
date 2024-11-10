import React, { useContext } from "react";
import { motion, AnimatePresence } from "framer-motion";
import SiswaContext from "../context/SiswaContext";
import SiswaCard from "./SiswaCard";

const SiswaList = () => {
    const { siswa, loading, error } = useContext(SiswaContext);
    const loadingVariants = {
        initial: { opacity: 0, y: 20 },
        animate: { opacity: 1, y: 0 },
        exit: { opacity: 0, y: -20 },
    };
    const errorVariants = {
        initial: { opacity: 0, x: -20 },
        animate: { opacity: 1, x: 0 },
        exit: { opacity: 0, x: 20 },
    };

    if (loading) {
        return (
            <motion.div
                className="text-center text-lg"
                initial="initial"
                animate="animate"
                exit="exit"
                variants={loadingVariants}
                transition={{ duration: 0.5 }}
            >
                Loading...
            </motion.div>
        );
    }

    if (error) {
        return (
            <motion.div
                className="text-center text-red-500"
                initial="initial"
                animate="animate"
                exit="exit"
                variants={errorVariants}
                transition={{ duration: 0.5 }}
            >
                {error}
            </motion.div>
        );
    }

    return (
        <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 p-4">
            <AnimatePresence>
                {siswa && siswa.length > 0 ? (
                    siswa.map((siswaItem, index) => (
                        <motion.div
                            key={siswaItem.id}
                            initial={{ opacity: 0 }}
                            animate={{ opacity: 1 }}
                            exit={{ opacity: 0 }}
                            transition={{ duration: 0.5 }}
                        >
                            <SiswaCard siswa={siswaItem} index={index} />
                        </motion.div>
                    ))
                ) : (
                    <div className="col-span-full text-center py-4">
                        Tidak ada data siswa.
                    </div>
                )}
            </AnimatePresence>
        </div>
    );
};

export default SiswaList;
