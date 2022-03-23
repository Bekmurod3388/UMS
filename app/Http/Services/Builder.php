<?php

namespace App\Http\Services;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


trait Builder {
    public function up($name) {
        Schema::create($name, function(Blueprint $table) {
            $table->id();
            $table->decimal('humidity')->default(0);
            $table->decimal('temperature')->default(0);
            $table->timestamps();
        });
    }

    public function down($name) {
        Schema::dropIfExists($name);
    }
}
