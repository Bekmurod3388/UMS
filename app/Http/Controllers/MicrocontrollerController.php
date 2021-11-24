<?php

namespace App\Http\Controllers;

use App\Models\Microcontroller;
use Illuminate\Http\Request;

class MicrocontrollerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $microcontrollers = Microcontroller::all();
        return view('admin.microcontrollers.index',['microcontrollers'=>$microcontrollers]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Microcontroller  $microcontroller
     * @return \Illuminate\Http\Response
     */
    public function show(Microcontroller $microcontroller)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Microcontroller  $microcontroller
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
     * @param  \App\Models\Microcontroller  $microcontroller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Microcontroller $microcontroller)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Microcontroller  $microcontroller
     * @return \Illuminate\Http\Response
     */
    public function destroy(Microcontroller $microcontroller)
    {
        //
    }
}
