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
        // VALIDASI INPUT
        $validated = $request->validate([
            'pengguna_id'   => 'required|exists:penggunas,id',
            'tiket_id'      => 'required|exists:tikets,id',
            'jumlah_tiket'  => 'required|integer|min:1',
            'total_harga'   => 'required|numeric|min:0',
            'status'        => 'required|string|in:pending,berhasil,gagal',
            'tanggal_bayar' => 'nullable|date'
        ], [
            'pengguna_id.required'  => 'Pengguna wajib dipilih.',
            'pengguna_id.exists'    => 'Pengguna yang dipilih tidak valid.',
            'tiket_id.required'     => 'Tiket wajib dipilih.',
            'tiket_id.exists'       => 'Tiket yang dipilih tidak valid.',
            'jumlah_tiket.required' => 'Jumlah tiket wajib diisi.',
            'jumlah_tiket.integer'  => 'Jumlah tiket harus berupa angka.',
            'jumlah_tiket.min'      => 'Jumlah tiket minimal 1.',
            'total_harga.required'  => 'Total harga wajib diisi.',
            'total_harga.numeric'   => 'Total harga harus berupa angka.',
            'total_harga.min'       => 'Total harga tidak boleh negatif.',
            'status.required'       => 'Status transaksi wajib diisi.',
            'status.in'             => 'Status hanya boleh: pending, berhasil, atau gagal.',
            'tanggal_bayar.date'    => 'Tanggal bayar harus berupa tanggal yang valid.'
        ]);

        // SIMPAN DATA
        Transaksi::create($validated);

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
        // VALIDASI INPUT SAAT UPDATE
        $validated = $request->validate([
            'pengguna_id'   => 'required|exists:penggunas,id',
            'tiket_id'      => 'required|exists:tikets,id',
            'jumlah_tiket'  => 'required|integer|min:1',
            'total_harga'   => 'required|numeric|min:0',
            'status'        => 'required|string|in:pending,berhasil,gagal',
            'tanggal_bayar' => 'nullable|date'
        ], [
            'pengguna_id.required'  => 'Pengguna wajib dipilih.',
            'pengguna_id.exists'    => 'Pengguna yang dipilih tidak valid.',
            'tiket_id.required'     => 'Tiket wajib dipilih.',
            'tiket_id.exists'       => 'Tiket yang dipilih tidak valid.',
            'jumlah_tiket.required' => 'Jumlah tiket wajib diisi.',
            'jumlah_tiket.integer'  => 'Jumlah tiket harus berupa angka.',
            'jumlah_tiket.min'      => 'Jumlah tiket minimal 1.',
            'total_harga.required'  => 'Total harga wajib diisi.',
            'total_harga.numeric'   => 'Total harga harus berupa angka.',
            'total_harga.min'       => 'Total harga tidak boleh negatif.',
            'status.required'       => 'Status transaksi wajib diisi.',
            'status.in'             => 'Status hanya boleh: pending, berhasil, atau gagal.',
            'tanggal_bayar.date'    => 'Tanggal bayar harus berupa tanggal yang valid.'
        ]);

        // UPDATE DATA
        $transaksi->update($validated);

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
