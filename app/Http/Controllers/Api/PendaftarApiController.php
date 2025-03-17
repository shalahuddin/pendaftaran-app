<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pendaftar;
use Illuminate\Http\Request;

class PendaftarApiController extends Controller
{
    // Get all data
    public function index()
    {
        return response()->json(Pendaftar::all());
    }

    // Get single data by ID
    public function show($id)
    {
        $pendaftar = Pendaftar::find($id);
        if (!$pendaftar) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
        return response()->json($pendaftar);
    }

    // Store new data
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik' => 'required|digits:16|numeric',
            'nama' => ['required', 'regex:/^[A-Z ]+$/'],
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'hobi' => 'nullable|string',
            'foto' => 'nullable|string', // Untuk API kita asumsikan URL atau path string
        ]);

        $pendaftar = Pendaftar::create($validated);
        return response()->json($pendaftar, 201);
    }

    // Update existing data
    public function update(Request $request, $id)
    {
        $pendaftar = Pendaftar::find($id);
        if (!$pendaftar) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $validated = $request->validate([
            'nik' => 'required|digits:16|numeric',
            'nama' => ['required', 'regex:/^[A-Z ]+$/'],
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'hobi' => 'nullable|string',
            'foto' => 'nullable|string',
        ]);

        $pendaftar->update($validated);
        return response()->json($pendaftar);
    }

    // Delete data
    public function destroy($id)
    {
        $pendaftar = Pendaftar::find($id);
        if (!$pendaftar) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $pendaftar->delete();
        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
