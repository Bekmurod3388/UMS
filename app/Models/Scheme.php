<?php

namespace App\Models;

use App\Http\Controllers\MicroController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Scheme extends Model {
    use HasFactory;

    protected $fillable = ['controller_id', 'sensor_id'];

    public function sensors(){
        return $this->hasMany(Sensor::class);
    }
    public function controllers(){
        return $this->hasMany(MicroController::class);
    }

}
