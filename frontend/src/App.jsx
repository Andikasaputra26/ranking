import Navbar from "./components/Navbar";
import SiswaList from "./components/SiswaList";
import { SiswaProvider } from "./context/SiswaContext";

function App() {
    return (
        <>
            <Navbar />
            <SiswaProvider>
                <div className="text-center">
                    <h1 className="text-3xl font-bold ">Siswa</h1>
                </div>
                <SiswaList />
            </SiswaProvider>
        </>
    );
}

export default App;
