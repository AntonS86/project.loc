<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RealEstate extends Model
{
    protected $table = 'real_estates';

    protected $appends = [
        'current_price',
        'address'
    ];

    /**
     * @return BelongsTo
     */
    public function rubric(): BelongsTo
    {
        return $this->belongsTo('App\Models\Rubric');
    }

    /**
     * @return BelongsTo
     */
    public function region(): BelongsTo
    {
        return $this->belongsTo('App\Models\Region');
    }

    /**
     * @return BelongsTo
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo('App\Models\City');
    }

    /**
     * @return BelongsTo
     */
    public function street(): BelongsTo
    {
        return $this->belongsTo('App\Models\Street');
    }

    /**
     * @return BelongsTo
     */
    public function district(): BelongsTo
    {
        return $this->belongsTo('App\Models\District');
    }

    /**
     * @return BelongsTo
     */
    public function area(): BelongsTo
    {
        return $this->belongsTo('App\Models\Area');
    }

    /**
     * @return BelongsTo
     */
    public function village(): BelongsTo
    {
        return $this->belongsTo('App\Models\Village');
    }

    /**
     * @return HasMany
     */
    public function prices(): HasMany
    {
        return $this->hasMany('App\Models\Price');
    }

    /**
     * @return BelongsTo
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo('App\Models\Type');
    }

    /**
     * @return BelongsToMany
     */
    public function images(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Image');
    }

    /**
     * @return string
     */
    public function getCurrentPriceAttribute(): string
    {
        return number_format($this->price, 0, '.', ' ');
    }

    public function getAddressAttribute(): string
    {
        return vsprintf('%s %s %s %s %s %s', [
            $this->region->name,
            $this->city->name ?? '',
            $this->area->name ?? '',
            $this->village->name ?? '',
            $this->street->name ?? '',
            $this->house_number ?? '',
        ]);
    }

    /**
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeFullContent(Builder $query): Builder
    {
        return $query->with([
            'rubric',
            'region',
            'city',
            'street',
            'district',
            'area',
            'village',
            'prices',
            'images'
        ]);
    }
}
