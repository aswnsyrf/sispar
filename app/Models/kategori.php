<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function destinasiWisata()
    {
        return $this->hasMany(DestinasiWisata::class, 'kategori', 'id');
    }
}
