<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    // Atribut yang dapat diisi secara massal
    protected $fillable = [
        'order_id',
        'product_id',
        'amount'
    ];

    // Mendefinisikan relasi antara Transaction dan Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Mendefinisikan relasi antara Transaction dan Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
