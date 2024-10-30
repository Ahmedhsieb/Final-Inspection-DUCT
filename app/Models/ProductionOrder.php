<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductionOrder extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'work order',
        'date',
        'project',
        'shape',
        'customer',
        'quality inspector',
        'signature',
        'approved by',
    ];
}
