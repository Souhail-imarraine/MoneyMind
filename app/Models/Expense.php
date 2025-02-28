<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'amount',
        'category_id',
        'date',
        'is_recurring',
    ];

    // Define the relationship with the User model
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with the Category model (if you have a Category model)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}