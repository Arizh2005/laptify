<!-- resources/views/laptop_detail.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Detail Laptop</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h2 class="text-2xl mb-6 text-center">Detail Laptop</h2>
        <p><strong>Merk:</strong> {{ $laptop->merk }}</p>
        <p><strong>Model:</strong> {{ $laptop->model }}</p>
        <p><strong>Prosesor:</strong> {{ $laptop->prosesor }}</p>
        <p><strong>RAM:</strong> {{ $laptop->ram }} GB</p>
        <p><strong>Storage:</strong> {{ $laptop->storage }} GB</p>
        <a href="{{ route('match.form') }}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded">Kembali</a>
    </div>
</body>
</html>
