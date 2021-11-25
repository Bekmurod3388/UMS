<?php

use App\Models\Micro;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchemesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('schemes', function(Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('controller_id');
            $table->unsignedBigInteger('sensor_id');
            $table->timestamps();

            $table->foreign('controller_id')
                ->on('microcontrollers')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('schemes');
    }
}
