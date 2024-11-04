<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Laptop;

class SimulationController extends Controller
{
    // Menampilkan form pencocokan
    public function showForm()
    {
        return view('user.simulation');
    }

    // Memproses data dari form
    public function checkMatch(Request $request)
    {
        // Validasi input
        $request->validate([
            'merk' => 'required|string',
            'model' => 'required|string',
            'prosesor' => 'required|string',
            'ram' => 'required|integer',
            'storage' => 'required|integer',
        ]);

        // Ambil data input dari form
        $merk = $request->input('merk');
        $model = $request->input('model');
        $prosesor = $request->input('prosesor');
        $ram = $request->input('ram');
        $storage = $request->input('storage');

        // Lakukan pencarian di database
        $laptop = Laptop::where('merk', $merk)
                        ->where('model', $model)
                        ->where('prosesor', $prosesor)
                        ->where('ram', $ram)
                        ->where('storage', $storage)
                        ->first();

        // Cek apakah data ditemukan atau tidak
        // app/Http/Controllers/MatchController.ph


    }

    public function showLaptop($id)
    {
    $laptop = Laptop::findOrFail($id);
    return view('user.laptop_detail', compact('laptop'));
    }

}
