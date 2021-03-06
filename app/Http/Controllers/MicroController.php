<?php

namespace App\Http\Controllers;

use App\Models\Micro;
use Illuminate\Http\Request;

class MicroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $micros = Micro::all();
        return view('admin.microcontrollers.index',['micros'=>$micros]);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $micro = new Micro();
        $micro->fill($request->all());
        $micro->save();
        return redirect()->back()->with('success','Муваффақиятли яратилди');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Micro  $microcontroller
     * @return \Illuminate\Http\Response
     */
    public function show(Microcontroller $microcontroller)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Micro  $microcontroller
     * @return \Illuminate\Http\Response
     */
    public function edit(Microcontroller $microcontroller)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Micro  $microcontroller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Microcontroller $microcontroller)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Micro  $microcontroller
     * @return \Illuminate\Http\Response
     */
    public function destroy(Micro $microcontroller)
    {
        $microcontroller->delete();
        return redirect()->back()->with('success','Муваффақиятли ўчирилди!');
    }
}
