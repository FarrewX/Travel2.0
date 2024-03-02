<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stay extends Model
{
    use HasFactory;
    
    protected $fillable = ['dep_date', 'return_date', 'stay_days'];

    public function favPlace()
    {
        return $this->belongsTo(FavPlace::class);
    }
}
