<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Event extends Model
{
    protected $collection = 'events';
    protected $fillable = [
        'title'
    ];}
