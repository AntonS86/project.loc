<?php


namespace App\Repositories;


use App\Keyword;
use Illuminate\Database\Eloquent\Collection;



class KeywordRepository extends Repository
{

    public function __construct(Keyword $keyword)
    {
        $this->model = $keyword;
    }


    /**
     * 10 популрных тэгов
     *
     * @return Collection|null
     */
    public function getPopular(): ?Collection
    {
        $keywordsColomn  = ['keywords.id', 'name', 'keywords.alias', \DB::raw('count(keywords.id) as count')];
        $popularKeywords = $this->model->select($keywordsColomn)
                                       ->join('article_keyword', 'keywords.id', '=', 'article_keyword.keyword_id')
                                       ->join('articles', 'articles.id', '=', 'article_keyword.article_id')
                                       ->groupBy('keywords.id')->orderBy('count', 'desc')
                                       ->take(config('settings.popularTagsLimit'))->get();

        return $popularKeywords->isEmpty() ? null : $popularKeywords;
    }


}
