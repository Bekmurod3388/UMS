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
        $controller = Micro::findOrFail($request->get('controller_id'));
        $sensor = Sensor::findOrFail($request->get('sensor_id'));
        $this->up($controller->name,$sensor->name);
        return redirect()->back();
    }

    public function up($controller, $sensor) {
        Schema::create($controller . '_' . $sensor, function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('schemes');
    }
}
