<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{

    public function index()
    {
        $pembayarans = Pembayaran::orderBy('created_at', 'desc')->get();
        return view('pembayaran.index', compact('pembayarans'));
    }
    public function create($id)
    {
        $booking = Booking::findOrFail($id);

        if ($booking->status !== 'diterima') {
            return redirect()->back()->with('error', 'Booking harus diterima untuk melakukan pembayaran.');
        }

        return view('pembayaran.create', compact('booking'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'jumlah' => 'required|integer|min:1',
            'metode_pembayaran' => 'required|string|max:255',
            'tgl_pembayaran' => 'required|date',
            'bukti' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $booking = Booking::findOrFail($id);

        // Store the uploaded image in the storage
        $imagePath = $request->file('bukti')->store('bukti_pembayaran', 'public');

        Pembayaran::create([
            'booking_id' => $id,
            'user_id' => Auth::id(),
            'jumlah' => $request->input('jumlah'),
            'metode_pembayaran' => $request->input('metode_pembayaran'),
            'tgl_pembayaran' => $request->input('tgl_pembayaran'),
            'bukti' => $imagePath,
        ]);

        return redirect()->route('destinasi-wisata.show', $booking->destinasi_wisata_id)->with('success', 'Pembayaran berhasil dilakukan.');
    }
}
