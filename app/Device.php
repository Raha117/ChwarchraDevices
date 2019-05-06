<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    public function device_specifications(){

        return $this->hasMany(Device_Specification::class);
    }

    protected $fillable = [

        'serial_no','model_no','kind'
    ];

    public function employees_devices(){

        return $this->hasMany(Employees_Device::class);
    }

}
