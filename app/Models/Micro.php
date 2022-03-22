<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string name
 */
class Micro extends Model {
    use HasFactory;

    protected $fillable = ['name', 'serialport', 'port', 'serial_number'];
    protected $table = 'microcontrollers';
}
