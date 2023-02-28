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
    public function user()  //in sinulat because one user can have many cars
    {
        return $this->belongsTo(User::class);
    }

         /**
     * Many tags belongs to many cars.
     */

    public function tags()  
    {
        return $this->belongsToMany(Tag::class);
    }

}
