<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Laptop;

class MatchController extends Controller
{
    // Menampilkan halaman form matching
    public function showForm()
    {
        return view('user.matching_form');
    }

    public function checkMatch(Request $request)
    {
        $request->validate([
            'merk' => 'required|string',
            'model' => 'required|string',
            'prosesor' => 'required|string',
            'ram' => 'required|integer',
            'storage' => 'required|integer',
        ]);

        $matchingLaptops = Laptop::where('merk', $request->merk)
            ->where('model', $request->model)
            ->where('prosesor', $request->prosesor)
            ->where('ram', $request->ram)
            ->where('storage', $request->storage)
            ->get();

        return view('matching_form', compact('matchingLaptops'));
    }

    public function showCrudTable()
    {
        $laptops = Laptop::all();
        return view('admin.crud', compact('laptops'));
    }

    // Memproses data dari form matching
    // app/Http/Controllers/MatchController.php

public function store(Request $request)
{
    $request->validate([
        'merk' => 'required|string',
        'model' => 'required|string',
        'prosesor' => 'required|string',
        'ram' => 'required|integer',
        'storage' => 'required|integer',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $data = $request->all();

    // Cek apakah ada gambar yang diupload
    if ($request->hasFile('gambar')) {
        $data['gambar'] = $request->file('gambar')->store('uploads', 'public');
    }

    Laptop::create($data);

    return redirect()->route('crud_table.index')->with('success', 'Laptop berhasil ditambahkan.');
}

public function update(Request $request, $id)
{
    $request->validate([
        'merk' => 'required|string',
        'model' => 'required|string',
        'prosesor' => 'required|string',
        'ram' => 'required|integer',
        'storage' => 'required|integer',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $laptop = Laptop::findOrFail($id);
    $data = $request->all();

    // Jika ada gambar baru yang diupload, hapus yang lama dan simpan yang baru
    if ($request->hasFile('gambar')) {
        if ($laptop->gambar && \Storage::disk('public')->exists($laptop->gambar)) {
            \Storage::disk('public')->delete($laptop->gambar);
        }
        $data['gambar'] = $request->file('gambar')->store('uploads', 'public');
    }

    $laptop->update($data);

    return redirect()->route('crud_table.index')->with('success', 'Laptop berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $laptop = Laptop::findOrFail($id);
        $laptop->delete();

        return redirect()->route('crud_table.index')->with('success', 'Laptop berhasil dihapus.');
    }

    public function show($id)
{
    $laptop = Laptop::findOrFail($id);
    return view('laptops.show', compact('laptop'));
}


}
