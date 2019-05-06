<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Employees_Device extends Model
{
    protected $fillable = [

        'employee_id','device_id'
    ];
    public function employee(){

        return $this->belongsTo(Employee::class);
    }

    public function device(){

        return $this->belongsTo(Device::class);
    }

}
