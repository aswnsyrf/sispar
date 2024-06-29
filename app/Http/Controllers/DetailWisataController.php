<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\DestinasiWisata;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class DetailWisataController extends Controller
{
    public function show($id)
{
    $destinasiWisata = DestinasiWisata::findOrFail($id);
    $reviews = Review::where('destinasi_wisata_id', $id)->get();

    $booking = Booking::where('destinasi_wisata_id', $id)
    ->where('user_id', Auth::id()) // Adjust this condition based on your application logic
    ->first();

    return view('detailwisata.index', compact('destinasiWisata', 'reviews', 'booking'));
}

    public function storeReview(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|numeric|min:1|max:5',
            'comment' => 'required|string|max:255',
        ]);

        $review = new Review();
        $review->destinasi_wisata_id = $id;
        $review->user_id = Auth::id();
        $review->rating = $request->input('rating');
        $review->comment = $request->input('comment');
        $review->save();

          // Update rating_average, rating_total, dan rating_count di destinasi_wisatas
        $destinasiWisata = DestinasiWisata::findOrFail($id);
        $destinasiWisata->rating_total += $review->rating;
        $destinasiWisata->rating_count++;
        $destinasiWisata->rating_average = $destinasiWisata->rating_total / $destinasiWisata->rating_count;
        $destinasiWisata->save();

        return redirect()->back()->with('success', 'Review added successfully.');
    }
}
