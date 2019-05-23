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
        'address',
        'rooms_view',
        'land_square_view',
        'total_square_view',
        'floors_view',
        'date_view_at'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
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

    /**
     * @return string
     */
    public function getAddressAttribute(): string
    {
        $address   = [];
        $address[] = $this->region->name;

        if (isset($this->area->name)) {
            $address[] = $this->area->name;
        }
        if (isset($this->city->name)) {
            $address[] = $this->city->name;
        }
        if (isset($this->village->name)) {
            $address[] = $this->village->name;
        }
        if (isset($this->street->name)) {
            $address[] = $this->street->name;
        }
        if (isset($this->house_number)) {
            $address[] = $this->house_number;
        }

        $format = trim(str_repeat('%s ', count($address)));
        return vsprintf($format, $address);
    }

    /**
     * @return string|null
     */
    public function getRoomsViewAttribute(): ?string
    {
        return ($this->rooms)
            ? sprintf('%s-к', $this->rooms)
            : null;
    }

    public function getLandSquareViewAttribute(): ?string
    {
        return ($this->land_square)
            ? sprintf('%s сот.', $this->land_square / 100)
            : null;
    }

    /**
     * @return string|null
     */
    public function getTotalSquareViewAttribute(): ?string
    {
        return ($this->total_square)
            ? sprintf('%s м%s', $this->total_square, html_entity_decode('&#178;'))
            : null;
    }

    /**
     * @return string|null
     */
    public function getFloorsViewAttribute(): ?string
    {
        if ($this->floors) {
            return ($this->floor) ? sprintf('%s/%s', $this->floor, $this->floors) : $this->floors;
        }
        return null;
    }

    /**
     * @return string
     */
    public function getDateViewAtAttribute(): string
    {
        return $this->created_at->format('d-m-Y');
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
