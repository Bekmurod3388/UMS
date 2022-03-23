<?php

namespace App\Http\Services;

use App\Models\Micro;
use App\Models\Sensor;


class SchemeService {
    use Builder;

    public function store($data) {
        $controller = Micro::query()->findOrFail($data['controller_id']);
        $sensor = Sensor::query()->findOrFail($data['sensor_id']);
        $this->up('temp_humidity');
    }

//    private function Stringify($c_name, $s_name) {
//        return strtolower(str_replace(' ', '', $c_name) . '_' . str_replace(' ', '', $s_name));
//    }
}
