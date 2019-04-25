<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;


class WorkMessage extends Model
{

    /**
     * @var array
     */
    protected $appends = [
        'time'
    ];

    /**
     * @return BelongsTo
     */
    public function work(): BelongsTo
    {
        return $this->belongsTo('App\Models\Work');
    }

    /**
     * @return BelongsTo
     */
    public function phone(): BelongsTo
    {
        return $this->belongsTo('App\Models\Phone');
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
     * @throws \Exception
     */
    public function getTimeAttribute(): string
    {
        return (new Carbon($this->created_at))->format('H:i d-m Y');
    }

    /**
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeAllContent(Builder $query): Builder
    {
        return $query->where('read', 0)->with(['work', 'phone', 'images']);
    }
}
