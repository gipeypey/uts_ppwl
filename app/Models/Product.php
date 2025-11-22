<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    use HasFactory;
    protected $guarded = [];
    // "foto",
    // "nama",
    // "deskripsi",
    // "harga",
    // "stok",
    // "katgori_id",
    // ];
    
    public function kategori()
    {
    return $this->belongsTo(Category::class);
    }
}
