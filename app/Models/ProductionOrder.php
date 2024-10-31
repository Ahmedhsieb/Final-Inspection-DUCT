<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductionOrder extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'production_order',
        'work_order',
        'date',
        'project',
        'shape',
        'customer',
        'quality_inspector',
        'approved_by',
        'parameters'
    ];


    // save the parameters of each order as json
    public function setParametersAttribute($value)
    {
        $this->attributes['parameters'] =  serialize($value);
    }

    // return the parameters as array
    public function getParametersAttribute($value)
    {
        return unserialize($value);
    }
}
