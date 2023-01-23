<?php

namespace App\Exports;

use App\Models\dataSensor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SensorsData implements FromCollection, WithHeadings, WithColumnWidths
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return dataSensor::select('suhu','ph','salinitas','kalmanSuhu','kalmanPh','kalmanSalinitas','tanggal')->get();
    }

    public function headings(): array
    {
        return [
            'id',
            'Suhu Sensors',
            'pH Sensors',
            'Salinitas Sensors',
            'Kalman Suhu',
            'Kalman pH',
            'Kalman Salinitas',
            'Tanggal',
        ];
    }
    public function columnWidths(): array
    {
        return [
            'A' => 25,
            'B' => 20,            
            'C' => 20,            
            'D' => 20,            
            'E' => 20,            
            'F' => 20,            
            'G' => 20,            
            'H' => 25,            
        ];
    }

}
