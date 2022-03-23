<?php

namespace App\Http\Controllers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\Micro;
use App\Models\Scheme;
use App\Models\Sensor;


class SchemeController extends Controller {

    public function index() {
        return view('admin.schemes.index', [
            'schemes' => Scheme::all(),
            'controllers' => Micro::query()->pluck('name', 'id'),
            'sensors' => Sensor::all(),
        ]);
    }

    public function store(Request $request) {
        $data = $request->validate([
            'controller_id' => 'required', 'sensor_id' => 'required'
        ]);


        Scheme::query()->create($data);
        $controller = Micro::query()->findOrFail($data['controller_id']);
        $sensor = Sensor::query()->findOrFail($data['sensor_id']);
        $this->up($this->Stringify($controller->name, $sensor->name));
        return redirect()->back();
    }

    public function up($name) {
        Schema::create($name, function(Blueprint $table) {
            $table->id();
            $table->decimal('humidity', $precision = 5, $scale = 2);
            $table->decimal('temperature', $precision = 5, $scale = 2);
            $table->timestamps();
        });
    }

    private function Stringify($c_name, $s_name) {
//        new Dynamic('12')
        return strtolower(str_replace(' ', '', $c_name) . '_' . str_replace(' ', '', $s_name));
    }

    public function down($name) {
        Schema::dropIfExists($name);
    }

    public function insert_data(Request $request) {
        $data = $request->all();
        $data['created_at'] = now();
        $data['updated_at'] = now();
        DB::table('arduinouno')->insert($data);
        return response()->json('success');
    }
}
