<?php
namespace App\Http\Controllers;

use App\Models\DestinasiWisata;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DestinasiWisataController extends Controller
{
    public function index()
    {
        $destinasi_wisatas = DestinasiWisata::with('kategorii')->orderBy('name', 'asc')->paginate(5);
        return response()->json($destinasi_wisatas);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'lokasi' => 'required',
            'fasilitas' => 'required',
            'tarif_masuk' => 'required',
            'deskripsi' => 'required',
            'kategori' => 'required|exists:kategoris,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = $profileImage;
        }

        $destinasiWisata = DestinasiWisata::create($input);

        return response()->json($destinasiWisata, 201);
    }

    public function show($id)
    {
        $destinasiWisata = DestinasiWisata::with('kategorii')->findOrFail($id);
        return response()->json($destinasiWisata);
    }

    public function update(Request $request, $id)
    {
        $destinasiWisata = DestinasiWisata::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'lokasi' => 'required',
            'fasilitas' => 'required',
            'tarif_masuk' => 'required',
            'deskripsi' => 'required',
            'kategori' => 'required|exists:kategoris,id',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = $profileImage;

            // Hapus gambar lama jika ada
            if ($destinasiWisata->image) {
                File::delete(public_path('images/'.$destinasiWisata->image));
            }
        } else {
            unset($input['image']);
        }

        $destinasiWisata->update($input);

        return response()->json($destinasiWisata);
    }

    public function destroy($id)
    {
        $destinasiWisata = DestinasiWisata::findOrFail($id);

        if ($destinasiWisata->image) {
            File::delete(public_path('images/'.$destinasiWisata->image));
        }

        $destinasiWisata->delete();

        return response()->json(null, 204);
    }
}

