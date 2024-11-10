import React, { useState } from "react";

const Navbar = () => {
    const [isOpen, setIsOpen] = useState(false);

    const toggleMenu = () => {
        setIsOpen(!isOpen);
    };

    return (
        <nav className="bg-blue-600 p-4">
            <div className="container mx-auto flex justify-between items-center">
                {/* Logo */}
                <div className="text-white font-bold text-xl">SiswaApp</div>

                {/* Mobile Menu Icon */}
                <button className="lg:hidden text-white" onClick={toggleMenu}>
                    <svg
                        className="w-6 h-6"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            strokeLinecap="round"
                            strokeLinejoin="round"
                            strokeWidth="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />
                    </svg>
                </button>

                {/* Navbar Links for Desktop */}
                <div className="hidden lg:flex space-x-6 text-white">
                    <a href="/" className="hover:text-gray-200">
                        Home
                    </a>
                    <a href="/about" className="hover:text-gray-200">
                        About
                    </a>
                    <a href="/siswa" className="hover:text-gray-200">
                        Siswa
                    </a>
                    <a href="/contact" className="hover:text-gray-200">
                        Contact
                    </a>
                </div>
            </div>

            {/* Mobile Menu */}
            <div
                className={`lg:hidden bg-blue-600 text-white text-center space-y-4 p-4 mt-4 ${
                    isOpen ? "block" : "hidden"
                }`}
            >
                <a href="/" className="block">
                    Home
                </a>
                <a href="/about" className="block">
                    About
                </a>
                <a href="/siswa" className="block">
                    Siswa
                </a>
                <a href="/contact" className="block">
                    Contact
                </a>
            </div>
        </nav>
    );
};

export default Navbar;
