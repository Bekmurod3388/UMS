<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dynamic extends Model
{
    use HasFactory;
    protected $table = 'basic';

    public function __construct()
    {
        $this->table = strtolower(
            str_replace(' ', '', request()->get('')) . '_' .
            str_replace(' ', '', $s_name)
        );
    }
}
