@csrf
<div class="mb-3">
    <label for="nama" class="form-label">Nama</label>
    <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $pengguna->nama ?? '') }}" required>
</div>
<div class="mb-3">
    <label for="no_telepon" class="form-label">No. Telepon</label>
    <input type="text" name="no_telepon" id="no_telepon" class="form-control" value="{{ old('no_telepon', $pengguna->no_telepon ?? '') }}" required>
</div>
