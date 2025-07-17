<form action="{{ $action }}" method="POST">
    @csrf
    @if($method === 'PUT')
        @method('PUT')
    @endif
    <div class="mb-4">
        <label class="block">Judul Film</label>
        <input type="text" name="judul" value="{{ old('judul', $film->judul ?? '') }}" class="w-full px-3 py-2 border rounded" required>
    </div>
    <div class="mb-4">
        <label class="block">Durasi (menit)</label>
        <input type="number" name="durasi" value="{{ old('durasi', $film->durasi ?? '') }}" class="w-full px-3 py-2 border rounded" required>
    </div>
    <div class="mb-4">
    <label for="jam_tayang" class="block font-semibold">Jam Tayang</label>
    <input type="time" name="jam_tayang" id="jam_tayang" value="{{ old('jam_tayang', $film->jam_tayang ?? '') }}"
        class="w-full p-2 border rounded">
</div>
<div class="mb-4">
    <label for="sutradara" class="block text-sm font-medium text-gray-700">Sutradara</label>
    <input type="text" name="sutradara" id="sutradara" required
        class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm">
</div>
<div class="mb-4">
    <label for="pemeran_utama" class="block text-sm font-medium text-gray-700">Pemeran Utama</label>
    <input type="text" name="pemeran_utama" id="pemeran_utama"
           value="{{ old('pemeran_utama', $film->pemeran_utama ?? '') }}"
           class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm">
</div>
<div class="mb-4">
    <label for="bahasa" class="block text-sm font-medium text-gray-700">Bahasa</label>
    <input type="text" name="bahasa" id="bahasa"
           value="{{ old('bahasa', $film->bahasa ?? '') }}"
           class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm">
</div>
<div class="form-group">
    <label for="tanggal_rilis">Tanggal Rilis</label>
    <input type="date" name="tanggal_rilis" class="form-control" value="{{ old('tanggal_rilis', $film->tanggal_rilis ?? '') }}" required>
</div>
    <button type="submit" class="bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-2 rounded">Simpan</button>
</form>
