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
        $data = $request->validate([
            'controller_id' => 'required',
            'sensor_id' => 'required'
        ]);
        Scheme::query()->create($data);
        $controller = Micro::findOrFail($data['controller_id']);
        $sensor = Sensor::findOrFail($data['sensor_id']);
        $this->up($controller->name,$sensor->name);
        return redirect()->back();
    }

    public function up($controller, $sensor) {
        Schema::create($controller . '_' . $sensor, function (Blueprint $table) {
            $table->id();
            $table->decimal('humidity', $precision = 5, $scale = 2);
            $table->decimal('temperature', $precision = 5, $scale = 2);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('schemes');
    }

    public function insert_data(Request $request)
    {
        return response()->json($request->all());
    }
}
