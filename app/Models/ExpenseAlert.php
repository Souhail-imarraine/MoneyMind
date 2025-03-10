<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpenseAlert extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'threshold_percentage',
        'category_id',
        'alert_type',
        'is_active',
        'is_notified'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
