<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [

        'name','position','phone_number','organization','location','active'
    ];

    public function employee_devices(){

        return $this->hasMany(Employees_Device::class);
    }

}
