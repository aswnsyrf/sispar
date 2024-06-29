<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\DestinasiWisata;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{

    public function index()
    {
        $bookings = Booking::orderBy('created_at', 'desc')->get();
        return view('booking.index', compact('bookings'));
    }

    public function book(Request $request, $destinasiWisataId)
    {
        // Validasi input
        $request->validate([
            'tanggal' => 'required|date',
            'waktu' => 'required|date_format:H:i',
            'jumlah_tiket' => 'required|integer|min:1',
        ]);

        // Buat booking baru
        $booking = Booking::create([
            'destinasi_wisata_id' => $destinasiWisataId,
            'user_id' => Auth::id(),
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'jumlah_tiket' => $request->jumlah_tiket,
            'status' => 'menunggu',
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Tiket berhasil dipesan.');
    }

    public function approve($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'diterima';
        $booking->save();

        return redirect()->route('booking.index')->with('success', 'Booking has been approved.');
    }
}
