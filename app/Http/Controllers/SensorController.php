<?php

namespace App\Http\Controllers;

use App\Http\Requests\SensorRequest;
use App\Models\Sensor;


class SensorController extends Controller {
    /**
     * Display a listing of the resource.
     *
     */
    public function index() {
        return view('admin.sensors.index', [
            'sensors' => Sensor::all()
        ]);
    }

    public function store(SensorRequest $request) {
        $data = $request->validated();
        $sensor = new Sensor();
        $sensor->fill($data);
        $sensor->save();

        return redirect()->route('admin.sensors.index');
    }

    public function update(SensorRequest $request, Sensor $sensor) {
        //
    }


    public function destroy(Sensor $sensor) {
        $sensor->delete();
        return redirect()->back();
    }
}
