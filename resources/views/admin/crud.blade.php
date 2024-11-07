<!-- resources/views/crud_table.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Data Laptop</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">

<div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-4">Kelola Data Laptop</h1>

    <!-- Notifikasi Sukses -->
    @if(session('success'))
        <div class="mb-4 text-green-600 bg-green-100 p-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form Tambah Laptop Baru -->
    <form action="{{ route('crud_table.store') }}" method="POST" enctype="multipart/form-data" class="mb-6">
        @csrf
        <div class="grid grid-cols-2 gap-4">
            <input type="text" name="merk" placeholder="Merk" required class="border p-2 rounded">
            <input type="text" name="model" placeholder="Model" required class="border p-2 rounded">
            <input type="text" name="prosesor" placeholder="Prosesor" required class="border p-2 rounded">
            <input type="number" name="ram" placeholder="RAM (GB)" required class="border p-2 rounded">
            <input type="number" name="storage" placeholder="Storage (GB)" required class="border p-2 rounded">
            <input type="file" name="gambar" class="border p-2 rounded" accept="image/*">
        </div>
        <button type="submit" class="bg-green-500 text-white py-2 px-4 mt-4 rounded">Tambah Laptop</button>
    </form>

    <!-- Tabel Data Laptop -->
    <table class="min-w-full bg-white border">
        <thead>
            <tr class="bg-gray-200 text-gray-600">
                <th class="p-3 border">Merk</th>
                <th class="p-3 border">Model</th>
                <th class="p-3 border">Prosesor</th>
                <th class="p-3 border">RAM (GB)</th>
                <th class="p-3 border">Storage (GB)</th>
                <th class="p-3 border">Gambar</th>
                <th class="p-3 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laptops as $laptop)
                <tr class="text-center border-b">
                    <td class="p-3 border">{{ $laptop->merk }}</td>
                    <td class="p-3 border">{{ $laptop->model }}</td>
                    <td class="p-3 border">{{ $laptop->prosesor }}</td>
                    <td class="p-3 border">{{ $laptop->ram }}</td>
                    <td class="p-3 border">{{ $laptop->storage }}</td>
                    <td class="p-3 border">
                        @if($laptop->gambar)
                            <img src="{{ asset('storage/' . $laptop->gambar) }}" alt="Gambar Laptop" class="w-20 h-20 object-cover">
                        @else
                            Tidak ada gambar
                        @endif
                    </td>
                    <td class="p-3 border flex justify-center space-x-2">
                        <!-- Tombol Edit -->
                        <button onclick="openEditForm({{ $laptop->id }}, '{{ $laptop->merk }}', '{{ $laptop->model }}', '{{ $laptop->prosesor }}', {{ $laptop->ram }}, {{ $laptop->storage }}, '{{ $laptop->gambar }}')"
                            class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</button>

                        <!-- Tombol Hapus -->
                        <form action="{{ route('crud_table.destroy', $laptop->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus laptop ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal Form Edit Laptop -->
<div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden items-center justify-center">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
        <h2 class="text-xl font-bold mb-4">Edit Laptop</h2>
        <form id="editForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <input type="text" name="merk" id="editMerk" placeholder="Merk" required class="border p-2 w-full rounded">
            </div>
            <div class="mb-4">
                <input type="text" name="model" id="editModel" placeholder="Model" required class="border p-2 w-full rounded">
            </div>
            <div class="mb-4">
                <input type="text" name="prosesor" id="editProsesor" placeholder="Prosesor" required class="border p-2 w-full rounded">
            </div>
            <div class="mb-4">
                <input type="number" name="ram" id="editRam" placeholder="RAM (GB)" required class="border p-2 w-full rounded">
            </div>
            <div class="mb-4">
                <input type="number" name="storage" id="editStorage" placeholder="Storage (GB)" required class="border p-2 w-full rounded">
            </div>
            <div class="mb-4">
                <input type="file" name="gambar" class="border p-2 w-full rounded" accept="image/*">
                <p id="currentImage" class="text-gray-500 mt-2">Gambar saat ini: <span id="imagePreview"></span></p>
            </div>
            <div class="flex justify-end">
                <button type="button" onclick="closeEditForm()" class="bg-gray-500 text-white py-2 px-4 rounded mr-2">Batal</button>
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openEditForm(id, merk, model, prosesor, ram, storage, gambar) {
        document.getElementById('editForm').action = `/crud-table/${id}`;
        document.getElementById('editMerk').value = merk;
        document.getElementById('editModel').value = model;
        document.getElementById('editProsesor').value = prosesor;
        document.getElementById('editRam').value = ram;
        document.getElementById('editStorage').value = storage;

        // Tampilkan gambar saat ini jika ada
        if (gambar) {
            document.getElementById('imagePreview').innerHTML = `<img src="/storage/${gambar}" alt="Gambar Laptop" class="w-20 h-20 object-cover">`;
        } else {
            document.getElementById('imagePreview').innerText = 'Tidak ada gambar';
        }

        document.getElementById('editModal').classList.remove('hidden');
    }

    function closeEditForm() {
        document.getElementById('editModal').classList.add('hidden');
    }
</script>

</body>
</html>
