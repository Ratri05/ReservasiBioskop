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
        $tikets = Tiket::with('film')->get();
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
    $validated = $request->validate([
        'harga' => 'required|numeric',
        'film_id' => 'required|exists:films,id',
        'studio_id' => 'required|exists:studios,id', // ← tambahkan ini
        'nomor_kursi' => 'required',
        'jam_tayang' => 'required',
        'status' => 'required|string|in:tersedia,terjual',
    ]);

    Tiket::create($validated); // Semua field termasuk studio_id sekarang ikut disimpan

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
        $tiket->update($request->all());
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
