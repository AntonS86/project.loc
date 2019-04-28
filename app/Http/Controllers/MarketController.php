<?php


namespace App\Http\Controllers;


use App\Services\MenuService;

class MarketController extends SiteController
{

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
        $this->template    = 'market';
    }

    public function index()
    {
        return $this->renderOutput();
    }
}
