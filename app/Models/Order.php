<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Atribut yang dapat diisi secara massal
    protected $fillable = [
        'user_id',
        'is_paid',
        'payment_receipt',
        'bank',
        'delivery'
    ];

    // Mendefinisikan relasi antara Order dan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Mendefinisikan relasi antara Order dan Transaction
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
