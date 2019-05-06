<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
    public function device_specifications(){
        return $this->hasMany(Device_Specification::class);
    }

    protected $fillable = [

        'name'
    ];

    
}
