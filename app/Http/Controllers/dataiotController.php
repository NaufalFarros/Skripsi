<?php

namespace App\Http\Controllers;

use App\Models\dataSensor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class dataiotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function datatable(){

        $sensorData = dataSensor::all();

        return view('admin.datatable', compact('sensorData'));

    }


    public function index(Request $request)
    {
       

        if($request->ajax()){

            return $data = dataSensor::orderby('created_at','desc')->get()->reverse()->values();     
        }
        // dd($data);
        return view('admin.datasensor');
    }

    // public function ajax(){
    //     $data = dataSensor::orderby('created_at','desc')->take(10)->get()->reverse()->values();     
    //     return response($data);
    // }

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
        // return error_log($request);
        // $data= dataSensor::create([
        //     'suhu' => $request['suhu'],
        //     'ph' => $request['pH']
        // ]);
        // $animal=new dataSensor();
        // $animal->suhu = $request->get('suhu');
        // $animal->ph = $request->get('pH');
        // $animal->salinitas = $request->get('Garam');
        // $animal->kalmanSuhu = $request->get('kalmanSuhu');
        // $animal->kalmanPh = $request->get('kalmanPh');
        // $animal->kalmanSalinitas = $request->get('kalmanGaram');
        // $animal->tanggal = Carbon::now()->format('Y-m-d H:i:s');
        // $animal->save();
        // return response($animal);

        return dataSensor::create([
            'suhu' => $request['suhu'],
            'ph' => $request['pH'],
            'salinitas' => $request['Garam'],
            'kalmanSuhu' => $request['kalmanSuhu'],
            'kalmanPh' =>  $request['kalmanPh'],
            'kalmanSalinitas' => $request['kalmanGaram'],
            'tanggal' => Carbon::now()->format('Y-m-d H:i:s')
        ]
    );

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
