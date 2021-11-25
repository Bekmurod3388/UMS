<?php

namespace App\Http\Controllers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Models\Scheme;
use App\Models\Sensor;
use App\Models\Micro;

class SchemeController extends Controller {

    public function index() {

        return view('admin.schemes.index', [
            'controllers' => Micro::all(),
            'sensors' => Sensor::all(),
        ]);
    }

    public function store(Request $request) {
        Scheme::query()->create($request->all());
        $controller = Micro::query()->findOrFail($request->get('controller_id'));
        $sensor = Sensor::query()->findOrFail($request->get('sensor_id'));

        $this->up($this->Stringify($controller->name, $sensor->name));
        return redirect()->back();
    }

    public function up($name) {
        Schema::create($name, function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    public function down($name) {
        Schema::dropIfExists($name);
    }

    private function Stringify($c_name, $s_name) {
        return strtolower(str_replace(' ', '', $c_name) . '_' . str_replace(' ', '', $s_name));
    }
}
