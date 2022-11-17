<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\dataSensor;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    public function index()
    {
        $sensor = dataSensor::all();
        return response()->json([
            'status' => 'success',
            'data' => $sensor
        ], 200);
    }
}
