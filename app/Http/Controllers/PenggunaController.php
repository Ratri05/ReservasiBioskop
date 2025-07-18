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
        // VALIDASI INPUT
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:penggunas,email',
            'no_telepon' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
            'kata_sandi' => 'required|string|min:6',
            'karyawan_id' => 'nullable|exists:karyawans,id',
        ], [
            'nama.required' => 'Nama pengguna wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'no_telepon.required' => 'Nomor telepon wajib diisi.',
            'alamat.required' => 'Alamat wajib diisi.',
            'kata_sandi.required' => 'Kata sandi wajib diisi.',
            'kata_sandi.min' => 'Kata sandi minimal 6 karakter.',
        ]);

        // SIMPAN DATA
        Pengguna::create($validated);

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
        // VALIDASI INPUT (email unik kecuali miliknya sendiri)
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:penggunas,email,' . $pengguna->id,
            'no_telepon' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
            'kata_sandi' => 'nullable|string|min:6',
            'karyawan_id' => 'nullable|exists:karyawans,id',
        ], [
            'nama.required' => 'Nama pengguna wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'no_telepon.required' => 'Nomor telepon wajib diisi.',
            'alamat.required' => 'Alamat wajib diisi.',
            'kata_sandi.min' => 'Kata sandi minimal 6 karakter.',
        ]);

        // UPDATE DATA
        $pengguna->update($validated);

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
