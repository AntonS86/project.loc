<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Article extends Model
{
    protected $fillable = [
        'title',
        'desc',
        'text',
        'alias',
        'image',
        'meta_desc',
        'status',
        'category_id'
    ];

    protected $dates = [
        'published_at',
    ];

    protected $appends = [
        'article_link',
        'date_view_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }


    public function keywords()
    {
        return $this->belongsToMany('App\Models\Keyword');
    }

    public function images()
    {
        return $this->belongsToMany('App\Models\Image');
    }

    /**
     * format date
     * @return string
     */
    public function getDateViewAtAttribute(): string
    {
        if (is_null($date = $this->published_at)) {
            return trans('text.unpublished');
        }
        return vsprintf('%s %s %s', [
            $date->format('d'),
            trans('text.month.' . $date->format('F')),
            $date->format('Y')
        ]);

    }

    public function getArticleLinkAttribute()
    {
        return route('articles.show', ['alias' => $this->alias]);
    }


    public function scopeFullContent(Builder $query): Builder
    {
        return $query->with(['category', 'keywords', 'images' => function ($query) {
            return $query->wherePivot('title', 'Y');
        }]);
    }

    public function loadFullContent()
    {
        return $this->load(['category', 'keywords', 'images' => function ($query) {
            $query->wherePivot('title', 'Y');
        }]);
    }

    /**
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopePreview(Builder $query): Builder
    {
        return $query->select([
            'articles.id', 'articles.desc', 'articles.title', 'articles.alias',
            'published_at', 'articles.created_at', 'articles.category_id'
        ]);
    }

    /**
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeAdminPreview(Builder $query): Builder
    {
        return $query->select([
            'articles.id', 'articles.desc', 'articles.title', 'articles.alias',
            'status', 'published_at', 'created_at', 'category_id'
        ]);
    }

    /**
     * @param Builder $query
     *
     * @return Builder
     */

    public function scopeFullview(Builder $query): Builder
    {
        return $query->select([
            'articles.id', 'articles.desc', 'articles.meta_desc', 'articles.text', 'articles.title',
            'articles.alias', 'published_at', 'created_at', 'category_id'
        ]);
    }

    /**
     *  с титульным изображением
     *
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeWithTitleImage(Builder $query): Builder
    {
        return $query->with(['images' => function ($query) {
            return $query->wherePivot('title', 'Y');
        }]);
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
        if (Auth::check()) {
            return $query;
        }
        return $query->where('status', 'published');
    }


    /**
     * @param Builder $query
     * @param string  $slug
     * @param int     $id
     *
     * @return Builder
     */
    public function scopeSearchSlug(Builder $query, string $slug, int $id): Builder
    {
        return $query->where([
            ['alias', $slug], ['id', '<>', $id]
        ]);
    }

    /**
     * @param Builder $query
     * @param string  $search
     *
     * @return Builder
     */
    public function scopeSearch(Builder $query, string $search): Builder
    {
        return $query->where('title', 'LIKE', '%'.$search.'%')
            ->orWhere('desc', 'LIKE', '%'.$search.'%')
            ->orWhere('text', 'LIKE', '%'.$search.'%');
    }
}
