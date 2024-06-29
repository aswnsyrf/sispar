<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pembayaran;

class ProfilController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if (!$user) {
            // Handle jika pengguna tidak terotentikasi
            return redirect()->route('login'); // Redirect ke halaman login atau sesuaikan dengan logika aplikasi Anda
        }

        $payments = Pembayaran::where('user_id', $user->id)->with('booking')->get();

        return view('profil.index', [
            'user' => $user,
            'payments' => $payments,
        ]);
    }
}
