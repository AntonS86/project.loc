<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Works extends Model
{
    protected $fillable = [
      'name'
    ];

    /**
     * @return HasMany
     */
    public function workMessages(): HasMany
    {
        return $this->hasMany('App\WorkMessage');
    }
}
