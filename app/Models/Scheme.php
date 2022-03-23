<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Scheme extends Model {
    use HasFactory;

    protected $fillable = ['controller_id', 'sensor_id'];

    public function sensor() {
        return $this->belongsTo(Sensor::class);
    }

    public function controllers() {
        return $this->hasMany(Micro::class);
    }
}
