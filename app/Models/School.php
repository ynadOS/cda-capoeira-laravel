<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
class School extends Model
{
    protected $collection = 'schools';
    protected $fillable = [
        'name'
    ];
}
