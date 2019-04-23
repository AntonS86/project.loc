<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\ArticleUpdate;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Repositories\ArticleRepository;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Routing\RedirectController;
use Illuminate\View\View;


class ArticlesController extends Controller
{

    /**
     * @var string
     */
    protected $template;

    /**
     * массив с данными
     * будет отправлен во view
     *
     * @var array
     */
    protected $varOutput = [];

    /**
     * объект с данными о статьях
     *
     * @var [type]
     */
    protected $articleRepository;

    /**
     * ArticlesController constructor.
     *
     * @param ArticleRepository $articleRepository
     */
    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
        $this->template          = 'new_admin.article';
    }


    /**
     * @param Request $request
     *
     * @return View
     * @throws \Throwable
     */
    public function index(Request $request): View
    {
        $this->varOutput['articles'] = $this->articleRepository->getAllArticlesForAdmin();
        if ($request->ajax()) {

            $html = view('new_admin.article.articles_table', $this->varOutput)->render();
            return response()->json(['success' => true, 'articles' => $html]);
        }
        $this->varOutput['categories'] = Category::parentWithChildren()->get();
        return view($this->template)->with($this->varOutput);
    }


    /**
     * @param Article $article
     *
     * @return View
     */
    public function create(Article $article): View
    {
        $article->title       = 'Новая Статья';
        $article->category_id = 1;
        $article->save();

        $this->varOutput['article']    = $article->loadFullContent();
        $this->varOutput['categories'] = Category::parentWithChildren()->get();

        return view($this->template)->with($this->varOutput);
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
        $this->varOutput['article']    = $article->loadFullContent();
        $this->varOutput['categories'] = Category::parentWithChildren()->get();
        return view($this->template)->with($this->varOutput);
    }


    /**
     * Изображения загружаются в ImagesController
     *
     * @param ArticleRequest $request
     * @param Article        $article
     *
     * @return JsonResponse
     */
    public function update(ArticleRequest $request, Article $article): JsonResponse
    {
        $inputs        = $request->all();
        $articleUpdate = new ArticleUpdate($article);
        $articleUpdate->update($inputs);

        return response()->json($articleUpdate->getResponse());
    }


    /**
     * @param Article $article
     *
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Article $article): RedirectResponse
    {
        if (! $article->delete()) {
            return back()->with(['status' => 'Ошибка удаления статьи']);
        }
        return redirect()->route('admin.articles.index')->with(['status' => 'Статья удалена']);
    }
}
