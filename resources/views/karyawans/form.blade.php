<form action="{{ $route }}" method="POST" class="bg-white p-6 shadow rounded">
    @csrf
    @if($method === 'PUT')
        @method('PUT')
    @endif

    <div class="mb-4">
        <label class="block">Nama</label>
        <input type="text" name="nama" class="w-full border px-3 py-2" value="{{ old('nama', $karyawan->nama ?? '') }}" required>
    </div>
    <div class="mb-4">
        <label class="block">Posisi</label>
        <input type="text" name="posisi" class="w-full border px-3 py-2" value="{{ old('posisi', $karyawan->posisi ?? '') }}" required>
    </div>
    <div class="mb-4">
        <label class="block">Jadwal Kerja</label>
        <input type="text" name="jadwal_kerja" class="w-full border px-3 py-2" value="{{ old('jadwal_kerja', $karyawan->jadwal_kerja ?? '') }}" required>
    </div>
    <div class="mb-4">
        <label class="block">No Telepon</label>
        <input type="text" name="no_telepon" class="w-full border px-3 py-2" value="{{ old('no_telepon', $karyawan->no_telepon ?? '') }}" required>
    </div>
    <div class="mb-4">
        <label class="block">Alamat</label>
        <textarea name="alamat" class="w-full border px-3 py-2">{{ old('alamat', $karyawan->alamat ?? '') }}</textarea>
    </div>
    <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700">Simpan</button>
</form>
