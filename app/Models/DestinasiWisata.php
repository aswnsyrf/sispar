<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinasiWisata extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'lokasi','fasilitas','tarif_masuk', 'deskripsi', 'kategori', 'image'
    ];

    public function kategorii()
    {
        return $this->belongsTo(kategori::class, 'kategori', 'id');
    }
}
