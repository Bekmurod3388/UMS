<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchemeRequest;
use App\Http\Services\SchemeService;
use App\Models\Micro;
use App\Models\Scheme;
use App\Models\Sensor;


class SchemeController extends Controller {

    private SchemeService $service;
    public function __construct(SchemeService $service) {
        $this->service = $service;
    }

    public function index() {
        return view('admin.schemes.index', [
            'schemes' => Scheme::with('sensor')->get(),
            'controllers' => Micro::query()->pluck('name', 'id'),
            'sensors' => Sensor::all()
        ]);
    }

    public function store(SchemeRequest $request) {
        $data = $request->validated();

        Scheme::query()->create($data);
        $this->service->store($data);

        return redirect()->back();
    }
}
