<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'global_threshold',
        'category_threshold',
    ];

    protected $casts = [
        'category_threshold' => 'json',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
