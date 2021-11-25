<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scheme extends Model {
    use HasFactory;

    protected $fillable = ['controller_id', 'sensor_id'];
}
