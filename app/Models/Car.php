<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $guarded = [];

       /**
     * Get the user that owns the cars.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
