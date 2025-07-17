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
        Studio::create($request->all());
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
        $studio->update($request->all());
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
