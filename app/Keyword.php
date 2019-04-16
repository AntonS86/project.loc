<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    protected $fillable = [
        'name',
        'alias'
    ];

    public function articles()
    {
        return $this->belongsToMany('App\Article');
    }

}
