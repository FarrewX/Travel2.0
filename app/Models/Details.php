<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Details extends Model
{
    use HasFactory;

    
    protected $primaryKey = 'user_id';
    /*
    public function details(){
        return $this->belongsTo(User::class);

    }
    */

    protected $fillable = [
        'user_id',
        'name',
        'idcard',
        'gender',
        'birthdate',
        'address',
        'phone' ,
        'email'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
