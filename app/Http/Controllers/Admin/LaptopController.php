<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaptopController extends Controller
{
    public function index()
    {
        $laptops = Laptop::all();
        return view('crud', compact('laptops'));
    }

    // Simpan data laptop baru
    public function store(Request $request)
    {
        $request->validate([
            'merk' => 'required|string',
            'model' => 'required|string',
            'prosesor' => 'required|string',
            'ram' => 'required|integer',
            'storage' => 'required|integer',
        ]);

        Laptop::create($request->all());
        return redirect()->route('crud')->with('success', 'Laptop berhasil ditambahkan.');
    }

    // Update data laptop
    public function update(Request $request, $id)
    {
        $request->validate([
            'merk' => 'required|string',
            'model' => 'required|string',
            'prosesor' => 'required|string',
            'ram' => 'required|integer',
            'storage' => 'required|integer',
        ]);

        $laptop = Laptop::findOrFail($id);
        $laptop->update($request->all());
        return redirect()->route('crud')->with('success', 'Laptop berhasil diperbarui.');
    }

    // Hapus data laptop
    public function destroy($id)
    {
        $laptop = Laptop::findOrFail($id);
        $laptop->delete();
        return redirect()->route('crud')->with('success', 'Laptop berhasil dihapus.');
    }
}
