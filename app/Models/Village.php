<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

class Village extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'area_id',
        'name'
    ];

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
     * @return BelongsTo
     */
    public function area(): BelongsTo
    {
        return $this->belongsTo('App\Models\Area');
    }

    /**
     * @return BelongsToMany
     */
    public function streets(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Street');
    }

    /**
     * @param Builder $query
     * @param Request $request
     *
     * @return Builder
     */
    public function scopeSearch(Builder $query, Request $request): Builder
    {
        $query->where('name', 'LIKE', '%' . $request->village_name . '%');
        if ($request->has('region_id')) {
            $query->where('region_id', $request->region_id);
        }
        return $query;
    }
}
