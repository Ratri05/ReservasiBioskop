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
        Karyawan::create($request->all());
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
        $karyawan->update($request->all());
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
