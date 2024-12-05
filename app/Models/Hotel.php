<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $table = 'hotels';
    protected $primaryKey = 'hot_id';
    protected $fillable = [
        'hot_name', 
        'hot_quantity_rooms', 
        'cit_id', 
        'hot_address', 
        'hot_nit', 
        'hot_state',
    ];

    public function city()
    {
        return $this->belongsTo(City::class, 'cit_id', 'cit_id');
    }
}
