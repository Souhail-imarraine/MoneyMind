<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SavingsGoal extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'goal_amount',
        'monthly_saving',
        'current_amount',
        'is_achieved',
    ];

    protected $casts = [
        'is_achieved' => 'boolean'
    ];

    // Relations
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
