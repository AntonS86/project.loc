<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Image extends Model
{

    /**
     * @var array
     */
    protected $fillable = [
        'path',
        'path_thumbs',
        'type',
    ];

    /**
     * @var array
     */
    protected $appends = [
        'asset_path',
        'asset_thumbs_path'
    ];


    /**
     * @return BelongsToMany
     */
    public function articles(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Article');
    }

    /**
     * @return BelongsToMany
     */
    public function workMessages(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\WorkMessage');
    }

    /**
     * @return BelongsToMany
     */
    public function realEstates(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\RealEstate');
    }


    /**
     * @return string
     */
    public function getAssetPathAttribute(): string
    {
        if (strpos($this->path, 'http') === false) {
            return '/' . config('settings.imageSave') . $this->path;
        } else {
            return $this->path;
        }
    }

    /**
     * @return string
     */
    public function getAssetThumbsPathAttribute(): string
    {
        if (strpos($this->path, 'http') === false) {
            return '/' . config('settings.thumbsSave') . $this->path;
        } else {
            return $this->path;
        }
    }

    /**
     * @param Builder $query
     * @param int     $id
     *
     * @return Builder
     */
    public function scopeExceptCurrentId(Builder $query, int $id): Builder
    {
        return $query->where('images.id', '<>', $id);
    }
}
