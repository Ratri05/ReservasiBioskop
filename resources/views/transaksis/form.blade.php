<form action="{{ isset($transaksi->id) ? route('transaksis.update', $transaksi->id) : route('transaksis.store') }}" method="POST" class="space-y-4">
    @csrf
    @if(isset($transaksi->id))
        @method('PUT')
    @endif

    <div>
        <label class="block font-medium text-gray-700">Tanggal Transaksi</label>
        <input type="date" name="tanggal_transaksi" value="{{ old('tanggal_transaksi', $transaksi->tanggal_transaksi) }}" class="form-input w-full rounded border-gray-300" required>
    </div>

    <div>
        <label class="block font-medium text-gray-700">Metode Pembayaran</label>
        <input type="text" name="metode_pembayaran" value="{{ old('metode_pembayaran', $transaksi->metode_pembayaran) }}" class="form-input w-full rounded border-gray-300" required>
    </div>

    <div>
        <label class="block font-medium text-gray-700">Total Pembayaran</label>
        <input type="number" name="total_pembayaran" value="{{ old('total_pembayaran', $transaksi->total_pembayaran) }}" class="form-input w-full rounded border-gray-300" required>
    </div>

    <div>
        <label class="block font-medium text-gray-700">Pengguna</label>
        <select name="pengguna_id" class="form-select w-full rounded border-gray-300" required>
            <option value="">-- Pilih Pengguna --</option>
            @foreach($penggunas as $pengguna)
                <option value="{{ $pengguna->id }}" {{ old('pengguna_id', $transaksi->pengguna_id) == $pengguna->id ? 'selected' : '' }}>
                    {{ $pengguna->nama }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block font-medium text-gray-700">Tiket</label>
        <select name="tiket_id" class="form-select w-full rounded border-gray-300" required>
            <option value="">-- Pilih Tiket --</option>
            @foreach($tikets as $tiket)
                <option value="{{ $tiket->id }}" {{ old('tiket_id', $transaksi->tiket_id) == $tiket->id ? 'selected' : '' }}>
                    Kursi: {{ $tiket->nomor_kursi }} | {{ $tiket->status }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <button type="submit" class="bg-yellow-600 text-white px-6 py-2 rounded hover:bg-yellow-700">
            Simpan
        </button>
    </div>
</form>
