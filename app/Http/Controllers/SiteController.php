<?php


namespace App\Http\Controllers;


use App\Models\Company;
use Illuminate\View\View;

class SiteController extends Controller
{

    /**
     * объект с menu
     *
     * @var [App\Repositories\$menuService]
     */
    protected $menuService;


    /**
     * объект с данными о статьях
     *
     * @var [type]
     */
    protected $articleRepository;

    /**
     * объект с данными по ключевым словам
     *
     * @var [type]
     */
    protected $keywordRepository;

    /**
     * массив с данными
     * будет отправлен во view
     *
     * @var array
     */
    protected $varOutput = [];

    /**
     * подключаемый шаблон
     *
     * @var [type]
     */
    protected $template;


    /**
     * метод возвращает массив с данными во view
     *
     * @return View
     */
    public function renderOutput(): View
    {
        $this->varOutput['menu']    = $this->menuService->getMenu();
        $this->varOutput['company'] = Company::with('companyLinks')->first();
        return view($this->template)->with($this->varOutput);
    }

}
