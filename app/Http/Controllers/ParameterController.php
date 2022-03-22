<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parameter;


class ParameterController extends Controller {

    public function index(Request $request) {
        $sensors = Parameter::query()
            ->where('sensor_id', $request->get('sensor'))
            ->get();

        return view('admin.parameters.index', [
            'models' => $sensors
        ]);
    }


    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'value' => 'required',
            'sensor_id' => 'required'
        ]);

        Parameter::query()->create($data);
        return redirect()->back();
    }


    public function update(Request $request, Parameter $parameter) {
        //
    }


    public function destroy(Parameter $parameter) {
        $parameter->delete();
        return redirect()->back();
    }
}
