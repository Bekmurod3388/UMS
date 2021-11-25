<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return view('admin.sensors.index', [
            'sensors' => Sensor::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $data = $request->validate(['name' => 'required', 'type' => 'required']);
        $sensor = new Sensor();
        $sensor->fill($data);
        $sensor->save();

        return redirect()->route('admin.sensors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function show(Sensor $sensor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function edit(Sensor $sensor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sensor $sensor)
    {
        //
    }


    public function destroy(Sensor $sensor)
    {
        $sensor->delete();
        return redirect()->back();
    }
}
