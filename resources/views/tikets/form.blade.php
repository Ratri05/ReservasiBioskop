<form action="{{ $action }}" method="POST">
    @csrf
    @if(isset($method) && $method === 'PUT')
        @method('PUT')
    @endif

    <div class="mb-3">
        <label class="form-label">Harga Tiket</label>
        <input type="number" name="harga" class="form-control" value="{{ old('harga', $tiket->harga ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Studio</label>
        <select name="studio_id" class="form-control" required>
            <option value="">-- Pilih Studio --</option>
            @foreach($studios as $studio)
                <option value="{{ $studio->id }}" {{ old('studio_id', $tiket->studio_id ?? '') == $studio->id ? 'selected' : '' }}>
                    {{ $studio->nomor_studio }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Film</label>
        <select name="film_id" class="form-control" required>
            <option value="">-- Pilih Film --</option>
            @foreach($films as $film)
                <option value="{{ $film->id }}" {{ old('film_id', $tiket->film_id ?? '') == $film->id ? 'selected' : '' }}>
                    {{ $film->judul }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
    <label class="form-label">Nomor Kursi</label>
    <input type="text" name="nomor_kursi" class="form-control" value="{{ old('nomor_kursi', $tiket->nomor_kursi ?? '') }}" required>
</div>
<div class="mb-3">
    <label class="form-label">Jam Tayang</label>
    <input type="datetime-local" name="jam_tayang" class="form-control" value="{{ old('jam_tayang', isset($tiket->jam_tayang) ? \Carbon\Carbon::parse($tiket->jam_tayang)->format('Y-m-d\TH:i') : '') }}" required>
</div>
<div class="mb-4">
    <label for="status" class="block text-sm font-medium text-gray-700">Status Tiket</label>
    <select name="status" id="status" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        <option value="tersedia">Tersedia</option>
        <option value="terjual">Terjual</option>
    </select>
</div>


    <button type="submit" class="btn btn-warning">Simpan</button>
    <a href="{{ route('tikets.index') }}" class="btn btn-secondary">Batal</a>
</form>
