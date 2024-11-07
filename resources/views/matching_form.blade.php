<!-- resources/views/matching_form.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Matching Laptop</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">

<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-4">Form Matching Laptop</h1>

    <!-- Form Matching -->
    <form action="{{ route('matching.check') }}" method="POST">
        @csrf
        <div class="grid grid-cols-2 gap-4">
            <input type="text" name="merk" placeholder="Merk" required class="border p-2 rounded">
            <input type="text" name="model" placeholder="Model" required class="border p-2 rounded">
            <input type="text" name="prosesor" placeholder="Prosesor" required class="border p-2 rounded">
            <input type="number" name="ram" placeholder="RAM (GB)" required class="border p-2 rounded">
            <input type="number" name="storage" placeholder="Storage (GB)" required class="border p-2 rounded">
        </div>
        <button type="submit" class="bg-blue-500 text-white py-2 px-4 mt-4 rounded">Cari Laptop</button>
    </form>

    <!-- Hasil Pencarian -->
    @if(isset($matchingLaptops))
        <h2 class="text-xl font-bold mt-6 mb-4">Hasil Pencarian</h2>
        @forelse($matchingLaptops as $laptop)
            <div class="border p-4 rounded mb-4 bg-gray-50">
                @if($laptop->gambar)
                    <img src="{{ asset('storage/' . $laptop->gambar) }}" alt="Gambar Laptop" class="w-32 h-32 object-cover mb-4">
                @else
                    <p class="text-gray-500">Tidak ada gambar</p>
                @endif
                <p><strong>Merk:</strong> {{ $laptop->merk }}</p>
                <p><strong>Model:</strong> {{ $laptop->model }}</p>
                <p><strong>Prosesor:</strong> {{ $laptop->prosesor }}</p>
                <p><strong>RAM:</strong> {{ $laptop->ram }} GB</p>
                <p><strong>Storage:</strong> {{ $laptop->storage }} GB</p>
            </div>
        @empty
            <p class="text-red-500">Data Not Found</p>
        @endforelse
    @endif
</div>

</body>
</html>
