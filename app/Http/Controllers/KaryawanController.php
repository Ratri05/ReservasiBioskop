<?php
namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawans = Karyawan::all();
        return view('karyawans.index', compact('karyawans'));
    }

    public function create()
    {
        return view('karyawans.create');
    }

    public function store(Request $request)
    {
        // VALIDASI INPUT
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'posisi' => 'required|string|max:100',
            'jadwal_kerja' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
        ], [
            'nama.required' => 'Nama karyawan wajib diisi.',
            'posisi.required' => 'Posisi karyawan wajib diisi.',
            'jadwal_kerja.required' => 'Jadwal kerja wajib diisi.',
            'no_telepon.required' => 'Nomor telepon wajib diisi.',
            'alamat.required' => 'Alamat wajib diisi.',
        ]);

        // SIMPAN DATA
        Karyawan::create($validated);

        return redirect()->route('karyawans.index')->with('success', 'Karyawan berhasil ditambahkan');
    }

    public function show(Karyawan $karyawan)
    {
        return view('karyawans.show', compact('karyawan'));
    }

    public function edit(Karyawan $karyawan)
    {
        return view('karyawans.edit', compact('karyawan'));
    }

    public function update(Request $request, Karyawan $karyawan)
    {
        // VALIDASI INPUT
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'posisi' => 'required|string|max:100',
            'jadwal_kerja' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
        ], [
            'nama.required' => 'Nama karyawan wajib diisi.',
            'posisi.required' => 'Posisi karyawan wajib diisi.',
            'jadwal_kerja.required' => 'Jadwal kerja wajib diisi.',
            'no_telepon.required' => 'Nomor telepon wajib diisi.',
            'alamat.required' => 'Alamat wajib diisi.',
        ]);

        // UPDATE DATA
        $karyawan->update($validated);

        return redirect()->route('karyawans.index')->with('success', 'Karyawan berhasil diperbarui');
    }

    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();
        return redirect()->route('karyawans.index')->with('success', 'Karyawan berhasil dihapus');
    }

    public function confirmDelete($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('karyawans.confirmDelete', compact('karyawan'));
    }
}
