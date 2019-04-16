<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Http\Requests\ArticlesSearch;
use App\Models\Keyword;
use App\Models\Works;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Repositories\ArticleRepository;
use App\Services\MenuService;
use App\Repositories\KeywordRepository;


class ArticlesController extends SiteController
{


    public function __construct(
        MenuService $menuService,
        ArticleRepository $articleRepository,
        KeywordRepository $keywordRepository
    )
    {
        $this->menuService       = $menuService;
        $this->articleRepository = $articleRepository;
        $this->keywordRepository = $keywordRepository;
        $this->template          = 'article';
    }


    /**
     * @param Request     $request
     * @param string|null $catAlias
     *
     * @return \Illuminate\Http\JsonResponse|View
     * @throws \Throwable
     */
    public function index(Request $request, string $catAlias)
    {
        $this->varOutput['articles'] = $this->articleRepository->getArticles($catAlias);
        if ($request->ajax()) {
            $html = view('many_articles', $this->varOutput)->render();
            return response()->json(['success' => true, 'articles' => $html]);
        }
        $this->addictedContent();
        $this->varOutput['categories'] = Category::where('alias', $catAlias)->first();

        return $this->renderOutput();

    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse|void
     * @throws \Throwable
     */
    public function all(Request $request)
    {
        $this->varOutput['articles'] = Article::preview()->fullContent()
                                              ->published()
                                              ->latest('published_at')
                                              ->paginate(config('settings.pagination'));
        if ($request->ajax()) {
            $html = view('many_articles', $this->varOutput)->render();
            return response()->json(['success' => true, 'articles' => $html]);
        }
        $this->addictedContent();

        return $this->renderOutput();
    }


    /**
     * @param Request     $request
     * @param string|null $keywordAlias
     *
     * @return \Illuminate\Http\JsonResponse|View
     * @throws \Throwable
     */
    public function keyword(Request $request, string $keywordAlias)
    {
        $this->varOutput['articles'] = $this->articleRepository->getArticlesKeyword($keywordAlias);
        if ($request->ajax()) {
            $html = view('many_articles', $this->varOutput)->render();
            return response()->json(['success' => true, 'articles' => $html]);
        }
        $this->addictedContent();
        $this->varOutput['keywords'] = Keyword::where('alias', $keywordAlias)->first();
        return $this->renderOutput();
    }


    /**
     * @param string $alias
     *
     * @return View
     */
    public function show(string $alias): View
    {
        $this->varOutput['oneArticle'] = $this->articleRepository->getOneArticle($alias);
        $this->addictedContent();
        return $this->renderOutput();
    }


    /**
     * @param ArticlesSearch $request
     *
     * @return \Illuminate\Http\JsonResponse|View
     * @throws \Throwable
     */
    public function search(ArticlesSearch $request)
    {
        $this->varOutput['articles'] = $this->articleRepository->searchFullArticles($request->search);
        $this->varOutput['articles']->appends($request->only('search'));
        if ($request->ajax()) {
            $html = view('many_articles', $this->varOutput)->render();
            return response()->json(['success' => true, 'articles' => $html]);
        }
        $this->addictedContent();
        $this->varOutput['search'] = 'Поиск: ' . $request->search;
        return $this->renderOutput();
    }

    /**
     * дополнительный контент
     * @return void
     */
    private function addictedContent(): void
    {
        $this->varOutput['works']           = Works::get();
        $this->varOutput['popularKeywords'] = $this->keywordRepository->getPopular();
        $this->varOutput['lastArticles']    = $this->articleRepository->getLastArticles();
    }
}
