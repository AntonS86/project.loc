<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = [
        'title',
        'alias',
        'parent'
    ];

    protected $appends = [
        'path'
    ];

    public function articles()
    {
        return $this->hasMany('App\Article');
    }


    public function children()
    {
        return $this->hasMany($this, 'parent', 'id');
    }


    public function parent()
    {
        return $this->belongsTo($this, 'id', 'parent');
    }

    public function getPathAttribute()
    {
        return route('articlesCategory', ['cat_alias' => $this->alias]);
    }


    /**
     *
     * @param $query
     *
     * @return mixed
     */
    public function scopeParentWithChildren(Builder $query): Builder
    {
        return $query->where('parent', 0)->with('children');
    }


    /**
     * @param Builder $query
     * @param string  $alias
     *
     * @return Builder
     */
    public function scopeWithChildren(Builder $query, string $alias): Builder
    {
        return $query->where('alias', $alias)->with('children');
    }

}
