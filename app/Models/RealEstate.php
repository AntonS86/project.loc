<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

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


    /**
     *
     * @return RealEstate
     */
    public function loadFullContent(): RealEstate
    {
        return $this->load([
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

    /**
     * @param Builder $query
     * @param array   $inputs
     *
     * @return Builder
     */
    public function scopeSearch(Builder $query, array $inputs): Builder
    {
        $query->where('rubric_id', $inputs['rubric_id']);
        if (isset($inputs['type_id'])) {
            $query->where('type_id', $inputs['type_id']);
        }
        if (isset($inputs['street_id'])) {
            $query->where('street_id', $inputs['street_id']);
        } elseif (isset($inputs['street_name'])) {
            $query->whereHas('street', function ($query) use ($inputs) {
                $query->where('name', 'LIKE', '%' . $inputs['street_name'] . '%');
            });
        }
        $query->orderBy($inputs['sort'], $inputs['sort_by']);
        return $query;
    }

    /**
     *  только опубликованные
     *
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published');
    }

    /**
     * Выборка привязанной модели к маршруту
     *
     * @param mixed $value
     *
     * @return Model|void|null
     */
    public function resolveRouteBinding($value)
    {
        $query = $this->where('id', $value);
        if (Auth::guest()) {
            $query->published();
        }
        return $query->first() ?? abort(404);
    }
}
