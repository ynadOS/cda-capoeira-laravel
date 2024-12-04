<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Discussion extends Model
{
    protected $collection = 'discussions';
    protected $fillable = [
        'subject'
    ];}
