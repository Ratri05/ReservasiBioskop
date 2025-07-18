<?php
namespace App\Http\Controllers;

use App\Models\Studio;
use Illuminate\Http\Request;

class StudioController extends Controller
{
    public function index()
    {
        $studios = Studio::all();
        return view('studios.index', compact('studios'));
    }

    public function create()
    {
        return view('studios.create');
    }

    public function store(Request $request)
    {
        // VALIDASI INPUT
        $validated = $request->validate([
            'nomor_studio' => 'required|numeric|unique:studios,nomor_studio',
            'kapasitas' => 'required|numeric|min:1',
            'tipe' => 'required|string|max:100',
        ], [
            'nomor_studio.required' => 'Nomor studio wajib diisi.',
            'nomor_studio.numeric' => 'Nomor studio harus berupa angka.',
            'nomor_studio.unique' => 'Nomor studio sudah ada.',
            'kapasitas.required' => 'Kapasitas wajib diisi.',
            'kapasitas.numeric' => 'Kapasitas harus berupa angka.',
            'kapasitas.min' => 'Kapasitas minimal 1.',
            'tipe.required' => 'Tipe studio wajib diisi.',
        ]);

        // SIMPAN DATA
        Studio::create($validated);
        return redirect()->route('studios.index')->with('success', 'Data studio berhasil ditambahkan');
    }

    public function show(Studio $studio)
    {
        return view('studios.show', compact('studio'));
    }

    public function edit(Studio $studio)
    {
        return view('studios.edit', compact('studio'));
    }

    public function update(Request $request, Studio $studio)
    {
        // VALIDASI INPUT (nomor_studio unik kecuali milik studio yang sedang diedit)
        $validated = $request->validate([
            'nomor_studio' => 'required|numeric|unique:studios,nomor_studio,' . $studio->id,
            'kapasitas' => 'required|numeric|min:1',
            'tipe' => 'required|string|max:100',
        ], [
            'nomor_studio.required' => 'Nomor studio wajib diisi.',
            'nomor_studio.numeric' => 'Nomor studio harus berupa angka.',
            'nomor_studio.unique' => 'Nomor studio sudah ada.',
            'kapasitas.required' => 'Kapasitas wajib diisi.',
            'kapasitas.numeric' => 'Kapasitas harus berupa angka.',
            'kapasitas.min' => 'Kapasitas minimal 1.',
            'tipe.required' => 'Tipe studio wajib diisi.',
        ]);

        // UPDATE DATA
        $studio->update($validated);
        return redirect()->route('studios.index')->with('success', 'Data studio berhasil diperbarui');
    }

    public function destroy(Studio $studio)
    {
        $studio->delete();
        return redirect()->route('studios.index')->with('success', 'Data studio berhasil dihapus');
    }

    public function confirmDelete($id)
    {
        $studio = Studio::findOrFail($id);
        return view('studios.confirmDelete', compact('studio'));
    }
}
