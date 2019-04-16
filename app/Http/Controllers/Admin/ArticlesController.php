<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Services\ArticleUpdate;
use App\Services\MenuService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Repositories\ArticleRepository;
use App\Http\Requests\ArticleRequest;
use App\Article;

class ArticlesController extends AdminController
{

    public function __construct(ArticleRepository $articleRepository, MenuService $menuService)
    {
        $this->articleRepository = $articleRepository;
        $this->menuService = $menuService;
        $this->template = 'admin.article';
    }



    public function index(Request $request)
    {
        $this->varOutput['articles'] = $this->articleRepository->getAllArticlesForAdmin();
        if ($request->ajax()) {

            $html = view('admin.articles_table', $this->varOutput)->render();
            return response()->json(['success' => true, 'articles' => $html]);
        }
        $this->varOutput['categories'] = Category::parentWithChildren()->get();
        return $this->renderOutput();
    }




    public function create(Article $article)
    {
        $article->title = 'Новая Статья';
        $article->category_id = 1;
        $article->save();

        $this->varOutput['article'] = $article->loadFullContent();
        $this->varOutput['categories'] = Category::parentWithChildren()->get();

        return $this->renderOutput();
    }


    /**
     * статья для редактирования
     *
     * @param Article $article
     *
     * @return View
     */
    public function edit(Article $article): View
    {
        $this->varOutput['article'] = $article->loadFullContent();
        $this->varOutput['categories'] = Category::parentWithChildren()->get();
        return $this->renderOutput();
    }


    /**
     * Изображения загружаются в ImagesController
     * @param ArticleRequest $request
     * @param Article        $article
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ArticleRequest $request, Article $article): JsonResponse
    {
        $inputs = $request->all();
        $articleUpdate = new ArticleUpdate($article);
        $articleUpdate->update($inputs);

        return response()->json($articleUpdate->getResponse());
    }


    public function destroy(Article $article)
    {
        if (! $article->delete()) {
            return back()->with(['status' => 'Ошибка удаления статьи']);
        }
        return redirect()->route('admin.articles.index')->with(['status' => 'Статья удалена']);
    }
}
