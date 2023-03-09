<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

   

    protected $guarded = [];

    use HasFactory;

    public function cars()
    {
        return $this->belongsToMany(Car::class);
    }

    public function filteredCars()
    {
        return $this->belongsToMany(Car::class)
            ->wherePivot('tag_id', $this->id)
            ->orderBy('updated_at', 'DESC');
    }
}
