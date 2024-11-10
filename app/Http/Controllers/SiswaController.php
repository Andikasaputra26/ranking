<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = Siswa::orderBy('id', 'desc')->get();
        return response()->json([
            'success' => true,
            'data' => $siswa,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'kelas_siswa' => 'required',
            'status' => 'required',
        ]);

        $siswa = Siswa::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data siswa berhasil ditambahkan',
            'data' => $siswa,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $siswa = Siswa::find($id);

        if (!$siswa) {
            return response()->json([
                'success' => false,
                'message' => 'Data siswa tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $siswa,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $siswa = Siswa::find($id);

        if (!$siswa) {
            return response()->json([
                'success' => false,
                'message' => 'Data siswa tidak ditemukan',
            ], 404);
        }

        $data = $request->validate([
            'name' => 'required',
            'kelas_siswa' => 'required',
            'status' => 'required',
        ]);

        $siswa->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Data siswa berhasil diperbarui',
            'data' => $siswa,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $siswa = Siswa::find($id);

        if (!$siswa) {
            return response()->json([
                'success' => false,
                'message' => 'Data siswa tidak ditemukan',
            ], 404);
        }

        $siswa->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data siswa berhasil dihapus',
        ], 200);
    }
}
