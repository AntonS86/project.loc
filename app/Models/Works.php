<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Works extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
      'name'
    ];

    /**
     *
     * @return HasMany
     */
    public function workMessages(): HasMany
    {
        return $this->hasMany('App\Models\WorkMessage');
    }
}
