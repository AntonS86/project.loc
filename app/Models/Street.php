<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

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
     * @param Request $request
     *
     * @return Builder
     */
    public function scopeSearch(Builder $query, Request $request): Builder
    {
        $query->where('name', 'LIKE', '%' . $request->street_name . '%');
        if ($request->has('city_id')) {
            $query->whereHas('cities', function ($query) use ($request) {
                $query->where('cities.id', $request->city_id);
            });
        } elseif ($request->has('village_id')) {
            $query->whereHas('villages', function ($query) use ($request) {
                $query->where('villages.id', $request->village_id);
            });
        }
        return $query;
    }
}
