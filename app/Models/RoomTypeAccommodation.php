<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomTypeAccommodation extends Model
{
    use HasFactory;

    protected $table = 'room_type_accommodation';

    protected $primaryKey = 'rta_id';

    protected $fillable = [
        'rty_id',
        'acc_id',
        'rta_state',
    ];

    public function roomType()
    {
        return $this->belongsTo(RoomType::class, 'rty_id', 'rty_id');
    }

    public function accommodation()
    {
        return $this->belongsTo(Accommodation::class, 'acc_id', 'acc_id');
    }
}
