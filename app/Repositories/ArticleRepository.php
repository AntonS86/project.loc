<?php

namespace App\Repositories;

use App\Models\Article;
use App\Models\Category;

use Illuminate\Database\Eloquent\Collection;
use App\Http\Requests\ArticleRequest;
use App\Models\Image;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;


class ArticleRepository extends Repository
{

    /**
     * путь к папке с изображениями статьи
     *
     * @var string
     */
    private $pathImages = 'images' . DIRECTORY_SEPARATOR . '/articles';

    /**
     * коллекция со статьями
     *
     * @var [Collection]
     */
    private $articles;


    public function __construct(Article $article)
    {
        $this->model = $article;

    }


    /**
     * @param string|null $alias
     *
     * @return Collection|null
     */
    public function getArticles(string $alias): LengthAwarePaginator
    {
        $catId = $this->getCategoryId($alias);
        if (! $catId) {
            throw new ModelNotFoundException("No categories with alias: $alias");
        }

        return $this->model->preview()->fullContent()
                           ->when($catId, function ($query, $catId) {
                               return $query->whereIn('category_id', $catId);
                           })->published()->latest('published_at')->paginate(config('settings.pagination'));

    }

    /**
     * @param string $alias
     *
     * @return array|null
     */
    private function getCategoryId(string $alias): ?array
    {
        $categories = Category::withChildren($alias)->first();
        if (is_null($categories)) return null;

        $categoriesId[] = $categories->id;
        $categories->children->each(function ($item) use (&$categoriesId) {
            $categoriesId[] = $item->id;
        });

        return $categoriesId;
    }

    /**
     * @param string $alias
     *
     * @return Article|null
     */
    public function getArticlesForParsingNews(string $alias): ?Article
    {
        $catId = $this->getCategoryId($alias);
        return $this->model->select('created_at')
                           ->whereIn('category_id', $catId)->published()
                           ->latest('created_at')->first();
    }

    /**
     * @param string|null $keyword
     *
     * @return LengthAwarePaginator|null
     */
    public function getArticlesKeyword(string $keyword): ?LengthAwarePaginator
    {

        $articles = $this->model->preview()->addSelect('keywords.name as keyword_name')
                                ->join('article_keyword', 'articles.id', '=', 'article_keyword.article_id')
                                ->join('keywords', 'article_keyword.keyword_id', '=', 'keywords.id')
                                ->where('keywords.alias', $keyword)->fullContent()->published()
                                ->latest('published_at')->paginate(config('settings.pagination'));

        if ($articles->isEmpty()) abort(404);
        return $articles;
    }


    /**
     * получение последних статей
     *
     * @return Collection|null
     */
    public function getLastArticles(): ?Collection
    {
        return $this->model->preview()->withTitleImage()->published()
                           ->latest('published_at')->take(config('settings.lastArticlesLimit'))->get();
    }


    /**
     * выборка одной статьи по alias
     *
     * @param [type] $alias
     *
     * @return Article|null
     */
    public function getOneArticle($alias): Article
    {
        $article = $this->model->fullview()->fullContent()
                               ->where('alias', $alias)->published()->firstOrFail();

        return $article;
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getAllArticlesForAdmin(): LengthAwarePaginator
    {
        return $this->model->adminPreview()->fullContent()
                           ->latest('created_at')->paginate(config('settings.adminPagination'));
    }

    /**
     * for ajax
     *
     * @param string $query
     *
     * @return Collection
     */
    public function searchArticles(string $query): Collection
    {
        return $this->model->preview()
                           ->search($query)
                           ->published()
                           ->latest('published_at')->take(10)->get();
    }

    public function searchFullArticles(string $query): LengthAwarePaginator
    {
        return $this->model->preview()->search($query)->fullContent()
                           ->published()->latest('published_at')->paginate(config('settings.pagination'));
    }
}
