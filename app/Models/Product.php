<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Atribut yang dapat diisi secara massal
    protected $fillable = [
        'name',
        'price',
        'description',
        'image',
        'stock'
    ];

    // Mendefinisikan relasi antara Product dan Transaction
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    // Mendefinisikan relasi antara Product dan Cart
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

}
