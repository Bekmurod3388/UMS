<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parameter;


class ParameterController extends Controller {

    public function index() {
        return view('admin.parameters.index', [
            'parameters' => Parameter::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {
        $data = $request->validate(['name' => 'required', 'value' => 'required']);
        $parameter = new Parameter();
        $parameter->fill($data);
        $parameter->save();

        return redirect()->route('admin.parameters.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Parameter $parameter
     * @return \Illuminate\Http\Response
     */
    public function show(Parameter $parameter) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Parameter $parameter
     * @return \Illuminate\Http\Response
     */
    public function edit(Parameter $parameter) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Parameter $parameter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parameter $parameter) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Parameter $parameter
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Parameter $parameter) {
        $parameter->delete();
        return redirect()->back();
    }
}
