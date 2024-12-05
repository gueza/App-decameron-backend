<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    use HasFactory;

    protected $table = 'accommodations';
    protected $primaryKey = 'acc_id';
    protected $fillable = [
        'acc_name', 
        'acc_state'
    ];
}
