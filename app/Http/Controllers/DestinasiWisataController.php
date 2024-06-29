<?php
namespace App\Http\Controllers;

use App\Models\DestinasiWisata;
use App\Models\Kategori;
use App\Models\Pengelola;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DestinasiWisataController extends Controller
{
    public function index()
    {
        $destinasi_wisatas = DestinasiWisata::with('kategorii')->orderBy('name', 'asc')->paginate(5);

        return view('destinasi.index', compact('destinasi_wisatas'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $data_kategorii = Kategori::all();
        return view('destinasi.create', compact('data_kategorii'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'lokasi' => 'required',
            'fasilitas' => 'required',
            'tarif_masuk' => 'required',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = $profileImage;
        }

        DestinasiWisata::create($input);

        return redirect()->route('destinasi.index')
            ->with('success', 'Destinasi created successfully.');
    }

    public function show(DestinasiWisata $destinasi_wisata)
    {
        return view('destinasi.show', compact('destinasi_wisata'));
    }

    public function edit(DestinasiWisata $destinasi)
    {
        $data_kategorii = Kategori::all();
        return view('destinasi.edit', compact('destinasi', 'data_kategorii'));
    }

    public function update(Request $request, DestinasiWisata $destinasi)
    {
        $request->validate([
            'name' => 'required',
            'lokasi' => 'required',
            'fasilitas' => 'required',
            'tarif_masuk' => 'required',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = $profileImage;

            // Hapus gambar lama jika ada
            if ($destinasi->image) {
                File::delete(public_path('images/'.$destinasi->image));
            }
        } else {
            unset($input['image']);
        }

        $destinasi->update($input);

        return redirect()->route('destinasi.index')
            ->with('success', 'Destinasi updated successfully.');
    }

    public function destroy(DestinasiWisata $destinasi)
    {
        if ($destinasi->image) {
            File::delete(public_path('images/'.$destinasi->image));
        }

        $destinasi->delete();

        return redirect()->route('destinasi.index')
            ->with('success', 'Destinasi deleted successfully.');
    }



}
