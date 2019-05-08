<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticlesSearch;
use App\Http\Requests\SearchAddressRequest;
use App\Models\Street;
use App\Repositories\ArticleRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    private $articlesRepository;

    /**
     * SearchController constructor.
     *
     * @param ArticleRepository $articleRepository
     */
    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articlesRepository = $articleRepository;
    }

    /**
     * @param ArticlesSearch $request
     *
     * @return JsonResponse
     */
    public function searchArticles(ArticlesSearch $request): JsonResponse
    {
        $articles = $this->articlesRepository->searchArticles($request->search);
        return response()->json($articles);
    }

    /**
     * @param SearchAddressRequest $request
     * @param Street               $street
     *
     * @return JsonResponse
     */
    public function searchAddress(SearchAddressRequest $request, Street $street): JsonResponse
    {
        $result = $street->search($request->street_name)->take(50)->get();
        return response()->json($result);
    }
}
