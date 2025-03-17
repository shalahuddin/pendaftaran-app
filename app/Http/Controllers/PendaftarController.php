<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class PendaftarController extends Controller
{
    public function index()
    {
        $pendaftars = Pendaftar::all();
        return view('pendaftars.index', compact('pendaftars'));
    }

    public function create()
    {
        return view('pendaftars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|digits:16|numeric',
            'nama' => ['required', 'regex:/^[A-Z ]+$/'],
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'hobi' => 'array',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except(['_token', '_method']);
        $data['hobi'] = $request->hobi ? implode(', ', $request->hobi) : null;

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto', 'public');
        }

        Pendaftar::create($data);

        return redirect()->route('pendaftars.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function export(Pendaftar $pendaftar)
    {
        $pdf = Pdf::loadView('pendaftars.pdf', compact('pendaftar'));
        return $pdf->download('pendaftar_' . $pendaftar->nama . '.pdf');
    }

    public function edit(Pendaftar $pendaftar)
    {
        return view('pendaftars.edit', compact('pendaftar'));
    }

    public function update(Request $request, Pendaftar $pendaftar)
    {
        $request->validate([
            'nik' => 'required|digits:16|numeric',
            'nama' => ['required', 'regex:/^[A-Z ]+$/'],
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'hobi' => 'array',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except(['_token', '_method']);
        $data['hobi'] = $request->hobi ? implode(', ', $request->hobi) : null;

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($pendaftar->foto) {
                Storage::disk('public')->delete($pendaftar->foto);
            }
            $data['foto'] = $request->file('foto')->store('foto', 'public');
        }

        $pendaftar->update($data);

        return redirect()->route('pendaftars.index')->with('success', 'Data berhasil diupdate!');
    }

    public function destroy(Pendaftar $pendaftar)
    {
        // Hapus foto jika ada
        if ($pendaftar->foto) {
            Storage::disk('public')->delete($pendaftar->foto);
        }
        $pendaftar->delete();
        return redirect()->route('pendaftars.index')->with('success', 'Data berhasil dihapus!');
    }
}
