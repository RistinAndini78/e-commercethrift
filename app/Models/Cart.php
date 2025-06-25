<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    // Atribut yang dapat diisi secara massal
    Protected $fillable = [
        'user_id',
        'product_id',
        'amount'
    ];

    // Mendefinisikan relasi antara Cart dan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Mendefinisikan relasi antara Cart dan Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
