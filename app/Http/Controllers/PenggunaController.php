<?php
namespace App\Http\Controllers;

use App\Models\Pengguna;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index()
    {
        $penggunas = Pengguna::with('karyawan')->get();
        return view('penggunas.index', compact('penggunas'));
    }

    public function create()
    {
        $karyawans = Karyawan::all();
        return view('penggunas.create', compact('karyawans'));
    }

    public function store(Request $request)
    {
        Pengguna::create($request->all());
        return redirect()->route('penggunas.index')->with('success', 'Pengguna berhasil ditambahkan');
    }

    public function show(Pengguna $pengguna)
    {
        return view('penggunas.show', compact('pengguna'));
    }

    public function edit(Pengguna $pengguna)
    {
        $karyawans = Karyawan::all();
        return view('penggunas.edit', compact('pengguna', 'karyawans'));
    }

    public function update(Request $request, Pengguna $pengguna)
    {
        $pengguna->update($request->all());
        return redirect()->route('penggunas.index')->with('success', 'Pengguna berhasil diperbarui');
    }

    public function destroy(Pengguna $pengguna)
    {
        $pengguna->delete();
        return redirect()->route('penggunas.index')->with('success', 'Pengguna berhasil dihapus');
    }

    public function confirmDelete($id)
{
    $pengguna = Pengguna::findOrFail($id);
    return view('penggunas.confirmDelete', compact('pengguna'));
}
}
