<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable = [
        'user_id', 'name', 'target_amount', 'current_amount'
    ];

    // Relations
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}