<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class basisdatab extends Model
{
    public $timestamps = false;
    
    protected $fillable = 
    ['nama','nrp','tugas1','tugas2','tugas3','keterangan','foto'];
}
