@include('layouts/nav')
<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <meta name="crsf-token" content="{{csrf_token()}}">
</head>
<body class="bg-gray-100">
    <div class="max-w-lg mx-auto bg-white p-4 rounded-lg shadow-md">
        <h1 class="text-xl font-bold mb-4">Form Pencocokan Laptop</h1>

        <!-- Tampilkan pesan status jika data tidak ditemukan -->
        @if(session('status'))
            <div class="p-4 mb-4 text-white bg-red-500 rounded">
                {{ session('status') }}
            </div>
        @endif

        <!-- Form pencarian -->
        <form action="{{ route('match.check') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="merk" class="block text-gray-700">Merk</label>
                <input type="text" id="merk" name="merk" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label for="model" class="block text-gray-700">Model</label>
                <input type="text" id="model" name="model" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label for="prosesor" class="block text-gray-700">Prosesor</label>
                <input type="text" id="prosesor" name="prosesor" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label for="ram" class="block text-gray-700">RAM (GB)</label>
                <input type="number" id="ram" name="ram" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label for="storage" class="block text-gray-700">Storage (GB)</label>
                <input type="number" id="storage" name="storage" class="w-full border p-2 rounded" required>
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded">Cari Laptop</button>
        </form>

        <!-- Tampilkan detail produk dalam card jika ditemukan -->
        @if(session('laptop'))
            <div class="mt-6 p-6 border rounded-lg shadow bg-white">
                <h2 class="text-xl font-bold mb-2 text-gray-800">{{ session('laptop')->merk }} {{ session('laptop')->model }}</h2>
                <div class="grid grid-cols-2 gap-4">
                    <p><strong>Prosesor:</strong> {{ session('laptop')->prosesor }}</p>
                    <p><strong>RAM:</strong> {{ session('laptop')->ram }} GB</p>
                    <p><strong>Storage:</strong> {{ session('laptop')->storage }} GB</p>
                </div>
            </div>
        @endif
    </div>
</body>
</html>
