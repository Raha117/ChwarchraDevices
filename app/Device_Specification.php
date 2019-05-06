<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device_Specification extends Model
{
    public function device(){
        return $this->belongsTo(Device::class);
    }

    public function specification(){
        return $this->belongsTo(Specification::class);
    }

    protected $fillable = [

        'kind','device_id','specification_id','value'
    ];
}
