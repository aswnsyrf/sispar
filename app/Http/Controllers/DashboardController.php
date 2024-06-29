<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\DestinasiWisata;
use App\Models\User;
use App\Models\Pembayaran;
use App\Models\kategori;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $totalDestinasi = DestinasiWisata::count();
        $totalBooking = Booking::count();
        $totalUsers = User::count();
        $totalPembayaran = Pembayaran::count();
        $totalKategori = kategori::count();

        return view('dashboard', compact('totalDestinasi','totalBooking','totalUsers','totalPembayaran','totalKategori'));


    }
}
