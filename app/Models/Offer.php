<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'desc',
        'icon',
        'path'
    ];
}
