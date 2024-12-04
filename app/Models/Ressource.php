<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Ressource extends Model
{
    protected $collection = 'ressources';
    protected $fillable = [
        'title'
    ];

}
