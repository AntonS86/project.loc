<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Street extends Model
{

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return HasMany
     */
    public function realEstates(): HasMany
    {
        return $this->hasMany('App\Models\RealEstate');
    }

    /**
     * @return BelongsToMany
     */
    public function cities(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\City');
    }

    /**
     * @return BelongsToMany
     */
    public function villages(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Village');
    }

    /**
     * @param Builder $query
     * @param string  $search
     *
     * @return Builder
     */
    public function scopeSearch(Builder $query, string $search): Builder
    {
        return $query->where('name', 'LIKE', '%' . $search . '%');
    }
}
