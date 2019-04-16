<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticlesSearch;
use App\Repositories\ArticleRepository;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    private $articlesRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articlesRepository = $articleRepository;
    }

    public function searchArticles(ArticlesSearch $request)
    {
        $articles = $this->articlesRepository->searchArticles($request->search);
        return response()->json($articles);
    }
}
