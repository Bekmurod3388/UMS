<?php

use App\Models\Sensor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/insert_data', [\App\Http\Controllers\SchemeController::class, 'insert_data']);

Route::post('/test', function (Request $request) {
    $data = [
        "name" => $request->get('name'),
        'type' => "sadsad",
        'description' => "sadsadsad"
    ];
    $sensor = new Sensor();
    $sensor->fill($data);
    $sensor->save();
    return 1;
});
