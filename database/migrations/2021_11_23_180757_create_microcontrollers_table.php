<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateMicrocontrollersTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('microcontrollers', function(Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('serial_number')->unique();
            $table->string('serialport');
            $table->string('port');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('microcontrollers');
    }
}
