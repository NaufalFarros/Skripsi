<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Symfony\Component\CssSelector\Node\ElementNode;

class dataSensor extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'data_sensors';

    protected $fillable = [
        'suhu', 'ph',
    ];

    protected $dates = array('created_at');
    use HasFactory;
}
