<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Micro extends Model
{
    use HasFactory;
    protected $fillable = ['name','serialport','port'];
    protected $table = 'microcontrollers';
}