<?php

namespace App\Http\Controllers\Admin;


use App\Services\MenuService;

class IndexController extends AdminController
{
    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
        $this->template    = 'admin.index';
    }


    public function index()
    {
        return $this->renderOutput();
    }
}
