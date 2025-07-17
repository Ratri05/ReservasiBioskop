<form action="{{ $action }}" method="POST">
    @csrf
    @if($method === 'PUT')
        @method('PUT')
    @endif

    <div class="mb-3">
        <label class="form-label">Nomor Studio</label>
        <input type="text" name="nomor_studio" class="form-control" value="{{ old('nomor_studio', $studio->nomor_studio ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Kapasitas</label>
        <input type="number" name="kapasitas" class="form-control" value="{{ old('kapasitas', $studio->kapasitas ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Tipe Studio</label>
        <input type="text" name="tipe_studio" class="form-control" value="{{ old('tipe_studio', $studio->tipe_studio ?? '') }}" required>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('studios.index') }}" class="btn btn-secondary">Batal</a>
</form>
