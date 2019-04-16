<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * объект с menu
     *
     * @var [App\Repositories\MenuService]
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
     *
     *
     * @var [ImageRepository]
     */
    protected $imageRepository;

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
     * @return void
     */
    public function renderOutput()
    {
        $this->varOutput['menu']    = $this->menuService->getAdminMenu();
        $this->varOutput['company'] = Company::first();
        return view($this->template)->with($this->varOutput);
    }

}
