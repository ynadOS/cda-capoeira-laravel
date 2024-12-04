<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Message extends Model
{
    protected $collection = 'messages';
    protected $fillable = [
        'text'
    ];}
