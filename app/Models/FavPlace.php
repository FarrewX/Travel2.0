<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavPlace extends Model
{
    use HasFactory;

    protected $table = 'fav_places'; // Replace your_table with the actual table name

    protected $fillable = ['user_details_id', 'place_name'];

    public function user()
    {
        return $this->belongsTo(UserDetails::class, 'user_details_id');
    }

    public function hotels()
    {
        return $this->hasMany(hotel::class);
    }

    public function restaurants()
    {
        return $this->hasMany(Restaurant::class);
    }

    public function stays()
    {
        return $this->hasMany(Stay::class);
    }

}