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
    ];

    // protected $casts = [
    //     'target_date' => 'date',
    // ];

    // Relations
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}