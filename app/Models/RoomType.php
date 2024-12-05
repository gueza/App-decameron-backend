<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;

    protected $table = 'room_types';
    protected $primaryKey = 'rty_id';
    protected $fillable = [
        'rty_name', 
        'rty_state'
    ];
}
