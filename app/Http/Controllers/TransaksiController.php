<?php
namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Pengguna;
use App\Models\Tiket;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with(['pengguna', 'tiket'])->get();
        return view('transaksis.index', compact('transaksis'));
    }

    public function create()
    {
        $penggunas = Pengguna::all();
        $tikets = Tiket::all();
        return view('transaksis.create', compact('penggunas', 'tikets'));
    }

    public function store(Request $request)
    {
        Transaksi::create($request->all());
        return redirect()->route('transaksis.index')->with('success', 'Transaksi berhasil ditambahkan');
    }

    public function show(Transaksi $transaksi)
    {
        return view('transaksis.show', compact('transaksi'));
    }

    public function edit(Transaksi $transaksi)
    {
        $penggunas = Pengguna::all();
        $tikets = Tiket::all();
        return view('transaksis.edit', compact('transaksi', 'penggunas', 'tikets'));
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        $transaksi->update($request->all());
        return redirect()->route('transaksis.index')->with('success', 'Transaksi berhasil diperbarui');
    }

    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect()->route('transaksis.index')->with('success', 'Transaksi berhasil dihapus');
    }

    public function confirmDelete($id)
{
    $transaksi = Transaksi::findOrFail($id);
    return view('transaksis.confirmDelete', compact('transaksi'));
}
}
