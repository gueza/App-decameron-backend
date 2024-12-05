<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';
    protected $primaryKey = 'roo_id';
    protected $fillable = [
        'hot_id',
        'acc_id',
        'rty_id',
        'roo_quantity',
        'roo_state',
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hot_id', 'hot_id');
    }

    public function accommodation()
    {
        return $this->belongsTo(Accommodation::class, 'acc_id', 'acc_id');
    }

    public function roomType()
    {
        return $this->belongsTo(RoomType::class, 'rty_id', 'rty_id');
    }
}
