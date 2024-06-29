<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'destinasi_wisata_id',
        'user_id',
        'rating',
        'comment',
    ];

    public function destinasiWisata()
    {
        return $this->belongsTo(DestinasiWisata::class, 'destinasi_wisata_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
