<?php
namespace App\Http\Controllers;

use App\Models\Tiket;
use App\Models\Film;
use App\Models\Studio;
use Illuminate\Http\Request;

class TiketController extends Controller
{
    public function index()
    {
        $tikets = Tiket::with(['film', 'studio'])->get();
        return view('tikets.index', compact('tikets'));
    }

    public function create()
    {
        $studios = Studio::all();
        $films = Film::all();
        return view('tikets.create', compact('studios', 'films'));
    }

    public function store(Request $request)
    {
        // VALIDASI INPUT
        $validated = $request->validate([
            'harga'        => 'required|numeric|min:1',
            'film_id'      => 'required|exists:films,id',
            'studio_id'    => 'required|exists:studios,id',
            'nomor_kursi'  => 'required|string|max:10',
            'jam_tayang'   => 'required|date',  // pastikan format jam_tayang valid
            'status'       => 'required|string|in:tersedia,terjual',
        ], [
            'harga.required' => 'Harga tiket wajib diisi.',
            'harga.numeric'  => 'Harga harus berupa angka.',
            'film_id.required' => 'Film harus dipilih.',
            'film_id.exists'   => 'Film yang dipilih tidak valid.',
            'studio_id.required' => 'Studio harus dipilih.',
            'studio_id.exists'   => 'Studio yang dipilih tidak valid.',
            'nomor_kursi.required' => 'Nomor kursi wajib diisi.',
            'nomor_kursi.max'      => 'Nomor kursi maksimal 10 karakter.',
            'jam_tayang.required'  => 'Jam tayang wajib diisi.',
            'jam_tayang.date'      => 'Jam tayang harus berupa tanggal dan jam yang valid.',
            'status.required'      => 'Status tiket wajib diisi.',
            'status.in'            => 'Status tiket hanya boleh: tersedia atau terjual.',
        ]);

        // SIMPAN DATA
        Tiket::create($validated);

        return redirect()->route('tikets.index')->with('success', 'Tiket berhasil ditambahkan.');
    }

    public function show(Tiket $tiket)
    {
        return view('tikets.show', compact('tiket'));
    }

    public function edit($id)
    {
        $tiket = Tiket::findOrFail($id);
        $studios = Studio::all();
        $films = Film::all();
        return view('tikets.edit', compact('tiket', 'studios', 'films'));
    }

    public function update(Request $request, Tiket $tiket)
    {
        // VALIDASI INPUT SAAT UPDATE
        $validated = $request->validate([
            'harga'        => 'required|numeric|min:1',
            'film_id'      => 'required|exists:films,id',
            'studio_id'    => 'required|exists:studios,id',
            'nomor_kursi'  => 'required|string|max:10',
            'jam_tayang'   => 'required|date',
            'status'       => 'required|string|in:tersedia,terjual',
        ], [
            'harga.required' => 'Harga tiket wajib diisi.',
            'harga.numeric'  => 'Harga harus berupa angka.',
            'film_id.required' => 'Film harus dipilih.',
            'film_id.exists'   => 'Film yang dipilih tidak valid.',
            'studio_id.required' => 'Studio harus dipilih.',
            'studio_id.exists'   => 'Studio yang dipilih tidak valid.',
            'nomor_kursi.required' => 'Nomor kursi wajib diisi.',
            'nomor_kursi.max'      => 'Nomor kursi maksimal 10 karakter.',
            'jam_tayang.required'  => 'Jam tayang wajib diisi.',
            'jam_tayang.date'      => 'Jam tayang harus berupa tanggal dan jam yang valid.',
            'status.required'      => 'Status tiket wajib diisi.',
            'status.in'            => 'Status tiket hanya boleh: tersedia atau terjual.',
        ]);

        // UPDATE DATA
        $tiket->update($validated);

        return redirect()->route('tikets.index')->with('success', 'Tiket berhasil diperbarui');
    }

    public function destroy(Tiket $tiket)
    {
        $tiket->delete();
        return redirect()->route('tikets.index')->with('success', 'Tiket berhasil dihapus');
    }

    public function confirmDelete($id)
    {
        $tiket = Tiket::findOrFail($id);
        return view('tikets.confirmDelete', compact('tiket'));
    }
}
