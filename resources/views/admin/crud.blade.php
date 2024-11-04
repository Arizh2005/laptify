<!-- resources/views/admin/laptops/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Laptop</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">

<div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-4">Kelola Laptop</h1>

    <!-- Notifikasi Sukses -->
    @if(session('success'))
        <div class="mb-4 text-green-600 bg-green-100 p-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabel Laptop -->
    <table class="min-w-full bg-white border">
        <thead>
            <tr class="w-full bg-gray-200 text-gray-600">
                <th class="p-3 border">Merk</th>
                <th class="p-3 border">Model</th>
                <th class="p-3 border">Prosesor</th>
                <th class="p-3 border">RAM (GB)</th>
                <th class="p-3 border">Storage (GB)</th>
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
                    <td class="p-3 border flex justify-center space-x-2">
                        <!-- Tombol Edit -->
                        <button onclick="openEditForm({{ $laptop->id }}, '{{ $laptop->merk }}', '{{ $laptop->model }}', '{{ $laptop->prosesor }}', {{ $laptop->ram }}, {{ $laptop->storage }})"
                                class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</button>

                        <!-- Form Hapus -->
                        <form action="{{ route('laptops.destroy', $laptop->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus laptop ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Form Tambah/Edit Laptop -->
    <h2 class="text-xl font-bold mt-6 mb-4" id="formTitle">Tambah Laptop</h2>
    <form action="{{ route('laptops.store') }}" method="POST" id="laptopForm">
        @csrf
        <input type="hidden" name="_method" id="formMethod" value="POST">
        <input type="hidden" name="id" id="laptopId">

        <div class="mb-3">
            <label>Merk</label>
            <input type="text" name="merk" id="merk" class="w-full border p-2 rounded" required>
        </div>
        <div class="mb-3">
            <label>Model</label>
            <input type="text" name="model" id="model" class="w-full border p-2 rounded" required>
        </div>
        <div class="mb-3">
            <label>Prosesor</label>
            <input type="text" name="prosesor" id="prosesor" class="w-full border p-2 rounded" required>
        </div>
        <div class="mb-3">
            <label>RAM (GB)</label>
            <input type="number" name="ram" id="ram" class="w-full border p-2 rounded" required>
        </div>
        <div class="mb-3">
            <label>Storage (GB)</label>
            <input type="number" name="storage" id="storage" class="w-full border p-2 rounded" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Simpan</button>
    </form>
</div>

<script>
    function openEditForm(id, merk, model, prosesor, ram, storage) {
        // Set form title and method for editing
        document.getElementById('formTitle').innerText = 'Edit Laptop';
        document.getElementById('formMethod').value = 'PUT';

        // Set form action to update route
        document.getElementById('laptopForm').action = `/laptops/${id}`;

        // Fill in form fields with existing data
        document.getElementById('merk').value = merk;
        document.getElementById('model').value = model;
        document.getElementById('prosesor').value = prosesor;
        document.getElementById('ram').value = ram;
        document.getElementById('storage').value = storage;
    }

    // Reset form when adding a new laptop
    document.getElementById('laptopForm').addEventListener('reset', function() {
        document.getElementById('formTitle').innerText = 'Tambah Laptop';
        document.getElementById('formMethod').value = 'POST';
        document.getElementById('laptopForm').action = '{{ route('laptops.store') }}';
    });
</script>
</body>
</html>
