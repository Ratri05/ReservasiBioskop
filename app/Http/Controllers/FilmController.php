<?php
namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::all();
        return view('films.index', compact('films'));
    }

    public function create()
    {
        return view('films.create');
    }

public function store(Request $request)
{
    $request->validate([
        'judul' => 'required',
        'durasi' => 'required|numeric',
        'jam_tayang' => 'required',
        'tanggal_rilis' => 'required|date',
        'sutradara' => 'required',
        'pemeran_utama' => 'required',
        'bahasa' => 'required',
    ]);

    Film::create([
        'judul' => $request->judul,
        'durasi' => $request->durasi,
        'jam_tayang' => $request->jam_tayang,
        'tanggal_rilis' => $request->tanggal_rilis,
        'sutradara' => $request->sutradara,
        'pemeran_utama' => $request->pemeran_utama,
        'bahasa' => $request->bahasa,
    ]);

    return redirect()->route('films.index')->with('success', 'Film berhasil ditambahkan.');
}




    public function show(Film $film)
    {
        return view('films.show', compact('film'));
    }

    public function edit(Film $film)
    {
        return view('films.edit', compact('film'));
    }

public function update(Request $request, Film $film)
{
    $request->validate([
        'judul' => 'required',
        'durasi' => 'required|integer',
        'jam_tayang' => 'required|date_format:H:i',
        'sutradara' => 'required',
        'pemeran_utama' => 'required',
        'bahasa' => 'required',
        'tanggal_rilis' => 'required|date',
    ]);

    $film->update([
        'judul' => $request->judul,
        'durasi' => $request->durasi,
        'jam_tayang' => $request->jam_tayang,
        'sutradara' => $request->sutradara,
        'pemeran_utama' => $request->pemeran_utama,
        'bahasa' => $request->bahasa,
        'tanggal_rilis' => $request->tanggal_rilis,
    ]);

    return redirect()->route('films.index')->with('success', 'Film berhasil diperbarui');
}



    public function destroy(Film $film)
    {
        $film->delete();
        return redirect()->route('films.index')->with('success', 'Film berhasil dihapus');
    }

public function confirmDelete($id)
{
    $film = Film::findOrFail($id);
    return view('films.confirmDelete', compact('film'));
}

}
