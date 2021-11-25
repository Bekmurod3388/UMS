<?php

namespace App\Http\Controllers;

use App\Models\Scheme;
use App\Models\Sensor;
use App\Models\Micro;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

;

class SchemeController extends Controller {

    public function index() {

        return view('admin.schemes.index', [
            'controllers' => Micro::all(),
            'sensors' => Sensor::all(),
        ]);
    }

    public function store(Request $request) {
        Scheme::query()->create($request->all());

        $this->up();
        return redirect()->back();
    }

    public function up() {
        Schema::create('sensor_temp', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('schemes');
    }
}
