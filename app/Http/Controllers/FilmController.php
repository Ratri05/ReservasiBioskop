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
        // Validasi dengan custom messages
        $request->validate([
            'judul'         => 'required|string|max:255',
            'durasi'        => 'required|numeric|min:30|max:300', // 30-300 menit
            'jam_tayang'    => 'required|date_format:H:i',
            'tanggal_rilis' => 'required|date',
            'sutradara'     => 'required|string|max:255',
            'pemeran_utama' => 'required|string|max:255',
            'bahasa'        => 'required|string|max:100',
        ], [
            'judul.required'         => 'Judul film wajib diisi.',
            'durasi.required'        => 'Durasi film wajib diisi.',
            'durasi.numeric'         => 'Durasi harus berupa angka (menit).',
            'durasi.min'             => 'Durasi minimal 30 menit.',
            'durasi.max'             => 'Durasi maksimal 300 menit.',
            'jam_tayang.required'    => 'Jam tayang wajib diisi.',
            'jam_tayang.date_format' => 'Format jam tayang harus HH:MM (contoh: 13:30).',
            'tanggal_rilis.required' => 'Tanggal rilis wajib diisi.',
            'tanggal_rilis.date'     => 'Tanggal rilis harus berupa tanggal yang valid.',
            'sutradara.required'     => 'Nama sutradara wajib diisi.',
            'pemeran_utama.required' => 'Pemeran utama wajib diisi.',
            'bahasa.required'        => 'Bahasa film wajib diisi.',
        ]);

        // Simpan data
        Film::create($request->only([
            'judul', 'durasi', 'jam_tayang', 'tanggal_rilis',
            'sutradara', 'pemeran_utama', 'bahasa'
        ]));

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
            'judul'         => 'required|string|max:255',
            'durasi'        => 'required|numeric|min:30|max:300',
            'jam_tayang'    => 'required|date_format:H:i',
            'sutradara'     => 'required|string|max:255',
            'pemeran_utama' => 'required|string|max:255',
            'bahasa'        => 'required|string|max:100',
            'tanggal_rilis' => 'required|date',
        ]);

        $film->update($request->only([
            'judul', 'durasi', 'jam_tayang', 'tanggal_rilis',
            'sutradara', 'pemeran_utama', 'bahasa'
        ]));

        return redirect()->route('films.index')->with('success', 'Film berhasil diperbarui.');
    }

    public function destroy(Film $film)
    {
        $film->delete();
        return redirect()->route('films.index')->with('success', 'Film berhasil dihapus.');
    }

    public function confirmDelete($id)
    {
        $film = Film::findOrFail($id);
        return view('films.confirmDelete', compact('film'));
    }
}
