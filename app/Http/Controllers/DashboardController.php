<?php

namespace App\Http\Controllers;

use App\Models\dataSensor;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = dataSensor::where('data_sensors')->orderBy('tanggal', 'asc')->get()->reverse()->first();
        // dd($data);
        return view('admin.dashboard', compact('data'));
    }
}
