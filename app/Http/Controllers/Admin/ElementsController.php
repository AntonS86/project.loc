<?php

namespace App\Http\Controllers\Admin;


use App\Services\MenuService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ElementsController extends AdminController
{

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
        $this->template = 'admin.elements.elements';
    }


    public function index()
    {
        //dd($this->varOutput['titleMenu']);
        return $this->renderOutput();
    }
}
