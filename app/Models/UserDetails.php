<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    use HasFactory;

    protected $table = 'user_details'; 

    protected $fillable = ['first_name', 'last_name', 'cost'];

    public function favPlaces()
    {
        return $this->hasMany(FavPlace::class);
    }
}

